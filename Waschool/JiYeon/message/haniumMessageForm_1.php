<?
if(!isset($_SESSION))
{
	session_start();
}


									
/*if(!isset($_SESSION["id"])){
	err_msg('로그인 정보가 없습니다. 다시 로그인해 주세요.');
}*/
/*function shortenStr($str, $maxlen){
	if(strlen($str)<=$maxlen)
		return $str;

	$effective_max = $maxlen-3;
	$remained_바이트 = $effective_max;
	$retStr="";

	$hanStart = 0;

	for($i = 0;$i<$effective_max;$i++){
		$char = substr($str,$i,1);

		if(ord($char)<=127){
			$retStr.=$char;
			$remained_바이트--;
			continue;
		}
		if(!$hanStart&& $remained_바이트>1){
			$hanStart = true;
			$retStr.=$char;
			$remained_바이트--;
			continue;
		}
		if($hanStart){
			$hanStart=false;
			$retStr.=$char;
			$remained_바이트--;
		}
	}
     return $retStr.="...";

}
function page_avg($totalpage,$cpage,$url)
{
	if(!$pagenumber){
		$pagenumber = 10;//한 페이지에서 보여줄 페이지 번호를 10개로 고정함
	}

	$startpage = intval(($cpage-1)/$pagenumber)*$pagenumber+1;
	$endpage = intVal(((($startpage)+$pagenumber)/$pagenumber)*$pagenumber);//시작 페이지의 페이지 번호와 끝 페이지의 페이지 번호를 구함

	if($totalpage<=$endpage)
		$endpage = $totalpage;

	if($cpage>$pagenumber){
		$curpage = intval($startpage-1);
		$url_page="<a href = '$url"."&page = $curpage'>";
		echo("$url_page");
		echo("</a> ..");///////////////////////////////////////////////////////
		}
		else{
			echo("</a> ");///////////////////////////
		}

		$curpage = $startpage;

		while($curpage<=$endpage);

		if($curpage == $cpage){
			echo"<b>$cpage</b>";

		}else{
			$url_page="<a href = '$url"."&page = $curpage'>";
			echo ("$url_page");
			echo("[$curpage]</a>");
		}
		$curpage++;

		//endwhile;

		if($totalpage>$endpage){
			$curpage = intval($endpage+1);
			$url_page="..<a href = '$url"."&page = $curpage'>";
			echo("$url_page");
			echo("</a>");/////////////////////////

		}else{
			echo(" ");/////////////////////
		}
}*/


?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>Insert title here</title>
</head>
<script type="text/javascript">
<!--
//form_delete(): 쪽지함에서 지울 항목을 선택해 삭제 버튼을 눌렀을때 실행되는 자바스크립트
function form_delete(){
	var form = document.form1;
	var b = 0;
	//for문: 현재 목록 가운데 삭제를 위해 확인한 항목이 몇 개인지를 알아냄
	for(i=0;i<form.elements.length;i++){
		if(form.elements[i].name == "mnum[]"){
			if(form.elements[i].checked==true){
				b++;
			}
		}
	}

    //선택한 내용이 없으면 메시지를 출력하고, 아니면 <form>을 옮김
	if(b==0){
		alert("적어도 하나의 항목은 선택하셔야 합니다");
		return;
	}
	form.gb.value="1";
	form.submit();


}

//-->
</script>
<title>WaSchool ::: Free board</title>
<style>


