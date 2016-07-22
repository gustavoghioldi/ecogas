<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-75118644-1', 'auto');
  ga('send', 'pageview');

</script>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/styles_form.css" 	rel="stylesheet" 	type="text/css">
        <link href="css/fonts.css" 			rel="stylesheet" 	type="text/css">
        <link href="css/jquery-ui.css"		rel="stylesheet" 	type="text/css">
        <title>Simulador de Consumo</title>
    </head>
	<body>
    	<form method="post" action="consumo2.php" id="content">
            <!--  ------------------------------------------------------------------------------------- header -->        
       	  <table width="100%" border="0" cellspacing="10" cellpadding="0">
          	<tr>
                <td>
                	<a href="https://www.ecogas.com.ar"><img src="images/logo.png" /></a>
				</td>     
				<td>
                	<p class="leyenda_right">Para una correcta visualización utilizar como navegador Google Chrome - <a href="https://www.google.es/chrome/browser/desktop/" target="_blank">Descargar - Google Chrome</a></p>
				</td> 				
              </tr>
			</table>
            <!--  ------------------------------------------------------------------------------------- contenido -->
			
			<HR width=100% align="center">
			
			<h1>Estimado cliente:</h1>
			<p class="leyenda_center">Para poder completar los campos obligatorios requeridos del formulario necesitará datos de su factura, téngala a disposición al completarlo.</p>
			<p class="leyenda_center">Abajo del simulador encontrará  factura modelo, donde podrá ubicar los datos que necesita para realizar la carga.</p>			
			
			<HR width=100% align="center">
			
            <table width="100%" border="0" cellspacing="10" cellpadding="0">
              <tr>
                <td width="24%" align="right" valign="middle">Zona Tarifaria:</td>
                <td width="28%" align="center" valign="middle">
                  <label for="z_tarifaria" ></label>
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
                <td width="21%" align="right" valign="middle">Fecha medición anterior <span class="numeritos">(2)</span></td>
                <td align="left" valign="middle"  ><input readonly="readonly" title="Campo obligatorio" name="fechaMarcaba" id="fechaMarcaba"  class="ValCaplet input cal" /></td>
                <td></td>
              </tr>
              <tr>
                <td align="right" valign="middle">Categoría de Cliente <span class="numeritos">(1)</span></td>
                <td align="center" valign="middle">
                  <label for="categoria" ></label>
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
                <td align="right" valign="middle">Fecha medición actual <span class="numeritos">(3)</span></td>
                <td align="left" valign="middle"  ><input readonly="readonly" title="Campo obligatorio" name="fechaMarca" id="fechaMarca" class="ValCaplet input cal"   /></td>
                <td></td>
              </tr>
              <tr>
                <td align="right" valign="middle">¿Tarifa Social? <span class="numeritos">(4)</span></td>
                <td align="center" valign="middle">
                    <label for="tarf_social" ></label>
                    <select name="tarf_social" id="tarf_social" class="listaDesplegableShort">
						<option value="2" selected="selected">No</option>
						<option value="1">Si</option>
                    </select>
                </td>
                <td class="texto01">(a completar según factura actual)</td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td align="right" valign="middle">¿Primer Factura?</td>
                <td align="center" valign="middle">
                    <label for="select4"></label>
                    <select name="primer_fact" id="primer_fact"  class="listaDesplegableShort">
						<option value="2" selected="selected">No</option>
						<option value="1">Si</option>
                    </select>
                </td>
                <td class="texto01">(a completar según factura actual)</td>
                <td class="texto01">&nbsp;</td>
                <td width="8%"></td>
              </tr>
              <tr>
                <td align="right" valign="middle">m3 consumidos periodo actual <span class="numeritos">(5)</span></td>
                <td align="center" valign="middle" ><label for="m3_pactual"></label>
                <input title="Campo obligatorio, no se permite el uso de la coma." class="ValCaplet input" type="number"  name="m3_pactual" id="m3_pactual" />
                </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td align="right" valign="middle">m3 consumidos mismo periodo año anterior <span class="numeritos">(6)</span></td>
                <td align="center" valign="middle" ><input title="No se permite el uso de la coma." class="ValCaplet input"  type="number" name="m3_panteri" id="m3_panteri" />
                </td>
				<td align="left" valign="middle">
				<input title="Presiona el botón Calcular para visualizar los ajustes." type="button" href="#" onclick="get_ahorro($('#m3_pactual').val(), $('#m3_panteri').val(), $('#z_tarifaria').val(), $('#categoria').val(), $('#tarf_social').val(), $('#primer_fact').val(), $('#fechaMarcaba').val(), $('#fechaMarca').val());return false;" value="Calcular" class="btn"/>                </td>
                <td></td>
              </tr>
              <tr>
                <td align="right" valign="middle">% Ahorro</td>
                
                <td align="center" valign="middle" id="ahorro">N/A</td>
              </tr>
              <tr>
                <td align="right" valign="middle">Cuadro Actual</td>
                <td align="center" valign="middle" class="ValCalc ajusteTD" id="cuadro_actual" ></td>
                <td align="center" valign="middle" class="ValCalc" id="cuadro_actual_valor"></td>
                <td colspan="2" align="left" valign="middle" id="cuadro_actual_valor">Monto de la factura antes de impuestos</td>
              </tr>
              <tr>
                <td align="right" valign="middle">Cuadro Anterior</td>
                <td align="center" valign="middle" class="ValCalc ajusteTD" id="cuadro_anterior" ></td>
                <td align="center" valign="middle"   class="ValCalc" id="cuadro_anterior_valor"></td>
                <td colspan="2" align="left" valign="middle" id="cuadro_anterior_valor">Monto que hubiera correspondido para esta factura antes de impuestos</td>
              </tr>
              <tr>
                <td align="right" valign="middle">% Incremento</td>
                <td align="center" valign="middle"></td>
                <td align="center" valign="middle"   class="ValCalc ajusteTD" id="incremento_valor"></td>
                <td align="center" valign="middle" id="incremento_valor"></td>
                <td></td>
              </tr>
              <tr>
                <td align="right" valign="middle"><strong>Bonificación sin Impuestos</strong></td>
                <td align="center" valign="middle" class="ValCalc ajusteTD" id="bonificacion_valor"></td>
                <td colspan="2">
                </td>
                <td></td>
              </tr>
            </table>
			<HR width=100% align="center">
			<p margin >En función a los datos ingresados y variables incorporadas al cálculo, los resultados de la presente simulación excepcionalmente podrían diferir de lo que resulte del procesamiento de la facturación.</p>
			<HR width=100% align="center">
            <img src="images/factura.jpg" width="800" />
      <br />
            <br />
        </form>
		<script src="js/jquery-2.1.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js" type="text/javascript"></script>
        <script src="js/script.js" 	 type="text/javascript"></script>
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