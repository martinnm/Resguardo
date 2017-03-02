<?php
    include("conectar.php");
    conectar_bd();

    $usr = $_POST['usuario'];
    $pw = $_POST['contrasena'];
    $md5pw = md5($pw);

    $sql = "SELECT user_id FROM USERS
            WHERE user_name = '".$usr."'
            AND user_password = '".$md5pw."'
            AND user_status = 'ADMIN'";

    $sqlNoAdmin = "SELECT user_id FROM USERS
            WHERE user_name = '".$usr."'
            AND user_password = '".$md5pw."'";

    $result=mysql_query($sql,$conexionBD);

    $uid = "";

    if( $fila=mysql_fetch_array($result) )
    {
        $uid = $fila['user_id'];
        session_start();
        $_SESSION['autenticado']= 'SI';
        $_SESSION['uid']= $uid;
?>
        <form name="formulario" method="post" action="front/inicio.php">
            <input type="hidden" name="idUsr" value='<?php echo $uid ?>' />
        </form>
<?php
    }
    else if(mysql_fetch_array(mysql_query($sqlNoAdmin,$conexionBD))){
?>
        <form name="formulario" method="post" action="index.php">
            <input type="hidden" name="msg_error" value="2">
        </form>
<?php
    } else {
?>
<form name="formulario" method="post" action="index.php">
    <input type="hidden" name="msg_error" value="1">
</form>
<?php
    }
?>

<script type="text/javascript">
    document.formulario.submit();
</script>
