var delay = 300
var	coma = false
var atrOld
$(function($){
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd-mm-yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
});
$(document).keydown(function(tecla){
    if (tecla.keyCode == 188) { 
		popUp ("No se adminte la coma");
		coma = true
    }
});

$( "input[type=checkbox]" ).click(function() {
    var estado 	= $( this ).prop("checked");
	var atr 	= $( this ).attr("id");
	//$( '#' + atr ).attr( "name", "cdrotarifa" );
	//alert( '#' + atr );
	$( "#" + atrOld ).prop("checked", false);
	atrOld 	= atr;
});


/* Ahorro */
function get_ahorro(m3_pactual, m3_panteri, z_tarifaria, categoria, tarf_social, primer_fact, fechaMarcaba, fechaMarca){
        var parametros = {
                "m3_pactual"  : m3_pactual,
                "m3_panteri"  : m3_panteri,
				"z_tarifaria" : z_tarifaria,
				"categoria"   : categoria,
				"tarf_social" : tarf_social,
				"primer_fact" : primer_fact,
				"fechaMarcaba": fechaMarcaba,
				"fechaMarca"  : fechaMarca
        };
		if( $('#fechaMarcaba').val() == '' || $('#fechaMarca').val()  == '' ) {
			popUp ("'Fecha medición anterior' y 'Fecha medición actual' son obligatorios<br/>");
		}
        $.ajax({
                data:  parametros,
                url:   'ajax_make_ahorro.php',
                type:  'post',
				dataType: 'json',
                success:  function (response) {
						console.log(response);
						
						var obj = jQuery.parseJSON(JSON.stringify(response));
						console.log(obj);
						console.log(obj.ahorro);
						
						if( $('#m3_pactual').val() == '' ) {
							popUp ("El campos 'm3 consumidos periodo actual' son obligatorios<br/>");
						} else if ( $('#m3_panteri').val() == '' ) {
							popUp ("El campos 'm3 consumidos periodo anterior' son obligatorios<br/>");
						} else {
							$("#ahorro").html(obj.ahorro);
							$("#cuadro_actual").html(obj.cuadro_actual);
							$("#cuadro_actual_valor").html(obj.cuadro_actual_valor);
							$("#cuadro_anterior").html(obj.cuadro_anterior);
							$("#cuadro_anterior_valor").html(obj.cuadro_anterior_valor);
							$("#incremento_valor").html(obj.incremento_valor);
							$("#bonificacion_valor").html(obj.bonificacion_valor);
						}
                }
        });
}

function editarCampos() {
	$( '.edit' ).removeClass( "ValCalc" ).addClass( "ValCaplet" );
	$( '.edit' ).attr( 'readonly', false );	
}

function aceptarCampos() {
	$( '.edit' ).removeClass( "ValCaplet" ).addClass( "ValCalc" );
	$( '.edit' ).attr( 'readonly', true );	
}

$( "#z_tarifaria" ).change(function() {
	if($( '#z_tarifaria option:selected' ).val() == 7) {
		popUp ("Importante! Para Mendoza Resto este tope aplica solo para facturas Residenciales emitidas entre el 01/04/16 al 27/05/16, por estar bajo amparo judicial a partir de esa fecha<br/>" );
	} else if( $( '#z_tarifaria option:selected' ).val() == 8 ) {
		popUp ("Importante! Para San Rafael-Gral. Alvear este tope NO aplica a facturas Residenciales, por estar bajo amparo judicial<br/>" );
	} else if( $( '#z_tarifaria option:selected' ).val() == 9 ) {
		popUp ("Importante! Para San Luis este tope NO aplica a facturas Residenciales, SGP-1 y SGP-2, por estar bajo amparo judicial<br/>" );
	} else if( $( '#z_tarifaria option:selected' ).val() == 14) {
		popUp ("Importante! Para Córdoba este tope NO aplica a facturas Residenciales, por estar bajo amparo judicial<br/>" );
	} else if( $( '#z_tarifaria option:selected' ).val() == 5) {
		popUp ("Importante! Para Malargüe este tope NO aplica a facturas Residenciales, por estar bajo amparo judicial<br/>" );
	}
});

function popUp (value) {
	$( '#popUp p' ).append( value );
	$( '#popUp' ).fadeIn( delay );
}
function cerrar () {
	$( '#popUp' ).fadeOut( delay );
	$( '#popUp p' ).empty();
}

$(function() {
	theTable = $("#tabla");
	$("#q").keyup(function() {
	$.uiTableFilter(theTable, this.value);
	});
});