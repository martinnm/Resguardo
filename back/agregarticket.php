<?php
session_start();

if (!($_SESSION['autenticado'] == 'SI' && isset($_SESSION['uid'])) )
{
?>
    <form name="formulario" method="post" action="../index.php">
        <input type="hidden" name="msg_error" value="3">
    </form>
    <script type="text/javascript">
        document.formulario.submit();
    </script>
<?php
}
include("../conectar.php");
conectar_bd();

$ticket_user=$_POST['ticket_user'];
$ticket_serialn=$_POST['ticket_serialn'];

$sqlUser = "SELECT COUNT(user_name), user_id FROM USERS
            WHERE user_name='".$ticket_user."'";
$sqlSerial = "SELECT COUNT(device_serialn), device_id FROM DEVICES
            WHERE device_serialn='".$ticket_serialn."'";

$sqlStatus = "SELECT COUNT(tickets.ticket_device) AS counter FROM DEVICES
              JOIN TICKETS
              ON tickets.ticket_device=devices.device_id
              WHERE
              devices.device_serialn='".$ticket_serialn."'
              AND tickets.ticket_exitdate IS NULL";

$verificador1= mysql_query($sqlUser,$conexionBD);
$verificador2= mysql_query($sqlSerial,$conexionBD);

$check1 = mysql_fetch_array($verificador1);
$check2 = mysql_fetch_array($verificador2);

if($check1['COUNT(user_name)']==0 || $check2['COUNT(device_serialn)']==0){
  ?>
  <form name="addticket" method="post" action="/Resguardo/front/agregarticket.php">
  </form>
  <script type="text/javascript">
      alert("No existe el usuario o número de serie. Revise bien los datos.");
  </script>
  <?php
} else{
      $verificador3=mysql_query($sqlStatus);
      $check3=mysql_fetch_array($verificador3);
      $date = date('Y-m-d H:i:s');

      if($check3[counter]==0){
        $sql = "INSERT INTO TICKETS(ticket_id, ticket_date, ticket_user, ticket_device)
              VALUES('NULL', '$date', '".$check1['user_id']."', '".$check2['device_id']."')";
              if(mysql_query($sql,$conexionBD)) {
                ?>
                <form name="addticket" method="post" action="/Resguardo/front/agregarticket.php">
                </form>
                <script type="text/javascript">
                    alert("Ticket creado exitosamente.");
                </script>
              <?php
            } else { ?>
                  <form name="addticket" method="post" action="/Resguardo/front/agregarticket.php">
                  </form>
                  <script type="text/javascript">
                      alert("No es posible crear el ticket, intenta más tarde.");
                  </script>
                  <?php
              }
      } else{?>
        <form name="addticket" method="post" action="/Resguardo/front/agregarticket.php">
        </form>
        <script type="text/javascript">
            alert("El equipo ya se encuentra en resguardo.");
        </script>
      <?php
      }
}

?>

<script type="text/javascript">
    document.addticket.submit();
</script>
