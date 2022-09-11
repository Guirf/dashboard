<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use PAMI\Client\Impl\ClientImpl as PamiClient;
use PAMI\Message\Action\OriginateAction;
use PAMI\Message\Action\LogoffAction;

use \Livewire\Component;

class ShowRamais extends Component { 

    public function dashboard() {

        $dados1 = DB::select("SELECT event FROM queue_log WHERE event = 'ENTERQUEUE' ");
        $dados2 = DB::select("SELECT event FROM queue_log WHERE event = 'CONNECT'");
        $dados3 = DB::select("SELECT event FROM queue_log WHERE event = 'ABANDON' ");
        $dados4 = DB::select("SELECT event FROM queue_log WHERE event = 'RINGNOANSWER' AND data >= 5 ");

        $notes = DB::select('SELECT *,(SELECT SUM(agent_note) FROM satisfacao WHERE ramal = ps_endpoints.aors) as nota FROM ps_endpoints ORDER BY (SELECT SUM(agent_note) FROM satisfacao WHERE ramal = ps_endpoints.aors) DESC');

        $enter_queue = count($dados1);
        $answer_queue = count($dados2);
        $abandon_queue = count($dados3);
        $ctee = count($dados4);

        return view('livewire.painel', [
            'enter_queue' => $enter_queue,
            'answer_queue' => $answer_queue,
            'abandon_queue' => $abandon_queue,
            'ctee' => $ctee,
            'notes' => $notes
        ]);


        
    }

    public function render() {

        $contacts = DB::select("SELECT * FROM ps_endpoints");

        return view('livewire.show-ramais', [
            'contacts' => $contacts
        ]);
    }

   
    public function delete($id) {

        $delete = DB::delete("DELETE FROM ps_endpoints WHERE id = :id", [
            "id" => $id
        ]);
    }

    public function ctc($numeroA, $numeroB) {

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

        $action = new OriginateAction('PJSIP/' . $numeroA . '@ramais');
        $action->setContext('ramais');
        $action->setExtension($numeroB);
        $action->setPriority('1');
        $action->setAsync(true);

        $conexao->send($action);

        $action2 = new LogoffAction();
        $conexao->send($action2);

        $conexao->close();

    }
    
    public function queue_logs() {

        $dados1 = DB::select("SELECT event FROM queue_log WHERE event = 'ENTERQUEUE' ");
        $enter_queue = count($dados1);
        
        // return view('livewire.painel', [
        //     'enter_queue' => $enter_queue
        // ]);
    }

    public function lo() {
        echo "entrou";
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
                        'interface' => 'PJSIP/2000',
                        'penalty' => '1',
                        'paused' => '0'
                    ]);
    
                    return redirect()->route('fila')->with('message', 'Logado com sucesso');
                }
            }
        }
    }

    public function fila() {
        return view('livewire.fila');
        
    }

    public function teste() {
        return view('livewire.testee');
        
    }

    public function test() {
        echo "este";
        
    }

}
