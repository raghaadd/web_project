<?php
session_start();
$flag=0;
$flagemail=false;
$flagcode=false;
if(isset($_POST['btn']))
{
    if($_POST['email']==null)
    {
        $_SESSION['check']=true;
        header('Location:forgotpassword.php');
    }

}
if($_SESSION['checkcode']==true)
{
    $_SESSION['checkcode']=false;
    $flag=1;
}
if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $_SESSION['email']=$email;
    try {
        $db = new mysqli('localhost', 'root', '', 'cinema');
        $qryStr = "select * from person";
        $qryStr2 = "select * from customer";

        $res = $db->query($qryStr);
        $res2 = $db->query($qryStr2);
        for($i=1;$i<$row=mysqli_fetch_assoc($res);$i++){
            if($row['Email_Address']==$email)
            {   $flagemail=true;
                $presonalid=$row['personal_ID'];
                for($i=1;$i<$row2=mysqli_fetch_assoc($res2);$i++){
                    if($row2['personal_ID']==$presonalid)
                    {
                        $cid=$row2['C_ID'];
                        $_SESSION['C_ID']=$cid;
                        if($row2['code']==$_SESSION['codev'])
                        {
                            $flagcode=true;
                        }
                    }
                }
            }
        }
        if($flagemail==false)
        {
            header('Location:forgotpassword.php');
            $_SESSION['emailcheck']=true;
        }
        else{
            $code = $_SESSION['codev'];
            $edit = mysqli_query($db, "update customer set `code` = '$code' where C_ID='$cid'");
            if ($edit) {
                mysqli_close($db);

            } else {
                echo mysqli_error();
            }


        }

    } catch (Exception $e) {
        echo e;
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <!--    change favicon: -->
    <link rel="shortcut icon" type="image/png" href="../imgs/popcornicon.png" sizes="128x128">
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
        input[type="text"]{
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

        /Remove Arrows/Spinners/
             /* Chrome, Safari, Edge, Opera */
         input::-webkit-outer-spin-button,
         input::-webkit-inner-spin-button {
             -webkit-appearance: none;
             margin: 0;
         }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }



    </style>
</head>
<body onload="sendEmail() f()">
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
            <div class="sign"style="height: 350px;width: 500px;background-color:#FFffff;opacity: 0.9; border-radius: 10px;  margin-top: 100px; margin-bottom: 100px">
                <div style="position: absolute; left: 1%">
                    <form action="updatePassword.php" method="post">
                        <div style="float:left; margin-left: 620px; margin-top: 50px; ">
                            <h1 style="color: #a10202;">Code Verification</h1>
                            <input type="text"  autocomplete="off" name="code" placeholder="Code Verification"style="width:200px"><br><br>
                            <input class="submit-but"type="submit" value="Verify" name="vbtn">
                            <?php
                            if ($flag==1)
                            {
                                echo "<h5 style='color: black'>Make sure to enter Valid Value!</h5>";
                            }
                           ?>

                        </div>
                    </form>
                </div>
            </div>

        </center>

        <br>
        <form method="post" action="verification.php">
            <input id="txt1" value="<?php echo $code?>" style="display: none">
            <input type="text" id="tt" value="<?php $email ?>" style="display: none">
        </form>


        <!--Footer: -->
        <div class="footer" id="footerid">

            <div class="container1" >
                <div class="content" style="background-color: #a10202; width: 100%;height:30px">
                    <br><br><br><br>

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

    <!--alert box -->
    <script>
        function CustomAlert(){
            this.render = function(dialog){
                var winW = window.innerWidth;
                var winH = window.innerHeight;
                var dialogoverlay = document.getElementById('dialogoverlay');
                var dialogbox = document.getElementById('dialogbox');
                dialogoverlay.style.display = "block";
                dialogoverlay.style.height = winH+"px";
                dialogbox.style.left = (winW/2) - (550 * .5)+"px";
                dialogbox.style.top = "100px";
                dialogbox.style.display = "block";
                document.getElementById('dialogboxhead').innerHTML = "Acknowledge This Message";
                document.getElementById('dialogboxbody').innerHTML = dialog;
                document.getElementById('dialogboxfoot').innerHTML = '<button onclick="Alert.ok()">OK</button>';
            }
            this.ok = function(){
                document.getElementById('dialogbox').style.display = "none";
                document.getElementById('dialogoverlay').style.display = "none";
            }
        }
        var Alert = new CustomAlert();
    </script>

    <script>

        function sendEmail(){
            // alert("hiii");
            let name="raghad"
            let email=document.getElementById('tt').value;
            let message=document.getElementById('txt1').value;
            Email.send({
                Host : "smtp.gmail.com",
                Username : "ciiinema22@gmail.com",
                Password : "0599333773an",
                To : 'ciiinema22@gmail.com',
                From : "ciiinema22@gmail.com",
                Subject : "Hello "+email,
                Body : "You have asked to reset your password this is your verification code: "+message
            }).then(
                message=> alert('Message Sent Successfully.')
                // Alert.render('Message Sent Successfully.')
            );
        }
        sendEmail();

    </script>



</body>
</html>


