<?php

namespace App\Services;

use App\Models\Agendamento;

class AgendamentoService
{
    public function agendarCliente($cliente, $barbeiro, $data)
    {
        $agendamento = new Agendamento();
        $agendamento->cliente_id = $cliente->id;
        $agendamento->barbeiro_id = $barbeiro->id;
        $agendamento->$data;
        $agendamento->save();

        return $agendamento;
    }
}
