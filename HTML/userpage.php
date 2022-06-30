<?php
session_start();
//echo $_SESSION['Email_Address'];
        try {
            $db = new mysqli('localhost', 'root', '', 'cinema');
            $qryStr = "select * from movie";
            $qryStr2="select * from person";
            $res = $db->query($qryStr);
            $res2 = $db->query($qryStr);
            $res3=$db->query($qryStr2);
        } catch (Exception $e)
    {
        echo e;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flash</title>
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="Nav_Footer.css">
    <!--    for anmiation: -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


<!--    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <!--    change favicon: -->
    <link rel="shortcut icon" type="image/png" href="../imgs/popcornicon.png" sizes="128x128">
    <script>

        function f(btn){

            document.getElementById('trytxt1').value=btn.id;
            document.getElementById('trytxt2').value=btn.id;

        }

    </script>


<style>
    #trytxt{
        display: none;
    }
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
    margin-top: -50px;
    text-align: center;
    font-size: 28px;
    font-weight: bold;
    color: #FFffff;
}
h6.movierate{
    margin-top: -30px;
    text-align: center;
    font-size: 28px;
    font-weight: bold;
    color: #FFffff;
}
h2{
    font-size: 36px;
    font-weight: bold;
    color: white;
    padding:0 20px;
    text-align: center;
}

#descmovie{
    visibility: hidden;
    font-size: 20px;
    font-weight: bold;
    color: #FFffff;
    position: relative;
    top: -230px;
    margin-left: 90px;
}
#cid:hover #descmovie{
    opacity: 0.5;
    visibility: visible;
}
.fa {
    color: gold;
    font-size: 1.35em;
    margin: 0 .15em;
}

.book-but{
    cursor: pointer;
    background-color: #FFffff;
    color: #a10202;
    font-size: 20px;
    margin-top: -1000px;
    margin-left: 65px;
    /*border-radius: 15px;*/
    width: 180px;
    height: 40px;
}
.book-but:hover{
    cursor: pointer;
    background-color: #a10202;
    color: #FFffff;
    font-size: 20px;
    margin-top: -1000px;
    margin-left: 65px;
    /*border-radius: 15px;*/
    width: 180px;
    height: 40px;
}
    .trail-but{
        cursor: pointer;
        background-color: #FFffff;
        color: #a10202;
        font-size: 20px;
        margin-top: -1000px;
        margin-left: 65px;
        /*border-radius: 15px;*/
        width: 180px;
        height: 40px;
    }
    .trail-but:hover{
        cursor: pointer;
        background-color: #a10202;
        color: #FFffff;
        font-size: 20px;
        margin-top: -1000px;
        margin-left: 65px;
        /*border-radius: 15px;*/
        width: 180px;
        height: 40px;
    }

#banner {
    margin-top: -20px;
    background: url("../imgs/spider.jpeg");
    background-repeat: no-repeat;
    background-size: cover;
    height:700px;
    width: 100%;
    padding: 6.5em 0;
    opacity: 1;
    backdrop-filter: blur(5px);
}
#banner #banner_content_wrapper{
    width: 900px;
    max-width: 90%;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
}
#banner #poster {
    width: 275px;
    position: relative;
    float: left;
}
#banner #poster .featured_image{
    width: 100%;
    height: 100%;
    max-width: 100%;
    border-radius: .5em;
    -webkit-box-shadow: 0px 0px 76px 0px rgba(0,0,0,0.47);
    -moz-box-shadow: 0px 0px 76px 0px rgba(0,0,0,0.47);
    box-shadow: 0px 0px 76px 0px rgba(0,0,0,0.47);
}
/*#banner #poster .play_button{*/
/*    position: absolute;*/
/*    width: 80px;*/
/*    left: 50%;*/
/*    top: 50%;*/
/*    margin: -40px 0 0 -40px;*/
/*}*/

#banner #banner_content_wrapper #content{
    float: left;
    width: 500px;
    margin-left: 100px;
}

