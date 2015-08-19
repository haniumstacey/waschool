<?
if(!isset($_SESSION))
{
	session_start();
}

/*if(!isset($_SESSION["id"])){
	err_msg('로그인 정보가 없습니다. 다시 로그인해 주세요.');
}*/
 $mydb = mysql_connect("localhost","root","apmsetup");
									mysql_select_db('waschool',$mydb);

									mysql_query("set names utf8;");
//보기 화면에서 삭제
if($mode=='view'){
	$qry="update messenger set receive_del='Y' where mnum='$mnum'";
	$res=mysql_query($qry,$connect);

	echo("<meta http-equiv='Refresh' content='0;URL=haniumMessageForm_1.php'>");

}
else if($gb=='2'){//보낸 편지함 내용 삭제
	$qry="update messenger set send_del='Y' where mnum='$mnum'";
	$res=mysql_query($qry,$connect);

	echo("<meta http-equiv='Refresh' content='0;URL=haniumMessageForm_2.php'>");

}

else{
	//받은 편지함에서 삭제
	if($gb=='1'){
		for($i=0;$i<sizeof($mnum);$i++){
			if($mnum[$i]){
				$qry = "update messenger set receive_del='Y'where mnum='$mnum[$i]'";
				$res = mysql_query($qry,$connect);
			}
		}
		echo("<meta http-equiv='Refresh'content='0;URL=haniumMessageForm_1.php'>");
	}
	else if($gb=='2'){//보낸 편지함에서 삭제
		for($i=0;$i<sizeof($mnum);$i++){
			if($mnum[$i]){
				$qry="update messenger set send_del='Y' where mnum='$mnum[$i]'";
				$res=mysql_query($qry,$connect);
			}
		}
		echo("<meta http-equiv='Refresh'content='0;URL=haniumMessageForm_2.php'>");

	}
}
?>