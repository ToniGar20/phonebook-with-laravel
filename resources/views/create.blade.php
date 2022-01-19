<h1>Añadir contacto</h1>

<form class="contact-form" method="post" action="/contacts">
    <!--  Token generation -->
    @csrf
    <label>
        <input type="text" name="first-name" placeholder="Nombre" required/>
    </label>
    <label>
        <input type="text" name="last-name" placeholder="Apellido/s" required/>
    </label>
    <label>
        <input type="text" name="phone" placeholder="Teléfono" required/>
    </label>
    <label>
        <input type="text" name="phone-type" placeholder="Tipo: Casa, Móvil, Trabajo..." required/>
    </label>
    <input class="send-but" type="submit" name="send-new" value="Enviar" required/>
</form>

<a class="home-link" href="/contacts">⬅️Volver</a>
