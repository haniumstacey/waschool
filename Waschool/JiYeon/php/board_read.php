<meta charset="utf-8"> <!-- 책에는 없으나, 한글 깨짐 현상을 해결하기 위해 세 줄의 코드를 추가한다. -->
<html>
<head>
	<style>
	<!--

	<?PHP include( "./board_common_style.inc" );?>

	.info_table
	{
		background-color: #CFE1FC;
		border: solid 1pt;
	}
	.articel_table
	{
		background-color: #EFF8FE;
		border: solid 1pt;
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
		<?PHP
		include( "./board_config.cfg" );
		include( "./board_functions.inc" );

		//원래 이 주석을 포함한 4 개 줄은 없던 코드 세 줄인데, get 형식으로 write.php 에서 작성자, 제목, 내용을 받아오면 그나마 가능할까 싶어서 써본다.
$uid = $_GET['uid'];	//$uid 값 다 넘어옴을 확인했다.

		$con = mysql_connect("14.63.223.180", "root", "haniumwaschool");
mysql_select_db("waschool", $con);
		mysql_query("set names utf8;");

		#----------데이터베이스에서 글의 정보 검색----------#
		$query = "select gid, name, subject, article, writedate, refnum
		from freeboard_test where uid = $uid";

		$result = mysql_query( $query ) or die ( mysql_error() );

		list( $gid, $name, $subject, $article, $writedate, $refnum )
		 = mysql_fetch_array( $result );

		 mysql_close( $con );

		 #----------html 특수 문자 처리----------#
		 $subject = htmlspecialchars( $subject );

		 if( !$tag_enable )
		 	$article = htmlspecialchars( $article );
		 $article = nl2br( $article );

		 ?>

		 <table class="info_table">
		 	<tr>
		 		<td width="590" colspan="2"><b><?=$subject?></b></td>
		 	</tr>
		 	<tr>
		 		<td width="510">글쓴이:&nbsp;<?=$name?>

		 		</td>
		 		<td width="90">조회:<?=$refnum?></td>
		 	</tr>
		 </table>
		 <table class="articel_table">
		 	<tr>
		 		<td><?=$article?></td>
		 	</tr>
		 </table>
		 <tr align="right">
		 	<td><a href="<?=dest_url( "./board_edit.php", $page, $uid )?>">수정</a>
		 		<a href="<?=dest_url( "./board_reply.php", $page, $uid )?>">답변</a>
		 		<a href="<?=dest_url( "./board_delete.php", $page, $uid )?>">삭제</a>
		 		<a href="<?=dest_url( "./board_list.php", $page, $uid )?>">목록</a></td>
		 	</tr>
		 </table>
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