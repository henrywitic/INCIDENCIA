<?php  session_start();
if(!isset($_SESSION['usuarioticket'])){
   header ("Location: index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tickets </title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/custom.css">
</head>

<body>

<p>&nbsp;</p>
<table width="35%" align="center" >
  <thead>
    <tr>
      <th colspan="5" scope="row" align="center">ESTADOS  DE TICKETS</th>
    </tr>
    <tr>
      <th width="12%" scope="row">&nbsp;</th>
      <th width="25%">ESTADO</th>
      <th width="27%">CANTIDAD</th>
      <th width="7%"></th>
      <th width="29%"></th>
      </tr>
    </thead>
	<tbody>	
	<?php
	if($_SESSION["tipousuarioticket"]=='A'){
		$cadena= "";
	} else{
		$cadena= " HAVING tb_ticket.col_codigo=".$_SESSION["codigoticket"];
	}
	require_once ("conexion.php");
	$_pagi_sql = " SELECT COUNT(*) as total, "
       			." tb_estado.est_nombre AS estado ,"
				." tb_ticket.est_codigo as codigo ,"
				." tb_ticket.col_codigo as usuario ," //********/
	   			." tb_estado.est_hex  as color "
				." FROM tb_ticket "
  				." INNER JOIN tb_estado ON tb_ticket.est_codigo = tb_estado.est_codigo "
				." GROUP BY tb_ticket.est_codigo , tb_estado.est_nombre, tb_estado.est_hex, tb_ticket.col_codigo "
				.$cadena;
				$sql=pg_query($conbd,$_pagi_sql);
	while($row = pg_fetch_array($sql)){
	?>
    <tr>
      <th colspan="5" scope="row">      <hr>      </th>
      </tr>
    <tr>
      <th scope="row"><img src="images/ticket.ico" alt="" width="30" height="30"/></th>
      <th><?php echo $row['estado'];?></td>
      <th align="right"><strong><?php echo $row['total'];?></strong></td>
      <th >&nbsp;</td>
      <th bgcolor="<?php echo $row['color'];?>"><p>&nbsp;</p></td>
	</tr>
	<tr>
      <th>&nbsp;</th>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
	</tr>
	<?PHP
		}
	?>
    </tbody>
</table>

</body>
</html>