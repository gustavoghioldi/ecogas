<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link href="../css/styles_form.css" 	rel="stylesheet" 	type="text/css">
            <link href="../css/fonts.css" 			rel="stylesheet" 	type="text/css">
            <link href="../css/jquery-ui.css"		rel="stylesheet" 	type="text/css">
            <title>Administrador</title>
        </head>
		<body>
        <form id="content" target="_self" action="verDatos.php">
        <table width="100%" border="0" cellspacing="10" cellpadding="0">
            <tr>
                <td width="14%">
                	<a href="verDatos.php" target="_self"><img src="../images/logo.png" /></a>
            </td>     
                <td width="86%" align="right" valign="middle">
                	<h1>BIENVENIDOS AL SISTEMA</h1>
                </td> 				
            </tr>
        </table>
        <hr />
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
            <tr>
                <td width="110" align="left" valign="middle"><a href="verDatos.php" class="btn btnMenu" target="_self">Editar tabla con todos los datos</a>
                  <ul style="list-style:none;">
                      <li></li>
                      <li>
					  <a href="verTablas.php" class="btn btnMenu"  target="_self">Editar Factura minima por categoria y categorias</a></li>
                      <li><a href="../index.php" class="btn btnMenu"  target="_self">Ir al tarifario</a> </li>
                    </ul>
                    
                </td>
              <td align="center" valign="middle">Usted puede administrar este sitio según las opciones presentadas en el menú lateral izquierdo.</td>
            </tr>              
        </table>
        </form>
		<script src="../js/jquery-2.1.js" type="text/javascript"></script>
        <script src="../js/jquery-ui.js" type="text/javascript"></script>
        <script src="../js/script.js" 	 type="text/javascript"></script>
        <script>
			$(function () {
				$(".cal").datepicker();
			});
		</script>
        <div id="popUp" class="popUp">
          <a class="cerrar" href="javascript:void(0);" onclick="cerrar()">X</a>
          <h2>NOTIFICACIÓN</h2>
          <p></p>
        </div>
</body>
</html>