<?
if(!isset($_SESSION))
{
	session_start();
}

//아이디에 해당되는 세션이 있는지 확인
/*if(!isset($_SESSION["id"])){
	err_msg('로그인 정보가 없습니다. 다시 로그인해 주세요.');
}*/

include"../php/config.php";
include"../php/util.php";
$connect = mysql_connect("localhost","root","apmsetup","waschool");
/*$mydb = mysql_connect("localhost","root","apmsetup");
mysql_select_db('waschool',$mydb);*/


//데이터베이스에 있는 아이디인지 확인
$query="select id from userinfo where id='$receive_id'";
$result =mysql_query($query,$connect);

mysql_query("set names utf8;");
$total_num = mysql_num_rows($result);

//회원정보가 없는데 메시지를 보내면 안되므로
if(!$total_num){
	err_msg('존재하지 않는 아이디입니다. 아이디를 확인하세요');
}
else{
	$msg = addslashes($msg);//보낼 쪽지의 내용을 저장하고 있는 변수

	$qry1 = "insert into messenger(sendid_fk, receiveid_fk, message, send_reg)
	values('$_SESSION[id]','$receive_id','$msg',now())";

	$res1 = mysql_query($qry1,$connect);
	if(!$res1){//!$res1: sql의 실행 결과를 돌려주지 않았을 때를 가리키는 것. sql구문에 오류가 있는 등의 이유로 데이터가 저장되지 않았음을 뜻함.
		err_msg('데이터베이스 오류가 발생함');
	}
	else{
		echo("<script>
			window.alert('정상적으로 메시지가 전달되었습니다!');
			</script>");
		echo"<meta http-equiv='Refresh' content='0; URL=/member/message_2.php'>";
	}
}






?>