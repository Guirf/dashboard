<?php

namespace App\Http\Livewire;

use Livewire\Component;
use PAMI\Client\Impl\ClientImpl as PamiClient;
use PAMI\Message\Action\OriginateAction;
use PAMI\Message\Action\LogoffAction;
use Illuminate\Support\Facades\Auth;

class ClickToCall extends Component {
    public function render() {

        return view('livewire.show-ramais');
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
}
