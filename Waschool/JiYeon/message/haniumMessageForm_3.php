<?
if(!isset($_SESSION))
{
	session_start();
}

/*if(!isset($_SESSION["id"])){
	err_msg('로그인 정보가 없습니다. 다시 로그인해 주세요.');
}*/
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>Insert title here</title>
</head>
<script type="text/javascript">
function eventWindow(url){
	event_popupWin = window.open(url,'event','resizable=yes,scrollbars = yes, toolbar = no, width=400,height=400');
	event_popupWin.opener = self;
}

</script>
<script language="javascript" type="text/javascript">
<!--
 function send_chk(){
 	var form = document.form1;

 	if(!form.receive_id.value){
 		alert("받는 사람 아이디를 입력하세요!");
 		form.receive_id.focus();
 		return;
 	}
 	if(!form.msg.value){
 		alert("보낼 내용을 입력하세요!");
 		form.msg.focus();
 		return;
 	}
 	form.submit();
 }
 //-->

</script>
<title>WaSchool ::: Free board</title>
<style>


form 
{
	font-family: "Helvetica", sans-serif; 
}
input 
{
	margin-bottom: 0.5em;
}
input[type="submit"] 
{
	font-weight: bold;

}
label.heading
{
	float: left;
	margin-right: 1em;
	text-align: right;
	width: 7em; }
	legend 
	{
		background-color: white;
		border: 1px solid black;
		padding: 0.25em; 
	}
	</style>
	<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">

		<p><img src ="../noname01.png" width="54" height="54" border="0" >
			<img src="../waschool.png" width="209" height="108" border="0" alt="waschool.png">
			<input type=button value="로그인" style="width:50px;height=30px" onclick="location.href='../haniumlogin.html'" />
				
		</p>

<table width="90%" border="0" cellspacing="0" cellpadding="6">
	<tr>
		<td align="right">
			<a href="haniumMessageForm_2.php">받은쪽지함</a>|
			<a href="haniumMessageForm_2.php">보낸쪽지함</a>|
			<b>쪽지쓰기</b>
		</td>
	</tr>
</table>
<table width="90%" border="0" cellspacing="0" cellpadding="0">
	<form method='post' name=form1 action="message_send_post.php">
		<tr>
			<td colspan="3"></td>
		</tr>
		<tr>
			<td align="center" width="155"><b>받는사람</b></td>
			<td width="378" style="padding:8 0 5 0 px">
				<input type="text" name="receive_id"size="10">
			</td>
		</tr>
		<tr>
			<td colspan="3"></td>
		</tr>
		<tr>
			<td colspan="2" align="center" width="154"></td>
		</tr>
		<tr>
			<td width="155" align="center"> <b>내용</b></td>
			<td width="378" style="padding:5 0 5 0px">
				<textarea name="msg" cols="50" rows="15"></textarea>
			</td>
		</tr>
	</table>
	<table width="90%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="3" height="4"></td>
		</tr>
	</table>
	<table width="90%" border="0" cellspacing="0" cellpadding="4">
		<tr>
			<td align="center" width="10%">&nbsp;</td>
			<td align="center" width="90%"><a href="javascript:send_chk()"><img src="../bt_ok2.png"border="0">
				<a href="javascript:history.go(-1)"><img src="../bt_ok2.png"border="0"></a>
			</td>
		</tr>
	</form>
</table>
<br>
</td>
</tr>
</table>
 <form name="form2">
        	<p><img src="../hone.png" width="48" height="46" border="0" alt="hone.png"> <img src="../messasge.png" width="51" height="46"
        		border="0" alt="messasge.png"> <img src="../mypage.png" width="49" height="50" border="0" alt="mypage.png"> <img src="../mileage.png"
        		width="50" height="50" border="0" alt="mileage.png"> <img
        		src="../gift.png" width="49" height="50" border="0" alt="gift.png">
 		</p>
 	</form>
</body>
</html>













