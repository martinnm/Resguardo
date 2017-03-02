<!DOCTYPE html>
<html lang=”es”>
<head>
     <metacharset=”iso-8859-1”>
     <metaname=”description”>
     <meta name=”keywords” content=”HTML5, css3, Javascript”>
     <title>Sistema administrador de resguardos</title>
     <link rel="stylesheet" type="text/css" href="css/main.css">
     <link href="css/jquery.alerts.css" rel="stylesheet" type="text/css" />

     <script src="js/jquery171.js" type="text/javascript"></script>
     <script src="js/jquery.validate.js" type="text/javascript"></script>
     <script src="js/jquery.alerts.js" type="text/javascript"></script>

     <script type="text/javascript">

     $(document).ready(function() {
         $("#frmlogin").validate();
         $("#usuario").focus();
     });
 </script>
</head>
<body>
	<table align=center border=0>
		<tr>

			<td width=150 align=center>
				<img src="http://www.uidownload.com/files/53/205/226/virtual-cloud-icon.png" >
			</td>
			<td width=550 valign=bottom>
				<h1>Sistema administrador de resguardos</h1>
			</td>
		</tr>
	</table>

<br><br>
  <form id="login" name="login" method="post" action="validar.php">
    <table align=center border=0 class="border">
      <tr>
        <td colspan="2" align=center>
        <h3> Iniciar sesión </h3>
      </td>
      </tr>
      <tr>
        <td>Usuario:</td>
        <td>
          <input type="text" name="usuario" id="usuario" class="required" maxlength=30>
        </td>
      </tr>
      <tr>
        <td>Contraseña:</td>
        <td>
          <input type="password" name="contrasena" id="contrasena" class="required" maxlength=30>
        </td>
      </tr>
      <tr>
        <td colspan="2" align=center>
          <input type="submit" name="enviar" value="Ingresar">
        </td>
      </tr>
    </table>
  </form>
  <br><br>

  <div align=center>2017, Martín Noriega Moreno</div>

  <?php
          if( isset( $_POST['msg_error'] ) )
          {
              switch( $_POST['msg_error'] )
              {
                  case 1:
              ?>
              <script type="text/javascript">
                  alert("Usuario o contraseña incorrecta.");
              </script>
              <?php
                  break;
                  case 2:
              ?>
              <script type="text/javascript">
                  alert("No cuentas con los permisos para acceder.");
              </script>
              <?php
                  break;
                  case 3:
              ?>
              <script type="text/javascript">
                  alert("Inicia sesión para poder ver el contenido.");
              </script>
              <?php
                  break;
              }
          }
      ?>
</body>
</html>
