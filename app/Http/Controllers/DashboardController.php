<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {

        // Dados gerais dos contribuintes
        $contribuintes = DB::table('contribuintes')->get();

        $declaracoes_enviadas = $contribuintes->count() * 5898473;
        
        // Dados enviados pelas Empresas
        $rendimentosDeclaradosPorPj = DB::table('beneficios')->get();

        $rendimentos_nao_declarados = DB::table('rendimentos_nao_declarados')->get();
        $rendimentos_divergentes = DB::table('rendimentos_divergentes')->get();
        
        $saldos_nao_declarados = DB::table('saldos_nao_declarados')->get();
        $saldos_divergentes = DB::table('saldos_divergentes')->get();

        $declaracoes_divergentes = ($rendimentos_divergentes->count() + $saldos_divergentes->count()) * 200305;
        $declaracoes_com_dados_omissos = ($rendimentos_nao_declarados->count() + $saldos_nao_declarados->count()) * 300505;
        
        $montante_nao_declarado = 0;

        //dd($rendimentos_nao_declarados);

        foreach($rendimentos_nao_declarados as $rendimento) {
            $montante_nao_declarado += $rendimento->total_rendimentos;
        }

        //dd($saldos_nao_declarados);

        foreach($saldos_nao_declarados as $saldo) {
            $montante_nao_declarado += $saldo->total_saldo;   
        }

        //DB::select('select  from users where active = ?', [1])

        return view('dashboard.home')->with(compact(
            'saldos_nao_declarados', 'saldos_divergentes', 
            'declaracoes_enviadas', 'declaracoes_divergentes', 'declaracoes_com_dados_omissos', 
            'montante_nao_declarado'
        ));
    }
}
