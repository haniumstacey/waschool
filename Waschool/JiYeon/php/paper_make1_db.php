<?ob_start();?>	<!-- 이게 있어야, 출력문을 바로 출력시키지 않고 그 내용을 임시 버퍼에 저장시켰다가, 다음 header, setcookie, session 등을 진행시킨다. -->
<meta charset="utf-8"> <!-- 책에는 없으나, 한글 깨짐 현상을 해결하기 위해 세 줄의 코드를 추가한다. -->

<?PHP
include("paper_config.cfg");
include("paper_functions.inc");

//원래 이 주석을 포함한 4 개 줄은 없던 코드 세 줄인데, get 형식으로 paper_write.php 에서 작성자, 제목, 내용을 받아오면 그나마 가능할까 싶어서 써본다.
$subject = $_POST['subject'];
$papername = $_POST['papername'];
$questionnumber = $_POST['questionnumber'];
$paperimage = $_POST['paperimage'];
$paperintroduce = $_POST['paperintroduce'];

#----------앞뒤 스페이스 제거----------#
$papername = trim($papername);
$paperintro = trim($paperintro);

#----------입력값 이상유무 확인----------#
if ( !$papername )
{
	error("학습지 이름은 지어주셔야 합니다.");
	exit;
}

#----------데이터베이스 연결----------#
$con = mysql_connect("14.63.223.180", "root", "haniumwaschool");
mysql_select_db("waschool", $con);
mysql_query("set names utf8;");


#----------uid, gid 결정----------#
$query = "select MAX( papercode ) as gid from paperassign";
$result = mysql_query( $query ) or die( mysql_error() );	//papercode 가 아무것도 없을 때도 이 코드가 실행된다. 기본값이 0 으로 되어 있는 것일까?
$papercode = current(mysql_fetch_array( $result ));
$papercode = $papercode + 1;
//우리는 이 부분 대신에, papersendtime 에 기초하여 paperassign 테이블을 내림차순 정렬시키는 코드가 필요하다.

#----------paperassign 테이블에 삽입----------#
#----------papercode 라는 기본키에 임의로 1 이라는 숫자를 넣고 있는데, auto_increment 로 설정 변경해줄 것----------#
$query = "insert into paperassign
( id, papercode, papername, subject, questionnumber, paperintroduce )
values ( 'test', $papercode, '$papername', '$subject',
	$questionnumber, '$paperintroduce' )";
	mysql_query( $query ) or die( mysql_error() );

	#----------paperinfo 테이블에도 삽입----------#
	$query2 = "insert into paperinfo ( papercode, questionnumber, subject )
	values ( $papercode, $questionnumber, '$subject' )";
	mysql_query( $query2 ) or die ( mysql_error() );
	mysql_close( $con );

	forward("./paper_make2.php?papercode=$papercode&questionnumber=$questionnumber");
?>