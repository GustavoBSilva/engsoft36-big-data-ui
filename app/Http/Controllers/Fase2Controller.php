<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Fase2Controller extends Controller
{
    public function index() {

        // Dados gerais dos contribuintes
        $contribuintes = DB::table('contribuintes')->orderBy('cpf')->get();

        // Dados enviados pelas Instituições Financeiras
        $contas = DB::table('contas')->orderBy('cpf')->get();

        $saldos_nao_declarados = DB::table('saldos_nao_declarados')->orderBy('cpf')->get();
        $saldos_divergentes = DB::table('saldos_divergentes')->orderBy('cpf')->get();
        
        $declaracoes_com_dados_omissos = $saldos_nao_declarados->count();
        $declaracoes_divergentes = $saldos_divergentes->count();
        
        //dd($saldos_divergentes);

        return view('fase2.index')->with(compact(
            'contas', 'saldos_nao_declarados', 'saldos_divergentes', 'declaracoes_com_dados_omissos', 'declaracoes_divergentes', 
        ));
    }

    public function show($cpf) {
        
        $ano_calendario = 2019;

        $bens_direitos = DB::table('contas')
            ->where('cpf', '=', $cpf)
            ->where('ano_calendario', '=', $ano_calendario)
            ->get();

        // Dados enviados pelos contribuintes
        $bens_direitos_contrib = DB::table('contas_contribuintes')
            ->where('cpf', '=', $cpf)
            ->where('ano_calendario', '=', $ano_calendario)
            ->get();

        return view('fase2.show')->with(compact(
            'cpf', 'ano_calendario', 'bens_direitos', 'bens_direitos_contrib'
        ));
    }
}
