<?php
try {
    $db = new mysqli('localhost', 'root', '', 'cinema');
    $qryStr = "select * from movie";
    $res = $db->query($qryStr);
} catch (Exception $e)
{
    echo e;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Flash</title>
    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="Nav_Footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

    <!--    for anmiation: -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!--    change favicon: -->
    <link rel="shortcut icon" type="image/png" href="../imgs/popcornicon.png" sizes="128x128">

    <style>
        @media screen and (max-width: 988px)  {
            #navbar{
                padding: 2px !important;
                width: 100% !important;
            }

        }

        .top-div{
            margin: 0;
            width: 0px;
            height: 0px;
            border-bottom:442px solid #a10202;
            border-top: 250px solid #a10202;
            border-left: 759px solid  #a10202;
            border-right: 759px solid white;
        }

        img.imgclass{
            width: 500px;
            height: 480px;
            position: absolute;
            top:100px;
            left: 445px;
        }
        /*    anchor style */
        a.top {
            font-size: 20px;
            font-weight: bold;
            color: white;
            position: relative;
            text-decoration: none;
            transition: color .4s ease-out;
        }

        a.top:hover {
            color:#ff6363;
            right: 0;
            text-decoration: none;
        }

        a.top:hover:after {
            border-color: white;
            right: 0;
        }

        a.top:after {
            border-radius: 1em;
            border-top: 2px solid #a10202;
            content: "";
            position: absolute;
            right: 100%;
            bottom: .14em;
            left: 0;
            transition: right .4s cubic-bezier(0,.5,0,1),
            border-color .4s ease-out;
        }

        a.top:hover:after {
            animation: anchor-underline 2s cubic-bezier(0,.5,0,1) infinite;
            border-color: white;
        }

        @keyframes anchor-underline {
            0%, 10% {
                left: 0;
                right: 100%;
            }
            40%, 60% {
                left: 0;
                right: 0;
            }
            90%, 100% {
                left: 100%;
                right: 0;
            }
        }

        /*    unordered list style*/
        .container{
            margin: 0;
            position: absolute;
            top: 0px;
            left:10px;

        }
        .cont2{
            margin: 0;
            position: absolute;
            top: 0px;
            left:400px;

        }

        ul.unordered-list-class{
            text-align: left;
            list-style-type: none;
            font-size: 4rem;
            display: inline;
        }
        ul.unordered-list-class li{
            float: left;
            padding-top: 0px;
            padding-left: 20px;
            color: white;
            text-transform: capitalize;
        }

        ul.unorder_title li{
            float: left;
            color: white;
            text-transform: uppercase;
            transition: all 2s linear;
        }
        ul.unorder_title{
            text-align: left;
            list-style-type: none;
            font-size: 4rem;
            display: inline;

        }


        /*    slide show style: */
        .slideshow-container{
            position: absolute;
            top:270px;
            left: 120px;
        }

        .prev, .next {
            position: relative;
            cursor: pointer;
            width: auto;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 30px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            border: none;
            user-select: none;
        }
        .next {
            top:-35px;
            left:290px;
            right: 0;
            border-radius: 3px 0 0 3px;
        }
        .prev{
            top:-35px;
            left:-55px;
        }


        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
            color:#ff6363;
            right: 0;
            text-decoration: none;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            width: 100%;
            text-align: center;
        }
        .title-text {
            color: #f2f2f2;
            font-size: 30px;
            padding: 8px 12px;
        }
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 20px 2px;
            background-color: white;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        span.dot.active, .span.dot:hover {
            background-color: #ff6363;
        }
        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }
        .put-image{
            position: absolute;
            top: -100px;
            left:1080px;
            width: 300px;
            height: 300px;

        }

        /*Shareet al-cinema*/
        div.tape-img{
            width:1517px;
            height: 35px;
            background-image: url("../imgs/tape.png");
            background-size: 100%;
            /*This to put image in the top of the div*/
            background-position-y: -335px;
        }

        div.about-class h3{
            font-weight: bold;
            font-size: 28px;
            color: white;
            text-align:center;
        }

        div.about-class p{
            font-size: 14px;
            color: white;
            text-align:center;
        }



        /*    styling for images tb3on al movies*/
        h2{
            font-size: 28px;
            font-weight: bold;
            color: white;
            padding:0 20px;
            text-align: center;
        }
        div.photo{
            width: 200px; font-size: 14px; font-weight: bold; height: 300px;
            color: #a10202;
            margin: 5px 5px 5px 20px; text-align: center;
            padding: 20px; float: left;
        }
        div.allphoto{
            margin:200px;
            margin-top: 50px;
            width: 1100px;
        }


        /*tb3on why us?*/
        .trysome{
            margin: 90px;
            background-color: white;
            width:200px;
            height: 300px;
            float: left;
            alignmt: cenenter;
            background-image:url("../imgs/4.png") ;

        }
        .insidetrysome{
            position: relative;
            background-color: #a10202;
            width: 200px;
            height: 290px;
            transition: top ease 0.5s;
            alignmt: cenenter;
            background-image:url("../imgs/1.png") ;
        }
        .insidetrysome:hover{
            top:-10px;
            height: 10px;

        }



        .trysome1{
            margin: 90px;
            background-color: white;
            width:200px;
            height: 300px;
            float: left;
            alignmt: cenenter;
            background-image:url("../imgs/5.png") ;

        }
        .insidetrysome1{
            position: relative;
            background-color: #a10202;
            width: 200px;
            height: 290px;
            transition: top ease 0.5s;
            alignmt: cenenter;
            background-image:url("../imgs/2.png") ;
        }
        .insidetrysome1:hover{
            top:-10px;
            height: 10px;

        }




        .trysome2{
            margin: 90px;
            background-color: white;
            width:200px;
            height: 300px;
            float: left;
            alignmt: cenenter;
            background-image:url("../imgs/6.png") ;

        }
        .insidetrysome2{
            position: relative;
            background-color: #a10202;
            width: 200px;
            height: 290px;
            transition: top ease 0.5s;
            alignmt: cenenter;
            background-image:url("../imgs/3.png") ;
        }
        .insidetrysome2:hover{
            top:-10px;
            height: 10px;

        }
        div.about-class h4{
            font-weight: bold;
            font-size: 28px;
            letter-spacing: 4px;
            color: white;
            text-align:center;
        }
    /*    movies style: */
        .movie{
            width: 250px;
            height: 300px;
            padding: 30px;
            border-radius:10%;
            transition: opacity 0.25s;

        }
        .movie:hover{
            opacity: 0.05;
        }

        h6.moviename{
            margin-top: -10px;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: #FFffff;
        }
        h6.movierate{
            margin-top: -70px;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: #FFffff;
        }
        #descmovie{
            visibility: hidden;
            font-size: 20px;
            font-weight: bold;
            color: #FFffff;
            position: relative;
            top: -300px;
            margin-left: 20px;
        }
        #cid:hover #descmovie{
            visibility: visible;

        }
        .fa {
            color: gold;
            font-size: 1.35em;
            margin: 0 .15em;
        }


    /*    go to top: */
        html{
            scroll-behavior: smooth;
        }
        .gotop{
            position: fixed;
            width: 50px;
            height: 50px;
            background-color: #a10202;
            border-radius: 50px;
            bottom: 40px;
            right: 50px;
            text-decoration: none;
            text-align: center;
            line-height: 50px;
            color: #f0f0f0;
        }

    </style>
