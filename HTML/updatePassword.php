<?php
session_start();
$flagpass=false;
$db = new mysqli('localhost', 'root', '', 'cinema');

if(isset($_POST['vbtn']))
{
    $code = $_POST['code'];
    if($_POST['code']==null)
    {
        $_SESSION['checkcode']=true;
        header('Location:verification.php');
    }
    else{
    $qryStr = "select * from customer";
    $res = $db->query($qryStr);
    for ($i = 1; $i < $row = mysqli_fetch_assoc($res); $i++) {
        if ($row['C_ID'] == $_SESSION['C_ID']) {
            if ($row['code'] != $_POST['code']) {
                $_SESSION['checkcode']=true;
                header('Location:verification.php');
            }

        }
    }
    }


}
if(isset($_POST['passworddd'])&& isset($_POST['confpass'])) {

    $code = $_SESSION['codev'];
    $password = $_POST['passworddd'];
    $confirm = $_POST['confpass'];
    $cid = $_SESSION['C_ID'];
    try {
        $db = new mysqli('localhost', 'root', '', 'cinema');
        $qryStr = "select * from customer";
        $res = $db->query($qryStr);
        for ($i = 1; $i < $row = mysqli_fetch_assoc($res); $i++) {
            if ($row['C_ID'] == $_SESSION['C_ID']) {
                if ($row['code'] == $code) {
                    if ($password == $confirm) {
                        $edit = mysqli_query($db, "update customer set `Cpassword` = SHA1('$password') where C_ID='$cid'");
                        if ($edit) {
                            mysqli_close($db);
                            header('Location:Sign.php');


                        } else {
                            echo mysqli_error();
                        }
                    }
                    else{
                        $flagpass=true;
                    }
                }

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
            height: 32px;
        }
        input[type="password"]{
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
            <div class="sign"style="height: 440px;width: 500px;background-color:#FFffff;opacity: 0.9; border-radius: 10px;  margin-top: 60px; margin-bottom: 60px">
                <div style="position: absolute; left: 1%">
                    <form action="updatePassword.php" method="post">
                        <div style="float:left; margin-left: 640px; margin-top: 50px; ">
                            <h1 style="color: #a10202;">New Password</h1>
                            <input type="password"  autocomplete="off" name="passworddd" placeholder="New Password"style="width:200px"><br><br>
                            <input type="password"  autocomplete="off" name="confpass" placeholder="Confirm New Password"style="width:200px"><br><br>
                            <input class="submit-but"type="submit" value="Change"><br><br>
                            <?php
                            if ($flagpass==true)
                            {
                                echo "<h5 style='color: black'>Passwords Does Not Match!</h5>";
                            }
                            ?>
                    </form>
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


</body>
</html>
