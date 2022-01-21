<form method="get" action="/contacts/create">
    @csrf
    @method('GET')
    <button type="submit">+ Añadir nuevo</button>
</form>

<table>
    <tbody>
    <tr>
        <th>Nombre</th>
        <th>Apellido/s</th>
        <th>Teléfono</th>
        <th>Tipo</th>
        <th>Fecha</th>
        <th>Editar</th>
        <th>Borrar</th>
    </tr>

    <?php
    foreach ($currentUserContacts as $register){
    ?>
    <tr>
        <td>{{ $register->first_name }}</td>
        <td>{{ $register->last_name }}</td>
        <td>{{ $register->phone }}</td>
        <td>{{ $register->phone_type }}</td>
        <td><?php
            $split = explode(" ", $register->updated_at);
            echo $split[0];
            ?></td>
        <td><a href="/contacts/{{ $register->id }}/edit">✏️</a></td>
        <td>
            <form method="post" action="/contacts/{{ $register->id }}">
                @csrf
                @method('DELETE')
                <button type="submit">🗑️</button>
            </form>
        </td>

    </tr>
    <?php } ?>
    </tbody>
</table>
