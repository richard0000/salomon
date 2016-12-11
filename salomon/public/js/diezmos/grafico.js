$(function () {
/*
    var anio_desde = $('#anio_desde').val();
    var anio_hasta = $('#anio_hasta').val();
    var mes_desde = $('#mes_desde').val();
    var mes_hasta = $('#mes_hasta').val();
*/
    var persona_id = $('#persona_id').val();

    $.ajax({
        url:  'api/diezmospormes',
        type: 'GET',
        data: {
/*
        	anio_desde: anio_desde,
        	anio_hasta: anio_hasta,
        	mes_desde: mes_desde,
        	mes_hasta: mes_hasta,
*/
        	persona_id: persona_id
        },

        success: function (diezmos){
            barras(diezmos);
        }
    });
});

function barras(diezmos){
	Highcharts.chart('container', {
	        chart: {
	            type: 'column'
	        },
	        title: {
	            text: 'Diezmos por Mes'
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