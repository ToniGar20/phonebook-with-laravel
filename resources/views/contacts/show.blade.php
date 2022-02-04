@extends('layouts.base-layout')

@section('title','Ver Contacto | Agenda')

@section('content')
    <div class="d-flex col-12 bg-light">
        <div class="vh-100 p-4 bg-dark text-warning w-25" style="border-right: solid 10px blue;">
            <div class="h-75">
                <div>
                    <a href="{{ route('contacts.index') }}">
                        <img width="120rem" height="120rem" alt="phonebook-logo"
                             src="{{ asset('img/phonebook-logo-mini.png') }}"/>
                    </a>
                    <h1 class="h5">@lang('Ver contacto de') {{ $currentContact->first_name }}</h1>
                </div>

                <div class="d-flex flex-column justify-content-end" style="height: 90%">
                    <div class="mt-4">
                        <a class="text-white text-decoration-none" href="{{ route('contacts.index') }}">@lang('Volver a contactos')</a>
                    </div>
                    <div>
                        <div class="mt-4"><!-- Logout -->
                            <form method="POST" action="/logout">
                                @csrf
                                <button class="bg-info text-white btn-md rounded-2 px-3"
                                        type="submit">@lang('Cerrar sesión')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex col-8 justify-content-center align-items-center p-5 w-75">

            @if($errors->any())
                <div>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="d-flex flex-column justify-content-center w-75 align-items-center">
                <div class="d-flex justify-content-center">
                    <form action="http://laravel-phonebook.com/contacts/{{ $currentContact->id }}/es">
                        <input type="image" class="mr-4" src="{{ asset('img/es-flag.png') }}" style="width:30px; height: 20px; margin-right: 20px;"/>
                    </form>
                    <form action="http://laravel-phonebook.com/contacts/{{ $currentContact->id }}/en">
                        <input type="image" class="" src="{{ asset('img/uk-flag.png') }}" style="width:30px; height: 20px">
                    </form>
                </div>

                <form class="d-flex flex-column w-75" method="post" action="/contacts/{{ $currentContact->id }}">
                    <!--  Token generation -->
                    <div class="form-group mt-4">
                        <label> @lang('Nombre') </label>
                        <input class="form-control" type="text" name="first-name" placeholder="Nombre"
                               value="{{ old('first-name', $currentContact->first_name) }}" disabled/>
                    </div>
                    <div class="form-group mt-4">
                        <label>@lang('Apellido/s')</label>
                        <input class="form-control" type="text" name="last-name" placeholder="Apellido/s"
                               value="{{ $currentContact->last_name }}" disabled/>
                    </div>
                    <div class="form-group mt-4">
                        <label>@lang('Teléfono')</label>
                        <input class="form-control" type="text" name="phone" placeholder="Teléfono"
                               value="{{ $currentContact->phone }}" disabled/>
                    </div>
                    <fieldset class="form-group mt-4">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">@lang('Tipo')</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="phone-type" id="mobile-radio"
                                           value="Móvil" {{ $currentContact->phone_type === 'Móvil' ? 'checked' : '' }} disabled/>
                                    <label class="form-check-label" for="mobile">
                                        @lang('Móvil')
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="phone-type" id="home"
                                           value="Casa" {{ $currentContact->phone_type === 'Casa' ? 'checked' : '' }} disabled/>
                                    <label class="form-check-label" for="home">
                                        @lang('Casa')
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="phone-type" id="work"
                                           value="Trabajo" {{ $currentContact->phone_type === 'Trabajo' ? 'checked' : '' }} disabled/>
                                    <label class="form-check-label" for="work">
                                        @lang('Trabajo')
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group mt-4">
                        <label for="description">@lang('Descripción (opcional)')</label>
                        <textarea class="form-control" name="description"
                                  rows="3" disabled>{{ $currentContact->description }}</textarea>
                    </div>
                    <div class="form-check mt-4">
                        <input type="checkbox" class="form-check-input" name="favourite"
                               value="true" {{ $currentContact->is_favourite === 1 ? 'checked' : '' }} disabled>
                        <label class="form-check-label" for="favourite">@lang('Marcar favorito')</label>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
