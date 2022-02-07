@extends('layouts.base-layout')

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

@section('title','Error 401 | Agenda')

<style>
    * {font-size: 3rem}
    .error-template {padding: 40px 15px;text-align: center;}
    .error-actions {margin-top:15px;margin-bottom:15px;}
    .error-actions .btn { margin-right:10px; }
</style>

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h1>
                        ¡Oops!</h1>
                    <h2>
                        Error 401</h2>
                    <div class="error-details">
                        Lo sentimos, ha ocurrido un error
                    </div>
                    <div class="error-actions">
                        <a href="{{ route('contacts.index') }}" class="btn btn-primary btn-lg">
                            <span class="glyphicon glyphicon-home"></span>
                            Volver a Contactos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
