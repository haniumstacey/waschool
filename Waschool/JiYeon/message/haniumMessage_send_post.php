<?
if(!isset($_SESSION))
{
	session_start();
}

//���̵� �ش�Ǵ� ������ �ִ��� Ȯ��
/*if(!isset($_SESSION["id"])){
	err_msg('�α��� ������ �����ϴ�. �ٽ� �α����� �ּ���.');
}*/

include"../php/config.php";
include"../php/util.php";
$connect = mysql_connect("localhost","root","apmsetup","waschool");
/*$mydb = mysql_connect("localhost","root","apmsetup");
mysql_select_db('waschool',$mydb);*/


//�����ͺ��̽��� �ִ� ���̵����� Ȯ��
$query="select id from userinfo where id='$receive_id'";
$result =mysql_query($query,$connect);

mysql_query("set names utf8;");
$total_num = mysql_num_rows($result);

//ȸ�������� ���µ� �޽����� ������ �ȵǹǷ�
if(!$total_num){
	err_msg('�������� �ʴ� ���̵��Դϴ�. ���̵� Ȯ���ϼ���');
}
else{
	$msg = addslashes($msg);//���� ������ ������ �����ϰ� �ִ� ����

	$qry1 = "insert into messenger(sendid_fk, receiveid_fk, message, send_reg)
	values('$_SESSION[id]','$receive_id','$msg',now())";

	$res1 = mysql_query($qry1,$connect);
	if(!$res1){//!$res1: sql�� ���� ����� �������� �ʾ��� ���� ����Ű�� ��. sql������ ������ �ִ� ���� ������ �����Ͱ� ������� �ʾ����� ����.
		err_msg('�����ͺ��̽� ������ �߻���');
	}
	else{
		echo("<script>
			window.alert('���������� �޽����� ���޵Ǿ����ϴ�!');
			</script>");
		echo"<meta http-equiv='Refresh' content='0; URL=/member/message_2.php'>";
	}
}






?>