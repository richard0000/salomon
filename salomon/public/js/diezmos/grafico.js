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
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Diezmos'
        },
        subtitle: {
            text: 'Grafico'
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
            title: {
                text: 'Diezmos por mes (importe)'
            }
        },
        credits: {
            enabled: false
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Importe: <b>{point.y:.1f} (ganancias))</b>'
        },
        series: [{
            name: 'diezmos',
            data: jQuery.parseJSON(diezmos),
            }],
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
    });
}