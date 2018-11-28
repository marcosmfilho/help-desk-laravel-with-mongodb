@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-3">
        <div class="widget style1 lazur-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-users fa-5x"></i>
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
                    <i class="fa fa-user fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Clientes</span>
                    <h2 class="font-bold">{{ $client }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-user fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Agentes </span>
                    <h2 class="font-bold">{{ $agent }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 red-bg">
            <div class="row">
                <div class="col-xs-4">
                    <i class="fa fa-user-secret fa-5x"></i>
                </div>
                <div class="col-xs-8 text-right">
                    <span> Admin </span>
                    <h2 class="font-bold">{{ $admin }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Ocorrências</h5>
            <div class="ibox-tools">
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
            <th>Data de Criação</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Tipo de Usuário</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    
                    <td>{{ date("d/m/Y H:i:s", strtotime($user->created_at))}}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type }}</td>

                    <td>
                            @if (Auth::user()->id !== $user->id)
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" aria-expanded="false">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu" style="left: -100px!important">
                                    <li><a href="#">Promover a Administrador</a></li>
                                    <li><a href="#">Promover a Agente</a></li>
                                </ul>                     
                            </div>
                            @endif
                        </div>
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