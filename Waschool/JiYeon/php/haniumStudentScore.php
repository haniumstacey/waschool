<?php
//데이터베이스 서버에 연결함
if(!isset($_SESSION))
{
	session_start();
}
		include"php/config.php";
		include"php/util.php";
if(!isset($_SESSION["id"])){
	err_msg('You must first login');
	

}
$mysqli =mysqli_connect("14.63.223.180","root","haniumwaschool","waschool");
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
<th>과제받은날짜</th>
<th>과목</th>
<th>점수</th>
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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <head>
 	
 	<title>Waschool: haniummileage</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<!-- 遺�媛��쟻�씤 �뀒留� -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
		
		<!-- jQuery (遺��듃�뒪�듃�옪�쓽 �옄諛붿뒪�겕由쏀듃 �뵆�윭洹몄씤�쓣 �쐞�빐 �븘�슂�빀�땲�떎) -->
	    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
	    <script src='js/jquery.min.js'></script>
		<!-- �빀爾먯�怨� 理쒖냼�솕�맂 理쒖떊 �옄諛붿뒪�겕由쏀듃 -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
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
  
 	<form name="form2"><p><a href="FirstPage.php"><img src="hone.png" width="48" height="46" border="0" alt="hone.png"></a> <a href="message/haniumMessageForm_1.php"><img src="messasge.png" width="51" height="46"
				border="0" alt="messasge.png"></a> <a href="mypage_base.php"><img src="mypage.png" width="49" height="50" border="0" alt="mypage.png"></a> <a href="haniummileage.php"><img src="mileage.png"
				width="50" height="50" border="0" alt="mileage.png"></a><a href="gift_base.php"> <img
				src="gift.png" width="49" height="50" border="0" alt="gift.png"></a>
			</p>


</body>
</html>
