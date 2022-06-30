<?php
//$msg = "";
//$msg_class = "";
//$conn = mysqli_connect("localhost", "root", "", "cinema");
//if (isset($_POST['save_profile'])) {
//    // for the database
//    $bio = stripslashes($_POST['bio']);
//    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
//    // For image upload
//    $target_dir = "images/";
//    $target_file = $target_dir . basename($profileImageName);
//    // VALIDATION
//    // validate image size. Size is calculated in Bytes
//    if($_FILES['profileImage']['size'] > 200000) {
//        $msg = "Image size should not be greated than 200Kb";
//        $msg_class = "alert-danger";
//    }
//    // check if file exists
//    if(file_exists($target_file)) {
//        $msg = "File already exists";
//        $msg_class = "alert-danger";
//    }
//    // Upload image only if no errors
//    if (empty($error)) {
//        if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
//            $sql = "INSERT INTO users SET profile_image='$profileImageName', bio='$bio'";
//            if(mysqli_query($conn, $sql)){
//                $msg = "Image uploaded and saved in the Database";
//                $msg_class = "alert-success";
//            } else {
//                $msg = "There was an error in the database";
//                $msg_class = "alert-danger";
//            }
//        } else {
//            $error = "There was an erro uploading the file";
//            $msg = "alert-danger";
//        }
//    }
//}
//?>
<?php
//include 'processForm.php'
//?>
<?php
//$flag=0;
//if(isset($_POST['email']) && isset($_POST['password']))
//{
//    $personal_id=$_POST['personalid'];
//    $fnmae=$_POST['fname'];
//    $lname=$_POST['lname'];
//    $email=$_POST['email'];
//    $pass=$_POST['password'];
//    $confpass=$_POST['confpass'];
//    try{
//
//
//        $db=new mysqli('localhost','root','','cinema');
//        $qryStr2="select * from customer";
//        $res2=$db->query($qryStr2);
//        //to get cid
//        for($i=0;$i<$res2->num_rows;$i++)
//        {
//            $row=$res2->fetch_object();
//            $cusomerid=$row->C_ID;
//        }//end for
//        $cusomerid++;
//
//        $qryStr="INSERT INTO `person` (`personal_ID`, `Fname`, `Lname`, `Email_Address`) VALUES ('".$personal_id."', '".$fnmae."', '".$lname."', '".$email."');";
//
//        $qryStr3="INSERT INTO `customer` (`C_ID`, `Cpassword`, `personal_ID`) VALUES ('".$cusomerid."', SHA1('".$pass."'), '".$personal_id."');";
//
//        if($pass==$confpass)
//        {
//            $rs=$db->query($qryStr);
//            $rs2=$db->query($qryStr3);
//            $db->commit();
//            $db->close();
//            echo "hi".$rs;
//            if($rs==1 && $rs2==1) {
//                echo "hi".$rs;
//                header('Location:Sign.php');
//            }
//            else{
//                echo "You have register before";
//            }
//        }
//        else{
//            echo "<h3>passwords not match!</h3>";
//        }//else(pass==confpass)
//
//
//    }catch (Exception $e)
//    {
//        echo e;
//    }
//
//}
//else{
//
//}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
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
        input[type="email"]{

            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            border-bottom: 2px solid #a10202;
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
        .form-div { margin-top: 100px; border: 1px solid #e0e0e0; }
        #profileDisplay { display: block; height: 150px; width: 150px; margin: 0px auto; margin-left: 525px; margin-top: 20px; border-radius: 50%; }
        .img-placeholder {
            width: 60%;
            color: white;
            height: 100%;
            background: black;
            opacity: .7;
            height: 210px;
            border-radius: 50%;
            z-index: 2;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            display: none;
        }
        .img-placeholder h4 {
            margin-top: 40%;
            color: white;
        }
        .img-div:hover .img-placeholder {
        /display: block;/
        cursor: pointer;
        }


    </style>

    <script>
        function triggerClick(e) {
            document.querySelector('#profileImage').click();
        }
        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>
</head>
<body>
<div class="back-div">
    <div style="background-color:#a10202; width: 100%;height: 60px;">
        <div id="navbar">
            <div class="collapse navbar-collapse">
                <div class="container" >
                    <ul class="navbar-nav unorder_title">
                        <li class="nav-item title">
                            CINEMA
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <br>

    <center>
        <div class="sign"style="height: 800px;width: 600px;background-color: #FFffff;opacity: 0.9; border-radius: 10px">
            <div style="width:3px;height: 600px; background-color:#a10202;position: absolute;left: 770px ">
            </div>
            <div style="position: absolute; ;left: 1%">
                <?php if (!empty($msg)): ?>
                    <div class="alert <?php echo $msg_class ?>" role="alert">
                        <?php echo $msg; ?>
                    </div>
                <?php endif; ?>
                <div class="form-group text-center" style="position: relative; " >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4 style="font-size: 16px; border-radius: 15px; width: 200px; height: 30px; margin-left: 185px; color:gray ">Update image</h4>
              </div>
              <img src="../imgs/userProfileIcon1%20(1).jpg" onClick="triggerClick()" id="profileDisplay" style="cursor: pointer">
            </span>
                    <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                    <label style="font-size: 16px; border-radius: 15px; width: 200px; height: 30px; margin-left: 185px; color:gray ">Profile Image</label>
                </div>
                <!--                <form action="processForm.php" method="post" enctype="multipart/form-data">-->
                <!--                    <div class="form-group">-->
                <!--                        <input type="file" accept="image/*" name="profileImage" class="form-control">-->
                <!--                    </div>-->
                <!--                </form>-->
                <form action="Sign.php" method="post">
                    <div style="float:left; margin-left: 500px; ">
                        <h1 style="color: #a10202;">Sign Up</h1>
                        <input type="number" autocomplete="off" name="personalid" placeholder="Your Personal ID"><br><br>
                        <input type="text"autocomplete="off" name="fname" placeholder="First name"><br><br>
                        <input type="text"autocomplete="off" name="lname" placeholder="Last name"><br><br>
                        <input type="email"  autocomplete="off" name="email" placeholder="Your Email"style="width:200px"><br><br>
                        <input input type="password" name="password" placeholder="Password" autocomplete="off"><br><br>
                        <input input type="password" name="confpass" placeholder="confirm password" autocomplete="off"><br><br>
                        <input class="submit-but" name="savebtn" type="submit" value="Submit">
                    </div>
                </form>
                <div style="float:left; margin-left: 810px;margin-top: -380px">
                    <div style="">
                        <form action="Sign.php">
                            <input class="submit-but"type="submit" value="Sign In"><br><br><br>
                        </form>
                        <form action="signup.php">
                            <input class="submit-but"type="submit" value="Sign Up"><br><br><br>
                        </form>
                        <form action="forgotpassword.php">
                            <input class="submit-but"type="submit" value="Forgot Password"><br><br><br>
                        </form>

                        <iframe src="https://giphy.com/embed/U4cmlXqP1L2iV2w0ys" style="margin-top: 100px" width="100" height="140" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/stickers/Norwegian-Airlines-norwegian-airlines-air-U4cmlXqP1L2iV2w0ys"></a></p>

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