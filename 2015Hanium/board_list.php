<meta charset="utf-8"> <!-- å���� ������, �ѱ� ���� ������ �ذ��ϱ� ���� �� ���� �ڵ带 �߰��Ѵ�. -->

<?PHP
include("./board_config.cfg");
include("./board_functions.inc");	//�� ���α׷����� ���Ǵ� �Լ����� ��Ƴ��� ����
if (!$page)
$page = 1;

#----------�˻� �� ���ǹ��� �߰��� ����----------#
if ($key)
	$where = "where $kind like '%$key%'";

#----------�����ͺ��̽��� ����----------#
$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("hanium", $con);

#----------�� ���� �� �˻�----------#
$query = "select count(*) total_rows from board";
$result = mysql_query($query) or die(mysql_error());
$total_rows = current(mysql_fetch_array($result));

#----------����Ʈ���� ���Ǵ� ���� ����----------#
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
	<title>WaSchool ::: Free board</title>
	<style>
	<!--

	<?PHP include ("./common_style.inc"); ?>

	TD
	{
		padding: 3px;
	}
	.field_tr
	{
		background: #DCDCDC;	/* ����� ���� ù ��° ���� gainsboro */
	}
	.list_tr
	{
		background: #FFFFFF;	/* ��Ͽ� �� ���� �Խñ۵��� ������ ��� */
	}
	-->
	</style>
	</head>
	<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
			<form name="form1">
			<p><img src ="images/noname01.png" width="54" height="54" border="0" >
				<img src="images/waschool.png" width="209" height="108" border="0" alt="waschool.png">
				<input type="submit" name="login" value="�α���">
			</p>
		</form>
		<center>
			<!-- <table>
				<tr>
					<td colspan="5">�ѰԽù�:<?=$total_rows?></td>
				</tr>
			</table> -->
			<table nowrap>
				<tr class="field_tr" align-"center">
					<td width="50">NO.</td>
					<td width="360">����</td>
					<td width="90">�ۼ���</td>
					<td width="60">��¥</td>
					<td width="40">��ȸ��</td>
				</tr>

				<?PHP
				#----------�����ͺ��̽����� ����� ����----------#
				$query = "select uid, gid, depth, name, subject, writedate, refnum from board
				$where order by gid desc, depth asc limit $start_now, $rows_page";
				$result = mysql_query( $query ) or die (mysql_error());
				while ( $row = mysql_fetch_array( $result ))
				{
					list( $uid, $gid, $depth, $name, $subject, $writedate, $refnum, $mail ) = $row;

					#----------HTML Ư�� ���� ó��----------#
					$subject = htmlspecialchars( $subject );

					#----------������ ���� ����----------#
					if (strlen ($subject) > $row_length )
						$subject = substr( $subject, 0,  $row_length )."...";

					?>

					<tr class="list_tr" >
						<td width="50" align="center" ><?=$uid?></td>
						<td width="360"><?=str_repeat("&nbsp;&nbsp;", strlen( $depth))?>
							<a href="board_count_ref.php?page=<?=$page?>&uid=<?=$uid?>"><?=$subject?></a>
						</td>
						<td width="90" align="center">

							<?PHP
							if ($mail)
								echo( "<a href=\"mailto:$mail\">$name</a>" );
							else
								echo("$name");
							?>
						</td>
						<td width="60" align="center"><?=$writedate?></td>
						<td width="40" align="center"><?=$refnum?></td>
					</tr>

					<?PHP
				}
				?>

				</table>
				<table>
					<tr>
						<td width="100" align="left">

							<?PHP
							#----------���������� ����� ��ũ----------#
							if($pre_page)
								echo("<a href=\"".dest_url("./board_list.php", $pre_page)."\">[����]</a>" );

							#----------���������� ����� ��ũ----------#
							if($next_page)
								echo("<a href=\"".dest_url("./board_list.php", $next_page)."\">[����]</a>" );
							?>

						</td>
						<td align="center">&nbsp;

							<?PHP
							#----------���� ���������� ��ũ----------#
							if( $start_page > 1 )
								echo("<a href=\"".dest_url("./board_list.php", $start_page - 1)."\">[pre]</a>");
								#----------�ٷ� �̵��ϴ� �������� ����----------#
								for( $dest_page = $start_page; $dest_page <= $end_page; $dest_page++)
								if ($dest_page != $page)
								echo("<a href=\"".dest_url( "./board_list.php", $dest_page)."\">[$dest_page]</a>");
								else
								echo("&nbsp;$dest_page&nbsp");
								#----------���� ���������� ��ũ----------#
								if($end_page < $total_pages)
								echo("<a href=\"".dest_url( "./board_list.php", $end_page + 1)."\">[next]</a>");
								?>
								</td>
								<td width="100" align="right">
								<a href="<?=dest_url("./board_write.php", $page )?>">�۾���</a>
								<!-- <a href="./board_list.php">���</a> -->
								</td>
								</tr>
				</table>
				<table>
				<form name="search_from" method="post" action="./board_list.php?">
					<tr align="center">
						<td>
							<select name="kind">
								<option value="subject"><? if($kind == "subject") echo("selected");?>������
								</option>
								<option value="article"><? if($kind == "article") echo("selected");?>����
								</option>
								<option value="name"><? if($kind == "name") echo("selected");?>�̸�
								</option>
							</select>
							<input type="text" name="key" value="<?=$key?>" size="20" maxlength="30">
							<input type="submit" value="ã��">
							<!-- ' ���� �� �� ' ��ư ������ �Ǵµ� -->
						</td>
					</tr>
				</form>
			</table>
		</center>
				<form name="form2">
								<p><img src="images/hone.png" width="48" height="46" border="0" alt="hone.png"> <img src="images/messasge.png" width="51" height="46"
				border="0" alt="messasge.png"> <img src="images/mypage.png" width="49" height="50" border="0" alt="mypage.png"> <img src="images/mileage.png"
				width="50" height="50" border="0" alt="mileage.png"> <img
				src="images/gift.png" width="49" height="50" border="0" alt="gift.png">
			</p>
		</form>
	</body>
	</html> -->