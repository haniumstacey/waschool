<meta charset="utf-8"> <!-- 책에는 없으나, 한글 깨짐 현상을 해결하기 위해 세 줄의 코드를 추가한다. -->

<?PHP include("./paper_functions.inc"); ?>

<html>
<head>
	<style>
	<!--

	<?PHP include( "./paper_common_style.inc" ); ?>

	.ques_head
	{
		/*background-color: #F9E79D;*/
		text-align: center;
	}
	-->
	</style>
</head>
<body>
	<form name="write_form" method="post" action="paper_make1_db.php">
		<center>
			<form name="form1">
			<p><img src ="images/noname01.png" width="54" height="54" border="0" >
				<img src="images/waschool.png" width="209" height="108" border="0" alt="waschool.png">
				<input type="submit" name="login" value="로그인">
			</p>
		</form>
			<table>
				<tr><td><h2>학습지 등록</h2></td></tr>
				<tr>
					<td class="ques_head"><h4>과목분류: </h4></td>
					<td class="input_td">
						<select name="subject">
							<option>국어</option>
							<option>수학</option>
							<option>영어</option>
							<option>사회</option>
							<option>과학</option>
							<option>기타</option>
						</select>
					</td>
				<tr>
					<td class="ques_head"><h4>학습지명: </h4></td>
					<td class="input_td">
						<input type="text" name="papername" size="50" maxsize="255">
					</td>
				</tr>
				<tr>
					<td class="ques_head"><h4>문항수: </h4></td>
					<td class="input_td">
						<select name="questionnumber">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
						</select>
					</td>
				</tr>
								<tr>
					<td class="ques_head"><h4>표지등록: </h4></td>
					<td class="input_td">
						<input type="file" name="paperimage" size="50" maxsize="255">
					</td>
				</tr>
								<tr>
					<td class="ques_head"><h4>학습지소개: </h4></td>
					<td class="input_td">
						<input type="text" name="paperintroduce" size="50" maxsize="255">
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td width="100">&nbsp;</td>
					<td width="100" align="right"><input type="submit" value="다음"></td>
				</tr>
			</table>
	</form>	
		<form name="form2">
			<p><img src="images/hone.png" width="48" height="46" border="0" alt="hone.png"> <img src="images/messasge.png" width="51" height="46"
				border="0" alt="messasge.png"> <img src="images/mypage.png" width="49" height="50" border="0" alt="mypage.png"> <img src="images/mileage.png"
				width="50" height="50" border="0" alt="mileage.png"> <img
				src="images/gift.png" width="49" height="50" border="0" alt="gift.png">
			</p>
		</form>
</center>
</body>
</html>