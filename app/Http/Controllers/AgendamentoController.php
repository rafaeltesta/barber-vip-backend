<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Services\AgendamentoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $cliente = auth()->id;
            $barbeiro = $request->barbeiro;
            $data = $request->data;

            $agendamento = (new AgendamentoService())->agendarCliente($cliente, $barbeiro, $data);

            return response()->json([
                'response' => 'Horario agendado com sucesso!',
                'agendamento' => $agendamento
            ], 201);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json('Ocorreu algum problema com o agendamento!', 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function show(Agendamento $agendamento)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agendamento $agendamento)
    {
        try {
            $cliente = auth()->id;
            $barbeiro = $request->barbeiro;
            $data = $request->data;

            $agendamento->data = $data;
            $agendamento->save();

            return response()->json([
                'response' => 'Horario alterado com sucesso!',
                'agendamento' => $agendamento
            ], 201);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json('Ocorreu algum problema ao editar o agendamento!', 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agendamento $agendamento)
    {
        try {
            $agendamento->delete();

            return response()->json([
                'response' => 'Agendamento excluido com sucesso!',
                'agendamento' => $agendamento
            ], 201);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json('Ocorreu algum problema ao deletar o agendamento!', 400);
        }
    }
}
