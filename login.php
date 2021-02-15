<div class="container my-4">
  <div class="row mx-auto">
    <form
      class="form col-5 alert alert-success mx-auto"
      action="./action/login.php"
      method="POST"
    >
      <div class="form-group">
        <label for="username">Nombre de usuario</label>
        <input
          type="text"
          class="form-control"
          placeholder="Nombre de usuario..."
          name="username"
          id="username"
          onkeyup="validarLogin()"
        />
      </div>
      <div class="form-group">
        <label for="pass">Contraseña</label>
        <input
          type="password"
          class="form-control"
          placeholder="Contraseña"
          name="pass"
          id="pass"
          onkeyup="validarLogin()"
        />
      </div>
      <button
        class="btn btn-primary col-10 offset-1"
        type="submit"
        name="submit"
        id="login"
        disabled
      >
        Login
      </button>
    </form>

    <form
      class="form col-5 alert alert-info mx-auto"
      action="./action/signin.php"
      method="POST"
    >
      <div class="form-group">
        <label for="username">Nombre de usuario <small>/* mayor a 7 caracteres */</small></label>
        <input
          type="text"
          class="form-control"
          placeholder="Nombre de usuario..."
          id="nameSign"
          onkeyup="validar()"
          name="username"
        />
      </div>
      <div class="form-group">
        <label for="pass">Contraseña <small>/* mayor a 7 caracteres */</small></label>
        <input
          type="password"
          class="form-control"
          placeholder="Contraseña"
          id="pass1"
          onkeyup="validar()"
          name="pass"
        />
      </div>
      <div class="form-group">
        <label for="pass">Repetir contraseña</label>
        <input
          type="password"
          class="form-control"
          placeholder="Contraseña"
          id="pass2"
          onkeyup="validar()"
        />
      </div>
      <button
        class="btn btn-primary col-10 offset-1"
        type="submit"
        id="signin"
        disabled
        name="submit"
      >
        Sign in
      </button>
    </form>
  </div>
</div>

<script src="./assets/js/login.js"></script>
