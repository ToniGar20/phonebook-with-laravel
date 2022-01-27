@extends('layouts.base-layout')

@section('title','Agenda de Contactos')

@section('content')
    <header class="d-flex justify-content-evenly flex-row w-100 mt-4">
        @auth
            <div class="d-flex align-items-center">
                <span class="p-2">¡Bienvenido, {{ Auth::user()->name }}!</span>
                <a class="p-2" href="/contacts">Agenda de contactos</a>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            </div>
        @endauth
        @guest
            <div class="d-flex justify-content-start align-items-center">
                <p class="p-2">¡Bienvenido a Phonebook online!</p>
            </div>
            @endguest
    </header>
    <main class="d-flex flex-column justify-content-center mt-4">
        <div class="d-flex justify-content-center align-items-center">
            <img alt="phonebook-logo" src="{{ asset('img/phonebook-logo.png') }}" />
        </div>
        
        <div class="d-flex justify-content-center mt-4">
        @auth
            <button class="bg-primary text-white btn-md rounded-2 px-3" onclick="window.location.href='/contacts'">Acceso</button>
            &nbsp;
            <button class="bg-primary text-white btn-md rounded-2 px-3" onclick="window.location.href='/contacts'">Registro</button>
        @endauth
        @guest
            <button class="btn-primary btn-md rounded-2 px-3" onclick="window.location.href='/login'">Acceso</button>
            &nbsp;&nbsp;
            <button class="btn-primary btn-md rounded-2 px-3" onclick="window.location.href='/register'">Registro</button>
        @endguest
        </div>


    </main>
@endsection


