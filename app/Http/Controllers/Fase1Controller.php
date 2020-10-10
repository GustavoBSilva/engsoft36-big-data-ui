<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Fase1Controller extends Controller
{
    public function index() {

        // Dados gerais dos Contribuintes
        $contribuintes = DB::table('contribuintes')->orderBy('cpf')->get();

        // Dados enviados pelas Empresas
        $rendimentos = DB::table('beneficios')->orderBy('cpf')->get();

        $rendimentos_nao_declarados = DB::table('rendimentos_nao_declarados')->orderBy('cpf')->get();
        $rendimentos_divergentes = DB::table('rendimentos_divergentes')->orderBy('cpf')->get();
        
        $declaracoes_com_dados_omissos = $rendimentos_nao_declarados->count();
        $declaracoes_divergentes = $rendimentos_divergentes->count();
        
        //dd($rendimentos_nao_declarados);

        return view('fase1.index')->with(compact(
            'rendimentos', 'rendimentos_nao_declarados', 'rendimentos_divergentes', 'declaracoes_com_dados_omissos', 'declaracoes_divergentes', 
        ));
    }

    public function show($cpf) {

        // Dados enviados pelas Empresas
        $rendimentos = DB::table('beneficios')->where('cpf', $cpf)->get();

        return view('fase1.show')->with(compact(
            'cpf', 'rendimentos'
        ));
    }
}
