<meta charset="utf-8"> <!-- 책에는 없으나, 한글 깨짐 현상을 해결하기 위해 세 줄의 코드를 추가한다. -->

<?PHP include("./paper_functions.inc"); ?>

<?PHP
$papercode = $_GET['papercode'];	//$papercode 값 넘어옴을 확인했다.
$questionnumber = $_GET['questionnumber'];	//$questionnumber 값 넘어옴을 확인했다.
$questionxth = $_GET['questionxth'];	//$questionxth 값 넘어옴을 확인했다.

#----------데이터베이스 연결----------#
$con = mysql_connect("14.63.223.180", "root", "haniumwaschool");
mysql_select_db("waschool", $con);
mysql_query("set names utf8;");

$query = "insert into papercontext ( papercode, questionnumber, questionxth )
	values ( $papercode, $questionnumber, $questionxth )";	//papercode, questionnumber, questionxth 이 세 가지 변수가 form 에서 무슨 짓을 해도 paper_make3_db.php 로 안 넘어가기에 미리 테이블 papercontext 에 저장해준다.
	mysql_query( $query ) or die ( mysql_error() );
	mysql_close( $con );
?>

<html>
<head>
	<style>
	<!--

	<?PHP include( "./paper_common_style.inc" ); ?>

	.ques_head
	{
		/*background-color: #F9E79D;*/
		text-align: center;
	}
	-->
	</style>
</head>
<body>
<!-- 	<form name="write_form" method="post" action="paper_make1_db.php"> -->
		<center>
			<form name="form1">
			<p><img src ="images/noname01.png" width="54" height="54" border="0" >
				<img src="images/waschool.png" width="209" height="108" border="0" alt="waschool.png">
				<input type="submit" name="login" value="로그인">
			</p>
		</form>
		<form name="question_make" action="paper_make3_db.php">
			<table >
				<tr>
					<td><h1><input type="text" name="questionxth" value="<?=$questionxth?>" size="5" maxsize="5"> 번 문제</h1></td>
				</tr>
				<tr>
					<td><textarea name="questioncontext" class="form-control" rows="15" placeholder="문제를 입력하세요"></textarea></td>
				</tr>
				<tr>
					<td><input name="questionanswer" value="1" type="checkbox">①<input type="text" name="example1" size="50" maxsize="255"></td>
				</tr>
				<tr>
					<td><input name="questionanswer" value="2" type="checkbox">②<input type="text" name="example2" size="50" maxsize="255"></td>
				</tr>
				<tr>
					<td><input name="questionanswer" value="3" type="checkbox">③<input type="text" name="example3" size="50" maxsize="255"></td>
				</tr>
				<tr>
					<td><input name="questionanswer" value="4" type="checkbox">④<input type="text" name="example4" size="50" maxsize="255"></td>
				</tr>
				<tr>
					<td><input name="questionanswer" value="5" type="checkbox">⑤<input type="text" name="example5" size="50" maxsize="255"></td>
				</tr>
				<tr align="right">
					<td>
					<input type="submit" value="확인">
				</td>
				</tr>
			</table>
			</form>
<!-- 	</form>	 -->
		<form name="form2">
			<p><img src="images/hone.png" width="48" height="46" border="0" alt="hone.png"> <img src="images/messasge.png" width="51" height="46"
				border="0" alt="messasge.png"> <img src="images/mypage.png" width="49" height="50" border="0" alt="mypage.png"> <img src="images/mileage.png"
				width="50" height="50" border="0" alt="mileage.png"> <img
				src="images/gift.png" width="49" height="50" border="0" alt="gift.png">
			</p>
		</form>
</center>
</body>
</html>