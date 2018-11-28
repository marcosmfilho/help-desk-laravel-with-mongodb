@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-3">
        <div class="widget style1 lazur-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-bell fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Total </span>
                    <h2 class="font-bold">{{ $total }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 yellow-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-times fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Não Resolvidas</span>
                    <h2 class="font-bold">{{ $unresolved }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-check fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Resolvidas </span>
                    <h2 class="font-bold">{{ $resolved }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 red-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-exclamation-triangle fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Urgentes </span>
                    <h2 class="font-bold">{{ $urgent }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Minhas Ocorrências</h5>
            <div class="ibox-tools">
                <a href="{{ route('occurrences.create') }}">
                    <button class="btn btn-success" type="button"><i class="fa fa-plus"></i>&nbsp;Criar Nova Ocorrência</button>
                </a>
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">

            <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th>Data da Ocorrência</th>
            <th>Prioridade</th>
            <th>Título</th>
            <th>Categoria</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($occurrences as $occurrence)
                <tr>
                    <td>{{ date("d/m/Y H:i:s", strtotime($occurrence->created_at))}}</td>
                    
                    <td class='center'>
                        @if ($occurrence->priority == App\OccurrencePriority::NORMAL)
                            <span class="badge badge-info">Normal</span>
                        @endif

                        @if ($occurrence->priority == App\OccurrencePriority::MEDIUM)
                            <span class="badge badge-warning">Média</span>
                        @endif

                        @if ($occurrence->priority == App\OccurrencePriority::URGENT)
                            <span class="badge badge-danger">Urgente</span>
                        @endif
                    </td>
                    
                    <td>{{ $occurrence->title }}</td>
                    
                    <td>
                        @if ($occurrence->category == App\Category::NEW_FUNCTIONALITY)
                            Nova Funcionalidade
                        @endif

                        @if ($occurrence->category == App\Category::UPDATE_FUNCTIONALITY)
                            Alterar Funcionalidade
                        @endif

                        @if ($occurrence->category == App\Category::BUG)
                            Correção (Bug)
                        @endif
                    </td>

                    <td>
                        @if ($occurrence->status == App\OccurrenceStatus::RESOLVED)
                            <span class="badge badge-success">Resolvido</span>
                        @endif

                        @if ($occurrence->status == App\OccurrenceStatus::UNRESOLVED)
                            <span class="badge badge-warning">Não resolvido</span>
                        @endif
                    </td>

                    <td>
                       <a href="{{ route('occurrences.show',$occurrence->id) }}"> <button type="button" class="btn btn-outline btn-info btn-xs">Detalhes</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7">
                    <ul class="pagination pull-right"></ul>
                </td>
            </tr>
        </tfoot>
        </table>
        </div>
        </div>
    </div>
</div>
@endsection