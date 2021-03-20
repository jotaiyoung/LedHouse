<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php
ini_set( "display_errors", 1 );

    $ch = curl_init();
    
    $url = 'https://dapi.kakao.com/v2/local/search/address.json';
    $url .= '?query=영등포구 양평동 76'.urlencode(iconv('euc-kr', 'utf-8', $addr));
    
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json', 'Authorization: KakaoAK 8e531e4f25af542c2141c74fd77752b6'));
    curl_setopt($ch, CURLOPT_VERBOSE, true);    
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    $result = json_decode($response);
    var_dump($url);
    
   /*  if($result['documents'][0]->road_address->x){
        $latv = $result['documents'][0]->road_address->y;
        $lngv = $result['documents'][0]->road_address->x;
    } else {
        $latv = $result['documents'][0]->address->y;
        $lngv = $result['documents'][0]->address->x;
    } */
    
    curl_close($ch);
    
    
 
  

?>