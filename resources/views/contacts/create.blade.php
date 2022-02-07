@extends('layouts.base-layout')

@section('title','Crear Contacto | Agenda')

@section('content')
    <div class="d-flex col-12 bg-light">
        <div class="vh-100 p-4 bg-dark text-warning w-25" style="border-right: solid 10px blue;">
            <div class="h-75">
                <div>
                    <a href="{{ route('contacts.index') }}">
                        <img width="120rem" height="120rem" alt="phonebook-logo" src="{{ asset('img/phonebook-logo-mini.png') }}" />
                    </a>
                    <h1 class="h5">@lang('Añadir contacto')</h1>
                </div>

                <div class="d-flex flex-column justify-content-end" style="height: 90%;">
                    <div class="mt-4">
                        <a class="text-white text-decoration-none" href="{{ route('contacts.index') }}">@lang('Volver a contactos')</a>
                    </div>
                    <div>
                        <div class="mt-4"><!-- Logout -->
                            <form method="POST" action="/logout">
                                @csrf
                                <button class="bg-info text-white btn-md rounded-2 px-3" type="submit">@lang('Cerrar sesión')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex col-8 justify-content-center align-items-start p-5 w-75">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="d-flex flex-column justify-content-center w-75 align-items-center">
                <div class="d-flex justify-content-center">
                    <form action="/contacts/create/es">
                        <input type="image" class="mr-4" src="{{ asset('img/es-flag.png') }}" style="width:30px; height: 20px; margin-right: 20px;"/>
                    </form>
                    <form action="/contacts/create/en">
                        <input type="image" class="" src="{{ asset('img/uk-flag.png') }}" style="width:30px; height: 20px">
                    </form>
                </div>

            <form class="d-flex flex-column w-50" method="post" action="/contacts">
                <!--  Token generation -->
            @csrf
            @method('POST') <!-- Necesario especificarlo porque hay que modificar un registro. Si no se especifica dará un error porque la ruta create solamente se soporta con POST -->
                <div class="form-group mt-4">
                    <label>@lang('Nombre')</label>
                    <input class="form-control" type="text" name="first-name" placeholder="@lang('Nombre')" value="{{ old('first-name' ?? '') }}" required/>
                </div>
                <div class="form-group mt-4">
                    <label>@lang('Apellido/s')</label>
                    <input class="form-control" type="text" name="last-name" placeholder="@lang('Apellido/s')" value="{{ old('last-name' ?? '') }}" required/>
                </div>
                <div class="form-group mt-4">
                    <label>@lang('Teléfono')</label>
                    <input class="form-control" type="text" name="phone" placeholder="@lang('Teléfono')" value="{{ old('phone' ?? '') }}" required/>
                </div>
                <fieldset class="form-group mt-4">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Tipo</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="phone-type" id="mobile-radio" value="Móvil" {{ (old('phone-type') === 'Móvil') ? 'checked' : '' }}>
                                <label class="form-check-label" for="mobile">
                                    @lang('Móvil')
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="phone-type" id="home" value="Casa" {{ (old('phone-type') === 'Casa') ? 'checked' : '' }}>
                                <label class="form-check-label" for="home">
                                    @lang('Casa')
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="phone-type" id="work" value="Trabajo" {{ (old('phone-type') === 'Trabajo') ? 'checked' : '' }}>
                                <label class="form-check-label" for="work">
                                    @lang('Trabajo')
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group mt-4">
                    <label for="description">@lang('Descripción (opcional)')</label>
                    <textarea class="form-control" name="description" rows="3">{{ old('description' ?? '') }}</textarea>
                </div>
                <div class="form-check mt-4">
                    <input type="checkbox" class="form-check-input" name="favourite" value="true" {{ (old('favourite')) ? 'checked' : '' }}>
                    <label class="form-check-label" for="favourite">@lang('Marcar favorito')</label>
                </div>
                <button class="send-but bg-primary mt-4 text-white btn-md rounded-2 px-3" type="submit">@lang('Enviar')</button>
            </form>
        </div>
        </div>
    </div>
@endsection
