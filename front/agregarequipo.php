<?phpsession_start();if (!($_SESSION['autenticado'] == 'SI' && isset($_SESSION['uid'])) ){?>    <form name="formulario" method="post" action="../index.php">        <input type="hidden" name="msg_error" value="3">    </form>    <script type="text/javascript">        document.formulario.submit();    </script><?php}    include("../conectar.php");    conectar_bd();    $sql = "SELECT  user_name            FROM USERS            WHERE user_id = '".$_SESSION['uid']."'";    $result     =mysql_query($sql);    $nombreUsuario = "";    if( $fila = mysql_fetch_array($result) )        $nombreUsuario = $fila['user_name'];    mysql_close($conexionBD);?><!DOCTYPE html><html lang=”es”><head>     <metacharset=”iso-8859-1”>     <metaname=”description”>     <meta name=”keywords” content=”HTML5, css3, Javascript”>
     <title>Sistema de Resguardos</title>
     <link rel="stylesheet" type="text/css" href="../css/main.css">
     <script src="js/jquery171.js" type="text/javascript"></script>
     <script src="js/jquery.validate.js" type="text/javascript"></script>
</head><body>
	<table align=center border=0>
		<tr>
			<td width=150 align=center>
				<a href="inicio.php"><img src="http://www.uidownload.com/files/53/205/226/virtual-cloud-icon.png"></a>
			</td>

			<td width=600 valign=bottom>
				<h1>Sistema de Resguardos</h1>
			</td>
			<td width=200 valign=center align=center>
        Hola, <b><?php echo $nombreUsuario ?></b>
        <br>
        <a href="cierresesion.php" >Cerrar sesión</a>
			</td>
		</tr>
	</table>

	<hr width="95%"  align="center" color="black" noshade size="2">
  <br>
  <table align=center>
  <tr><td colspan="2">
	<h3>Agregar nuevo equipo</h3>
	En esta sección puedes añadir un equipo.
  </tr></td>
  <form id="adduser" name="adduser" method="post" action="/Resguardo/back/agregarequipo.php">
 <tr>
   <td align=right><b>Nombre del equipo:</b></td>
   <td><INPUT TYPE="Text" name="device_name" id="device_name" maxlenght="30" size="40" required></td>
 </tr>

  <tr>
    <td align=right><b>Número de serie del equipo:</b></td>
    <td><INPUT TYPE="Text" name="device_serialn" id="device_serialn" maxlenght="30" size="40" required></td>
  </tr>

  <tr>
    <td align=right><b>Descripción del equipo:</b></td>
    <td><Textarea name="device_description" id="device_description" maxlenght="100" rows="4" cols="40" required></textarea></td>
  </tr>

  <tr>
    <td align=right><b>Fecha de compra:</b></td>
    <td><INPUT TYPE="date" name="device_buydate" id="device_buydate" max="<?php echo date('Y-m-d');?>" required></td>
  </tr>

  <tr>
    <td align=center colspan="2"><input type="submit" value="Agregar equipo"></td>
  </tr>
 </table>
  </form>

<br>
<br>
<div align=center> 2017, Martín Noriega Moreno.</div></body></html>