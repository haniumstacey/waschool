<?
if(!isset($_SESSION))
{
	session_start();
}


	include("loginDB.php");
	$id=$_POST['id'];
	$passwd=$_POST['passwd'];

    
	
	if(is_passwd_correct($id, $passwd))
	{
		$_SESSION['id']=$id;
		$_SESSION['flash']=$id."님이 접속하였습니다.";
		echo "<script>	alert(\"성공적로그인.\")
		window.location.href='temp.html';</script>";
		/*header("Location:haniumboard.html");*/
		
	}
	else
{

		/*$_SESSION['flash']=$id."로그인이 실패! 다시입력해주세요";*/
		echo "<script>window.alert(\"로그인을 실패하였습니다.\")
		window.location.href='haniumlogin.html';</script>";
		
	

	}
	?>