<meta charset="utf-8"> <!-- 책에는 없으나, 한글 깨짐 현상을 해결하기 위해 세 줄의 코드를 추가한다. -->

<html>
<head>
	<style>
	<!--

	<?PHP include( "./board_common_style.inc" ); ?>

	.ques_head
	{
		background-color: #F9E79D;
		text-align: center;
	}
	.input_td
	{
		background-color: #FEFCE2;
	}
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
		<table>

			<?PHP
			include( "./board_functions.inc" );

			//원래 이 주석을 포함한 4 개 줄은 없던 코드 세 줄인데, get 형식으로 write.php 에서 작성자, 제목, 내용을 받아오면 그나마 가능할까 싶어서 써본다.
$uid = $_GET['uid'];	//$uid 값 다 넘어옴을 확인했다.

			$con = mysql_connect("14.63.223.180", "root", "haniumwaschool");
mysql_select_db("waschool", $con);
			mysql_query("set names utf8;");

			#----------해당 글의 정보를 검색----------#
			$query = "select gid, depth, name, subject, article from freeboard_test where uid=$uid";
			$result = mysql_query( $query ) or die (mysql_error() );
			list( $gid, $depth, $name, $subject, $article ) = mysql_fetch_array( $result );
			mysql_close( $con );
			?>

			<form name="reply_form" method="post"
			action="./board_reply_db.php?gid=<?=$gid?>&depth=<?=$depth?>">
			<tr>
				<td class="ques_head">글쓴이</td>
				<td class="input_td">
					<input type="text" name="name" size="20" maxsize="20">
				</td>
			</tr>
			<tr>
				<td class="ques_head">제목</td>
				<td class="input_td">
					<input type="text" name="subject" value="<?="[Re]$subject"?>" size="50"
					maxsize="255">
				</td>
			</tr>
			<tr>
				<td class="ques_head">내용</td>
				<td class="input_td">
					<textarea name="article" cols="60" rows="20">
						----- <?=$name?> 님의 글 -----
<?=$article?>
					</textarea>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td width="100" align="left"> <a href="javascript:history.back()">뒤로</a></td>
				<td align="center"><input type="submit" value="입력"></td>
				<td width="100" align="right">
					<a href="<?=dest_url( "./board_list.php", $page )?>">목록</a>
				</td>
			</tr>
		</table>
		</form>
		<form name="form2">
							<p><a href="FirstPage.php"><img src="hone.png" width="48" height="46" border="0" alt="hone.png"></a> <a href="message/haniumMessageForm_1.php"><img src="messasge.png" width="51" height="46"
            border="0" alt="messasge.png"></a> <a href="mypage_base.php"><img src="mypage.png" width="49" height="50" border="0" alt="mypage.png"></a> <a href="haniummileage.php"><img src="mileage.png"
            width="50" height="50" border="0" alt="mileage.png"></a><a href="gift_base.php"> <img
            src="gift.png" width="49" height="50" border="0" alt="gift.png"></a>
         </p>
		</form>
			</center>
</body>
</html>