<?php  session_start();
if(!isset($_SESSION['usuarioticket'])){
   header ("Location: index.html");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<body>
<table width="100%" height="750px" border="1" align="center">
  <tbody>
    <tr>
      <th width="100" valign="top" scope="row">
		  <p><a href="menu.php" target="frmbody">   <img src="images/Home2.ico" alt="" width="30" height="30"/></a></p>
	    <p>&nbsp;</p>
          <p><a href="/incidencias/ingresoticket/index.php" target="frmbody"> <img src="images/ticket.ico" alt="" width="30" height="30"/></a></p>
        <p>&nbsp;</p>
		  <?php
		  if($_SESSION["tipousuarioticket"]=='A'){
		  ?>	  
          <p><a href="/incidencias/usuario/index.php" target="frmbody"><img src="images/Users.ico" alt="" width="30" height="30"/></a></p>
		  <?php
		  }
		  ?>
        <p>&nbsp;</p>
          <p><a href="/incidencias/estadistica/index.php" target="frmbody"><img src="images/estadistica.ico" alt="" width="30" height="30"/></a></p>
          <p>&nbsp;</p>
          <p><a href="/incidencias/reporte/index.php" target="frmbody"><img src="images/reporte.ico" alt="" width="30" height="30"/></a></p></th>
      <td width="100%" colspan="2" rowspan="2" valign="top">
		<style>iframe{width:100%; height:600px}</style>
		<iframe src="menu.php"  align="middle" frameborder="0" id="localscene" onLoad="calcHeight();" name="frmbody">
			<div align="center">Este navegador no soporta iframes </div>
		</iframe>
	  </td>
    </tr>
    <tr>
      <th  scope="row"><a href="cerrar.php"><img src="images/cerrarsesion.ico" alt="" width="30" height="30"/></a></th>
    </tr>
    <tr>
      <th colspan="2" scope="row"><p><em style="color: #21137B">Sistema de Tickes ver 1.0 - 2024</em></p></th>
      <th scope="row">&nbsp;&nbsp;<?php echo $_SESSION["apellidosticket"].",".$_SESSION["nombreticket"] ." - ".$_SESSION["oficinanombreticket"]?></th>
    </tr>
  </tbody>
</table>
</body>
</html>