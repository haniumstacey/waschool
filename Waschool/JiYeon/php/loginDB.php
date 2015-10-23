<?
if(!isset($_SESSION))
{
	session_start();
}

	function is_passwd_correct($id, $passwd)
	{
		$mydb = mysql_connect("14.63.223.180", "root", "haniumwaschool");
		mysql_select_db("waschool", $mydb);

		$query = "select * from userinfo where id='".$id."' and passwd='".$passwd."'";
		$rows = mysql_query($query);

		if(mysql_num_rows($rows))
		{
			$row=mysql_fetch_row($rows);
			$userkind = $row[4];
			$_SESSION['userkind'] = $userkind;
			return true;
		}
		else
		{
			return false;
		}
	}
	/*function ensure_logged_in(){
		if(!isset($_SESSION['id']))
		{
			$_SESSION['flash']="로그인을 해야겠죠~";
			header("Location:haniumlogin.html");
		}

	}*/


?>