</head>

<body>
<div class="intro">
    <h1 class="logoheader">
            <span class="logo">FLA<span class="logo">SH</span>
            </span>
    </h1>
</div>
<a href="#" class="gotop"><i class="fas fa-arrow-up"></i></a>
<div class="back-div" >
    <div class="top-div">
        <div id="navbar">
            <div class="collapse navbar-collapse" >
                <div class="container">
                    <ul class="navbar-nav unorder_title">
                        <li class="nav-item title">
                            FLASH
                        </li>
                    </ul>
                </div>
                <div class="container cont2">
                    <ul class="navbar-nav unordered-list-class">
                        <li class="nav-item "  >
                            <a class="top" href="index.php"><i class="fa fa-home" style="font-size: 20px; color: white"></i>Home</a>
                        </li>
                        <li class="nav-item "  >
                            <a class="top" href="#about" onclick="frameLooper();" ><i class="fas fa-user-friends" style="font-size: 19px; color: white"></i>About</a>
                        </li>
                        <li class="nav-item " >
                            <a class="top" href="#about1"><i class="fa fa-search" style="font-size: 19px; color: white"></i>Browse</a>
                        </li>

                        <li class="nav-item " >
                            <a class="top" href="sendMail.php"><i class="fa fa-address-book" style="font-size: 19px; color: white"></i>Contact US</a>
                        </li>
                        <li class="nav-item " >
                            <a class="top" href="Sign.php"><i class="fa fa-sign-in-alt" style="font-size: 20px; color: white"></i>Sign In</a>
                        </li>

                    </ul>
                </div>
            </div>
            <img class="imgclass" src="../imgs/cinemacamera.png">
        </div>
    </div>

    <div class="slideshow-container" >

        <div class="mySlides fade">
            <div class="title-text">Enjoy The Best Movies!</div>
            <div class="put-image">
                <img src="../imgs/movie.gif" style="width: 300px; height: 360px;margin-top: -65px">
            </div>
            <div class="text">We provide you with newest movies every week</div>
        </div>

        <div class="mySlides fade">
            <div class="title-text">Book Your Tickets!</div>
            <div class="put-image">
                <img src="../imgs/rabbit.gif" style="width: 300px; height: 300px">
            </div>
            <div class="text">You can book your tickets through our platform easily</div>
        </div>

        <div class="mySlides fade">
            <div class="title-text">The Best Movie Snacks!</div>
            <div class="put-image">
                <img src="../imgs/cat.gif" style="width: 300px; height: 300px">
            </div>
            <div class="text">we provide the best movies snacks</div>
        </div>


        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

    </div>
    <div class="tape-img" id="about">

    </div>

