@extends('layouts.base-layout')

@section('title','Agenda de Contactos')

@section('content')
    <header class="d-flex justify-content-evenly flex-row w-100 mt-4">
        @auth
            <div class="d-flex align-items-center">
                <span class="p-2">¡Bienvenid@, <b>{{ Auth::user()->name }}</b>!</span>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <form method="POST" action='{{ route('logout') }}'>
                    @csrf
                    <button class="bg-info text-white btn-md rounded-2 px-3" type="submit">Cerrar sesión</button>
                </form>
            </div>
        @endauth
        @guest
            <div class="d-flex justify-content-start align-items-center">
                <p class="p-2">¡Bienvenid@ a Phonebook online!</p>
            </div>
            @endguest
    </header>
    <main class="d-flex flex-column justify-content-center mt-4">
        <div class="d-flex justify-content-center align-items-center">
            <img alt="phonebook-logo" src="{{ asset('img/phonebook-logo.png') }}" />
        </div>

        <div class="d-flex justify-content-center mt-4">
        @auth
            <button class="bg-primary text-white btn-md rounded-2 px-3" onclick="window.location.href='{{ route('contacts.index') }}'">Accede a tu agenda</button>
        @endauth
        @guest
            <button class="btn-primary btn-md rounded-2 px-3" onclick="window.location.href='{{ route('login') }}'">Acceso</button>
            &nbsp;&nbsp;
            <button class="btn-primary btn-md rounded-2 px-3" onclick="window.location.href='{{ route('register') }}'">Registro</button>
        @endguest
        </div>


    </main>
@endsection


