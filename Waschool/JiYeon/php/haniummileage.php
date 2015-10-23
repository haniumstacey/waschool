<?
if(!isset($_SESSION))//Headers already sent" means that your PHP script already sent the HTTP headers, and as such it can't make modifications to them now.
{

session_start();
/*echo $_SESSION["id"];*/
	if($_SESSION["id"]==""){
		$temp = 1;//id가 설정되지 않은 경우
	}
	else
		$temp = 2;
	
}




if($_SESSION['userkind']==0){
	echo "<script>	alert(\"학생 회원만 이용가능한 페이지입니다.\")
		window.location.href='FirstPage.php';</script>";
}
		include"php/config.php";
		include"php/util.php";
if(!isset($_SESSION["id"])){
	err_msg('You must first login');
	

}

?>

 <html>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <head>
 	<title>Waschool: haniummileage</title>

 	<style>
	.updown{
		background-color: #BECDFF;
	}
	</style>
	<style>
	
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
                background-color:#D2E1FF;
                font-weight:bold;
            }
            th,td{
           /*     border:1px solid gray;
                padding:5px;*/
            }
</style>

 </head>
 <center>
 	<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
			<form name="form3" class="updown">
			<p><a href="#" onClick="window.location.reload();"><img src ="noname01.png"  width="54" height="54" border="0"></a> 
				<img src="waschool.png" width="209" height="108" border="0" alt="waschool.png">
				<!-- <input type=button value="로그인" style="width:50px;height=30px" onclick="location.href='haniumlogin.html'" /> -->
				<?if($temp == 1)//isset: 변수가 설정되었을때 여기서는 변수가 생성되지 않았을 때 if문 안으로 
					{
						?>	
						

					<!-- bootstrap쓰기전에 로그인 안에 들어갔었음style="width:70px;height=30px" -->
				<input type=button class="btn btn-default btn-group-lg" value="로그인" style="width:70px;height=30px"onclick="location.href='haniumlogin.html'" />
			
				<? } else{?>	
				<input type=button class="btn btn-default btn-group-lg" value="로그아웃" style="width:70px;height=30px"onclick="location.href='haniumlogout.php'" />
				<?}?>
				</p>
		</form>
	<form method="POST" action='haniumlogin.php'>
			<label class=heading for=id>마일리지 현황</label>
			<br/>
			<br/>
			<?$mysqli =mysqli_connect("14.63.223.180","root","haniumwaschool","waschool");

//디비에 있는 마일리지를 가져옴
$get_mileage_sql="SELECT id, pointcontext, inoutpoint, totalpoint, nowpoint, DATE_FORMAT(pointmodtime,'%Y %m %e ')AS fmt_pointmod_time from mileage order by pointmodtime asc";
$get_mileage_res = mysqli_query($mysqli,$get_mileage_sql) or die(mysqli_error($mysqli));

if(mysqli_num_rows($get_mileage_res)<1){
	//마일리지가 없을 경우에 출력할 메시지를 채움
	$display_block = "<p><em>No mileage exist</em></p>";
}else{
	//마일리지를 출력함
	$display_block="
	
	<table cellpadding=\"3\" cellspacing=\"1\" border=\"1\">

<tr>
<th>일자</th>
<th>내용</th>
<th>유입/유출 P</th>
<th>잔여 P</th>
</tr>";
while($mileage_info = mysqli_fetch_array($get_mileage_res)){
	$pointmodtime = $mileage_info['fmt_pointmod_time'];//일자
	$pointcontext = $mileage_info['pointcontext'];//내용
	$inoutpoint = $mileage_info['inoutpoint'];//유입/유출P
	$nowpoint = $mileage_info['nowpoint'];//잔여P
    $totalpoint= $mileage_info['totalpoint'];//사용가능 총 마일리지

	//

$display_block.="
</tr>
<td align=center>".$pointmodtime."</td>
<td align=center>".$pointcontext."</td>
<td align=center>".$inoutpoint."</td>
<td align=center>".$nowpoint."</td></tr>";
}

//결과를 해제함
mysqli_free_result($get_mileage_res);

//데이터베이스와 연결을 끊음
mysqli_close($mysqli);

//테이블을 닫는다
$display_block .="</table>";
}?>
		<fieldset>
		<label class=heading for=passwd>사용 가능 총 마일리지:</label>
			<?php echo $totalpoint;?>
		</fieldset>
<br/>
<br/>
				<label class=heading for=id>마일리지 내역</label>
		<br/>
		<br/>
		</form>
		
 	<?php echo $display_block;?>
 	<form name="form2" class ="updown"><p><a href="FirstPage.php"><img src="hone.png" width="48" height="46" border="0" alt="hone.png"></a> <a href="message/haniumMessageForm_1.php"><img src="messasge.png" width="51" height="46"
				border="0" alt="messasge.png"></a> <a href="mypage_base.php"><img src="mypage.png" width="49" height="50" border="0" alt="mypage.png"></a> <a href="haniummileage.php"><img src="mileage.png"
				width="50" height="50" border="0" alt="mileage.png"></a><a href="gift_base.php"> <img
				src="gift.png" width="49" height="50" border="0" alt="gift.png"></a>
			</p>
		</form>
 </body>
</center>
 </html>

