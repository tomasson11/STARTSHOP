<!DOCTYPE html>
<html>
<!-- JULIAN ESTUVO AQUI -->

<head>
  <meta charset="utf-8">
  <meta name="description" content="Login">

  <title>Login</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style/style_start_usuario.css">


</head>

<body>
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>

  <!--Formulario de Login-->
  <form action="/STARTSHOP/php/iniciar.php" method="post">


    <center> <img src="imagenes/LOGO_STARSHOP.png" width="190" height="190" alt="STARTSHOP"></center>

    <label for="username">USUARIO</label>
    <input type="text" placeholder="Ingresa tu Usuario" name="usuario_login" required>

    <label for="password">CONTRASE&Ntilde;A</label>
    <input type="password" placeholder="Ingresa tu Contrase&ntilde;a" name="password_login" required>

 

  

    <button name="start" type="submit">Iniciar Sesión</button>
    <a href="create_count.php" style="color: #000; text-decoration: none;"> <button name="crear" type="button">Crea tu cuenta</button> </a>

   <center> <h6>¿Problemas para inciar? <a href="https://wa.me/573136861897?text=HOLA...%20VENGO%20A%20PRESTAR%20UN%20SERVICIO%20DE%20RESTAURANTE" target="_blank">click</a></h6>
   </center>
  </form>

  

</body>

</html>