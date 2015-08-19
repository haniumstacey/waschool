<?php
//데이터베이스 서버에 연결함
$mysqli =mysqli_connect("localhost","root","apmsetup","waschool");

//디비에 있는 마일리지를 가져옴
$get_mileage_sql="SELECT id, pointcontext, inoutpoint, totalpoint, nowpoint, DATE_FORMAT(pointmodtime,'%b %e %Y at%r')AS fmt_pointmod_time from mileage order by pointmodtime asc";
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
}
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
	<form method="POST" action='haniumlogin.php'>
			<label class=heading for=id>마일리지 현황</label>
			<br/>
			<br/>
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
 	<form name="form2">
								<p><img src="hone.png" width="48" height="46" border="0" alt="hone.png"> <img src="messasge.png" width="51" height="46"
				border="0" alt="messasge.png"> <img src="mypage.png" width="49" height="50" border="0" alt="mypage.png"> <img src="mileage.png"
				width="50" height="50" border="0" alt="mileage.png"> <img
				src="gift.png" width="49" height="50" border="0" alt="gift.png">
			</p>
 </body>
 </html>

