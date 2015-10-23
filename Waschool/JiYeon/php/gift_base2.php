<meta charset="utf-8"> <!-- 책에는 없으나, 한글 깨짐 현상을 해결하기 위해 세 줄의 코드를 추가한다. -->

<html lang="ko">
<head>
	<title>WaSchool ::: Gift</title>
	<style>
	.menubar{
border:none;
border:0px;
margin:0px;
padding:0px;
font: 67.5% "Lucida Sans Unicode", "Bitstream Vera Sans", "Trebuchet Unicode MS", "Lucida Grande", Verdana, Helvetica, sans-serif;
font-size:14px;
font-weight:bold;
}

.menubar ul{
background: rgb(109,109,109);
height:50px;
list-style:none;
margin:0;
padding:0;
}

.menubar li{
float:left;
padding:0px;
}

.menubar li a{
background: rgb(109,109,109);
color:#cccccc;
display:block;
font-weight:normal;
line-height:50px;
margin:0px;
padding:0px 25px;
text-align:center;
text-decoration:none;
}

.menubar li a:hover, .menubar ul li:hover a{
background: rgb(71,71,71);
color:#FFFFFF;
text-decoration:none;
}

.menubar li ul{
background: rgb(109,109,109);
display:none; /* 평상시에는 드랍메뉴가 안보이게 하기 */
height:auto;
padding:0px;
margin:0px;
border:0px;
position:absolute;
width:200px;
z-index:200;
}

/*.menubar li:hover ul{
display:block; /* 마우스 커서 올리면 드랍메뉴 보이게 하기 */
}
*/
.menubar li li {
background: rgb(109,109,109);
display:block;
float:none;
margin:0px;
padding:0px;
width:200px;
}

.menubar li:hover li a{
background:none;
}

.menubar li ul a{
display:block;
height:50px;
font-size:12px;
font-style:normal;
margin:0px;
padding:0px 10px 0px 15px;
text-align:left;
}

.menubar li ul a:hover, .menubar li ul li:hover a{
background: rgb(71,71,71);
border:0px;
color:#ffffff;
text-decoration:none;
}

.menubar p{
clear:left;
}
	</style>
	</head>
	<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">

		<?
		#----------데이터베이스에 연결----------#
		$con = mysql_connect("14.63.223.180", "root", "haniumwaschool");
		mysql_select_db("waschool", $con);
		// $con = mysql_connect("localhost", "root", "apmsetup");
		// mysql_select_db("hanium", $con);
		mysql_query("set names utf8;");

		$query = "select giftname from gift where giftname='chicken' ";
		$name1 = mysql_result(mysql_query($query), 0);	//$query 문을 돌려서 실행 결과로 나온 값들의 테이블이 mysql_query 의 결과로 나타났고, 그 0 번째 열을 mysql_result 명령어를 통해 결과값으로 하겠다는 의미.

		$query2 = "select giftpoint from gift where giftname='chicken' ";
		$point1 = mysql_result(mysql_query($query2), 0);	//$query 문을 돌려서 실행 결과로 나온 값들의 테이블이 mysql_query 의 결과로 나타났고, 그 0 번째 열을 mysql_result 명령어를 통해 결과값으로 하겠다는 의미.

		?>

		<center>
					<form name="form1">
			<p><img src ="../images/noname01.png" width="54" height="54" border="0" >
				<img src="../images/waschool.png" width="209" height="108" border="0" alt="waschool.png">
				<input type="submit" name="login" value="로그인">
			</p>
		</form>
				<div class="tab_menu">
					<ul>
						<li><a href="./gift_base.php">1~100</a></li>
						<li><a href="./gift_base2.php">100~1000</a></li>
					</ul>
<!--   <div class="onetohundred"><a href="#">1 ~ 100</a></div>
  <div class="hundredtothousand"><a href="#">100 ~ 1000</a></div> -->
</div>
	</center>
	<center>
		<table border="1">
			<tr>
				<td><h3 onClick="window.open('./gift_give.php?name1=<?=$name1?>&point1=<?=$point1?>', 'width=600, height=600, top=100, left=100')"><img src="../images/waschool.png" width="209" height="108" border="0" alt="waschool.png"></h3></td>
				<td><h4 onClick="window.open('./gift_give.php?name1=<?=$name1?>&point1=<?=$point1?>', 'width=600, height=600, top=100, left=100')"><?=$name1?> <p> ⓟ<?=$point1?></h4></td>

			</tr><tr>

								<td><h3 onClick="window.open('./gift_give.php', 'width=600, height=600, top=100, left=100')"><img src="../images/waschool.png" width="209" height="108" border="0" alt="waschool.png"></h3></td>
				<td><h4 onClick="window.open('./gift_give.php', 'width=600, height=600, top=100, left=100')">선물 이름 <p> ⓟ포인트</h4></td>
			</tr><tr>

								<td><h3 onClick="window.open('./gift_give.php', 'width=600, height=600, top=100, left=100')"><img src="../images/waschool.png" width="209" height="108" border="0" alt="waschool.png"></h3></td>
				<td><h4 onClick="window.open('./gift_give.php', 'width=600, height=600, top=100, left=100')">선물 이름 <p> ⓟ포인트</h4></td>
			</tr>
		</table>
	</center>
	<center>
				<form name="form2">
				<p><img src="images/hone.png" width="48" height="46" border="0" alt="hone.png"> <img src="images/messasge.png" width="51" height="46"
				border="0" alt="messasge.png"> <img src="images/mypage.png" width="49" height="50" border="0" alt="mypage.png"> <img src="images/mileage.png"
				width="50" height="50" border="0" alt="mileage.png"> <img
				src="images/gift.png" width="49" height="50" border="0" alt="gift.png">
			</p>
		</form>
			</table>
		</center>
	</body>
	</html> 