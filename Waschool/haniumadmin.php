<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko"  xml:lang="ko">
<meta http-equiv="Content-Type" Content="text/html; charset=utf-8" />
<?php
session_cache_limiter("private_no_expire");
define("ADAY",(60*60*24));//86400(하루에 해당하는 초)
if((!isset($_POST["month"]))||(!isset($_POST["year"]))){//isset():정의되지 않은 변수를 인자로 지정하면 false를 반환. 폼으로 전송된 연월을 검사. 정의되지 않은 연월로 mktime()을 호출하면 유효한 날짜를 생성할 수 없음
	$nowArray = getdate();//getdate()로 현재 시각을 기준으로 연관배열을 생성
	$month = $nowArray["mon"];
	$year = $nowArray["year"];
}
else{
	$month = $_POST["month"];
	$year = $_POST["year"];

}
$start = mktime(12,0,0,$month,1,$year);
$firstDayArray = getdate($start);
//$now= date("YmdHis",time());
$now= date("Y-m-d H:i:s",time());//초까지 현재시간 구해줌 

?>

<title><?php echo "Now:".$now ?></title>
<!--자바스크립트 생성//자바스크립트랑html은 주로, 거의 클라이언트 단에서 처리할 목적으로 사용-->
<script type="text/javascript">
	function chkBoxCheck(intChkNumber) {
		for (j = 0; j < 2; j++) {//체크박스갯수만큼 반복문을 돌면서
			if (eval("document.adminForm1.userkind[" + j + "].checked") == true) {//체크박스가 선택되어있으면
				document.adminForm1.userkind[j].checked = false;//우선체크박스의 속성을 선택되지 않음으로 하고
				if (j == intChkNumber) {//사용자가 클릭한 체크박스와 프로그래밍적으로 돌고있는 체크박스의 번호가 같으면
					document.adminForm1.userkind[j].checked = true;//이런 경우만 체크박스가 선택되도록 한다.
				    <?/* $userkind1 ='<script>j;</script>';*/ ?>
				    <? $userkind1 =j;?>
				    alert(j);
				}
			}
		}//for
		
	} 

	function MM_openBrWindow(theURL, winName, features) { //v2.0
		window.open(theURL, winName, features);
	}
	

	function a() {
	/*	var frm = document.getElementById("id");
		alert "hihi";*/
		if(document.adminForm1.id.value="")
		{
			alert("아이디를 입력하시오")
			document.adminForm1.id.focus()
		}
	}

</script>


<style>
            table{
                border:1px solid gray;
                border-collapse: collapse;
            }
            th{
                background-color: #d0d0d0;
                font-weight:bold;
            }
            th,td{
                border:1px solid gray;
                padding:5px;
            }
        </style>



<body>

	<p></p>

	<form action="haniumadmin1.php" method="POST" name="adminForm1" >
		<!-- <input type = "hidden" name="goPopUp" value="true"/> -->
		<table width="212" height="149" border="1">
			<tbody>
				<tr>
			<!-- 	<form action="haniumadmin1.php" method="POST" name="adminForm1" > -->
					<td width="180" height="28" id="tdid">
							<!-- <form action="haniumadmin2.php" method="POST" name="adminForm2" > -->
					<input type="text"
						name="id" id="id" size="19" value="아이디" maxlength="10" onfocus="this.value=''"><!-- 들어갈 타입은 text이며 변수 이름은 name뒤에 있는거 -->
					
						<!--  <input name="repeatconfirm" type="button" id="button1"	value="중복확인" onclick = "a()"> -->
						 <input name="repeatconfirm" type="button" id="button1"	value="중복확인" >
					
					</td>
					
				</tr>
					
				<tr>

					<td width="212" height="28" id="passwd">
					<input type="text"
						name="text" id="passwd" size="30" value="비밀번호" maxlength="10" onfocus="this.value=''"> 
						<br />
					</td>
				</tr>
				<tr>
					<td width="212" height="28" id="passwdconfirm">
					<input type="text"
						name="passwdconfirm" id="passwdconfirm" size="30" value="비밀번호재확인" maxlength="10" onfocus="this.value=''"><br />
					</td>
				</tr>
		

				<tr>
					<td width="212" height="28" id="name">
					<input type="text"
						name="name" id="name" size="30" value="이름" maxlength="10" onfocus="this.value=''"><br />
					</td>
				</tr>
				<tr>
					<td height="28">
						<? echo "생:"?>
						<select name="birthyear" size="1"  id="select">
							<?
							for($birthyear = 1950; $birthyear<=2015;$birthyear++)
							{
								echo "<option value=\" ".$birthyear. "\">".$birthyear."</option>";
						}
						?>

					</select> 
					<? echo "년"?>
					<label for="birthmonth"> </label> 
					<select name="birthmonth"id="select2">
						<?php

							for($birthmonth=1;$birthmonth<=12;$birthmonth++)
							{
								$zero = 0;
								if($birthmonth<10)
									echo"<option value=\"".$zero.$birthmonth. "\">".$birthmonth."</option>";

								else
									echo"<option value=\"" .$birthmonth. "\">".$birthmonth."</option>";
							}		
			
						?>
					</select>
					<? echo "월"?>
					 <label for="birthday"> </label>
					 <select name="birthday"id="select3">
							<?
							for($birthday = 1;$birthday<=31;$birthday++)
							{
								if($birthday<10)
									echo"<option value=\"".$zero.$birthday."\">".$birthday."</option>";
								else
									echo"<option value=\"".$birthday."\">".$birthday."</option>";
							}
							?>
					</select>
					<? echo "일"?>
					<?
					/*$bir_date = $birthyear."-".$birthmonth."-".$birthday;*/
					//$bir_date = $birthyears."".$birthmonths."".$birthdays;
					?>
				</td>
				</tr>
				<tr>
					<td height="28"><label> <!--name으로 그루핑을 하는듯. 서버에게 전송될 때 name에 입력한 변수명으로 value가 전달된다.-->
							<input type="checkbox" name="userkind" id="checkbox"onClick="chkBoxCheck(0)" > 
							교사  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							<input type="checkbox" name="userkind" id="checkbox1" onClick="chkBoxCheck(1)" >
							학생
					</label></td>
					<input type="hidden" name="userkind1"  value="<? echo $userkind1 ?>"> 
				</tr>
				
			</tbody>
		</table>
		<br/><br/>
		

 		
		 <input name="admin" type="submit" id="button"
			value="가입하기" style="width:255px;height:30px"><!-- input type의 submit은 입력받은 값을 넘겨줌 넘겨주는 값은 폼시작부터 폼끝날때까지의 name변수의 값을 넘겨줌. 뒤에 타이핑된 name과 value는 큰 의미 없음
 -->
<?
define("ADAY",(60*60*24));//86400(하루에 해당하는 초)
if((!isset($_POST["month"]))||(!isset($_POST["year"]))){//isset():정의되지 않은 변수를 인자로 지정하면 false를 반환. 폼으로 전송된 연월을 검사. 정의되지 않은 연월로 mktime()을 호출하면 유효한 날짜를 생성할 수 없음
	$nowArray = getdate();//getdate()로 현재 시각을 기준으로 연관배열을 생성
	$month = $nowArray["mon"];
	$year = $nowArray["year"];
}
else{
	$month = $_POST["month"];
	$year = $_POST["year"];

}
 $start = mktime(12,0,0,$month,1,$year);
$firstDayArray = getdate($start);
$writetime= date("Y-m-d H:i:s",time());
?> 
<input type="hidden" name="writetime" id="writetime" value="<? echo $writetime ?>"> 
		</form>
</body>
</html>
