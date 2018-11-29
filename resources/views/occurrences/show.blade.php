@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detalhes da Ocorrência</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('occurrences.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Data de Criação:</strong>
                {{ date("d/m/Y H:i:s", strtotime($occurrence->created_at))}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Criador:</strong>
                {{ App\User::find($occurrence->userID)['name'] }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email do Criador:</strong>
                {{ App\User::find($occurrence->userID)['email'] }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Título da Ocorrência:</strong>
                {{ $occurrence->title }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição da Ocorrência:</strong>
                {{ $occurrence->description }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tipo da Ocorrência:</strong>
                @if ($occurrence->category == App\Category::NEW_FUNCTIONALITY)
                    Nova Funcionalidade
                @endif

                @if ($occurrence->category == App\Category::UPDATE_FUNCTIONALITY)
                    Alterar Funcionalidade
                @endif

                @if ($occurrence->category == App\Category::BUG)
                    Correção (Bug)
                @endif
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                @if ($occurrence->status == App\OccurrenceStatus::RESOLVED)
                    <span class="badge badge-success">Resolvido</span>
                @endif

                @if ($occurrence->status == App\OccurrenceStatus::UNRESOLVED)
                    <span class="badge badge-warning">Não resolvido</span>
                @endif

                @if ($occurrence->priority == App\OccurrencePriority::NORMAL)
                    <span class="badge badge-info">Normal</span>
                @endif

                @if ($occurrence->priority == App\OccurrencePriority::MEDIUM)
                    <span class="badge badge-warning">Média</span>
                @endif

                @if ($occurrence->priority == App\OccurrencePriority::URGENT)
                    <span class="badge badge-danger">Urgente</span>
                @endif
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        @if ($occurrence->status == App\OccurrenceStatus::RESOLVED)
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="ibox-content">
                            <div class="form-group">
                                <strong>Situação:</strong>
                                Ocorrência Resolvida
                            </div>

                            <div class="form-group">
                                <strong>Resposta da Empresa:</strong>
                                {{ $occurrence->response }}
                            </div>
                        </div>
                    </div>
                </div>
        @endif

        @if (($occurrence->status == App\OccurrenceStatus::UNRESOLVED) && (Auth::user()->is_agent == true))
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="ibox-content">
                        <form action="{{ route('occurrences.update', $occurrence->id) }}" method="POST" class="form-horizontal">
                            @csrf
                            @method('PUT')                        

                            <div class="form-group"><label class="col-sm-2 control-label">Resposta para o Cliente</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="response" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                    
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary btn-rounded btn-block" type="submit"><i class="fa fa-check"></i> Marcar Ocorrência como Resolvida</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection