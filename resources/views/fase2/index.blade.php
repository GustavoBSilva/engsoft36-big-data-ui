@extends('layouts.bootstrap.base')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Informações relativas à fase 2</h2>
</div>

<h2>Bens e Direitos não declarados</h2>
<table id="saldos-nao-declarados" class="table table-striped table-hover">
    <thead class="thead-dark">
        <th scope="col">CPF</th>
        <th scope="col">Saldo total informado pelas Instituições Financeiras</th>
        <th scope="col">Ações</th>
    </thead>
    <tbody>
        
    @foreach ($saldos_nao_declarados as $saldo)
        <tr>
            <td>{{ $saldo->cpf }}</td>
            <td>R$ {{ number_format($saldo->total_saldo, 2, ",", ".") }}</td>
            <td>
                <a href="/fase2/{{$saldo->cpf}}" class="btn btn-primary">Detalhar</a>
            </td>
        </tr>
    @endforeach
</table>

<hr/>

<h2>Bens e Direitos com dados divergentes</h2>
<table id="saldos-divergentes" class="table table-striped table-hover">
    <thead class="thead-dark">
        <th scope="col">CPF</th>
        <th scope="col">Valor informado pelas instituições financeiras</th>
        <th scope="col">Valor declarado pelo contribuinte</th>
        <th scope="col">Diferença</th>
        <th scope="col">Ações</th>
    </thead>
    <tbody>
        @foreach ($saldos_divergentes as $saldo)
            <?php $diferenca = $saldo->total_saldo_inst_financ - $saldo->total_saldo_contrib; ?>
            <tr>
                @php
                $cpf = $saldo->cpf;
                @endphp
                <td>{{ $cpf }}</td>
                <td>R$ {{ number_format($saldo->total_saldo_inst_financ, 2, ",", ".") }}</td>
                <td>R$ {{ number_format($saldo->total_saldo_contrib, 2, ",", ".") }}</td>
                <td  class="{{ $diferenca > 50000 ? 'table-danger' : 'table-success' }}">R$ {{ number_format($diferenca, 2, ",", ".") }}</td>
                <td>
                    <a href="/fase2/{{$cpf}}" class="btn btn-primary">Detalhar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('javascript')
<script>

</script>
@endsection