form 
{
	font-family: "Helvetica", sans-serif; 
}
input 
{
	margin-bottom: 0.5em;
}
input[type="submit"] 
{
	font-weight: bold;

}
label.heading
{
	float: left;
	margin-right: 1em;
	text-align: right;
	width: 7em; }
	legend 
	{
		background-color: white;
		border: 1px solid black;
		padding: 0.25em; 
	}
	</style>
	<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">

		<p><img src ="../noname01.png" width="54" height="54" border="0" >
			<img src="../waschool.png" width="209" height="108" border="0" alt="waschool.png">
			<input type=button value="로그인" style="width:50px;height=30px" onclick="location.href='../haniumlogin.html'" />
				
		</p>
		<table style="border-width:1; border-style:solid;" border="0" cellpadding="0" cellspacing="0" width="938">
			<tr>
				<td width="210" height="376" valign="top">
				</td>
				<td width="728" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td height="30" style="padding:10 0 0 14px"><a href="/">홈</a>
								&gt; 메시지</td>
							</tr>
						</table>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td height="89" style="padding:16 0 0 25px">
									<table width="90%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td>받은쪽지함</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<form method='post' name="form1" action="message_del.php">
							<input type="hidden" name="gb">
							<table width="90%" border="0" cellspacing="0" cellpadding="6">
								<tr>
									<td align="right">
										<b>받은쪽지함</b>|
										<a href="haniumMessageForm_2.php">보낸쪽지함</a>|
										<a href="haniumMessageForm_3.php">쪽지쓰기</a>
									</td>
								</tr>
							</table>
							<table width="90%" border="0" cellspacing="0" cellpadding="0">
								<tr bgcolor="CCCCCC">
									<td align="center" width="30" class="line2">선택</td>
									<td align="center" width="100" class="line2">보낸사람</td>
									<td align="center" class="line2">메시지</td>
									<td align="center" width="50" class="line2">확인유무</td>
									<td align="center" width="150" class="line2">보낸시간</td>
								</tr>

								<?
								$a_re_chk['Y']="확인";
								$a_re_chk['N']="<font color='red'>비확인</font>";
                                 
                               /*  $mydb = mysql_connect("localhost","root","apmsetup");
									mysql_select_db('waschool',$mydb);*/
									include"../php/config.php";
									include"../php/util.php";
									$connect = mysql_connect("localhost","root","apmsetup","waschool");

									

                                //자신의 아이디로 보낸 쪽지의 총 개수가 몇 개인지를 알아냄
									$query = "select mnum from messenger where receiveid_fk='$_SESSION[id]'And receive_del='N'";
									$result = mysql_query($query,$connect);
									mysql_query("set names utf8;");
									$total_bnum = @mysql_num_rows($result);
									@mysql_free_result($result);

									if(!$page){
										$page=1;
									}

									//한 페이지에서 나타나는 데이터의 수를 다섯 개로 설정함. 
									$p_scale=5;

                                
                                //총 데이터의 수와 한 페이지에 나타날 데이터의 수를 이용해 몇 페이지까지 있는지 페이지 수를 결정함
								$cpage=intval($page);
								$totalpage=intval($total_bnum/$p_scale);
								if($totalpage*$p_scale!=$total_bnum)
									$totalpage=$totalpage+1;

								if($cpage==1){
									$cline=0;
								}else{
									$cline=($cpage*$p_scale)-$p_scale;
								}

								$limit=$cline+$p_scale;

								if($limit>=$total_bnum)
									$limit=$total_bnum;

								$p_scale1=$limit-$cline;

								$query2="select * from messenger where receiveid_fk='$_SESSION[id]'And receive_del='N'
								order by mnum desc limit $cline, $p_scale1";
								$result2=mysql_query($query2,$connect);

								for($i=0;$rows2=@mysql_fetch_array($result2);$i++){
									$bunho=$total_bnum-($i+$cline)+1;
									//원하는 크기만큼 잘라서 내용을 보여주기 위해 util.php 파일의 shortenStr()함수를 불러내 필요한 길이의 값을 만든 뒤 화면에 출력함
									$msg_char = shortenStr($rows2[message],20);
								?>
								<tr>
									<td align="center" class="line">
										<input type="checkbox" name="mnum[]" value="<?=$rows2[mnum]?>"></td>
										<td align="center"class ="line">
											<?=$rows2[sendid_fk]?>&nbsp;
										</td>
										<td class="line">
											<a href="message_view.php? mnum=<?=$rows2[mnum]?>&gb=1"><?=$msg_char?>
											</a>
										</td>
										<td align="center" class="line">
											<?=$a_re_chk[$rows2[receive_chk]]?></td>
											<td align="center" class="line"><?=$rows2[send_reg]?></td>
										</tr>
										<?
										}
										@mysql_free_result($result2);
										?>
										<\table>
										<table width="90%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td width="30" height="36">
													<a href="javascript:form_delete()"></a>
												</td>
												<td height="36" align=center>
													<?
													$url="haniumMessageForm_1.php?gb=1";
													page_avg($totalpage,$cpage,$url);
													?>
												</td>
											</tr>
										</table>
										<br>
									</td>
								</tr>
								</table>
							</body>
							</html>



