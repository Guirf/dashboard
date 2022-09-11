<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{

    public function index()
    {

        $user = filter_input(INPUT_POST, 'user');
        $ramal = filter_input(INPUT_POST, 'ramal');
        $context = filter_input(INPUT_POST, 'context');
        $password = filter_input(INPUT_POST, 'password');

        if ($ramal && $context && $password && $user) {

            // adiciona as informações nas 3 tabelas

            DB::insert('INSERT INTO ps_endpoints (id, transport, aors, auth, context, disallow, allow, direct_media, callerid, name) VALUES 
            (:id, :transport, :aors, :auth, :context, :disallow, :allow, :direct_media, :callerid, :name)', [
                'id' => $ramal,
                'transport' => "transport-udp",
                'aors' => $ramal,
                'auth' => $ramal,
                'context' => $context,
                'disallow' => "all",
                'allow' => "gsm",
                'direct_media' => "no",
                'callerid' => $user . " <" . $ramal . ">",
                'name' => $user
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

        // Lista as informações
        //$lists = DB::select('SELECT * FROM ps_endpoints ORDER BY aors ASC');
        $lists = DB::select('SELECT *,(SELECT SUM(agent_note) FROM satisfacao WHERE ramal = ps_endpoints.aors) as nota FROM ps_endpoints ORDER BY (SELECT SUM(agent_note) FROM satisfacao WHERE ramal = ps_endpoints.aors) DESC');
        $data = DB::select('SELECT * FROM ps_contacts');

        $ramalUser = auth()->user()->ramal;

        //$scores = DB::select("SELECT * FROM satisfacao ORDER BY agent_note ASC" );
        //$scores = DB::select("SELECT ramal, SUM(agent_note) AS nota FROM satisfacao GROUP BY ramal");


        $dados1 = DB::select("SELECT event FROM queue_log WHERE event = 'ENTERQUEUE' ");
        $dados2 = DB::select("SELECT event FROM queue_log WHERE event = 'CONNECT'");
        $dados3 = DB::select("SELECT event FROM queue_log WHERE event = 'ABANDON' ");

        $enter_queue = count($dados1);
        $answer_queue = count($dados2);
        $abandon_queue = count($dados3);

        return view('dashboard', [
            'lists' => $lists,
            'data' => $data,
            'enter_queue' => $enter_queue,
            'answer_queue' => $answer_queue,
            'abandon_queue' => $abandon_queue,
        ]);
    }

    public function delete($ramal_id)
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


    public function add()
    {


        return view('add');
    }

    public function queueDatas()
    {
    }
}
