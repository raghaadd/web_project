<?php
$flag1=0;
$flag2=0;
$flag3=0;
$flag4=0;
$_SESSION['check']=false;
$_SESSION['emailcheck']=false;
$_SESSION['checkcode']=false;
if (isset($_POST["submit"])) {
    if ($_POST['email'] != null && $_POST['password'] != null && $_POST['personalid'] != null && $_POST['fname'] != null && $_POST['lname'] != null)
    {
        $personal_id = $_POST['personalid'];
        $fnmae = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $confpass = $_POST['confpass'];
        try {
            $db = new mysqli('localhost', 'root', '', 'cinema');
            $qryStr2 = "select * from customer ORDER BY C_ID DESC";
            $qryStr4 = "select * from person";
            $res2 = $db->query($qryStr2);
            $res3 = $db->query($qryStr4);
            for ($i = 0; $i < $res3->num_rows; $i++) {
                $row = $res3->fetch_object();
                if($row->personal_ID==$personal_id)
                {
                    $flag4=1;
                }
            }
            if($flag4==0) {
                if ($pass == $confpass) {
                    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                    $qryStr = "INSERT INTO `person` (`personal_ID`, `Fname`, `Lname`, `Email_Address`, `profile_image`) VALUES ('" . $personal_id . "', '" . $fnmae . "', '" . $lname . "', '" . $email . "', '" . $file . "');";
                    $qryStr3 = "INSERT INTO `customer` ( `Cpassword`, `personal_ID`) VALUES ( SHA1('" . $pass . "'), '" . $personal_id . "');";
                    $rs = $db->query($qryStr);
                    $rs2 = $db->query($qryStr3);
                    $db->commit();
                    $db->close();
                    $flag3 = 1;
                } else {
                    $flag2 = 1;
                }//else(pass==confpass)
            }

        } catch (Exception $e) {
            echo e;
        }

    } //email
    else{
        $flag1=1;
    }
}//submit
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
            height: 30px;
        }
        input[type="password"],
        input[type="text"],
        input[type="number"],
        input[type="email"]
        {

            padding: 12px 20px;
            margin: 1px 0;
            box-sizing: border-box;
            border: none;
            border-bottom: 2px solid #a10202;;
            background-color: #FFffff;
            color: #242424;
        }
        input[type="file"]
        {
            display: none;
        }
        label{
            width: 100px;
            padding: 12px 20px;
            margin: 1px 0;
            box-sizing: border-box;
            border-bottom: 2px solid #a10202;
            background-color: #FFFFFF;
            color: #6c757d;
            cursor: pointer;
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
        <div class="sign"style="height: 650px;width: 600px;background-color: #FFffff;opacity: 0.9;">
            <div style="width:3px;height: 650px; background-color:#a10202;position: absolute;left: 770px ">
            </div>
            <div style="position: absolute; ;left: 1%">
                <form method="post" enctype="multipart/form-data">
                    <div style="position: absolute; top: -5px;left: 510px ">
                        <h1 style="color: #a10202;">Sign Up</h1>
                        <input type="number" autocomplete="off" name="personalid" placeholder="Your Personal ID"><br><br>
                        <input type="text"autocomplete="off" name="fname" placeholder="First name"><br><br>
                        <input type="text"autocomplete="off" name="lname" placeholder="Last name"><br><br>
                        <input type="email"  autocomplete="off" name="email" placeholder="Your Email"style="width:200px"><br><br>
                        <input input type="password" name="password" placeholder="Password" autocomplete="off"><br><br>
                        <input input type="password" name="confpass" placeholder="confirm password" autocomplete="off"><br><br><br>
                        <input type="file" name="image" id="image" accept="image/jpeg"><br>
                        <label for="image" >Upload photo optional</label>
                        <br><br>
                        <br><br>
                        <input class="submit-but"type="submit" value="Submit" name="submit">
                        <?php
                        if($flag1==1)
                        {
                            echo "<h5 style='color: black'>Make sure to fill all fields!</h5>";
                        }
                        elseif ($flag2==1)
                        {
                            echo "<h5 style='color: black'>Passwords Does Not Match!</h5>";
                        }
                        elseif ($flag3==1)
                        {
                            echo "<h4 style='color: black'>User Added Successfully</h4>";
                        }
                        elseif ($flag4==1)
                        {
                            echo "<h5 style='color: black'>User Has Register Before!</h5>";
                        }

                        ?>
                    </div>
                </form>
                <div style="position: absolute; top: 200px;left: 800px">
                    <div style="">
                        <form action="Sign.php">
                            <input class="submit-but"type="submit" value="Sign In"><br><br><br>
                        </form>
                        <form action="signup.php">
                            <input class="submit-but"type="submit" value="Sign Up"><br><br><br>
                        </form>
                        <form action="mail.php">
                            <input class="submit-but"type="submit" value="Forgot Password"><br><br><br>
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


    <!--    <script>-->
    <!--        const toggle = document.querySelector('.toggle input')-->
    <!---->
    <!--        toggle.addEventListener('click', () => {-->
    <!--            const onOff = toggle.parentNode.querySelector('.onoff')-->
    <!--            onOff.textContent = toggle.checked ? 'Sign Up' : 'Sign In'-->
    <!--        })-->
    <!--    </script>-->

</body>
</html>