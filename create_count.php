<!DOCTYPE html>
<html lang="ES">
<head>
    <title>Registrase</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style_create_usuario.css">

</head>
<body>
    <div class="background">
        <div class="shape"><center><img src="imagenes/LOGO_STARSHOP.png" width="190" height="190"  alt="STARTSHOP"></center></div>
        <div class="shape"></div>
    </div>

    <!--Formulario de crear cuenta-->

<section>
    <form action="./php/crear_cuenta.php" method="post"  enctype="multipart/form-data">

        <div id="loginContainer" class="form-step form-step-active">
            <div id="loginPicture">
            <!--<img src="imagenes/image1.jpg" alt=""> -->
            </div>
            <div id="loginPictureCover"></div>
           

            <!--Primeras variables con informacion basica del usuario -->

        
        <label for="username">Nombres</label>
        <input type="text" placeholder="Ingresa tus Nombres" name="nombres" minlength="2" maxlength="20" required>

        <label for="username">Apellidos</label>
        <input type="text" placeholder="Ingresa tus Apellidos" name="apellidos" minlength="2" maxlength="20" required >


                 <!--SE LLAMA EL TIPO DE DOCUMENTO DIRECTAMENTE DE DB-->    


        <label for="username">Tipo Documento</label>
        <select name="documento">
			        <option id="opcion" value="0">Seleccione:</option>
			        <?php
			        	include("php/bd.php"); 
						$con=conectar();

			          	$query="SELECT * FROM documento"; 
						$resulta=mysqli_query($con,$query);

			          	while ($row = mysqli_fetch_array($resulta)) {

			            $tipo = $row['tipo_documento'];

			                echo "<option value='$tipo'>$tipo</option>";
			          }
			        ?>
			      </select>

	
                            <!--variables relacionadas con la cuenta-->     


        <label for="Num_documento">Num Documento</label>
        <input type="int" placeholder="Ingresa tu Documento" name="num_documento" minlength="7" maxlength="10" required >
       
        <label for="Fecha_-nacimiento">Fecha Nacimiento</label>
        <input type="date" placeholder="" name="fecha_nacimiento" min="1950-01-01"required>

        <label for="Direccion">Direcci??n</label>
        <input type="text" placeholder="Ingresa tu Direcci??n" name="direccion" required >


        <label for="Telefono">Tel??fono Celular</label>
        <input type="int" placeholder="Ingresa tu Tel??fono" name="telefono"  maxlength="10" required>

        <label for="Email">Email</label>
        <input type="email" name="email"  placeholder="Ingresa tu Email" required >
        

        <label for="Usuario">CREA UN NOMBRE DE USUARIO CON EL CUAL SIEMPRE INICIARAS SESION</label>
        <input type="text" name="name_usuario"  minlength="3" maxlength="15">

        <label for="Contrase??a">CONTRASE??A DEL USUARIO</label>
        <input type="password" name="password_usuario"  minlength="7" maxlength="100" required>
        

        
        <div class="form-group">
			        <label class="col-sm-2 control-label">Sube una imagen para mostrar en tu perfil</label>
			        <div class="col-sm-8">
			        <input type="file" class="form-control" name="imagen_usuario" multiple accept="image/*" >
		</div>


                                                    <!--Botones-->

        <button name="finalizar" type="submit">Crear Cuenta</button>
        <a href="index.php" style= "color: #000; text-decoration: none;"> <button type="button">Regresar</button> </a>

       

       
    </form>
</section>



	


</body>
</html>