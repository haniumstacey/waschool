<?php
$testfield = $_POST['testfield'];
$mysqli = mysqli_connect("localhost","root","apmsetup","waschool");

if(mysqli_connect_errno()){
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();

}else{
	$sql = "INSERT INTO userinfo (id) values ('$testfield')";
	$res = mysqli_query($mysqli, $sql);

	if($res == TRUE){
		echo"A reord has been inserted";

	}else{
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}
	mysqli_close($mysqli);
}
