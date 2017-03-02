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

$user_name=$_POST['user_name'];
$user_password=MD5($_POST['user_password']);
$status=$_POST['status'];

$sqlCount = "SELECT COUNT(user_name) FROM USERS
            WHERE user_name='".$user_name."'";

$contador= mysql_query($sqlCount,$conexionBD);
$fila = mysql_fetch_array($contador);

if($fila[0]==0){
      $sql = "INSERT INTO USERS(user_id, user_name, user_password, user_status)
            VALUES('NULL', '".$user_name."', '".$user_password."', '$status' )";

      if(mysql_query($sql,$conexionBD)) {
        ?>
        <form name="adduser" method="post" action="/Resguardo/front/agregarusuario.php">
        </form>
        <script type="text/javascript">
            alert("Usuario agregado exitosamente.");
        </script>
      <?php
    } else { ?>
          <form name="adduser" method="post" action="/Resguardo/front/agregarusuario.php">
          </form>
          <script type="text/javascript">
              alert("No es posible agregar al usuario, intenta más tarde.");
          </script>
          <?php
      }
        }else{
        ?>
        <form name="adduser" method="post" action="/Resguardo/front/agregarusuario.php">
        </form>
        <script type="text/javascript">
            alert("Nombre de usuario ya existente. Elige uno diferente.");
        </script>
        <?php
        }
?>

<script type="text/javascript">
    document.adduser.submit();
</script>
