<div class="container my-4">
  <div class="row mx-auto">

    <form class="form col-5 alert alert-success mx-auto" action="./action/login.php" method="POST">
      <div class="form-group">
        <label for="username">Nombre de usuario</label>
        <input type="text" placeholder="Nombre de usuario..." name="username">
      </div>
      <div class="form-group">
        <label for="pass">Contraseña</label>
        <input type="password" placeholder="Contraseña" name="pass">
      </div>
      <button class="btn btn-primary" type="submit" name="submit">Login</button>
    </form>

    <form class="form col-5 alert alert-info mx-auto" action="./action/signin.php" method="POST">
      <div class="form-group">
        <label for="username">Nombre de usuario</label>
        <input type="text" placeholder="Nombre de usuario..." name="username">
      </div>
      <div class="form-group">
        <label for="pass">Contraseña</label>
        <input type="password" placeholder="Contraseña" id="pass1" onkeyup="validarPass()" name="pass">
      </div>
      <div class="form-group">
        <label for="pass">Repetir contraseña</label>
        <input type="password" placeholder="Contraseña" id="pass2" onkeyup="validarPass()">
      </div>
      <button class="btn btn-primary" type="submit" id="signin" disabled name="submit">Sign in</button>
    </form>

  </div>
</div>

<script>
  function validarPass(){
    let pass1 = document.getElementById("pass1").value;
    let pass2 = document.getElementById("pass2").value;
    let signin = document.getElementById("signin");
    console.log(pass1, pass2);
    if(pass1 == pass2)
      signin.disabled = false;
    else
      signin.disabled = true;
  }
</script>