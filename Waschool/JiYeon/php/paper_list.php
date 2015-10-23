<meta charset="utf-8"> <!-- 책에는 없으나, 한글 깨짐 현상을 해결하기 위해 세 줄의 코드를 추가한다. -->

<?PHP
include("./paper_config.cfg");
include("./paper_functions.inc");	//각 프로그램에서 사용되는 함수들을 모아놓은 파일
if (!$page)
$page = 1;

#----------검색 시 질의문에 추가할 문자----------#
if ($key)
	$where = "where $kind like '%$key%'";

#----------데이터베이스에 연결----------#
$con = mysql_connect("14.63.223.180", "root", "haniumwaschool");
mysql_select_db("waschool", $con);
mysql_query("set names utf8;");

#----------총 글의 수 검색----------#
$query = "select count(*) total_rows from paperassign";
$result = mysql_query($query) or die(mysql_error());
$total_rows = current(mysql_fetch_array($result));

#----------리스트에서 사용되는 변수 정의----------#
$total_pages = ceil($total_rows/$rows_page);
$start_now = $rows_page * ($page - 1);
$pre_page = $page > 1 ? $page - 1 : NULL;
$next_page = $page < $total_pages ? $page + 1  : NULL;
$start_page = (ceil($page/$direct_pages) -1) * $direct_pages + 1;
$end_page = $total_pages >= $start_page + $direct_pages ?
$start_page + $direct_pages - 1  : $total_pages;
?>

<html>
<head>
	<title>WaSchool ::: Paper Work</title>
	<style>
	<!--

	<?PHP include ("./common_style.inc"); ?>

	TD
	{
		padding: 3px;
	}
	.field_tr
	{
		background: #DCDCDC;	/* 목록의 가장 첫 번째 행은 gainsboro */
	}
	.list_tr
	{
		background: #FFFFFF;	/* 목록에 각 줄의 게시글들의 색깔은 흰색 */
	}
	-->

	#top_subject {
		width: 80px; height: 80px;
		background: #D4D4D4;
		border: 1px #979797;
	}
	#button {
		background: #4C4C4C
	}
	</style>
	</head>
	<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
		<center>
					<form name="form1">
			<p><img src ="images/noname01.png" width="54" height="54" border="0" >
				<img src="images/waschool.png" width="209" height="108" border="0" alt="waschool.png">
				<input type="submit" name="login" value="로그인">
			</p>
		</form>
	</center>

<!-- <nav class="navbar navbar-default">
	<ul>
<li role="presentation" class="active"><a href="#">국어</a></li>
  <li role="presentation"><a href="#">수학</a></li>
  <li role="presentation"><a href="#">영어</a></li>
  <li role="presentation"><a href="#">사회</a></li>
  <li role="presentation"><a href="#">과학</a></li>
  <li role="presentation"><a href="#">기타</a></li>
</ul>
</nav> -->

<center>
<table width="400" border="0" >
	<tr>
		<td id="top_subject">국어</td>
		<td id="top_subject">수학</td>
		<td id="top_subject">영어</td>
		<td id="top_subject">사회</td>
		<td id="top_subject">과학</td>
		<td id="top_subject">기타</td>
	</tr>
</table>
<div>
<h3>개설된 학습지 목록
	
<button id="button"><a href="<?=dest_url("./paper_make1.php", $page )?>"> <font color="white">WRITE</font> </a></button>
</h3>
</div>
</center>

			<!-- <table>
				<tr>
					<td colspan="5">총게시물:<?=$total_rows?></td>
				</tr>
			</table> -->
			<center>
			<table nowrap>

				<?PHP
				#----------데이터베이스에서 목록을 추출----------#
				$query = "select id, papername, subject, paperintroduce from paperassign
				$where order by papercode desc";
				$result = mysql_query( $query ) or die (mysql_error());
				while ( $row = mysql_fetch_array( $result ))
				{
					list( $id, $papername, $subject, $paperintroduce ) = $row;

					#----------HTML 특수 문자 처리----------#
					$subject = htmlspecialchars( $subject );

					#----------제목의 길이 제한----------#
					if (strlen ($subject) > $row_length )
						$subject = substr( $subject, 0,  $row_length )."...";

					?>

<table bordercolor="#D4D4D4" border="1"  cellpadding="10" cellspacing="10" width="400">
	<tr>
		<td align="center">
			<a href="#" class="thumbnail">
			<img src="images/waschool.png" alt="images/waschool.png" width="180">
			</a>
			<h4>제목: <?=$papername?></h4>
			<h4>작성자: <?=$id?></h4>
			<h4>학습지 소개: <?=$paperintroduce?></h4>

<button id="button"> <font color="white">풀기</font> </button>
							<button id="button"> <font color="white">수정</font> </button>
							<button id="button"> <font color="white">삭제</font> </button>
		</td>
	</tr>
</table>
					<?PHP
				}
				?>

				</table>
				<table>
					<tr>
						<td width="100" align="left">

							<?PHP
							#----------이전페이지 존재시 링크----------#
							if($pre_page)
								echo("<a href=\"".dest_url("./paper_list.php", $pre_page)."\">[이전]</a>" );

							#----------다음페이지 존재시 링크----------#
							if($next_page)
								echo("<a href=\"".dest_url("./paper_list.php", $next_page)."\">[다음]</a>" );
							?>

						</td>
						<td align="center">&nbsp;

							<?PHP
							#----------이전 페이지들을 링크----------#
							if( $start_page > 1 )
								echo("<a href=\"".dest_url("./paper_list.php", $start_page - 1)."\">[pre]</a>");
								#----------바로 이동하는 페이지를 나열----------#
								for( $dest_page = $start_page; $dest_page <= $end_page; $dest_page++)
								if ($dest_page != $page)
								echo("<a href=\"".dest_url( "./paper_list.php", $dest_page)."\">[$dest_page]</a>");
								else
								echo("&nbsp;$dest_page&nbsp");
								#----------다음 페이지들을 링크----------#
								if($end_page < $total_pages)
								echo("<a href=\"".dest_url( "./paper_list.php", $end_page + 1)."\">[next]</a>");
								?>
								</td>
								<td width="100" align="right">
								<!-- <a href="./paper_list.php">목록</a> -->
								</td>
								</tr>
				</table>
				<table>
				<form name="search_from" method="post" action="./paper_list.php?">
					<tr align="center">
						<td>
							<select name="kind">
								<option value="subject"><? if($kind == "subject") echo("selected");?>글제목
								</option>
								<option value="article"><? if($kind == "article") echo("selected");?>내용
								</option>
								<option value="name"><? if($kind == "name") echo("selected");?>이름
								</option>
							</select>
							<input type="text" name="key" value="<?=$key?>" size="20" maxlength="30">
							<input type="submit" value="찾기">
							<!-- ' 내가 쓴 글 ' 버튼 만들어야 되는데 -->
						</td>
					</tr>
				</form>
			</table>
			<table>
											<form name="form2">
								<p><a href="FirstPage.php"><img src="hone.png" width="48" height="46" border="0" alt="hone.png"></a> <a href="message/haniumMessageForm_1.php"><img src="messasge.png" width="51" height="46"
            border="0" alt="messasge.png"></a> <a href="mypage_base.php"><img src="mypage.png" width="49" height="50" border="0" alt="mypage.png"></a> <a href="haniummileage.php"><img src="mileage.png"
            width="50" height="50" border="0" alt="mileage.png"></a><a href="gift_base.php"> <img
            src="gift.png" width="49" height="50" border="0" alt="gift.png"></a>
         </p>
		</form>
			</table>
		</center>
	</body>
	</html> 