@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Nova Ocorrência</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('occurrences.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="ibox-content">
				<form action="{{ route('occurrences.store') }}" method="POST" class="form-horizontal">
					@csrf
					<div class="form-group"><label class="col-sm-2 control-label">Título</label>
						<div class="col-sm-10"><input type="text" name="title" class="form-control"></div>
					</div>
					
					<div class="hr-line-dashed"></div>
					
					<div class="form-group"><label class="col-sm-2 control-label">Descrição</label>
						<div class="col-sm-10">
							<textarea type="text" name="description" class="form-control"></textarea>
						</div>
					</div>

					<div class="hr-line-dashed"></div>

					<div class="form-group">
					
						<label class="col-sm-2 control-label">Categoria</label>

						<div class="col-sm-10">
							<select class="form-control m-b" name="category">
								<option value="{{App\Category::NEW_FUNCTIONALITY}}">Nova Funcionalidade</option>
								<option value="{{App\Category::UPDATE_FUNCTIONALITY}}">Alterar Funcionalidade</option>
								<option value="{{App\Category::BUG}}">Correção (Bug)</option>
							</select>
						</div>

					</div>

					<div class="hr-line-dashed"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Prioridade</label>

						<div class="col-sm-10">
							<select class="form-control m-b" name="priority">
								<option value="{{App\OccurrencePriority::NORMAL}}">Normal</option>
								<option value="{{App\OccurrencePriority::MEDIUM}}">Média</option>
								<option value="{{App\OccurrencePriority::URGENT}}">Urgente</option>
							</select>
						</div>

					</div>
					
					<div class="hr-line-dashed"></div>
			
					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<button class="btn btn-primary" type="submit">Criar Ocorrência</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

@endsection