</div>
<br>

<div class="about-class" style="height: 560px;">
    <h3>About Us</h3>
    <br><br>
    <center>
        <div style="width: 600px;height: 100px; margin-top:-50px">
            <p id="type-text" style="font-size: 20px;">
            </p>
        </div>
    </center>

    <center>
        <h4 data-aos="fade-right">Why Us ?</h4>
        <div style="width: 1200px; height: 100px; margin-top: -50px" data-aos="fade-right">
            <div class="trysome">

                <div class="insidetrysome">

                </div>
            </div>

            <div class="trysome1">
                <div class="insidetrysome1">

                </div>
            </div>

            <div class="trysome2">
                <div class="insidetrysome2">

                </div>
            </div>
        </div>
    </center>

</div>

<br><br><br><br>

<div class="tape-img" id="about1">

</div>
<br><br><br>
<center>
    <h2 data-aos="fade-right">Coming This Week</h2>
    <table>

        <tr data-aos="fade-right">
            <?php
            while ($row=mysqli_fetch_assoc($res))
            {
                ?>
                <td id="cid" class="coloumphoto" data-aos="fade-right"><img class="movie" src="<?php echo $row['photo'];?>">
                    <h6 class="moviename"><?php echo $row['Mname'];?></h6>
                    <div id="descmovie">
                        <h6 class="movierate">Rating:<br><i class="fa fa-star" ></i><?php echo $row['rate'];?>/10</h6>
                    </div>
                    </td>

                <?php
            }
            ?>
        </tr>
    </table>
</center>
<br><br><br>

<div class="tape-img" id="about2">

</div>

<div class="map" >
    <h2>Our Location</h2>
    <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Palestine,%20Nablus&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123movies</a><br>
            <style>.mapouter{position:relative;text-align:center;height:500px;width:100%; }</style>
            <a href="https://www.embedgooglemap.net">google maps embed responsive</a>
            <style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style>
        </div></div>

</div>


