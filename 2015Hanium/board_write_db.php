<?ob_start();?>	<!-- 이게 있어야, 출력문을 바로 출력시키지 않고 그 내용을 임시 버퍼에 저장시켰다가, 다음 header, setcookie, session 등을 진행시킨다. -->
<meta charset="utf-8"> <!-- 책에는 없으나, 한글 깨짐 현상을 해결하기 위해 세 줄의 코드를 추가한다. -->

<?PHP
include("board_config.cfg");
include("board_functions.inc");

//원래 이 주석을 포함한 4 개 줄은 없던 코드 세 줄인데, get 형식으로 board_write.php 에서 작성자, 제목, 내용을 받아오면 그나마 가능할까 싶어서 써본다.
$name = $_POST['name'];
$subject = $_POST['subject'];
$article = $_POST['article'];

#----------앞뒤 스페이스 제거----------#
$name = trim( $name );
$subject = trim( $subject );
$writedate = date( "y-m-d" );
$article = trim( $article );

#----------입력값 이상유무 확인----------#
if ( !$subject || !$article )
{
	error("입력값이 부족합니다.");
	exit;
}

#----------데이터베이스 연결----------#
$con = mysql_connect( "localhost", "root", "apmsetup" );
mysql_select_db( "hanium", $con );

#----------uid, gid 결정----------#
$query = "select MAX( gid ) as gid from board";
$result = mysql_query( $query ) or die( mysql_error() );
$gid = current(mysql_fetch_array( $result ));
$gid = $gid + 1;

#----------board 테이블에 글 삽입----------#
$query = "insert into board
( gid, name, subject, article, writedate )
values ( $gid, '$name', '$subject',
	'$article', '$writedate' )";
	mysql_query( $query ) or die( mysql_error() );
	mysql_close( $con );

	forward("./board_list.php");
?>