<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php

ini_set( "display_errors", 1 );

    $ch = curl_init();
    $url = 'https://dapi.kakao.com/v2/local/geo/coord2address.json';
    $queryParams = '?' . urlencode('x') . '=' .  urlencode(37.5392375); 
    $queryParams .= '&' . urlencode('y') . '=' . urlencode(126.9003409);
    $queryParams .= '&' . urlencode('input_coord') . '=' . 'WGS84'; /**/
    $queryParams .= '&' . urlencode('Authorization') . ':' . 'KakaoAK 8e531e4f25af542c2141c74fd77752b6'; /**/
    
    
    curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $response = curl_exec($ch);
    
    curl_close($ch);
   
    
    $json_data = json_decode($response);
    var_dump( $url . $queryParams);
    
   
  

?>
