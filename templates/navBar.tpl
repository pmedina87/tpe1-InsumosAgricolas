
<div>
  <nav class="navbar bg-dark">
    <form class="container-fluid justify-content-start">
      <div class="m-3">
        <a href="Home">
          <button class="btn btn-outline-success me-2" type="button">Home</button>
        </a>
      </div> 
      <div class="m-3">
        <a href="Tipos_Insumos">
          <button class="btn btn-sm btn-outline-warning me-2" type="button">Lista de Tipo de Insumos</button>
        </a>
      </div>
      <div class="m-3"> 
        <a href="Insumos">
          <button class="btn btn-sm btn-outline-warning me-2" type="button">Lista de Insumos</button>
        </a>
      </div>
      {if isset($smarty.session.USER_ID)}
        <div class="m-3"> 
          <a href="Usuarios">
            <button class="btn btn-sm btn-outline-warning me-2" type="button">Usuarios</button>
          </a>
        </div>
        <div class="m-3">
          <a href="Logout">
            <button class="btn btn-outline-success my-2 my-sm-0" type="button">Logout ({$smarty.session.USER_NAME})</button>
          </a>
        </div>
      {else}
        <div class="m-3">
        <a href="Login">
          <button class="btn btn-outline-success my-2 my-sm-0" type="button">Login</button>
        </a>
        </div>
      {/if}
    </form>
  </nav>
</div>

