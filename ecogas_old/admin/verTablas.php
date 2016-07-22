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
        <form id="content-02">
        <table width="100%" border="0" cellspacing="10" cellpadding="0">
                <tr>
                    <td width="12%" rowspan="2">
                	<a href="verDatos.php" target="_self"><img src="../images/logo.png" /></a>
                    </td>     
                    <td align="center" valign="bottom">
                        <h1>Tablas de parametros</h1>
                    </td> 				
                </tr>
                <tr>
                  <td align="right" valign="middle">&nbsp;</td>
                </tr>
       	  </table>
			<!-- TABLAS DE PARAMETROS PARA CALCULOS (ZONA TARIFARIA, ETC) -->
             <table class="ValCalc" width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
              <tr>
                <td width="300" align="center">ZONA TARIFARIA</td>
                <td align="center">FACTURA MINIMA POR CATEGORIA</td>
                <td width="300" align="center">CATEGORIA</td>
               </tr>
            </table>
           
    		<table class="tablaDatos" border="0" align="center" cellpadding="0" cellspacing="10">
				<tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input value="Catamarca" readonly="true" class="ValCalc edit" /></td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="13" /></td>
                </tr>
				<tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="Chamical" /></td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="4" /></td>
                </tr>
				<tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="Chepes-Aimogasta-V. Unióm" /></td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="11" /></td>
                </tr>
				<tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="Chilecito" /></td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="12" /></td>
                </tr>
				<tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="Córdoba" /></td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="14" /></td>
                </tr>
				<tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="La Rioja" /></td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="15" /></td>
                </tr>
				<tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="Mendoza Resto" /></td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="7" /></td>
                </tr>
				<tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="San Rafael-Gral. Alvear" /></td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="8" /></td>
                </tr>
				<tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="San Juan" /></td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="2" /></td>
                </tr>
				<tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="San Luis" /></td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="9" /></td>
                </tr>
				<tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="Malargüe" /></td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="5" /></td>
                </tr>
            </table>
			<table class="tablaDatos" border="0" align="center" cellpadding="0" cellspacing="10">
            <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="R1" /></td>
               		<td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="14.15" /></td>
             	</tr>
            	<tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="R2-1" /></td>
                	<td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="14.15" /></td>
              	</tr>
            	<tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="R2-2" /></td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="12.37" /></td>
                </tr>
                <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="R2-3" /></td>
                     <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="11.37" /></td>
                    </tr>
             <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="R3-1" /></td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="6.66" /></td>
            </tr>
            <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="R3-2" /></td>
                <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="6.66" /></td>
              </tr>
            <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="R3-3" /></td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="4.78" /></td>
                  </tr>
                <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="R3-4" /></td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="3.68" /></td>
                  </tr>
                <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="P1" /></td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="10.80" /></td>
                  </tr>
                <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="P2" /></td>
                	<td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="10.80" /></td>
              	</tr>
            	<tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="P3-1" /></td>
               		<td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="7.40" /></td>
              </tr>
            	<tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="P3-2" /></td>
                	<td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="7.40" /></td>
              </tr>
            </table>
			<table class="tablaDatos" border="0" align="center" cellpadding="0" cellspacing="10">
            <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="R1" /></td>
            </tr>
            <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="R2-1" /></td>
              </tr>
            <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="R2-2" /></td>
              </tr>
            <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="R2-3" /></td>
              </tr>
            <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="R3-1" /></td>
              </tr>
            <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="R3-2" /></td>
              </tr>
            <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="R3-3" /></td>
              </tr>
            <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="R3-4" /></td>
              </tr>
            <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="P1" /></td>
              </tr>
            <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="P2" /></td>
              </tr>
            <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="P3-1" /></td>
              </tr>
            <tr>
					<td width='15' align='center' valign='middle'>
						<input type='checkbox' id='check'  />
					</td>
                    <td width="50%" align="center"><input readonly="true" class="ValCalc edit" value="P3-2" /></td>
            </tr>
            </table>
	    <hr />
            <table width="100%" border="0" cellspacing="10" cellpadding="0">
          	<tr>
                <td width="2%" align="center" valign="middle"><input 	type="button" onclick="aceptarCampos();" 	href="#"  	value="Agregar" 	class="btn"/></td>
                <td width="2%" align="center" valign="middle"><input 	type="button" onclick="editarCampos();" 	href="#" 	value="Modificar" 	class="btn"/></td>
             <td width="8%" align="center" valign="middle"><input 		type="submit" 								href="#" 	value="Eliminar" 	class="btn"/></td>     
			  <td width="88%" align="center" valign="middle">

			  </td> 				
              </tr>
          	<tr>
          	  <td align="center" valign="middle">
			  <!--<input type="submit" href="#" value="Buscar" class="btn"/> -->
           	  </td>
          	  <td colspan="3" align="left">&nbsp;</td>
          	  </tr>
			</table>
        </form>
		<script src="../js/jquery-2.1.js"				type="text/javascript"></script>
        <script src="../js/jquery-ui.js" 				type="text/javascript"></script>
        <script src="../js/jquery.uitablefilter.js" 	type="text/javascript"></script>
        <script src="../js/script.js" 	 				type="text/javascript"></script>
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