<?
//err_msg():  요청한 메시지를 화면에 출력한 뒤 페이지를 다시 이전 페이지로 옮기는 역할을 함
function err_msg($msg, $bool = "1")
{
	if($bool)
	{
		echo"
		<script>
		window.alert('$msg');
		history.go(-1);
		</script>
		";
		exit;
	}
}

//msg()함수. 요청한 메시지를 화면에 출력함
function msg($msg){
	echo("
		<script>
		window.alert('$msg')
		</script>
		");
}

//err_close()함수. 메시지를 출력한 뒤 그 페이지를 닫는 역할을 함.
function err_close($msg)
{
	echo"
	<script>
	window.alert('$msg');
	self.close();
	</script>
	";
	exit;

}

//err_msg2(): 메시지를 출력한 뒤 새 창을 연다
function err_msg2($msg, $to, $bool = "1")
{
	if($bool)
	{
		echo"
		<script>
		 window.alert('$msg');
		 window.open('$to','_self');
		 </sciprt>
		 ";
		 exit;
	}
}

//요청한 페이지로 현재 페이지를 옮기는 역할을 함
function redirect($re_url)
{
	echo"<meta http-equiv='Refresh' content='0; URL =$re_url'>";
	exit;
}



//mysql연결
function my_connect($host, $id, $pass, $db)
{
	$connect = mysql_connect($host,$id,$pass);//config.php파일에서 선언한 변수를 이용하여 실제 mysql의 연결을 담당함
	mysql_select_db($db);
	return $connect;
}

//HTML Tag를 지우는 함수
function del_html($str)
{//html태그를 치환하여 소스에서 html이 화면에 적용되지 않게 함
	$str = str_replace(">","&gt;",$str);
	$str = str_replace("<","&lt;",$str);
	$str = str_replace("\"","&quot;",$str);
	return $str;
}

//각종 html태그를 이용한 테러 방지
function avoid_crack($str)
{
	$str = eregi_replace("<","&lt;",$str);
	//p149에 더 있음
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
}


//현재 시간보다 마감일자가 늦을 경우 경매 완료
function end_exe($connect){
	$now_t = date('TmdH');
	$qry="update auct_master set end_chk='Y' where auct_end<=$now_t";
	$res = MySQL_query($qry,$connect);
}
//블로그의 기본 경로를 넘김김
function blog_info_fnc($blog_id,$connect){

	$qry = "select * from blog_info where user_id = '$blog_id'";
    $res = MySQL_query($qry,$connect);
    $rows = mysql_fetch_array($res);

    return $rows;

}
//자신의 블로그의 방문 기록 저장
function blog_visit_fnc($blog_id,$visit_id,$cookie_val,$connect){
	$n_date = date('Ymd');

	//하루 동안 부여하는 쿠키가 없을 때, 즉 오늘 처음 올 때 
	if(!$cookie_val){
		$chk ="select vnum from blog_visit_count where user_id = '$blog_id' And visit_date='$n_date'";
		$cres = mysql_query($chk,$connect);
		$crows = mysql_fetch_array($cres);

		//온ㄹ ㅏ운터가 있으면 업데이트
		if($crows){
			$qry2 = "update blog_visit_count set visit_count = visit_count+1
			          where user_id = '$blog_id'And visit_date = '$n_date'";
			$res2 = MySQL_query($qry2,$connect);

		}
		else{
			//데이터가 없으면 INSERT
			$qry2="insert into blog_visit_count(user_id,visit_date, visit_count)values('$blog_id','$n_date',1)";
			$res2 = mysql_query($qry2,$connect);
		}
	}

	//새로 쿠키를 부여
	SetCookie("v_id",$n_date,time()+3600*24,"/");

	//자신이 아닌 로그인된 사용자가 접속했을 때
	if($visit_id &&($visit_id!=$blog_id)){
		//오늘 ㅓㅂ속한 사용자가 있는지 확인
		$chk = "select mnum from blog_visit_member where user_id = '$blog_id'And
		visit_date='$n_date'And
		visit_id = '$visit_id";
		$cres = MySQL_query($chk, $connect);
		$crows = mysql_fetch_array($cres);
		//오늘 방문 기록이 없을 경우에만 저장
		if(!$crows){
			$qry2 = "insert into blog_visit_member(user_id,visit_date,visit_id)
			values('$blog_id','$n_date','$visit_id')";
			$res2 = MySQL_query($qry2,$connect);
		}

	}

}


//배송비 계산
function trans_cul($money){
	if((int)$money<0){
		$a_money = 3000;
	}
	else{
		$a_money = 0;
	}
	return $a_money;
}

//날짜 데이터 형식 변환 : 20020512 -> 2002-05-12
function shortdate($strvalue){
	$date_str = substr($strvalue,0,4)."-".substr($strvaule,4,2)."-".
	substr($strvalue,6,2);
	return $date_str;
}
//한글 문자열 자르기 함수
function shortenStr($str, $maxlen){
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

?>





