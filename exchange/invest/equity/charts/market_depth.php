<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/themes/dark-unica.js"></script>

<div id="dep"></div>

<style>
#dep {
	min-width: 310px;
	max-width: 1040px;
	height: 400px;
	margin: 0 auto;
}
</style>

<?php
    include '../../../database.php';
    include '../../includes/get_data.inc.php';

    //We select data from database
    $sql = "SELECT * FROM secondary_market_pgeur_ask ORDER BY price ASC";
    $result = $conn->query($sql);
    $sql_bid = "SELECT * FROM secondary_market_pgeur_bid ORDER BY price DESC";
    $result_bid = $conn->query($sql_bid);
    
    $last_price = getLastPrice($conn, 'pgeur');

    //We create the arrays that we'll use for the market depth graph
    //------------ASKS-------------
    $count = 0;
    $last_sum = 0;
    while ($row = mysqli_fetch_array($result))
    {
        if($row['price'] <= $last_price * 1.8){ //Only show asks that are up to +80% from last_price
            $asks[] = array(
            (float)$row['price'], //Price
            (float)($row['amount_RP'] + $last_sum));  //Accumulated amount
            
            $last_sum = (float)($row['amount_RP'] + $last_sum);
            $count++;
        }else{
            break;
        }
    }   

    //------------BIDS-------------
    $count = 0;
    $last_sum = 0;
    while ($row = mysqli_fetch_array($result_bid))
    {
        if($row['price'] >= $last_price * 0.2){ //Only show bids that are up to -80% from last_price
            $bids[] = array(
                (float)$row['price'], //Price
                (float)($row['amount_RP'] + $last_sum));  //Accumulated amount
                
            $last_sum = (float)($row['amount_RP'] + $last_sum);
            $count++;
        }else{
            break;
        }
    } 
?>

<script>
    //We get variables from PHP/database into javascript
    var bids = <?php echo json_encode($bids); ?>;
    var asks = <?php echo json_encode($asks); ?>;
    var last_price = <?php echo json_encode($last_price); ?>;
        
    Highcharts.chart('dep', {
        
        chart: {
            type: 'area',
            zoomType: 'xy',
            backgroundColor: '#00'
        },
        title: {
            text: 'CC-EUR Market Depth'
        },
        xAxis: {
            minPadding: 0,
            maxPadding: 0,
            plotLines: [{
                color: '#888',
                value: last_price,
                width: 1,
                label: {
                    text: 'Actual price',
                    rotation: 90,
                }
            }],
            title: {
                text: 'Price'
            }
        },
        yAxis: [{
            lineWidth: 1,
            gridLineWidth: 1,
            title: null,
            tickWidth: 1,
            tickLength: 5,
            tickPosition: 'inside',
            labels: {
                align: 'left',
                x: 8
            }
        }, {
            opposite: true,
            linkedTo: 0,
            lineWidth: 1,
            gridLineWidth: 0,
            title: null,
            tickWidth: 1,
            tickLength: 5,
            tickPosition: 'inside',
            labels: {
                align: 'right',
                x: -8
            }
        }],
        legend: {
            enabled: false
        },
        plotOptions: {
            area: {
                fillOpacity: 0.2,
                lineWidth: 1,
                step: 'center'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size=10px;">Price: {point.key}</span><br/>',
            valueDecimals: 2
        },
        series: [{
            name: 'Bids',
            data: bids,
            color: '#03a7a8'
        }, {
            name: 'Asks',
            data: asks,
            color: '#fc5857'
        }]
    });

</script>