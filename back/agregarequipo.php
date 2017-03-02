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

$device_name=$_POST['device_name'];
$device_serialn=$_POST['device_serialn'];
$device_description=$_POST['device_description'];
$device_buydate=$_POST['device_buydate'];

$sqlCount = "SELECT COUNT(device_serialn) FROM DEVICES
            WHERE device_serialn='".$device_serialn."'";

$contador= mysql_query($sqlCount,$conexionBD);
$fila = mysql_fetch_array($contador);

if($fila[0]==0){
      $sql = "INSERT INTO DEVICES(device_id, device_name, device_serialn, device_description, device_buydate)
            VALUES('NULL', '".$device_name."', '".$device_serialn."', '".$device_description."', '".$device_buydate."')";

      if(mysql_query($sql,$conexionBD)) {
        ?>
        <form name="adddevice" method="post" action="/Resguardo/front/agregarequipo.php">
        </form>
        <script type="text/javascript">
            alert("Equipo agregado exitosamente.");
        </script>
      <?php
    } else { ?>
          <form name="adddevice" method="post" action="/Resguardo/front/agregarequipo.php">
          </form>
          <script type="text/javascript">
              alert("No es posible agregar el equipo, intenta más tarde.");
          </script>
          <?php
      }
        }else{
        ?>
        <form name="adddevice" method="post" action="/Resguardo/front/agregarequipo.php">
        </form>
        <script type="text/javascript">
            alert("Fallo en el registro: Número de serie: <?php echo $device_serialn?> ya ha sido capturado. ");
        </script>
        <?php
        }
?>

<script type="text/javascript">
    document.adddevice.submit();
</script>
