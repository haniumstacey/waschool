<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko"  xml:lang="ko">
<meta http-equiv="Content-Type" Content="text/html; charset=utf-8" />
<?php
session_cache_limiter("private_no_expire");
define("ADAY",(60*60*24));//86400(�Ϸ翡 �ش��ϴ� ��)
if((!isset($_POST["month"]))||(!isset($_POST["year"]))){//isset():���ǵ��� ���� ������ ���ڷ� �����ϸ� false�� ��ȯ. ������ ���۵� ������ �˻�. ���ǵ��� ���� ������ mktime()�� ȣ���ϸ� ��ȿ�� ��¥�� ������ �� ����
	$nowArray = getdate();//getdate()�� ���� �ð��� �������� �����迭�� ����
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
$now= date("Y-m-d H:i:s",time());//�ʱ��� ����ð� ������ 

?>

<title><?php echo "Now:".$now ?></title>
<!--�ڹٽ�ũ��Ʈ ����//�ڹٽ�ũ��Ʈ��html�� �ַ�, ���� Ŭ���̾�Ʈ �ܿ��� ó���� �������� ���-->
<script type="text/javascript">
	function chkBoxCheck(intChkNumber) {
		for (j = 0; j < 2; j++) {//üũ�ڽ�������ŭ �ݺ����� ���鼭
			if (eval("document.adminForm1.userkind[" + j + "].checked") == true) {//üũ�ڽ��� ���õǾ�������
				document.adminForm1.userkind[j].checked = false;//�켱üũ�ڽ��� �Ӽ��� ���õ��� �������� �ϰ�
				if (j == intChkNumber) {//����ڰ� Ŭ���� üũ�ڽ��� ���α׷��������� �����ִ� üũ�ڽ��� ��ȣ�� ������
					document.adminForm1.userkind[j].checked = true;//�̷� ��츸 üũ�ڽ��� ���õǵ��� �Ѵ�.
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
			alert("���̵� �Է��Ͻÿ�")
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
						name="id" id="id" size="19" value="���̵�" maxlength="10" onfocus="this.value=''"><!-- �� Ÿ���� text�̸� ���� �̸��� name�ڿ� �ִ°� -->
					
						<!--  <input name="repeatconfirm" type="button" id="button1"	value="�ߺ�Ȯ��" onclick = "a()"> -->
						 <input name="repeatconfirm" type="button" id="button1"	value="�ߺ�Ȯ��" >
					
					</td>
					
				</tr>
					
				<tr>

					<td width="212" height="28" id="passwd">
					<input type="text"
						name="text" id="passwd" size="30" value="��й�ȣ" maxlength="10" onfocus="this.value=''"> 
						<br />
					</td>
				</tr>
				<tr>
					<td width="212" height="28" id="passwdconfirm">
					<input type="text"
						name="passwdconfirm" id="passwdconfirm" size="30" value="��й�ȣ��Ȯ��" maxlength="10" onfocus="this.value=''"><br />
					</td>
				</tr>
		

				<tr>
					<td width="212" height="28" id="name">
					<input type="text"
						name="name" id="name" size="30" value="�̸�" maxlength="10" onfocus="this.value=''"><br />
					</td>
				</tr>
				<tr>
					<td height="28">
						<? echo "��:"?>
						<select name="birthyear" size="1"  id="select">
							<?
							for($birthyear = 1950; $birthyear<=2015;$birthyear++)
							{
								echo "<option value=\" ".$birthyear. "\">".$birthyear."</option>";
						}
						?>

					</select> 
					<? echo "��"?>
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
					<? echo "��"?>
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
					<? echo "��"?>
					<?
					/*$bir_date = $birthyear."-".$birthmonth."-".$birthday;*/
					//$bir_date = $birthyears."".$birthmonths."".$birthdays;
					?>
				</td>
				</tr>
				<tr>
					<td height="28"><label> <!--name���� �׷����� �ϴµ�. �������� ���۵� �� name�� �Է��� ���������� value�� ���޵ȴ�.-->
							<input type="checkbox" name="userkind" id="checkbox"onClick="chkBoxCheck(0)" > 
							����  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							<input type="checkbox" name="userkind" id="checkbox1" onClick="chkBoxCheck(1)" >
							�л�
					</label></td>
					<input type="hidden" name="userkind1"  value="<? echo $userkind1 ?>"> 
				</tr>
				
			</tbody>
		</table>
		<br/><br/>
		

 		
		 <input name="admin" type="submit" id="button"
			value="�����ϱ�" style="width:255px;height:30px"><!-- input type�� submit�� �Է¹��� ���� �Ѱ��� �Ѱ��ִ� ���� �����ۺ��� �������������� name������ ���� �Ѱ���. �ڿ� Ÿ���ε� name�� value�� ū �ǹ� ����
 -->
<?
define("ADAY",(60*60*24));//86400(�Ϸ翡 �ش��ϴ� ��)
if((!isset($_POST["month"]))||(!isset($_POST["year"]))){//isset():���ǵ��� ���� ������ ���ڷ� �����ϸ� false�� ��ȯ. ������ ���۵� ������ �˻�. ���ǵ��� ���� ������ mktime()�� ȣ���ϸ� ��ȿ�� ��¥�� ������ �� ����
	$nowArray = getdate();//getdate()�� ���� �ð��� �������� �����迭�� ����
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
