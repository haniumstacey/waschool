<?php
  // 출처 및 인용 : http://www.php100.com/html/php/lei/2013/0905/4993.html
  // GET 파라미터로 가로 막대 그래프 적용 위한 설정
  if(ctype_print($_GET["h_bar"])) $h_bar = explode(",", $_GET['h_bar']);
  else $h_bar = array(20, 10, 50, 40, 33, 26, 3);
  
  //막대 총 수
  $bar_count = count($h_bar);
  
  // 전체 화면
  $width = 250;
  $height = 200;
  
  // 간격
  $padding = 5;
  
  // 막대 하나 길이
  $bar_one = $width / $bar_count;
  
  // 이미지 생성
  $im = imagecreate($width, $height);
  $bgc1 = imagecolorallocate ($im, 0xcc, 0xcc, 0xcc);
  $bgc2 = imagecolorallocate ($im, 0x7f, 0x7f, 0x7f);
  $tc   = imagecolorallocate ($im, 0xff, 0xff, 0xff);
  
  // 이미지 배경색
  imagefilledrectangle ($im, 0, 0, $width, $height, $tc);
  
  // 최대값
  $max = max($h_bar);
  
  // 각각의 막대 그림
  for($i = 0; $i < $bar_count; $i++){
    $bar_h = ($height / 100) * (($h_bar[$i] / $max) *100 );
    
    $x1 = $i*$bar_one;
    $y1 = $height - $bar_h;
    $x2 = (($i+1)*$bar_one)-$padding;
    $y2 = $height;
    
    imagefilledrectangle ($im, $x1, $y1, $x2, $y2, $bgc1);
    imagefilledrectangle ($im, $x2, $y1, $x2, $y2, $bgc2);
  }
  
  // 이미지 타입 전송
  header("Content-Type: image/png");
  
  // 이미지 출력
  imagepng($im);
  
  // 이미지 자원 제거
  //imagedestroy($img);
  
?>
<html>
 <head>
  <title>Waschool: haniummileage</title>
  <style>
  <style>
  fieldset 
  {
    background-color: #ffffcc;
    margin-left: auto;
    margin-right: auto;
    width: 21em; 
  }
  
  form 
  {
      font-family: "Helvetica", sans-serif; 
  }
  input 
  {
    margin-bottom: 0.5em;
  }
  input[type="submit"] 
  {
    font-weight: bold;
    
  }
  label.heading
  {
    float: left;
    /*margin-right: 1em;
    text-align: right;
    width: 7em;*/ }
  legend 
  {
    background-color: white;
    border: 1px solid black;
    padding: 0.25em; 
  }
    table{
      margin-left: auto;
    margin-right: auto;
              /*  border:1px solid gray;*/
                border-collapse: collapse;
                width: 20em; 
            }
            th{
                background-color: #d0d0d0;
                font-weight:bold;
            }
            th,td{
           /*     border:1px solid gray;
                padding:5px;*/
            }
</style>
 </head>
  <body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
      <form name="form1">
      <p><img src ="noname01.png" width="54" height="54" border="0" >
        <img src="waschool.png" width="209" height="108" border="0" alt="waschool.png">
        <input type=button value="로그인" style="width:50px;height=30px" onclick="location.href='haniumlogin.html'" />
        </p>
    </form>

    <form name="form2">
                <p><img src="hone.png" width="48" height="46" border="0" alt="hone.png"> <img src="messasge.png" width="51" height="46"
        border="0" alt="messasge.png"> <img src="mypage.png" width="49" height="50" border="0" alt="mypage.png"> <img src="mileage.png"
        width="50" height="50" border="0" alt="mileage.png"> <img
        src="gift.png" width="49" height="50" border="0" alt="gift.png">
      </p>
 </body>
 </html>

