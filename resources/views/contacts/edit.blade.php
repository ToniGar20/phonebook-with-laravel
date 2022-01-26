<h1>Editar contacto</h1>

<form class="contact-form" method="post" action="/contacts/{{ $currentContact->id }}">
    <!--  Token generation -->
@csrf
@method('PUT') <!-- Necesario especificarlo porque hay que modificar un registro. Si no se especifica dará un error porque la ruta edit solamente se sooporta con PUT -->
    <label>
        <input type="text" name="first-name" placeholder="Nombre" value="{{ $currentContact->first_name }}" required/>
    </label>
    <label>
        <input type="text" name="last-name" placeholder="Apellido/s" value="{{ $currentContact->last_name }}" required/>
    </label>
    <label>
        <input type="text" name="phone" placeholder="Teléfono" value="{{ $currentContact->phone }}" required/>
    </label>
    <label>
        <input type="text" name="phone-type" placeholder="Tipo: Casa, Móvil, Trabajo..." value="{{ $currentContact->phone_type }}" required/>
    </label>
    <input class="send-but" type="submit" name="send-new" value="Enviar" required/>
</form>

<a class="home-link" href="/contacts">⬅️Volver</a>
