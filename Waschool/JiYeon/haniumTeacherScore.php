<?php
//데이터베이스 서버에 연결함
$mysqli =mysqli_connect("localhost","root","apmsetup","waschool");
mysqli_query($mysqli,"set names utf8;");

//디비에 있는 마일리지를 가져옴
$get_studentscore_sql="SELECT subject, name, score, DATE_FORMAT(papersendtime,'%b %e %Y')AS fmt_papersend_time from studentscore order by papersendtime asc";
$get_studentscore_res = mysqli_query($mysqli,$get_studentscore_sql) or die(mysqli_error($mysqli));

if(mysqli_num_rows($get_studentscore_res)<1){
	//마일리지가 없을 경우에 출력할 메시지를 채움
	$display_block = "<p><em>No submit score exist</em></p>";
}else{
	//마일리지를 출력함
	$display_block="
<table cellpadding=\"3\" cellspacing=\"1\" border=\"1\">
<tr>
<th>제출일자</th>
<th>과목</th>
<th>이름</th>
<th>점수</th>
<th>추이/오답</th>
</tr>";
while($studentscore_info = mysqli_fetch_array($get_studentscore_res)){
	$papersendtime = $studentscore_info['fmt_papersend_time'];//학습지제출한시간
	$subject = $studentscore_info['subject'];//과목
	$name = $studentscore_info['name'];//이름
	$score = $studentscore_info['score'];//점수
 
	//

$display_block.="
</tr>
<td align=center>".$papersendtime."</td>
<td align=center>".$subject."</td>
<td align=center>".$name."</td>
<td align=center>".$score."</td>
</tr>";
/*<td align=center>""</td>";*/
}

//결과를 해제함
mysqli_free_result($get_studentscore_res);

//데이터베이스와 연결을 끊음
mysqli_close($mysqli);

//테이블을 닫는다
$display_block .="</table>";
}
?>

 <html>
 <meta charset="utf-8">
 <head>
 	
 	<title>Waschool: haniummileage</title>
 
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
<link rel = "stylesheet" href = "css/bootstrap.min.css">
 <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->

	<!--<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="js/bootstrap.min.js"></script>
 </head>
 	<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
			<form name="form1">
			<p><img src ="noname01.png" width="54" height="54" border="0" >
				<img src="waschool.png" width="209" height="108" border="0" alt="waschool.png">
				<input type=button value="로그인" style="width:50px;height=30px" onclick="location.href='haniumlogin.html'" />
				</p>
		</form>

  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
 
  <select name="subject" size = "1"  id="subject">
  	    <option>국어</option>
  	    <option>수학</option>
  	    <option>영어</option>
  	    <option>사회</option>
  	    <option>과학</option>
  	    <option>기타</option>

  </select>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
  	<input type=button value="확인" style="width:50px;height=30px" onClick="" />
  	<?php echo $display_block;?>
 	<form name="form2">
								<p><img src="hone.png" width="48" height="46" border="0" alt="hone.png"> <img src="messasge.png" width="51" height="46"
				border="0" alt="messasge.png"> <img src="mypage.png" width="49" height="50" border="0" alt="mypage.png"> <img src="mileage.png"
				width="50" height="50" border="0" alt="mileage.png"> <img
				src="gift.png" width="49" height="50" border="0" alt="gift.png">
			</p>
  


</body>
</html>
