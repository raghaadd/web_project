<?php
////session_start();
////session_destroy();
////header('location:index.php');
////?>
<!---->
<!---->
<!--<!---->-->
<?php
//
//$connect = mysqli_connect("localhost", "root", "", "cinema");
//if(isset($_POST["insert"]))
//{
//    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
//    $query = "INSERT INTO image(filename) VALUES ('$file')";
//    if(mysqli_query($connect, $query))
//    {
//        echo '<script>alert("Image Inserted into Database")</script>';
//    }
//}
//?>
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Modal</title>-->
<!--    <link href="styles.css" rel="stylesheet">-->
<!--    <script defer src="script.js"></script>-->
<!--    <style>-->
<!--        /**, *::after, *::before {*/-->
<!--        /*    box-sizing: border-box;*/-->
<!--        /*}*/-->
<!---->
<!--        .modal {-->
<!--            position: absolute;-->
<!--            top: 300px;-->
<!--            right: 10px;-->
<!--            transform: translate(-50%, -50%) scale(0);-->
<!--            transition: 200ms ease-in-out;-->
<!--            border: 1px solid black;-->
<!--            border-radius: 10px;-->
<!--            z-index: 10;-->
<!--            background-color: white;-->
<!--            width: 200px;-->
<!--            max-width: 80%;-->
<!--        }-->
<!---->
<!--        .modal.active {-->
<!--            transform: translate(-50%, -50%) scale(1);-->
<!--        }-->
<!---->
<!--        .modal-header {-->
<!--            padding: 10px 15px;-->
<!--            display: flex;-->
<!--            justify-content: space-between;-->
<!--            align-items: center;-->
<!--            border-bottom: 1px solid black;-->
<!--        }-->
<!---->
<!--        .modal-header .title {-->
<!--            font-size: 1.25rem;-->
<!--            font-weight: bold;-->
<!--        }-->
<!---->
<!--        .modal-header .close-button {-->
<!--            cursor: pointer;-->
<!--            border: none;-->
<!--            outline: none;-->
<!--            background: none;-->
<!--            font-size: 1.25rem;-->
<!--            font-weight: bold;-->
<!--        }-->
<!---->
<!--        .modal-body {-->
<!--            padding: 10px 15px;-->
<!--        }-->
<!---->
<!--        #overlay {-->
<!--            position: fixed;-->
<!--            opacity: 0;-->
<!--            transition: 200ms ease-in-out;-->
<!--            top: 0;-->
<!--            left: 0;-->
<!--            right: 0;-->
<!--            bottom: 0;-->
<!--            background-color: rgba(0, 0, 0, .5);-->
<!--            pointer-events: none;-->
<!--        }-->
<!---->
<!--        #overlay.active {-->
<!--            opacity: 1;-->
<!--            pointer-events: all;-->
<!--        }-->
<!--        div.pimage{-->
<!--            margin-left: 50px;-->
<!--        }-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!--<button data-modal-target="#modal">Open Modal</button>-->
<!--<div class="modal" id="modal">-->
<!---->
<!--        <!--        <h3 align="center">Insert </h3>-->-->
<!--        <br />-->
<!--        <form method="post" enctype="multipart/form-data">-->
<!--            <input type="file" name="image" id="image" />-->
<!--            <br />-->
<!--            <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />-->
<!--        </form>-->
<!--        <br />-->
<!--        <br />-->
<!---->
<!--        --><?php
//        $query = "SELECT * FROM image ORDER BY id DESC";
//        $qryStr = "select * from person";
//        $res = $connect->query($qryStr);
//        $result = mysqli_query($connect, $qryStr);
//        while($row = mysqli_fetch_array($result))
//        {
//            if($row['personal_ID']==6)
//            {
//            echo '
//                               <div class="pimage">
//                                    <img src="data:image/jpeg;base64,'.base64_encode($row['profile_image'] ).'" height="100" width="100" class="img-thumnail" style="border-radius: 50%"/>
//                               </div>
//
//                     ';
//            }
//        }
//        ?>
<!---->
<!--    <div class="modal-header">-->
<!--        <div class="title">Example Modal</div>-->
<!--        <button data-close-button class="close-button">&times;</button>-->
<!--    </div>-->
<!--    <div class="modal-body">-->
<!---->
<!--        <button name="Logout" class="book-but">Logout</button>-->
<!--    </div>-->
<!--</div>-->
<!--<div id="overlay"></div>-->
<!---->
<!--<script>-->
<!--    const openModalButtons = document.querySelectorAll('[data-modal-target]')-->
<!--    const closeModalButtons = document.querySelectorAll('[data-close-button]')-->
<!--    const overlay = document.getElementById('overlay')-->
<!---->
<!--    openModalButtons.forEach(button => {-->
<!--        button.addEventListener('click', () => {-->
<!--            const modal = document.querySelector(button.dataset.modalTarget)-->
<!--            openModal(modal)-->
<!--        })-->
<!--    })-->
<!---->
<!--    overlay.addEventListener('click', () => {-->
<!--        const modals = document.querySelectorAll('.modal.active')-->
<!--        modals.forEach(modal => {-->
<!--            closeModal(modal)-->
<!--        })-->
<!--    })-->
<!---->
<!--    closeModalButtons.forEach(button => {-->
<!--        button.addEventListener('click', () => {-->
<!--            const modal = button.closest('.modal')-->
<!--            closeModal(modal)-->
<!--        })-->
<!--    })-->
<!---->
<!--    function openModal(modal) {-->
<!--        if (modal == null) return-->
<!--        modal.classList.add('active')-->
<!--        overlay.classList.add('active')-->
<!--    }-->
<!---->
<!--    function closeModal(modal) {-->
<!--        if (modal == null) return-->
<!--        modal.classList.remove('active')-->
<!--        overlay.classList.remove('active')-->
<!--    }-->
<!--</script>-->
<!--</body>-->
<!--</html>-->



