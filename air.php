<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php

function air_api_data($param = "강남구") {
    $ch = curl_init();
    $url = 'http://openapi.airkorea.or.kr/openapi/services/rest/ArpltnInforInqireSvc/getMsrstnAcctoRltmMesureDnsty';
    $queryParams = '?' . urlencode('ServiceKey') . '=' . 'CCMMqp7VkWGjXfOHliL2qYsbJbPRHed1GOQ2KEriqN4TIur8Ko8dY3bI2sMWDl9VhZhtzUR%2Fu5VUYdj36MvZGQ%3D%3D'; /*Service Key*/
    $queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('1'); /**/
    $queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
    $queryParams .= '&' . urlencode('stationName') . '=' . urlencode($param); /* %BE%E7%C3%B5%B1%B8 */
    $queryParams .= '&' . urlencode('dataTerm') . '=' . urlencode('DAILY'); /**/
    $queryParams .= '&' . urlencode('ver') . '=' . urlencode('1.3'); /**/
    $queryParams .= '&' . urlencode('_returnType') . '=' . urlencode('json'); /**/
    
    curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $response = curl_exec($ch);
    
    curl_close($ch);
   
    
    $json_data = json_decode($response);
    //var_dump( $json_data);
    
    return $json_data->list;   
  
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=500">
<title>Led House</title>
</head>
<style>
.disp-frame {
/* 	border: 1px solid blue; */
	width:104px;
	height: 30px;
	background-color: #000;
}
.disp-text {
	height: 100%;
	color: red;
	white-space:nowrap;
	font-size: 9px;
}
</style>

</script>
<body>

<div class="disp-frame">
	<div class="swiper-wrapper">
		
	<?php foreach(air_api_data() as $key => $item) : ?>	
		<div class="disp-text swiper-slide">			
				
			<?php echo $item->mangName . ", 미세먼지: " . $item->pm10Value?>
			<br/><?php echo "초미세먼지: " . $item->pm25Value ?>
			
		</div>
	<?php endforeach; ?>
	</div>
</div>

</body>
</html>