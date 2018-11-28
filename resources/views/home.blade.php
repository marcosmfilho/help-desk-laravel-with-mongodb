@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Bem Vindo, {{ Auth::user()->name }}!</h3><br>
                    <p>
                        Na aba <i>"Minhas Ocorrências"</i> você pode acompanhar e criar novas <b>Ocorrências</b>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
