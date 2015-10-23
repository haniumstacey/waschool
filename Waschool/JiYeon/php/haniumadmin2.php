<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko"  xml:lang="ko">
<meta http-equiv="Content-Type" Content="text/html; charset=utf-8" />
<?
include("adminDB.php");
$id = $_POST['id'];



/*if(is_id_ok($id, $passwd))*/
if(is_id_ok($id)){
		/*$_SESSION['id']=$id;
		$_SESSION['name']=$name;
		$_SESSION['flash']=$name."님이 접속하였습니다.";*/
		
			
		echo "<script>	alert(\"사용가능한 아이디입니다.\")
		history.back();</script>";
		/*header("Location:haniumboard.html");*/

		
	}
else
	{

		/*$_SESSION['flash']=$id."로그인이 실패! 다시입력해주세요";*/
		echo "<script>window.alert(\"이미 존재하는 아이디입니다.\")
		window.location.href='haniumadmin.php';</script>";
		


	}
	?>
	<title><?php echo "Now:".$now ?></title>
	<body>
		<?echo $bir_date ?>


	</body>
	</html>