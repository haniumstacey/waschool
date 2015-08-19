<?
if(!isset($_SESSION))
{
	session_start();
}

/*if(!isset($_SESSION["id"])){
	err_msg('로그인 정보가 없습니다. 다시 로그인해 주세요.');
}*/
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>Insert title here</title>
</head>
<script type="text/javascript">
</script>
<title>WaSchool ::: Free board</title>
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
	margin-right: 1em;
	text-align: right;
	width: 7em; }
	legend 
	{
		background-color: white;
		border: 1px solid black;
		padding: 0.25em; 
	}
	</style>
	<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">

		<p><img src ="../noname01.png" width="54" height="54" border="0" >
			<img src="../waschool.png" width="209" height="108" border="0" alt="waschool.png">
			<input type=button value="로그인" style="width:50px;height=30px" onclick="location.href='../haniumlogin.html'" />
				
		</p>
		<table style="border-width:1;border-style:solid;"border="0" cellpadding="0" cellspacing="0" width="938">
			<tr>
				<td width="210" height="376" valign="top">
					<td width="728" valign="top">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td height="30" style="padding:10 0 0 14px"><a href="/">홈</a>
									&gt;메시지</td>
								</tr>
							</table>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td height="89" style="padding:16 0 0 25px">
										<table width="90%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td>메시지확인</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<form method='post' name="form1" action="message_del.php">
								<input type="hidden" name="gb">
								<table width="90%" border="0" cellspacing="0" cellpadding="6">
									<tr>
										<td align="right">
											<a href="haniumMessageForm_2.php">받은쪽지함</a>|
											<a href="haniumMessageForm_2.php">보낸쪽지함</a>|
											<a href="haniumMessageForm_3.php">쪽지쓰기</a>
										</td>
									</tr>
								</table>
								<table width="90%" border="0" cellspacing="0" cellpadding="0">
									<tr bgcolor="CCCCCC">
										<td align="center" class="line2">메시지<td>
											<td align="center" class="line2">보낸시간</td>
										</tr>

										<?
											include"../php/config.php";
									include"../php/util.php";
									$connect = mysql_connect("localhost","root","apmsetup","waschool");
						

									
									$query2="select * from messenger where mnum='$mnum'";
									$result2 = mysql_query($query2,$connect);

									mysql_query("set names utf8;");
									$rows2=@mysql_fetch_array($result2);

									//받은편지함&수신 전
									if($gb == '1'&&($rows2[receive_chk]=='N')){
										$query1="update messenger set receive_chk='Y'. receive_reg=now() where mnum='$mnum'";
										$result1 = mysql_query($query1,$connect);
									}
									?>
									<tr>
										<td class="line">
											<?=nl2br(stripslashes($rows2[message]))?>
										</td>
										<td align="center" class="line"><?=$rows2[send_reg]?></td>
									</tr>
								</table>
								<table width="90%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td height="36">
											<a href="message_del.php?mode=view&gb=<?=$g?>"></a>
										</td>
									</tr>
								</table>
								<br>
							</td>
						</tr>
					</table>
				</body>
				</html>
				
