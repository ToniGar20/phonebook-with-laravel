@extends('layouts.base-layout')

@section('title','Editar Contacto | Agenda')

@section('content')
    <div class="d-flex col-12 bg-light">
        <div class="vh-100 p-4 bg-dark text-warning w-25" style="border-right: solid 10px blue;">
            <div class="h-75">
                <div>
                    <a href="/contacts">
                        <img width="120rem" height="120rem" alt="phonebook-logo" src="{{ asset('img/phonebook-logo-mini.png') }}" />
                    </a>
                    <h1 class="h5">Editar contacto de {{ $currentContact->first_name }}</h1>
                </div>

                <div class="d-flex flex-column justify-content-end" style="height: 90%;">
                    <div class="mt-4">
                        <a class="text-white text-decoration-none" href="/contacts">Volver a contactos</a>
                    </div>
                    <div>
                        <div class="mt-4"><!-- Logout -->
                            <form method="POST" action="/logout">
                                @csrf
                                <button class="bg-warning text-white btn-md rounded-2 px-3" type="submit">Cerrar sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex col-8 justify-content-center align-items-start p-5">

        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="d-flex flex-column w-50" method="post" action="/contacts/{{ $currentContact->id }}">
            <!--  Token generation -->
        @csrf
        @method('PUT') <!-- Necesario especificarlo porque hay que modificar un registro. Si no se especifica dará un error porque la ruta edit solamente se sooporta con PUT -->
            <div class="form-group">
                <label> Nombre </label>
                <input class="form-control" type="text" name="first-name" placeholder="Nombre" value="{{ $currentContact->first_name }}" required/>
            </div>
            <div class="form-group">
                <label>Apellido/s</label>
                <input class="form-control" type="text" name="last-name" placeholder="Apellido/s" value="{{ $currentContact->last_name }}" required/>
            </div>
            <div class="form-group">
                <label>Teléfono</label>
                    <input class="form-control" type="text" name="phone" placeholder="Teléfono" value="{{ $currentContact->phone }}" required/>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Tipo</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="phone-type" id="mobile-radio" value="Móvil" {{ $currentContact->phone_type === 'Móvil' ? 'checked' : '' }}/>
                            <label class="form-check-label" for="mobile">
                                Móvil
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="phone-type" id="home" value="Casa" {{ $currentContact->phone_type === 'Casa' ? 'checked' : '' }}/>
                            <label class="form-check-label" for="home">
                                Casa
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="phone-type" id="work" value="Trabajo" {{ $currentContact->phone_type === 'Trabajo' ? 'checked' : '' }}/>
                            <label class="form-check-label" for="work">
                                Trabajo
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <button class="send-but bg-primary mt-4 text-white btn-md rounded-2 px-3" type="submit" name="send-new">Enviar</button>
        </form>
        </div>
    </div>
@endsection
