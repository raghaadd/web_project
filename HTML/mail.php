<?php
session_start();
$code = rand(999999, 111111);
$_SESSION['codev']=$code;
$flag=0;
$flag1=0;
if($_SESSION['check']==true)
{
    $_SESSION['check']=false;
    $flag=1;
}
if($_SESSION['emailcheck']==true)
{
    $_SESSION['emailcheck']=false;
    $flag1=1;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="Nav_Footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <!--    for anmiation: -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!--    <script src="node_modu  `les/bootstrap/dist/js/bootstrap.bundle.min.js"></script>-->
    <!--    change favicon: -->
    <link rel="shortcut icon" type="image/png" href="../imgs/popcornicon.png" sizes="128x128">
    <!--    for email: -->
    <script src="https://smtpjs.com/v3/smtp.js"></script>


    <style>
        .submit-but{
            cursor: pointer;
            background-color: #a10202;
            color: #FFffff;
            font-size: 20px;
            border-radius: 15px;
            width: 200px;
            height: 30px;
        }
        input[type="password"],
        input[type="email"]{

            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            border-bottom: 2px solid #a10202;;
            background-color: #FFffff;
            color: #242424;
        }



        input::placeholder{
            color: #6c757d;
        }


        img.imgclass{
            width: 500px;
            height: 480px;
            position: absolute;
            top:100px;
            left: 445px;
        }

    </style>
</head>
<body>
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
        <br>

        <center>
            <div class="sign"style="height: 650px;width: 600px;background-color:#FFffff;opacity: 0.9;">
                <div style="width:3px;height: 650px; background-color:#a10202;position: absolute;left: 770px ">
                </div>
                <div style="position: absolute; left: 1%">
                    <form action="verification.php" method="post">
                        <div style="position: absolute; top:135px; left: 510px">
                            <h1 style="color: #a10202;">Forgot Password</h1>
                            <input type="email"  autocomplete="off" name="email" placeholder="Your Email"style="width:200px"><br><br>
                            <input class="submit-but"type="submit" value="Next" name="btn">
                            <?php
                            if ($flag==1)
                            {
                                echo "<h5 style='color: black'>Make sure to fill all fields!</h5>";
                            }
                            elseif ($flag1==1)
                            {
                                echo "<h5 style='color: black'>You Don't Have Previous Account!</h5>";
                            }
                            ?>

                        </div>
                    </form>
                    <!--                    <input type="text" value="hi" id="root">-->
                    <div style="position: absolute; top: 200px;left: 800px">
                        <div style="">
                            <!--                        <iframe src="https://giphy.com/embed/fxa5POpcM0V0k7PrFz" width="480" height="355" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/pointer-flecha-squiggle-fxa5POpcM0V0k7PrFz">via GIPHY</a></p>-->
                            <form action="Sign.php" method="post">
                                <input class="submit-but"type="submit" value="Sign In"><br><br><br>
                            </form>
                            <form action="signup.php">
                                <input class="submit-but"type="submit" value="Sign Up"><br><br><br>
                            </form>
                            <form action="forgotpassword.php">
                                <input class="submit-but"type="submit" value="Forgot Password"><br><br>
                            </form>

                            <iframe src="https://giphy.com/embed/U4cmlXqP1L2iV2w0ys" width="100" height="100" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/stickers/Norwegian-Airlines-norwegian-airlines-air-U4cmlXqP1L2iV2w0ys"></a></p>

                        </div>
                    </div>

                </div>
            </div>

        </center>

        <br>

        <!--Footer: -->
        <div class="footer" id="footerid">

            <div class="container1" >
                <div class="content" style="background-color: #a10202; width: 100%;height:30px">
                    <br><br><br><br>

                </div>

                <div class="left-side" style="background-color:#242424; width: 100%;height: 280px">
                    <div style="float:left;margin-left: 250px">
                        <h5 style="color: white; font-size: 20px; ">
                            CINEMA
                        </h5>
                        <p style="color: #908f91; margin-top: -30px">cinema is a website for the purpose of issuing tickets <br>
                            and check movies that will show during current week

                        </p>
                    </div>
                    <div style="float:left; margin-left: 100px">
                        <h5 style="color: white; font-size: 20px; ">
                            Quick Links</h5>
                        <ul class="footer-ul" style="margin-top:-20px;margin-left: -45px ">
                            <li>
                                <a class="bottom" href="Index.html">Home</a>
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

    </div>


</body>
</html>