<?php
$flag=0;
if (isset($_POST["submit"])) {
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $personal_id = $_POST['personalid'];
        $fnmae = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $confpass = $_POST['confpass'];
//    $targetDir = "uploads/";
//    $fileName = basename($_FILES["file"]["name"]);
//    echo "hii".$fileName;
//    $targetFilePath = $targetDir . $fileName;
//    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        try {
            $db = new mysqli('localhost', 'root', '', 'cinema');
            $qryStr2 = "select * from customer ORDER BY C_ID DESC";
            $res2 = $db->query($qryStr2);
            //to get cid
//            for ($i = 0; $i < $res2->num_rows; $i++) {
//                $row = $res2->fetch_object();
//                $cusomerid = $row->C_ID;
//            }//end for
//            $cusomerid++;
            $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
//        $query = "INSERT INTO image(filename) VALUES ('$file')";
            $qryStr = "INSERT INTO `person` (`personal_ID`, `Fname`, `Lname`, `Email_Address`, `profile_image`) VALUES ('" . $personal_id . "', '" . $fnmae . "', '" . $lname . "', '" . $email . "', '" . $file . "');";
//        $qryStr="INSERT INTO `person` (`personal_ID`, `Fname`, `Lname`, `Email_Address`) VALUES ('".$personal_id."', '".$fnmae."', '".$lname."', '".$email."');";
            if (mysqli_query($db, $qryStr)) {
                echo '<script>alert("Image Inserted into Database")</script>';
            }
            $qryStr3 = "INSERT INTO `customer` ( `Cpassword`, `personal_ID`) VALUES ( SHA1('" . $pass . "'), '" . $personal_id . "');";

            if ($pass == $confpass) {
                $rs = $db->query($qryStr);
                $rs2 = $db->query($qryStr3);
                $db->commit();
                $db->close();
//                echo "hi" . $rs;
                if ($rs == 1 && $rs2 == 1) {
//                header('Location:Sign.php');
                } else {
//                    echo "You have register before";
                }
            } else {
                echo "<h3>passwords not match!</h3>";
            }//else(pass==confpass)


        } catch (Exception $e) {
            echo e;
        }

    } //email
}//submit
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
            margin: 8px 0;
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
            margin: 8px 0;
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
                            CINEMA
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
                    <div style="float:left; margin-left: 500px; ">
                        <h1 style="color: #a10202;">Sign Up</h1>
                        <input type="number" autocomplete="off" name="personalid" placeholder="Your Personal ID"><br><br>
                        <input type="text"autocomplete="off" name="fname" placeholder="First name"><br><br>
                        <input type="text"autocomplete="off" name="lname" placeholder="Last name"><br><br>
                        <input type="email"  autocomplete="off" name="email" placeholder="Your Email"style="width:200px"><br><br>
                        <input input type="password" name="password" placeholder="Password" autocomplete="off"><br><br>
                        <input input type="password" name="confpass" placeholder="confirm password" autocomplete="off"><br><br><br>
                        <input type="file" name="image" id="image" />
                        <br />
                        <label for="image">Upload your photo optional</label>  <br><br><br><br>
                        <input class="submit-but"type="submit" value="Submit" name="submit">
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