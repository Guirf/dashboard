<?php

namespace App\Http\Controllers;

use Swoole\WebSocket\Server;
use PAMI\Message\Event\DialEvent;
use PAMI\Client\Impl\ClientImpl as PamiClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use PAMI\Message\Action\QueuesAction;
use PAMI\Message\Action\QueueStatusAction;
use PAMI\Message\Action\QueueSummaryAction;
use PAMI\Message\Action\QueuePauseAction;
use PAMI\Message\Action\QueueRemoveAction;
use PAMI\Message\Action\QueueUnpauseAction;
use PAMI\Message\Action\QueueLogAction;
use PAMI\Message\Action\QueuePenaltyAction;
use PAMI\Message\Action\QueueReloadAction;
use PAMI\Message\Action\QueueResetAction;
use PAMI\Message\Action\QueueRuleAction;
use PAMI\Listener\IEventListener;
use PAMI\Message\Action\AgentsAction;
use PAMI\Message\Event\EventMessage;
use PAMI\Message\Action\ReloadAction;
use PAMI\Message\Action\QueueAddAction;
use PAMI\Message\Event\AgentLoginEvent;
use PAMI\Message\Action\SIPPeersAction;
use PAMI\Message\Action\MonitorAction;

class ActionController extends Controller
{

    public function conectarAsterisk()
    {
        $array =  array(
            'host' => env('AST_HOST'),
            'scheme' => env('AST_SCHEME'),
            'port' => env('AST_PORT'),
            'username' => env('AST_USERNAME'),
            'secret' => env('AST_SECRET'),
            'connect_timeout' => env('AST_CONNECT_TIMEOUT'),
            'read_timeout' => env('AST_READ_TIMEOUT')
        );

        $conexao = new PamiClient($array);
        $conexao->open();

        return $conexao;
    }

    public function addRamal()
    {

        return view('addRamal');
    }

    public function astConn()
    {
        $array =  array(
            'host' => '127.0.0.1',
            'scheme' => 'tcp://',
            'port' => '5038',
            'username' => 'ctc',
            'secret' => 'root',
            'connect_timeout' => 60000,
            'read_timeout' => 60000
        );
        $conexao = new PamiClient($array);
        $conexao->open();

        return $conexao;

       

        $this->conectarAsterisk();
    }

    public function queuesLog() {
        
    }


    public function addRamalReturn()
    {

        $name = filter_input(INPUT_POST, 'name');
        $ramal = filter_input(INPUT_POST, 'ramal');
        $department = filter_input(INPUT_POST, 'department');
        $password = filter_input(INPUT_POST, 'password');

        if ($name && $ramal && $department && $password) {

            // adiciona as informações nas 3 tabelas

            DB::insert('INSERT INTO ps_endpoints (id, transport, aors, auth, context, disallow, allow, direct_media, callerid, name, department) VALUES 
            (:id, :transport, :aors, :auth, :context, :disallow, :allow, :direct_media, :callerid, :name, :department)', [
                'id' => $ramal,
                'transport' => "transport-udp",
                'aors' => $ramal,
                'auth' => $ramal,
                'context' => "ramais",
                'disallow' => "all",
                'allow' => "gsm",
                'direct_media' => "no",
                'callerid' => $name . " <" . $ramal . ">",
                'name' => $name,
                'department' => $department
            ]);

            DB::insert('INSERT INTO ps_auths (id, auth_type, password, username) VALUES (:id, :auth_type, :password, :username)', [
                'id' => $ramal,
                'auth_type' => "userpass",
                'password' => $password,
                'username' => $ramal
            ]);

            DB::insert('INSERT INTO ps_aors (id, max_contacts) VALUES (:id, :max_contacts)', [
                'id' => $ramal,
                'max_contacts' => "1"
            ]);
        }


        return redirect('dashboard');
    }

    public function addUsers()
    {

        return view('addUsers');
    }

    public function addUsersReturn(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:11', 'unique:users'],
            'ramal' => ['required', 'string', 'max:4'],
            'department' => ['required', 'string', 'max:60'],
            'password' => ['required', 'string', Rules\Password::defaults()],
        ]);


        $user = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'ramal' => $request->ramal,
            'department' => $request->department,
            'password' => Hash::make($request->password)
        ])->givePermissionTo('users');

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

    public function deleteRamal($ramal_id)
    {

        DB::delete('DELETE FROM ps_endpoints WHERE id = :id', [
            'id' => $ramal_id
        ]);

        DB::delete('DELETE FROM ps_auths WHERE id = :id', [
            'id' => $ramal_id
        ]);

        DB::delete('DELETE FROM ps_aors WHERE id = :id', [
            'id' => $ramal_id
        ]);

        return redirect('/');
    }


    // public function fila() {

    //     return view('fila')->with('status', '');
    // }


    public function filaLogar() {

        $datas = DB::select('SELECT * FROM queue_members');
        
        // nome e ramal do usuário logado
        $ramalUser = auth()->user()->ramal;
        $nameUser = auth()->user()->name;


        // verifica se o agente já está logado
        if(count($datas) > 0) {
            
            foreach($datas as $data) {
            
                if($data->membername = $nameUser) {
                    return redirect()->route('fila')->with('info', 'Você já está logado!');
    
                } else {
    
                    DB::insert('INSERT INTO queue_members (membername, queue_name, interface, penalty, paused) VALUES (:membername, :queue_name, :interface, :penalty, :paused)', [
                        'membername' => $nameUser,
                        'queue_name' => 'suporte',
                        'interface' => 'PJSIP/'.$ramalUser,
                        'penalty' => '1',
                        'paused' => '0'
                    ]);
    
                    return redirect()->route('fila')->with('message', 'Logado com sucesso');
                }
            }
            
        } else {

            DB::insert('INSERT INTO queue_members (membername, queue_name, interface, penalty, paused) VALUES (:membername, :queue_name, :interface, :penalty, :paused)', [
                'membername' => $nameUser,
                'queue_name' => 'suporte',
                'interface' => 'PJSIP/'.$ramalUser,
                'penalty' => '1',
                'paused' => '0'
            ]);

            return redirect()->route('fila')->with('message', 'Logado com sucesso');
        }  

        // $this->conectarAsterisk();
        
        // $a = new QueueLogAction('suporte', 'AgentLoginEvent');
        // $this->conectarAsterisk()->send($a);
        // var_dump ($a);
        // $this->conectarAsterisk()->close();
        // return redirect()->route('fila');
    }

    public function filaDeslogar() {
        
        $datas = DB::select('SELECT * FROM queue_members');

        $ramalUser = auth()->user()->ramal;
        $nameUser = auth()->user()->name;

        //verifica se há dados
        if(count($datas) > 0) {

            foreach($datas as $data) {

                //se existir agente com o mesmo nome de usuário da sessão ele remove
                if($data->membername = $nameUser) {
    
                    DB::delete("DELETE FROM queue_members WHERE membername = :membername", [
                        'membername' => $nameUser
                    ]);
    
                    return redirect()->route('fila')->with('message', 'Deslogado com sucesso!');
                }
            }
        // caso não tenha dados, ele redireciona e avisa
        } else {
            return redirect()->route('fila')->with('info', 'você já está deslogado!');
        }

        
           
    }
}

// Voce vai usar as notificações dessa forma

// return redirect()->route('nome da rota')->with('message','Data added Successfully');

// return redirect()->route('nome da rota')->with('error','Data Deleted');

// return redirect()->route('nome da rota')->with('warning','Are you sure you want to delete? ');

// return redirect()->route('nome da rota')->with('info','This is xyz information');