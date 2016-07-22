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
                    <td width="86%" align="center" valign="middle">
                        <h1>Modificar campos</h1>
                    </td> 				
                </tr>
          </table>
            <hr />
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Código:</td>
                <td><input class="ValCalc input" readonly="readonly" type="text" id="codigo" /></td>
                <td>Cargo fijo:</td>
                <td><input class="ValCaplet input" type="number" id="cargoFijo" /></td>
                <td>Fact Minima:</td>
                <td><input class="ValCaplet input" type="number" id="factMinima" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Cuadro:</td>
                <td><input class="ValCaplet input" type="text" id="cuadro" /></td>
                <td>Focegas</td>
                <td><input class="ValCaplet input" type="number" id="Focegas" /></td>
                <td>Cargo m3 1000 a 9000</td>
                <td><input class="ValCaplet input" type="number" id="cargo1a9" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Categoria:</td>
                <td>
                    <select name="categoria" id="categoria" class="listaDesplegable">
                      <option value="R1" selected="selected">R1</option>
                      <option value="R2-1">R2-1</option>
                      <option value="R2-2">R2-2</option>
                      <option value="R2-3">R2-3</option>
                      <option value="R3-1">R3-1</option>
                      <option value="R3-2">R3-2</option>
                      <option value="R3-3">R3-3</option>
                      <option value="R3-4">R3-4</option>
                      <option value="P1">P1</option>
                      <option value="P2">P2</option>
                      <option value="P3-1">P3-1</option>
                      <option value="P3-2">P3-2</option>
                    </select>
                </td>
                <td>Cargo m3</td>
                <td><input class="ValCaplet input" type="number" id="cargom3" /></td>
                <td>Cargo m3 &gt; 9000</td>
                <td><input class="ValCaplet input" type="number" id="cargo9" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Zona Tarifaria:</td>
                <td>
                    <select name="z_tarifaria" id="z_tarifaria" class="listaDesplegable">
                      <option value="13" selected="selected">Catamarca</option>
                      <option value="4">Chamical</option>
                      <option value="11">Chepes-Aimogasta-V. Unióm</option>
                      <option value="12">Chilecito</option>
                      <option value="14">Córdoba</option>
                      <option value="15">La Rioja</option>
                      <option value="7">Mendoza Resto</option>
                      <option value="8">San Rafael-Gral. Alvear</option>
                      <option value="2">San Juan</option>
                      <option value="9">San Luis</option>
                      <option value="5">Malargüe</option>
                    </select>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="center" valign="middle"><input title="Presiona el botón Calcular para visualizar los ajustes." type="submit" href="#" value="Cancelar" class="btn"/></td>
                <td align="center" valign="middle"><input title="Presiona el botón Calcular para visualizar los ajustes." type="submit" href="#"  value="Aceptar" class="btn"/></td>
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
			$( "#z_tarifaria" ).change(function() {
				if($( '#z_tarifaria option:selected' ).val() == 7) {
					$( '#popUp' ).hide();
				} else if( $( '#z_tarifaria option:selected' ).val() == 8 ) {
					$( '#popUp' ).hide();
				} else if( $( '#z_tarifaria option:selected' ).val() == 9 ) {
					$( '#popUp' ).hide();
				} else if( $( '#z_tarifaria option:selected' ).val() == 14) {
					$( '#popUp' ).hide();
				} else if( $( '#z_tarifaria option:selected' ).val() == 5) {
					$( '#popUp' ).hide();
				}
			});
		</script>
        <div id="popUp" class="popUp">
          <a class="cerrar" href="javascript:void(0);" onclick="cerrar()">X</a>
          <h2>NOTIFICACIÓN</h2>
          <p></p>
        </div>
</body>
</html>