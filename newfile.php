<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script src="http://code.jquery.com/jquery-1.11.0.js"></script>
<script>
    $(function() {        
        // Geolocation API에 액세스할 수 있는지를 확인
        if (navigator.geolocation) {
            //위치 정보를 정기적으로 얻기
            var id = navigator.geolocation.watchPosition(
                    function(pos) {
                        $('#latitude').html(pos.coords.latitude);     // 위도 
                        $('#longitude').html(pos.coords.longitude); // 경도 
                    });
            
            // 버튼 클릭으로 감시를 중지           
        } else {
            alert("이 브라우저에서는 Geolocation이 지원되지 않습니다.")
        }
      
    });

   
</script>
</head>
<body>
    <ul>
        <li>위도:<span id="latitude"></span></li>
        <li>경도:<span id="longitude"></span></li>
    </ul>    
</body>
</html>