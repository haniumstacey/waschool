<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko"  xml:lang="ko">
<meta http-equiv="Content-Type" Content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
/*if(!isset($_SESSION))
{
	session_start();
}*/
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
<head>
<title><?php echo "Now:".$now ?></title>
<!--자바스크립트 생성//자바스크립트랑html은 주로, 거의 클라이언트 단에서 처리할 목적으로 사용-->
<!-- �빀爾먯�怨� 理쒖냼�솕�맂 理쒖떊 CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<!-- 遺�媛��쟻�씤 �뀒留� -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
		
		<!-- jQuery (遺��듃�뒪�듃�옪�쓽 �옄諛붿뒪�겕由쏀듃 �뵆�윭洹몄씤�쓣 �쐞�빐 �븘�슂�빀�땲�떎) -->
	    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
	    <script src='js/jquery.min.js'></script>
		<!-- �빀爾먯�怨� 理쒖냼�솕�맂 理쒖떊 �옄諛붿뒪�겕由쏀듃 -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<script type="text/javascript">
	function chkBoxCheck(intChkNumber) {
		for (j = 0; j < 2; j++) {//체크박스갯수만큼 반복문을 돌면서
			if (eval("document.adminForm1.userkind[" + j + "].checked") == true) {//체크박스가 선택되어있으면
				document.adminForm1.userkind[j].checked = false;//우선체크박스의 속성을 선택되지 않음으로 하고
				if (j == intChkNumber) {//사용자가 클릭한 체크박스와 프로그래밍적으로 돌고있는 체크박스의 번호가 같으면
					document.adminForm1.userkind[j].checked = true;//이런 경우만 체크박스가 선택되도록 한다.
				    <?/* $userkind1 ='<script>j;</script>';*/ ?>
				    <? $userkind1 =j;?>
				    
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
<div class="page-header">
  <h1>회원가입</h1>
</div>
	<form action="haniumadmin1.php" method="POST" name="adminForm1" class ="form-horizontal" >
		<div class="form-group">
			<label for="id" class="col-sm-2 control-label" >아이디</label><!-- 들어갈 타입은 text이며 변수 이름은 name뒤에 있는거 -->
			<div class="col-sm-10">
				<input type="text" class="form-control" id="id" name="id" placeholder="id"required>
			</div>
		</div>

		<div class="form-group">
			<label for="passwd" class="col-sm-2 control-label" >비밀번호</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" id="passwd" name="passwd" placeholder="password"required>
			</div>
		</div>
		<div class="form-group">
			<label for="passwd" class="col-sm-2 control-label" >비밀번호 재확인</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" id="passwdconfirm" name="passwdconfirm" placeholder="passwordconfirm"required>
			</div>
		</div>
		<div class="form-group">
			<label for="passwd" class="col-sm-2 control-label" >이름</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="name" name="name" placeholder="name"required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" >생일</label>	
			<div class="col-sm-10">
				<label for="birthyear" class="col-sm-2 control-label" >년:&nbsp;&nbsp;
						<select name="birthyear" size="1"  id="select">
							<?
							for($birthyear = 1950; $birthyear<=2015;$birthyear++)
							{
								echo "<option value=\" ".$birthyear. "\">".$birthyear."</option>";
						}
						?>

					</select> 
					
				</label>
				<label for="birthmonth" class="col-sm-2 control-label" >월:&nbsp;&nbsp; 
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
					
				</label>
				<label for="birthday" class="col-sm-2 control-label" >일:&nbsp;&nbsp; 
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
					</label>
		</div>
	</div>
			<!--  <input name="repeatconfirm" type="button" id="button1"	value="중복확인" > -->
	
		<div class="form-group">
			<!-- 라디오버튼: name의 값으로 항목을 묶고 value의 값으로 항목을 구분함 -->
			<label for="userkind" class="col-sm-2 control-label" >회원구분</label>
			<div class="col-sm-10">
			<label for="yearyear" class="col-sm-2 control-label" >교사
				<!-- 라디오버튼: name의 값으로 항목을 묶고 value의 값으로 항목을 구분함 -->
						<input type="radio" name="userkind" value="0">
						<!--     <input type="checkbox" name="userkind" id="checkbox"onClick="chkBoxCheck(0)" >  -->
				
							
						</label>
				
			<label for="yearyear" class="col-sm-2 control-label" >학생
							<input type="radio" name="userkind" value="1">
					때	<!-- 	<input type="checkbox" name="userkind" id="checkbox1" onClick="chkBoxCheck(1)" > -->
							
					<input type="hidden" name="userkind1"  value="<? echo $userkind1 ?>"> 
					</label>
				</div>
			
</div>
				
			</tbody>
		</table>
		<br/><br/>
		

 		
		 <input name="admin" class="btn btn-primary btn-block btn-lg" type="submit" id="button"
			value="가입하기" ><!-- input type의 submit은 입력받은 값을 넘겨줌 넘겨주는 값은 폼시작부터 폼끝날때까지의 name변수의 값을 넘겨줌. 뒤에 타이핑된 name과 value는 큰 의미 없음
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
	</br>
	<br>
	
</body>
</html>