#banner #banner_content_wrapper #content .title{
    display: inline;
    font-size: 1.75em;
    color: white;
}
#banner #banner_content_wrapper #content .ratings{
    display: inline;
    margin-left: 1em;
}
#banner #banner_content_wrapper #content .ratings i{
    color: gold;
    font-size: 1.35em;
    margin: 0 .15em;
}
#banner #banner_content_wrapper #content .ratings .inactive{
    color: lightslategray;
}
#banner #banner_content_wrapper #content .discription{
    color: papayawhip;
    font-size: 1em;
    line-height: 2;
}
#banner #banner_content_wrapper #content .info{
    color: white;
    font-size: .9em;
    font-weight: 700;
    margin-top: 3em;
}
#banner #banner_content_wrapper #content .info span{
    margin: 0 .5em;
}
div.ticket{
    background-color: #FFffff;
    width: 800px;
    height: 500px;
    margin-left: 400px;
    margin-top: 150px;
    border-radius: 80px 0 80px 0;
    display: none;
    /*position: fixed;*/
}
.tdclass{
    margin-left:137px ;
    margin-top: -60px;
}
#trytxt1{
    display: none;
}
#trytxt2{
    display: none;
}
.play_button{
    cursor: pointer;
        position: absolute;
        width: 80px;
        left: 50%;
        top: 50%;
        margin: -40px 0 0 -40px;
        background-image: url('../imgs/play.png');
        background-color: transparent;
    border: none;
        background-size: cover;
        width: 80px;
        height: 80px;
        font-size: 2rem;
}

