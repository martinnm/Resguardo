<?php
     <title>Sistema de Resguardos</title>
     <link rel="stylesheet" type="text/css" href="/Resguardo/css/main.css">
</head>
	<table align=center border=0>
		<tr>
			<td width=150 align=center>
				<a href="inicio.php"><img src="http://www.uidownload.com/files/53/205/226/virtual-cloud-icon.png" ></a>
			</td>
			<td width=600 valign=bottom>
				<h1>Sistema de Resguardos</h1>
			</td>
			<td width=200 valign=center align=center>
			Hola, <b><?php echo $nombreUsuario ?></b>
      <br>
      <a href="/Resguardo/front/cierresesion.php">Cerrar sesión</a>
			</td>
		</tr>
	</table>

	<hr width="95%"  align="center" color="black" noshade size="2">
	<h3>Bienvenido.</h3>
	<p>Por el momento sólo es posible dar de alta a usuarios, equipos y tickets.</p>
	<br>
<table align=center  class="categories">
<tr>
<td class="border" width=320><a href="agregarequipo.php"><img src="/Resguardo/imagenes/equipos.png" >   Alta Equipos</a></td>
<td width=150></td>
<td class="border" width=320><a href="agregarusuario.php"><img src="/Resguardo/imagenes/usuarios.png" >   Alta Usuarios</a></td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td class="border"><a href="agregarticket.php"><img src="/Resguardo/imagenes/tickets.png" >   Alta Tickets</a></td>
<td></td>
</tr>
</table>
<br>
<br>
<br>
<div align=center>2017, Martín Noriega Moreno.</div>