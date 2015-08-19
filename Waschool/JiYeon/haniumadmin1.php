<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko"  xml:lang="ko">
<meta http-equiv="Content-Type" Content="text/html; charset=utf-8" />

<?
	include("adminDB.php");
	$id = $_POST['id'];
	$passwd = $_POST['passwd'];
	$passwd = $_POST['passwdconfirm'];
	$name = $_POST['name'];
	$birthyear = $_POST['birthyear'];
	$birthmonth = $_POST['birthmonth'];
	$birthday = $_POST['birthday'];
	$userkind = $_POST['userkind'];
	$writetime = $_POST['writetime'];
	/*$now= date("Y-m-d H:i:s",time());*///초까지 현재시간 구해줌 
	
	/*$writetime= date("YmdHis",time());*/
    $bir_date = $birthyear."".$birthmonth."".$birthday;
   

	
	/*if(is_id_ok($id, $passwd))*/
	if(admin($id,$passwd,$name,$bir_date,$userkind,$writetime))
	{
		/*$_SESSION['id']=$id;
		$_SESSION['name']=$name;
		$_SESSION['flash']=$name."님이 접속하였습니다.";*/
		echo "<script>	alert(\"회원가입을 완료하였습니다.\")
		window.location.href='temp.html';</script>";
		/*header("Location:haniumboard.html");*/
		
	}
	else
	{

		/*$_SESSION['flash']=$id."로그인이 실패! 다시입력해주세요";*/
		echo "<script>window.alert(\"뭘 잘못입력했는데 다시 입력하세요.\")
		window.location.href='haniumadmin.php';</script>";
		
	

	}
	?>
<title><?php echo "Now:".$now ?></title>
<body><?echo $bir_date ?></body>
</html>