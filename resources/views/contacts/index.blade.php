@extends('layouts.base-layout')

@section('title','Agenda de Contactos')

@section('content')

<div class="d-flex col-12 bg-light">
    <div class="vh-100 p-4 bg-dark text-warning w-25" style="border-right: solid 10px blue;">
        <div class="h-75">
            <div>
                <a href="{{ route('homepage') }}">
                    <img width="120rem" height="120rem" alt="phonebook-logo" src="{{ asset('img/phonebook-logo-mini.png') }}" />
                </a>
                <h1 class="h5">Agenda de {{ Auth::user()->name }}</h1>
                <form class="mt-4" method="get" action="/contacts/create">
                    @csrf
                    @method('GET')
                    <button class="bg-primary text-white btn-md rounded-2 px-3" type="submit">+ Añadir contacto</button>
                </form>
            </div>


            <div class="d-flex flex-column justify-content-end" style="height: 90%;">
                <div class="mt-4">
                    <a class="text-white text-decoration-none" href="{{ route('homepage') }}">Volver a la Home</a>
                </div>
                <div>
                    <div class="mt-4"><!-- Logout -->
                        <form method="POST" action="/logout">
                            @csrf
                            <button class="bg-info text-white btn-md rounded-2 px-3" type="submit">Cerrar sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex col-8 justify-content-start align-items-start p-5">
        <table class="table table-dark">
            <tbody>
            <tr>
                <th class="bg-primary text-white">Nombre</th>
                <th class="bg-primary text-white">Apellido/s</th>
                <th class="bg-primary text-white">Teléfono</th>
                <th class="bg-primary text-white">Tipo</th>
                <th class="bg-primary text-white">Fecha</th>
                <th class="bg-primary text-white">Acciones</th>
            </tr>
            @foreach ($currentUserContacts as $register)
                <tr>
                    <td>{{ $register->first_name }}</td>
                    <td>{{ $register->last_name }}</td>
                    <td class="text-warning">{{ $register->phone }}</td>
                    <td>{{ $register->phone_type }}</td>
                    <td><?php
                        $split = explode(" ", $register->updated_at);
                        echo $split[0];
                        ?>
                    </td>
                    <td class="d-flex d-row">
                        <form method="get" action="/contacts/{{ $register->id }}">
                            @csrf
                            @method('GET')
                            <li class="list-inline-item">
                                <button class="btn btn-primary btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Detalles"><i class="fa fa-table"></i></button>
                            </li>
                        </form>
                        <form method="get" action="/contacts/{{ $register->id }}/edit">
                            @csrf
                            @method('GET')
                            <li class="list-inline-item">
                                <button class="btn btn-success btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></button>
                            </li>
                        </form>
                        <form method="post" action="/contacts/{{ $register->id }}">
                            @csrf
                            @method('DELETE')
                            <li class="list-inline-item">
                                <button class="btn btn-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash"></i></button>
                            </li>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
