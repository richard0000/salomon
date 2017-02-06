$(function () {
    var persona_id = $('#persona_id').val();
    var nombre_persona = $( "#persona_id option:selected" ).text();
    var anio = $('#anio').val();

    $.ajax({
        url:  'api/diezmospormes',
        type: 'GET',
        data: {
            persona_id: persona_id,
        	anio: anio
        },

        success: function (diezmos){
            barras(diezmos, anio, nombre_persona);
        }
    });
});

function barras(diezmos, anio, nombre_persona){
	Highcharts.chart('container', {
	        chart: {
	            type: 'column'
	        },
	        title: {
	            text: anio.concat(' - Diezmos por Mes').concat(' - ').concat(nombre_persona)
	        },
	        xAxis: {
	            type: 'category',
	            labels: {
	                rotation: -45,
	                style: {
	                    fontSize: '13px',
	                    fontFamily: 'Verdana, sans-serif'
	                }
	            }
	        },
	        yAxis: {
	            min: 0,
	            title: {
	                text: 'Importe ($)'
	            }
	        },
	        legend: {
	            enabled: true
	        },
	        tooltip: {
	            pointFormat: '<b>{point.y:.1f} pesos</b>'
	        },
	        series: [{
	            name: 'Meses',
	            data: diezmos,
	            dataLabels: {
	                enabled: true,
	                rotation: -90,
	                color: '#FFFFFF',
	                align: 'right',
	                format: '{point.y:.1f}', // one decimal
	                y: 10, // 10 pixels down from the top
	                style: {
	                    fontSize: '13px',
	                    fontFamily: 'Verdana, sans-serif'
	                }
	            }
	        }]
	});
}