<!--Footer: -->
<div class="footer" id="footerid">
    <div class="container1" >
        <div class="content" style="background-color: #a10202; width: 100%;height: 150px">
            <br><br><br><br>
            <form method="post" action="sendMail.php">
                <span style="color: white; font-size: 20px; font-weight: bold;margin-left: 100px; margin-top: 20px">If You Have Any Problem Feel Free to Contact Us</span><br>
                <button class="button1">Contact Us</button>
            </form>
        </div>

        <div class="left-side" style="background-color:#242424; width: 100%;height: 280px">
            <div style="float:left;margin-left: 250px">
                <h5 style="color: white; font-size: 20px; ">
                    FLASH
                </h5>
                <p style="color: #908f91; margin-top: -30px">Flash is a website for the purpose of issuing tickets <br>
                    and check movies that will show during current week

                </p>
            </div>
            <div style="float:left; margin-left: 100px">
                <h5 style="color: white; font-size: 20px; ">
                    Quick Links</h5>
                <ul class="footer-ul" style="margin-top:-20px;margin-left: -45px ">
                    <li>
                        <a class="bottom" href="index.php">Home</a>
                    </li>
                    <li>
                        <a class="bottom" href="#about" >About</a>
                    </li>
                    <li>
                        <a class="bottom" href="#about1"  >Browse</a>
                    </li>
                    <li>
                        <a class="bottom" href="Sign.php">Sign In</a>
                    </li>
                </ul>

            </div>
            <div style="margin-top: 20px; margin-left:200px;float: left">
                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic" style="color: white">Address</div>
                    <div class="text-one"  style="color: #908f91;">Palestine, Nablus</div>
                    <div class="text-two"  style="color: #908f91;">Bayt Wazan</div>
                </div>
                <div class="phone details">
                    <i class="fas fa-phone-alt" style="margin-top: 20px"></i>
                    <div class="topic" style="color: white">Phone</div>
                    <div class="text-one"  style="color: #908f91;">+970 597 602 354</div>
                    <div class="text-two"  style="color: #908f91;">+0096 3434 5678</div>
                </div>
                <div class="email details">
                    <i class="fas fa-envelope" style="margin-top: 20px"></i>
                    <div class="topic" style="color: white">Email</div>
                    <div class="text-one" style="color: #908f91;">zainarami2002@gmail.com</div>
                    <div class="text-two" style="color: #908f91;">raghadsalameh926@gmail.com</div>
                </div>
            </div>

        </div>
        <center>
            <div>
                <p style="color: #908f91; font-size: 15px; text-transform: capitalize">copy right 2021 web @All right reserved</p>
            </div>
        </center>

    </div>

</div>

<!--Display text letter by letter -->
<script>
    let myText=' Our mission is to entertainment our users and provide them with the newest movies' +
        '';
    let myArray=myText.split("");
    // alert(myArray);
    let loopTimer;
    function frameLooper(){
        if(myArray.length>0)
        {

            document.getElementById("type-text").innerHTML +=myArray.shift();
        }
        else{
            clearTimeout(loopTimer);
            return false;
        }
        loopTimer=setTimeout('frameLooper()',30);
    }
</script>


<!--javascript for body slideshow -->
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>

<!--javascript for body slideshow -->
<script>
    let sliderImage=document.querySelectorAll('.slide'),
        arraowleft=document.querySelector('#arrow-left'),
        arrowright=document.querySelector('#arrow-right'),
        current=0;
    //clear all images:
    function reset(){
        for(let i=0;i<sliderImage.length;i++)
        {
            sliderImage[i].style.display='none';
        }
    }

    //init slider
    function startSlide(){
        reset();
        sliderImage[0].style.display='block';
    }

    //show prev
    function slideLeft(){
        reset();
        sliderImage[current-1].style.display='block';
        current--;
    }

    //show next
    function slideRight(){
        reset();
        sliderImage[current+1].style.display='block';
        current++;
    }

    //right arrow click
    arrowright.addEventListener('click',function (){
        if(current===sliderImage.length-1){
            current=-1;

        }
        slideRight();
    });
    startSlide();

</script>

<!--script to make things move: -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        // offset:400,
        duration:1000
    });
</script>

<!--Javascript for splash loading -->
<script>
    let intro=document.querySelector(".intro");
    let logo=document.querySelector(".logoheader");
    let logospan=document.querySelectorAll(".logo");
    window.addEventListener('DOMContentLoaded',()=>{
        setTimeout(()=>{
            logospan.forEach((span,idx)=>{
                setTimeout(()=>{
                    span.classList.add('active');
                },(idx+1)+400)
            });
            setTimeout(()=>{
                logospan.forEach((span,idx)=>{
                    setTimeout(()=>{
                        span.classList.remove('active');
                        span.classList.add('fade');
                    },(idx+1)*50)
                })
            },2000)
            setTimeout(()=>{
                intro.style.top='-100vh';
            },2300)
        })
    })

</script>

</body>

</html>
