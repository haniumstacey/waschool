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
		$_SESSION['flash']=$id."���� �����Ͽ����ϴ�.";
		echo "<script>	alert(\"�������α���.\")
		window.location.href='temp.html';</script>";
		/*header("Location:haniumboard.html");*/
		
	}
	else
{

		/*$_SESSION['flash']=$id."�α����� ����! �ٽ��Է����ּ���";*/
		echo "<script>window.alert(\"�α����� �����Ͽ����ϴ�.\")
		window.location.href='haniumlogin.html';</script>";
		
	

	}
	?>