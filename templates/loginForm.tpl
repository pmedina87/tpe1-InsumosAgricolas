{include file="header.tpl"}

{include file="navBar.tpl"}

<div class="login-form">
    <div>
        <h2 class="m-4">{$titulo}</h2>
    </div>
    <div>
        <form action='Ingresar' method='POST'>
            <div class="mb-3">
                <label for="user" class="form-label">Usuario</label>
                <input type="email" class="form-control" id="user" name="user" placeholder="Ingrese su usuario" required aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingreso su password" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
        </form>
    </div>
</div>