<?
if(!isset($_SESSION))//Headers already sent" means that your PHP script already sent the HTTP headers, and as such it can't make modifications to them now.
{

session_start();
echo $_SESSION["id"];
    if($_SESSION["id"]==""){
        $temp = 1;//id가 설정되지 않은 경우
    }
    else
        $temp = 2;
    
}?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<center>
<head>
    <title>Insert title here</title>
<title>Example of Bootstrap 3 Carousel</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">
.carousel{
    background: #2f4357;
    margin-top: 20px;
}
.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
}
.bs-example{
	margin: 20px;
}
</style>
    <style>
    .updown{
        background-color: #BECDFF;
    }
    </style>
<style type="text/css">
.carousel{
   /* background: #2f4357;*/
    background: #FFFFFF;
    margin-top: 20px;
}
.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
}
.bs-example{
    margin: 20px;
}
</style>
</head>



    <body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
            <form name="form1" class="updown">
            <p>
                <a href="#" onClick="window.location.reload();"><img src ="noname01.png"  width="54" height="54" border="0"></a> 
                <img src="waschool.png" width="209" height="108" border="0" alt="waschool.png">
                <?if($temp == 1)//isset: 변수가 설정되었을때 여기서는 변수가 생성되지 않았을 때 if문 안으로 
                    {
                        ?>  
                        

                    <!-- bootstrap쓰기전에 로그인 안에 들어갔었음style="width:70px;height=30px" -->
                <input type=button class="btn btn-default btn-group-lg" value="로그인" style="width:70px;height=30px"onclick="location.href='haniumlogin.html'" />
            
                <? } else{?>    
                <input type=button class="btn btn-default btn-group-lg" value="로그아웃" style="width:70px;height=30px"onclick="location.href='haniumlogout.php'" />
                <?}?>
            
            </p>
        </form>
            <p>
                
            </p>
<div class="bs-example">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>   
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="image1.png" alt="First Slide" onclick = "location.href='paper_list.php'">
            </div>
            <div class="item">
                <img src="image2.png" alt="Second Slide"onclick = "location.href='board_list.php'">
            </div>
            <div class="item">
                <img src="image3.png" alt="Third Slide"onclick="location.href='haniumScore.php'">
            </div>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
    <p>
                &nbsp;
            </p>
            <p>
                &nbsp;
            </p>

            

             <form name="form2" class="updown">
            <p><a href="FirstPage.php"><img src="hone.png" width="48" height="46" border="0" alt="hone.png"></a> <a href="message/haniumMessageForm_1.php"><img src="messasge.png" width="51" height="46"
                border="0" alt="messasge.png"></a> <a href="mypage_base.php"><img src="mypage.png" width="49" height="50" border="0" alt="mypage.png"></a> <a href="haniummileage.php"><img src="mileage.png"
                width="50" height="50" border="0" alt="mileage.png"></a><a href="gift_base.php"> <img
                src="gift.png" width="49" height="50" border="0" alt="gift.png"></a>
            </p>

        </form> 
        <p>
            &nbsp;
        </p>
    </body>
</center>
</html>