@extends('layouts.base-layout')

@section('title','Agenda de Contactos')

<h1>Agenda de contactos de {{ Auth::user()->name }}</h1>

<div>
    <form method="get" action="/contacts/create">
        @csrf
        @method('GET')
        <button type="submit">+ Añadir contacto</button>
    </form>

    <div>
        <a href="/">Volver a la Home</a>
    </div>

    <div>
        <div><!-- Logout -->
            <form method="POST" action="/logout">
                @csrf
                <button type="submit">Cerrar sesión</button>
            </form>
        </div>
    </div>
</div>

<table class="table table-dark">
    <tbody>
    <tr>
        <th>Nombre</th>
        <th>Apellido/s</th>
        <th>Teléfono</th>
        <th>Tipo</th>
        <th>Fecha</th>
        <th>Acciones</th>
    </tr>

    @foreach ($currentUserContacts as $register)
        <tr>
            <td>{{ $register->first_name }}</td>
            <td>{{ $register->last_name }}</td>
            <td>{{ $register->phone }}</td>
            <td>{{ $register->phone_type }}</td>
            <td><?php
                $split = explode(" ", $register->updated_at);
                echo $split[0];
                ?>
            </td>
            <td class="d-flex d-row">
                <a href="/contacts/{{ $register->id }}/edit">✏️</a>
                <form method="post" action="/contacts/{{ $register->id }}">
                    @csrf
                    @method('DELETE')
                    <button class="bg-transparent btn-default" type="submit">🗑️</button>
                </form>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
