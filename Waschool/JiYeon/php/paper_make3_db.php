<?ob_start();?>	<!-- 이게 있어야, 출력문을 바로 출력시키지 않고 그 내용을 임시 버퍼에 저장시켰다가, 다음 header, setcookie, session 등을 진행시킨다. -->
<meta charset="utf-8"> <!-- 책에는 없으나, 한글 깨짐 현상을 해결하기 위해 세 줄의 코드를 추가한다. -->

<?PHP
#----------데이터베이스 연결----------#
$con = mysql_connect("14.63.223.180", "root", "haniumwaschool");
mysql_select_db("waschool", $con);
mysql_query("set names utf8;");

#----------papercode 결정----------#
$query = "select papercode from papercontext order by papercode desc";	//가장 최근의 papercontext 값이 보이겠지
$papercode = mysql_result(mysql_query($query), 0);	//$query 문을 돌려서 실행 결과로 나온 값들의 테이블이 mysql_query 의 결과로 나타났고, 그 0 번째 열을 mysql_result 명령어를 통해 결과값으로 하겠다는 의미.
// echo "$papercode";

#----------문항 개수 검색----------#
$query2 = "select questionnumber from papercontext where papercode=$papercode ";
$questionnumber = mysql_result(mysql_query($query2), 0);	//$query 문을 돌려서 실행 결과로 나온 값들의 테이블이 mysql_query 의 결과로 나타났고, 그 0 번째 열을 mysql_result 명령어를 통해 결과값으로 하겠다는 의미.
// echo "$questionnumber";

#----------forwarding 처리 함수----------#
function forward($url)
{
	header("Location:$url");
	//echo( )
}

#----------error 함수----------#
function error($msg) {
	echo "<script>
	alert('$msg');
	history.back();
	</script>";
	exit;
}

#----------문제 내용, 다섯가지 예제, 정답, 문제번호를 가져옴----------#
$questionxth = $_POST['questionxth'];
$questioncontext = $_POST['questioncontext'];
$example1 = $_POST['example1'];
$example2 = $_POST['example2'];
$example3 = $_POST['example3'];
$example4 = $_POST['example4'];
$example5 = $_POST['example5'];
$questionanswer = $_POST['questionanswer'];

#----------앞뒤 스페이스 제거----------#
$questionxth = trim($questionxth);
$questioncontext = trim($questioncontext);
$example1  = trim($example1);
$example2  = trim($example2);
$example3  = trim($example3);
$example4  = trim($example4);
$example5  = trim($example5);
$questionanswer = trim($questionanswer);

#----------입력값 이상유무 확인----------#
if ( !$questioncontext || !$questionanswer )
{
	error("문제 내용과 정답은 비워져선 안됩니다.");
	#----------papercontext 테이블에 삽입----------#
} else {
	$query4 = "insert into papercontext ( questioncontext, example1, example2, example3, example4, example5, questionanswer, questionxth )
	values ( '$questioncontext', '$example1', '$example2', '$example3', '$example4', '$example5', $questionanswer, $questionxth )
	where papercode=$papercode";
	mysql_query( $query4 ) or die ( mysql_error() );
	mysql_close( $con );

	forward("./paper_make2.php?papercode=$papercode&questionnumber=$questionnumber");
}
?>


<html>
<head></head>
<body>
<table border="1">
	<tr>
		<td>무엇이든 보여야해</td>
		<td><?=$questioncontext?></td>
	</tr>
</table>
</body>
</html>