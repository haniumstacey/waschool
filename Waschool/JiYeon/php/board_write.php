<meta charset="utf-8"> <!-- 책에는 없으나, 한글 깨짐 현상을 해결하기 위해 세 줄의 코드를 추가한다. -->

<?PHP include("./board_functions.inc"); ?>

<html>
<head>
	<style>
	<!--

	<?PHP include( "./board_common_style.inc" ); ?>

	.ques_head
	{
		/*background-color: #F9E79D;*/
		text-align: center;
	}
/*	.input_td
	{
		background-color: #FEFCE2;
	}*/
	-->
	</style>
</head>
	<title>WaSchool ::: Free board</title>
<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
			<center>
<form name="form1">
			<p><a href="#" onClick="window.location.reload();"><img src ="noname01.png"  width="54" height="54" border="0"></a> 
				<img src="images/waschool.png" width="209" height="108" border="0" alt="waschool.png">
				<input type="submit" name="login" value="로그인">
			</p>
		</form>
	<form name="write_form" method="post" action="board_write_db.php">
			<table>
				<tr>
					<td class="ques_head">글쓴이</td>
					<td class="input_td">
						<input type="text" name="name" size="10" maxsize="10">
					</td>
				<tr>
					<td class="ques_head">제목 :</td>
					<td class="input_td">
						<input type="text" name="subject" size="50" maxsize="255">
					</td>
				</tr>
				<tr>
					<td class="ques_head">내용 :</td>
					<td class="input_td"><textarea name="article" cols="60" rows="20"></textarea>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td width="100">&nbsp;</td>
					<td width="100" align="right"><input type="submit" value="확인"></td>
				</tr>
			</table>
	</form>
		<form name="form2">	<p><a href="FirstPage.php"><img src="hone.png" width="48" height="46" border="0" alt="hone.png"></a> <a href="message/haniumMessageForm_1.php"><img src="messasge.png" width="51" height="46"
            border="0" alt="messasge.png"></a> <a href="mypage_base.php"><img src="mypage.png" width="49" height="50" border="0" alt="mypage.png"></a> <a href="haniummileage.php"><img src="mileage.png"
            width="50" height="50" border="0" alt="mileage.png"></a><a href="gift_base.php"> <img
            src="gift.png" width="49" height="50" border="0" alt="gift.png"></a>
         </p>
		</form>
				</center>
</body>
</html>