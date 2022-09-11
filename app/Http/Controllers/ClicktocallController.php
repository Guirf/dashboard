<?php

namespace App\Http\Controllers;

use PAMI\Client\Impl\ClientImpl as PamiClient;
use PAMI\Message\Action\OriginateAction;
use PAMI\Message\Action\LogoffAction;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ActionController;

use Illuminate\Http\Request;


class ClickTocallController extends Controller
{
    public function conetarAsterisk()
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

    public function ctc($numeroA, $numeroB)
    {

        $numeroA = Auth::user()->ramal;

        // $array =  array(
        //     'host' => '127.0.0.1',
        //     'scheme' => 'tcp://',
        //     'port' => '5038',
        //     'username' => 'ctc',
        //     'secret' => 'root',
        //     'connect_timeout' => 60000,
        //     'read_timeout' => 60000
        // );

        $this->conetarAsterisk();

        $action = new OriginateAction('PJSIP/' . $numeroA . '@ramais');
        $action->setContext('ramais');
        $action->setExtension($numeroB);
        $action->setPriority('1');
        $action->setAsync(true);

        $this->conetarAsterisk()->send($action);

        $action2 = new LogoffAction();
        $this->conetarAsterisk()->send($action2);

        $this->conetarAsterisk()->close();

        return redirect('/');
    }

    public function redirect()
    {
        return redirect('/');
    }
}
