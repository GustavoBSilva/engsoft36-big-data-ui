@extends('layouts.bootstrap.base')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Fase 2</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detalhamento do contribuinte (CPF: {{ $cpf }})</li>
  </ol>
</nav>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Informações relativas à fase 2</h2>
</div>

<h3>Bens e Direitos</h3>
<div class="row mt-3">
    <div class="col">
        <h4>Enviados pelas instituições financeiras</h4>
        <table id="bens-direitos" class="table table-striped table-hover">
            <thead class="thead-dark">
                <th scope="col">Agência (sem DV)</th>
                <th scope="col">Conta</th>
                <th scope="col">Situação anterior ({{ $ano_calendario - 1 }})</th>
                <th scope="col">Situação vigente ({{ $ano_calendario }})</th>
            </thead>
            <tbody>
                <?php $total_anterior = 0; $total_vigente = 0; ?>
                @foreach ($bens_direitos as $registro)
                    <?php $total_anterior += $registro->situacao_anterior; ?>
                    <?php $total_vigente += $registro->situacao_vigente ?>
                    <tr>
                        <td>{{ $registro->agencia_sem_dv }}</td>
                        <td>{{ $registro->conta_num }}-{{ $registro->conta_dv }}</td>
                        <td>R$ {{ number_format($registro->situacao_anterior, 2, ",", ".") }}</td>
                        <td>R$ {{ number_format($registro->situacao_vigente, 2, ",", ".") }}</td>
                    </tr>
                @endforeach
            </tbody>

            <tfooter>
                <tr class="table-active">
                    <td colspan="2">Total</td>
                    <td>R$ {{ number_format($total_anterior, 2, ",", ".") }}</td>
                    <td>R$ {{ number_format($total_vigente, 2, ",", ".") }}</td>
                </tr>
            </tfooter>
        </table>
    </div>

    <div class="col">
        <h4>Declarados pelo contribuinte</h4>
        <table id="bens-direitos-contribuinte" class="table table-striped table-hover">
            <thead class="thead-dark">
                <th scope="col">Agência (sem DV)</th>
                <th scope="col">Conta</th>
                <th scope="col">Situação anterior ({{ $ano_calendario - 1 }})</th>
                <th scope="col">Situação vigente ({{ $ano_calendario }})</th>
            </thead>

            <tbody>
                <?php $total_anterior = 0; $total_vigente = 0; ?>
                @foreach ($bens_direitos_contrib as $registro)
                    <?php $total_anterior += $registro->situacao_anterior; ?>
                    <?php $total_vigente += $registro->situacao_vigente ?>
                    <tr>
                        <td>{{ $registro->agencia_sem_dv }}</td>
                        <td>{{ $registro->conta_num }}-{{ $registro->conta_dv }}</td>
                        <td>R$ {{ number_format($registro->situacao_anterior, 2, ",", ".") }}</td>
                        <td>R$ {{ number_format($registro->situacao_vigente, 2, ",", ".") }}</td>
                    </tr>
                @endforeach
            </tbody>

            <tfooter>
                <tr class="table-active">
                    <td colspan="2">Total</td>
                    <td>R$ {{ number_format($total_anterior, 2, ",", ".") }}</td>
                    <td>R$ {{ number_format($total_vigente, 2, ",", ".") }}</td>
                </tr>
            </tfooter>
        </table>
    </div>
</div>

<a href="/fase2" class="btn btn-secondary">Voltar</a>

@endsection

@section('javascript')
<script>

</script>
@endsection