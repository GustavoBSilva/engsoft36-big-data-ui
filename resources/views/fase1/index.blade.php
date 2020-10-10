@extends('layouts.bootstrap.base')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Informações relativas à fase 1</h2>
</div>

<h2>Valores não declarados</h2>
<table id="rendimentos-nao-declarados" class="table table-striped table-hover">
    <thead class="thead-dark">
        <th scope="col">CPF</th>
        <th scope="col">Valor informado pelas PJs</th>
        <th scope="col">Ações</th>
    </thead>
    <tbody>
        
    @foreach ($rendimentos_nao_declarados as $rendimento)
        <tr>
            <td>{{ $rendimento->cpf }}</td>
            <td>R$ {{ number_format($rendimento->total_rendimentos, 2, ",", ".") }}</td>
            <td>
                <a href="/fase1/{{$rendimento->cpf}}" class="btn btn-primary">Detalhar</a>
            </td>
        </tr>
    @endforeach
</table>

<hr/>

<h2>Valores divergentes</h2>
<table id="rendimentos-divergentes" class="table table-striped table-hover">
    <thead class="thead-dark">
        <th scope="col">CPF</th>
        <th scope="col">Valor informado pelas PJs</th>
        <th scope="col">Valor declarado pelo contribuinte</th>
        <th scope="col">Diferença</th>
        <th scope="col">Ações</th>
    </thead>
    <tbody>
        
    @foreach ($rendimentos_divergentes as $rendimento)
        <?php $diferenca = $rendimento->total_rendimentos_pj - $rendimento->total_rendimentos_contrib; ?>
        <tr>
            <td>{{ $rendimento->cpf }}</td>
            <td>R$ {{ number_format($rendimento->total_rendimentos_pj, 2, ",", ".") }}</td>
            <td>R$ {{ number_format($rendimento->total_rendimentos_contrib, 2, ",", ".") }}</td>
            <td  class="{{ $diferenca > 50000 ? 'table-danger' : 'table-success' }}">R$ {{ number_format($diferenca, 2, ",", ".") }}</td>
            <td>
                <a href="/fase1/{{$rendimento->cpf}}" class="btn btn-primary">Detalhar</a>
            </td>
        </tr>
    @endforeach
</table>

@endsection

@section('javascript')
<script>

</script>
@endsection