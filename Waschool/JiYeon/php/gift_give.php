<meta charset="utf-8"> <!-- 책에는 없으나, 한글 깨짐 현상을 해결하기 위해 세 줄의 코드를 추가한다. -->

<html lang="ko">
<head>
	<title>WaSchool ::: Gift</title>
	<style>
	</style>
	</head>
	<body>
		<?
		#----------데이터베이스에 연결----------#
		$con = mysql_connect("14.63.223.180", "root", "haniumwaschool");
		mysql_select_db("waschool", $con);
		// $con = mysql_connect("localhost", "root", "apmsetup");
		// mysql_select_db("hanium", $con);
		mysql_query("set names utf8;");

$name1 = $_GET['name1'];
$point1 = $_GET['point1'];	//$name1 값, $point1 값 다 넘어옴을 확인했다.
		?>
			<table>
		<tr>
			<td><h3><?=$name1?></h3></td>
		</tr>
		<tr>
			<td><h3>ⓟ <?=$point1?></h3></td>
		</tr>
		<tr>
			<td>
				<select name="idbar">
							<option>학생 아이디들을 받아오기</option>
							<option>test</option>
						</select>
				<button type="button" class="btn btn-default" onclick='self.close()'>선물하기</button></td>
		</tr>
	</table>
	</body>
	</html> 