<?php
/*if(!isset($_SESSION))
{
	session_start();
}*/
function is_id_ok($id)
	{
		$mydb = mysql_connect("14.63.223.180", "root", "haniumwaschool");
		mysql_select_db('waschool', $mydb);
 		mysql_query("set names utf8;");
		$query = "select * from userinfo where id='".$id."' ";
		$rows = mysql_query($query);
		mysql_query("set names utf8;");
		if(mysql_num_rows($rows))
		{
			$row=mysql_fetch_row($rows);
			return false;//아이디가 중복일 경우
		
		}
		else
		{
			
			return true;//사용가능한 아이디일경우
		}
	}

function admin($id,$passwd,$name,$birth,$userkind,$writetime){
$mysqli = mysqli_connect("14.63.223.180","root","haniumwaschool","waschool");
mysqli_query($mysqli, "set names utf8;");
if(mysqli_connect_errno()){
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();


}else{
	
	$sql = "INSERT INTO userinfo (id, passwd, name, birth, userkind,writetime) values ('$id','$passwd','$name','$birth','$userkind','$writetime')";
	

	$res = mysqli_query($mysqli, $sql);
mysqli_query($mysqli, "set names utf8;");
	if($res == TRUE){
		echo"A reord has been inserted";

		return true;
	}else{
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
		return false;
	}
	mysqli_close($mysqli);
}
}
?>