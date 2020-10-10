@extends('layouts.bootstrap.base')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Fase 1</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detalhamento do contribuinte (CPF: {{ $cpf }})</li>
  </ol>
</nav>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Informações relativas à fase 1</h2>
</div>

<h2>Valores enviados pelas empresas</h2>
<table id="rendimentos-nao-declarados" class="table table-striped table-hover">
    <thead class="thead-dark">
        <th scope="col">CNPJ</th>
        <th scope="col">Rendimentos</th>
        <th scope="col">Décimo Terceiro</th>
    </thead>
    <tbody>

    @foreach ($rendimentos as $rendimento)
        <tr>
            <td>{{ $rendimento->cnpj }}</td>
            <td>R$ {{ number_format($rendimento->rendimentos, 2, ",", ".") }}</td>
            <td>R$ {{ number_format($rendimento->decimo_terceiro, 2, ",", ".") }}</td>
        </tr>
    @endforeach
</table>

<hr/>

<a href="/fase1" class="btn btn-secondary">Voltar</a>

@endsection

@section('javascript')
<script>

</script>
@endsection