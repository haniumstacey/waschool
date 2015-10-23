<meta charset="utf-8"> <!-- 책에는 없으나, 한글 깨짐 현상을 해결하기 위해 세 줄의 코드를 추가한다. -->

<?PHP include("./paper_functions.inc"); ?>

<?PHP
$papercode = $_GET['papercode'];	//$papercode 값 넘어옴을 확인했다.
$questionnumber = $_GET['questionnumber'];	//$questionnumber 값 넘어옴을 확인했다.

#----------데이터베이스 연결----------#
$con = mysql_connect("14.63.223.180", "root", "haniumwaschool");
mysql_select_db("waschool", $con);
mysql_query("set names utf8;");

#----------학습지 이름 검색----------#
$query = "select papername from paperassign where papercode=$papercode ";
$papername = mysql_result(mysql_query($query), 0);	//$query 문을 돌려서 실행 결과로 나온 값들의 테이블이 mysql_query 의 결과로 나타났고, 그 0 번째 열을 mysql_result 명령어를 통해 결과값으로 하겠다는 의미.
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
	.table-bordered {
  border: 1px solid #ddd;
}

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
			<table class="table table-bordered">
				<tr><td><h2>학습지명: <?=$papername?></h2></td></tr>
			</table>
<!-- 	<td><a href="<?=dest_url("./paper_make3.php")?>">1</a></td>
	<td><a href="<?=dest_url("./paper_make3.php")?>">2</a></td>
	<td><a href="<?=dest_url("./paper_make3.php")?>">3</a></td>
	<td><a href="<?=dest_url("./paper_make3.php")?>">4</a></td> -->
	<table class="table table-bordered">
	<tr>
	<?php	for ($i=1; $i<=$questionnumber; $i++) { 
		$link_address = "./paper_make3.php?papercode=$papercode&questionnumber=$questionnumber&questionxth=$i";
		echo "<td><a href=".$link_address.">"
			.$i.
			"</a></td>";
			// <a href="./paper_make3.php?questionxth=$i">
	}
	?>
	</tr>
			</table>

			<table>
				<tr>
					<td width="100">&nbsp;</td>
					<td width="100" align="right"><a href="<?=dest_url("./paper_list.php", $page )?>"><input type="submit" value="다음"></a></td>
				</tr>
			</table>
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