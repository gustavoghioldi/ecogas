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
                        <a href="https://www.ecogas.com.ar"><img src="../images/logo.png" /></a>
                    </td>     
                    <td width="86%" align="right" valign="middle">
                        <h1>Ingreso al sistema</h1>
                    </td> 				
                </tr>
          </table>
            <hr />
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
              <tr>
                <td width="50%">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="right" valign="middle">usuario:</td>
                <td><input class="ValCaplet input" type="text" id="usuario" /></td>
              </tr>
              <tr>
                <td align="right" valign="middle">Contraseña:</td>
                <td><input class="ValCaplet input" type="text" id="pass" /></td>
              </tr>
              <tr>
                <td colspan="2" align="center" valign="middle"><a href="#">¿olvidaste la contraseña?</a></td>
              </tr>              
              <tr>
                <td colspan="2" align="center" valign="middle"></td>
              </tr>
              <tr>
                <td colspan="2" align="center" valign="middle"><input type="submit" href="#" value="Ingresar al sistema" class="btn"/></td>
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