/*pop up windw stye:  */
    .log_but{
        cursor: pointer;
        background-color: #a10202;
        color:#FFFFFF;
        /*font-size: 20px;*/
        margin-left: 20px;
        /*border-radius: 15px;*/
        width: 100px;
        height: 30px;
    }
    .modal {
        position: absolute;
        top: 180px;
        right: 12px;
        transform: translate(-50%, -50%) scale(0);
        transition: 200ms ease-in-out;
        border: 1px solid black;
        border-radius: 10px;
        z-index: 10;
        background-color: white;
        width: 200px;
        height: 260px;
        max-width: 80%;
    }

    .modal.active {
        transform: translate(-50%, -50%) scale(1);
    }

    .modal-header {
        padding: 10px 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid black;
    }

    .modal-header .title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .modal-header .close-button {
        cursor: pointer;
        border: none;
        outline: none;
        background: none;
        font-size: 1.25rem;
        font-weight: bold;
    }

    .modal-body {
        padding: 10px 15px;
    }

    #overlay {
        position: fixed;
        opacity: 0;
        transition: 200ms ease-in-out;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, .5);
        pointer-events: none;
    }

    #overlay.active {
        opacity: 1;
        pointer-events: all;
    }
    div.pimage{
        margin-left: 20px;
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

<div class="first">
    <div class="back-div">
        <div style="background-color:#a10202; width: 100%;height: 60px;">
            <div id="navbar">
                <div class="collapse navbar-collapse">
                    <div class="container" >
                        <ul class="navbar-nav unorder_title">
                            <li class="nav-item title">
                                FLASH
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 60px; width: 200px; position: absolute; right:70px; top: 0px">
            <a class="top" href="rate.php">
                <img src="../imgs/star.png" style="width: 60px; height: 60px">
            </a>
    </div>
    <div style="height: 60px; width: 200px; position: absolute; right:0px; top: 0px">
        <img src="../imgs/user-profile.png" style="width: 60px; height: 60px" data-modal-target="#modal">
        <div class="modal" id="modal">
            <div class="modal-body">
                <?php
                while($row = mysqli_fetch_array($res3))
                {
                    $email=$_SESSION['Email_Address'];
                    if($email==$row['Email_Address']) {
                            $fname=$row['Fname'];
                            $lname=$row['Lname'];
                            echo '
                               <div class="pimage">
                                    <img src="data:image/jpeg;base64,' . base64_encode($row['profile_image']) . '" height="100" width="100" class="img-thumnail" style="border-radius: 50%"/>
                                   
                               </div>

                     ';


                    }//if
                }//while

        ?>
                <p  style="font-weight:bold;font-size: 18px; margin-left: 20px">
                    <?php
                    echo $fname." ".$lname
                    ?>
                </p>

                <br>
                <form method="post" action="logout.php">
                <button name="Logout" class="log_but">Logout</button>
                </form>
            </div>
        </div>
        <div id="overlay"></div>
    </div>
</div>
        <br>

        <div id="banner" class="clearfix">
        <div id="banner_content_wrapper" style="margin-top: 100px">
            <div id="poster">
                <img src="../imgs/spiderman.jpg" alt="poster" class="featured_image">
                <form method="post" action="spidervideo.php">
                <input type="submit" value=" " class="play_button" style="background-image: url('../imgs/play.png')" >
                </form>
            </div>
            <div id="content">
                <h3 class="title">Spiderman</h3>
                <div class="ratings">
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star inactive" ></i>

                </div>

                <p class="discription">
                    Spider-Man has spider-like abilities including superhuman strength and the ability to cling to most surfaces.
                    He is also extremely agile and has amazing reflexes.
                    Spider-Man also has a “spider sense,” that warns him of impending danger.
                    Spider-Man has supplemented his powers with technology.
                </p>

                <p class="info">2h 16m <span>|</span> Action, adventure, science fiction <span>|</span> 12 December 2021</p>

            </div>

        </div>
        </div>



        <center>
            <h2 data-aos="fade-right">Coming This Week</h2>
        <table>

            <tr data-aos="fade-right">
                <?php
                while ($row=mysqli_fetch_assoc($res))
                {
                ?>
                    <td id="cid" class="coloumphoto" data-aos="fade-right"><img class="movie" src="<?php echo $row['photo'];?>">
                        <div id="descmovie">  <i class="fa fa-video" style="color: white; font-size:18px"></i> <?php echo $row['description'];?><br>
                            <br><i class="fa fa-calendar" style="color: white; font-size:18px"></i> <?php echo $row['showDate'];
//                            $_SESSION['showDate']=$row['showDate'];  $_SESSION['hallNum']=$row['hallNum'];
                            ?>

                        </div>
                    </td>

                    <?php

                }
                ?>
            </tr>
            <tr>

                <?php
                while ($row=mysqli_fetch_assoc($res2))
                {
                ?>
                    <td data-aos="fade-right">
                        <h6 class="moviename"><?php echo $row['Mname'];?></h6>
                <h6 class="movierate"><i class="fa fa-star" ></i><?php echo $row['rate'];?>/10</h6>
                        <form method="post" action="ticket.php">
                <input class="book-but" type="submit" value="Get Tickets" name="ticket_but" id="<?php echo $row['Mname'];?>" onclick="f(this)"><br><br>

                    </td>

                    <?php
                }
                ?>
            </tr>
        </table>
        </center>

<br><br>
        <input type="text" id="trytxt1" name="moviename1">

        </form>
        <br><br>
<form method="post" action="video.php" class="tdclass">
    <td>
        <input class="book-but" type="submit" value="View Trail" name="view_but" onclick="f(this)" id="Luca" >
<!--        <input type="text" id="trytxt2" name="moviename2">-->

    </td>
    <td>
        <input class="book-but" type="submit" value="View Trail" name="view_but" style="margin-left:130px;" onclick="f(this)" id="Mulan">
    </td>
    <td>
        <input class="book-but" type="submit" value="View Trail" name="view_but" style="margin-left:130px;" onclick="f(this)" id="Spiderman">
    </td>
    <td>
        <input class="book-but" type="submit" value="View Trail" name="view_but" style="margin-left:130px;" onclick="f(this)" id="The Martain">
    </td>
    <input type="text" id="trytxt2" name="moviename2">
</form>
<br>
<br>
<br>
<!--<center>-->
<!--    <table>-->
<!--        <tr data-aos="fade-right">-->
<!--          -->
<!--        </tr>-->
<!--    </table>-->
<!--</center>-->
<!--footer: -->
<div class="footer" id="footerid" >
    <div class="container2" >
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
                        <a class="bottom" href="test2.html">Home</a>
                    </li>
                    <li>
                        <a class="bottom" href="#about" >About</a>
                    </li>
                    <li>
                        <a class="bottom" href="#about1"  >Browse</a>
                    </li>
                    <li>
                        <a class="bottom" href="SignIn.html">Sign In</a>
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




<script>
    // var $moanavideo = $('.moanavideo');
    //
    // $moanavideo.on('mouseenter',function (){
    //     $moanavideo.get(0).play();
    // });
    //
    // $moanavideo.on('mouseout',function(){
    //     $moanavideo.get(0).pause()
    // });

    var figure = $(".video").hover( hoverVideo, hideVideo );

    function hoverVideo(e) {
        $('video', this).get(0).play();
    }

    function hideVideo(e) {
        $('video', this).get(0).pause();
    }
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
        <!--script to make things move: -->
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                // offset:400,
                duration:1000
            });
        </script>

<!--popup window-->
<script>
    const openModalButtons = document.querySelectorAll('[data-modal-target]')
    const closeModalButtons = document.querySelectorAll('[data-close-button]')
    const overlay = document.getElementById('overlay')

    openModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modal = document.querySelector(button.dataset.modalTarget)
            openModal(modal)
        })
    })

    overlay.addEventListener('click', () => {
        const modals = document.querySelectorAll('.modal.active')
        modals.forEach(modal => {
            closeModal(modal)
        })
    })

    closeModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modal = button.closest('.modal')
            closeModal(modal)
        })
    })

    function openModal(modal) {
        if (modal == null) return
        modal.classList.add('active')
        overlay.classList.add('active')
    }

    function closeModal(modal) {
        if (modal == null) return
        modal.classList.remove('active')
        overlay.classList.remove('active')
    }
</script>
</body>
</html>
