<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Flash</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="main.css">
    <!--   animation-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--    change favicon: -->
    <link rel="shortcut icon" type="image/png" href="../imgs/popcornicon.png" sizes="128x128">
    <style>
        body {
            margin: 0;
        }

        .topmod {
            margin: 0;
            padding: 0;
            width: 20%;
            background-color: #a10202;
            position: fixed;
            height: 100%;
            overflow: auto;
        }
        .navo{
            margin-top: -30px;
            margin-top: -50px;
        }
        .navo ul{
            list-style-type: none;
        }

        .navo li a {
            display: block;
            color: white;
            padding: -4px 16px;
            text-decoration: none;
            font-size: 20px;
        }


        .navo li a:hover:not(.active) {
            color: #ff6363;
        }

        .topli{
            margin-top: 20px;
        }
        .topli a {
            font-size: 20px;
            font-weight: lighter;
            color: white;
            position: relative;
            text-decoration: none;
            transition: color .4s ease-out;
        }

        .topli a:hover {
            color:#ff6363;
            right: 0;
            text-decoration: none;
            font-weight: bold;
        }

        /.topli a:hover:after {/
             /*    border-color: white;*/
             /*    right: 0;*/
         /}/

        .topli a:after {
            border-radius: 1em;
            border-top: 2px solid #d1d0d5;
            content: "";
            position: absolute;
            right: 100%;
            bottom: .14em;
            left: 0;
            transition: right .4s cubic-bezier(0,.5,0,1),
            border-color .4s ease-out;
        }

        /.topli a:hover:after {/
             /*    animation: anchor-underline 2s cubic-bezier(0,.5,0,1) infinite;*/
             /*    border-color: white;*/
         /}/

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

        .CINEMA{
            float: left;
            color: white;
            text-transform: uppercase;
            transition: all 2s linear;
            position: center;
            text-align: center;
            margin-left: 30px;
            margin-top: 20px;
        }
        .CINEMA{
            text-align: left;
            list-style-type: none;
            font-size: 3rem;
            display: inline;
        }
        .dashboard{
            text-transform: uppercase;
            transition: all 2s linear;
            position: center;
            text-align: center;
            margin-left: 30px;
            list-style-type: none;
            font-size: 1.5rem;
            display: inline;
            color: white;
        }
        #profileImage{
            display: block;
            height: 50px;
            width: 50px;
            margin-left: 30px;
            border-radius: 50%;

        }
        .admininfo{
        /margin-left: -15px;/
        padding-top: 10px;
            padding-bottom: 10px;
            width: 100%;
            border-top: 4px solid #ff6363;
            border-bottom: 0.1px solid #d1d0d5;
            float: left;
        }
        .tableuserinformation{
            margin-top: 40px;
        }
        .userinformation table{
            border-collapse: collapse;
            width: 100%;
            color: #a10202;
            font-family: Bell MT;
            font-size: 24px;
            text-align: left;

        }
        .userinformation table th{
            background-color: gray;
            color: white;
            font-family: Bell MT;
            font-size: 24px;
        }
        .userinformation table tr:nth-child(even){
            background-color: darkgray;
        }
        .logoutinfo{
            padding-top: 20px;
            padding-bottom: 10px;
            width: 100%;
            border-top: 0.1px solid white;
            float: left;
        }

        .logout {
            font-size: 22px;
            font-weight: lighter;
            color: white;
            position: relative;
            text-decoration: none;
            transition: color .4s ease-out;
            margin-left: 40px;
            font-family: Verdana;
        }

        .logout:hover {
            color:#ff6363;
            right: 0;
            text-decoration: none;
            font-weight: bold;
        }
        /*    Change the scrollbar */
        /* width */
        ::-webkit-scrollbar {
            width: 13px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #a10202;
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #ff6363;
        }
        .dashboard {
            position: relative;
            text-decoration: none;
            transition: color .4s ease-out;
        }

        .dashboard:hover {
            color:#ff6363;
            right: 0;
            text-decoration: none;
            font-weight: bold;
        }
        .dashboard a:hover:not(.active) {
            color: #ff6363;
        }

        .dashboard{
            margin-top: 20px;
        }
        .dashboard a {
            color: white;
            position: relative;
            text-decoration: none;
            transition: color .4s ease-out;
        }

        .dashboard a:hover {
            color:#ff6363;
            right: 0;
            text-decoration: none;
            font-weight: bold;
        }

        /.topli a:hover:after {/
             /*    border-color: white;*/
             /*    right: 0;*/
         /}/

        .dashboard a:after {
            border-radius: 1em;
            border-top: 2px solid #d1d0d5;
            content: "";
            position: absolute;
            right: 100%;
            bottom: .14em;
            left: 0;
            transition: right .4s cubic-bezier(0,.5,0,1),
            border-color .4s ease-out;
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
<div class="topmod" style="height: 100%; ">
    <div class="CINEMA">
        <p >Flash</p>
    </div>
    <br> <br><br> <br><br> <br>
    <div class="admininfo">
        <!--        <table>-->
        <!--            <tr><img id="profileImage" class="form-control"-->
        <!--                     src="../imgs/adminpic.png" alt="adminPicture"></tr>-->
        <!--        </table>-->
        <p class="dashboard"> <a href="dashboard.php"><i class="fa fa-dashboard" style="color: white; font-size:24px"></i> dashboard </a></p>
    </div>
    <br><br>
    <br><br><br>

    <div class="navo">
        <ul >
            <li class="topli"><a href="RegisterAdmin.php"><i class="fa fa-user" style="color: white; font-size:24px"></i> Admin</a></li>
            <li class="topli"><a href="UserInfoAdmin.php"><i class="fa fa-user-circle-o" style="color: white; font-size:24px"></i> User</a></li>
            <li class="topli"><a href="RegisterMovie.php"><i class="fa fa-film" style="color: white; font-size:24px"></i> Movie</a></li>
            <li class="topli"><a href="RegisterFood.php"><i class="fa fa-cutlery" style="color: white; font-size:24px"></i> Snack</a></li>
            <li class="topli"><a href="Review.php"><i class="fa fa-star-o" style="color: white; font-size:24px"></i> Review</a></li>
        </ul>
    </div>
    <br>
    <div class="logoutinfo">
        <form method="post" action="logout.php">
            <a class="logout" href="index.html"> LOG OUT <i class="fa fa-sign-out"  style="color: white; font-size:24px"></i></a>
        </form>


    </div>
</div>

<div class="userinformation" style="margin-left:19%;padding:1px 16px;height:100%;">
    <!-- Button trigger modal -->
    <!--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
    <!--        Launch demo modal-->
    <!--    </button>-->


    <div class="container-fluid" style="margin-top: 40px">
        <div class="card shadow mb-4">


            <div class="card-body" >
                <?php
                if(isset($_SESSION['success']) && $_SESSION['success']!=''){
                    echo '<h2>'.$_SESSION['success'].'</h2>';
                    unset($_SESSION['success']);
                }

                ?>
                <?php
                if(isset($_SESSION['status']) && $_SESSION['status']!=''){
                    echo '<h2 class="bg-info">'.$_SESSION['status'].'</h2>';
                    unset($_SESSION['status']);
                }

                ?>


                <div class="table-responsive" >


                    <table class="table table-bordered" id="dataTable"  STYLE="border-radius: 10px" width="100%" cellspacing="0">
                        <thead >
                        <tr STYLE="margin: 10px">
                            <th STYLE="margin: 10px">
                                <?php
                                $connection=mysqli_connect("localhost","root","","cinema");
                                $query="SELECT A_ID FROM admin ORDER BY A_ID";
                                $query_num=mysqli_query($connection,$query);
                                $row=mysqli_num_rows($query_num);
                                echo '<h4 class="m-0 font-weight-bold " style="color: #a10202; font-size: 18px; font-family: Verdana; font-weight: lighter">Admins NO. : '.$row.'</h4>';
                                $connection->close();
                                ?>
                            </th>
                            <th STYLE="margin: 10px">
                                <?php
                                $connection=mysqli_connect("localhost","root","","cinema");
                                $query="SELECT C_ID FROM customer ORDER BY C_ID";
                                $query_run=mysqli_query($connection,$query);
                                $row=mysqli_num_rows($query_run);
                                echo '<h4 class="m-0 font-weight-bold " style="color: #a10202; font-size: 18px; font-family: Verdana; font-weight: lighter">Users NO. : '.$row.'</h4>';
                                $connection->close();
                                ?>
                            </th>
                            <th>
                                <?php
                                $connection=mysqli_connect("localhost","root","","cinema");
                                $query="SELECT Mname FROM movie ORDER BY Mname";
                                $query_num=mysqli_query($connection,$query);
                                $row=mysqli_num_rows($query_num);
                                echo '<h4 class="m-0 font-weight-bold " style="color: #a10202; font-size: 18px; font-family: Verdana; font-weight: lighter">Movies NO. : '.$row.'</h4>';
                                $connection->close();
                                ?>
                            </th>
                            <th>
                                <?php
                                $connection=mysqli_connect("localhost","root","","cinema");
                                $query="SELECT foodName FROM food ORDER BY foodName";
                                $query_num=mysqli_query($connection,$query);
                                $row=mysqli_num_rows($query_num);
                                echo '<h4 class="m-0 font-weight-bold " style="color: #a10202; font-size: 18px; font-family: Verdana; font-weight: lighter">foods NO. : '.$row.'</h4>';
                                $connection->close();
                                ?>
                            </th>
                            <th><?php
                                $connection=mysqli_connect("localhost","root","","cinema");
                                $query="SELECT R_ID FROM Review ORDER BY R_ID";
                                $query_run=mysqli_query($connection,$query);
                                $row=mysqli_num_rows($query_run);
                                echo '<h4 class="m-0 font-weight-bold " style="color: #a10202; font-size: 18px; font-family: Verdana; font-weight: lighter">Reviews NO. : '.$row.'</h4>';
                                $connection->close();
                                ?>
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="userinformation" style="margin-left:19%;padding:1px 16px;height:100%;">


    <div class="container-fluid" style="margin-top: 40px">
        <div class="card shadow mb-4">
            <div class="card-header py-3" >
                <div class="m-0 font-weight-bold " style="color: #a10202;font-family: Bell MT;
            font-size: 24px;">
                    Admin
                    <?php
                    $connection=mysqli_connect("localhost","root","","cinema");
                    $query="SELECT A_ID FROM admin ORDER BY A_ID";
                    $query_num=mysqli_query($connection,$query);
                    $row=mysqli_num_rows($query_num);
                    ?>
                </div>
            </div>
            <div class="card-body" >
                <?php
                if(isset($_SESSION['success']) && $_SESSION['success']!=''){
                    echo '<h2  style="background-color: lightgreen ; color: darkgreen; font-size: 20px">'.$_SESSION['success'].'</h2>';
                    unset($_SESSION['success']);
                }

                ?>
                <?php
                if(isset($_SESSION['status']) && $_SESSION['status']!=''){
                    echo '<h2  style="background-color: #f2797d; color: #a10202; font-size: 20px">'.$_SESSION['status'].'</h2>';
                    unset($_SESSION['status']);
                }

                ?>


                <div class="table-responsive" >
                    <?php
                    $connection=mysqli_connect("localhost","root","","cinema");

                    $query="SELECT personal_ID FROM admin";
                    $query_run=mysqli_query($connection,$query);

                    ?>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Admin Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if(mysqli_num_rows($query_run)>0){
                            while ($row=mysqli_fetch_assoc($query_run)){
                                ?>


                                <tr>
                                    <td><?php echo $row['personal_ID']; ?></td>
                                    <td><?php
                                        $connection=mysqli_connect("localhost","root","","cinema");
                                        $idc=$row['personal_ID'];
                                        $query="SELECT personal_ID,Fname,Lname FROM person WHERE personal_ID='$idc' ";
                                        $query_num1=mysqli_query($connection,$query);
                                        $row11=mysqli_fetch_assoc($query_num1);
                                        echo $row11['Fname'];
                                        echo " ";
                                        echo $row11['Lname'];
                                        ?>
                                    </td>
                                    <td><?php
                                        $connection=mysqli_connect("localhost","root","","cinema");
                                        $idc=$row['personal_ID'];
                                        $query="SELECT Email_Address FROM person WHERE personal_ID='$idc' ";
                                        $query_num11=mysqli_query($connection,$query);
                                        $row2=mysqli_fetch_assoc($query_num11);
                                        echo $row2['Email_Address'];
                                        ?></td>
                                </tr>
                                <?php
                            }
                        }
                        else{
                            echo "No Record Found";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="userinformation" style="margin-left:19%;padding:1px 16px;height:100%;">
    <!-- Button trigger modal -->
    <!--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
    <!--        Launch demo modal-->
    <!--    </button>-->


    <div class="container-fluid" style="margin-top: 40px">
        <div class="card shadow mb-4">
            <div class="card-header py-3" >
                <div class="m-0 font-weight-bold " style="color: #a10202;font-family: Bell MT;
            font-size: 24px;">
                    User
                    <?php
                    $connection=mysqli_connect("localhost","root","","cinema");
                    $query="SELECT C_ID,personal_ID FROM customer ORDER BY C_ID";
                    $query_run=mysqli_query($connection,$query);
                    $row=mysqli_num_rows($query_run);
                    ?>
                </div>
            </div>

            <div class="card-body" >
                <?php
                if(isset($_SESSION['success']) && $_SESSION['success']!=''){
                    echo '<h2>'.$_SESSION['success'].'</h2>';
                    unset($_SESSION['success']);
                }

                ?>
                <?php
                if(isset($_SESSION['status']) && $_SESSION['status']!=''){
                    echo '<h2 class="bg-info">'.$_SESSION['status'].'</h2>';
                    unset($_SESSION['status']);
                }

                ?>


                <div class="table-responsive" >


                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        if(mysqli_num_rows($query_run)>0){
                            while ($row=mysqli_fetch_assoc($query_run)){
                                ?>
                                <tr>
                                    <td><?php echo $row['C_ID']; ?></td>
                                    <td><?php
                                        $connection=mysqli_connect("localhost","root","","cinema");
                                        $idc=$row['personal_ID'];
                                        $query="SELECT personal_ID,Fname,Lname FROM person WHERE personal_ID='$idc' ";
                                        $query_num=mysqli_query($connection,$query);
                                        $row11=mysqli_fetch_assoc($query_num);
                                        echo $row11['Fname'];
                                        echo " ";
                                        echo $row11['Lname'];
                                        ?>
                                    </td>
                                    <td><?php
                                        $connection=mysqli_connect("localhost","root","","cinema");
                                        $idc=$row['personal_ID'];
                                        $query="SELECT Email_Address FROM person WHERE personal_ID='$idc' ";
                                        $query_num1=mysqli_query($connection,$query);
                                        $row2=mysqli_fetch_assoc($query_num1);
                                        echo $row2['Email_Address'];
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else{
                            echo "No Record Found";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="userinformation" style="margin-left:19%;padding:1px 16px;height:100%;" data-aos="fade-up">


    <div class="container-fluid" style="margin-top: 40px">
        <div class="card shadow mb-4">
            <div class="card-header py-3" >
                <div class="m-0 font-weight-bold " style="color: #a10202; font-size: 26px; font-weight: bold;">
                    MOVIE
                </div>
            </div>
            <div class="card-body" >
                <?php
                if(isset($_SESSION['success']) && $_SESSION['success']!=''){
                    echo '<h2  style="background-color: lightgreen ; color: darkgreen; font-size: 20px">'.$_SESSION['success'].'</h2>';
                    unset($_SESSION['success']);
                }

                ?>
                <?php
                if(isset($_SESSION['status']) && $_SESSION['status']!=''){
                    echo '<h2  style="background-color: #f2797d; color: #a10202; font-size: 20px">'.$_SESSION['status'].'</h2>';
                    unset($_SESSION['status']);
                }

                ?>


                <div class="table-responsive" style="font-size: 20px">
                    <?php
                    $connection=mysqli_connect("localhost","root","","cinema");

                    $query="SELECT Mname,hallNum,showDay,showDate,photo,description,video,rate FROM movie";
                    $query_run=mysqli_query($connection,$query);

                    ?>

                    <table class="table table-bordered"  id="dataTable" style="font-size: 20px" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th style="font-size: 17px">Movie Name</th>
                            <th style="font-size: 17px">Show Day</th>
                            <th style="font-size: 17px">Show Date</th>
                            <th style="font-size: 15px">Hall Number</th>
                            <th style="font-size: 17px">Movie Description</th>
                            <th style="font-size: 17px">Movie Rate</th>
                            <th style="font-size: 17px">Movie Picture</th>
                            <th style="font-size: 17px">Movie Trailer</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if(mysqli_num_rows($query_run)>0){
                            while ($row=mysqli_fetch_assoc($query_run)){
                                ?>


                                <tr>
                                    <td style="font-size: 20px"><?php echo $row['Mname']; ?></td>
                                    <td style="font-size: 20px"><?php echo $row['showDay']; ?></td>
                                    <td style="font-size: 20px"><?php echo $row['showDate']; ?></td>
                                    <td style="font-size: 20px"><?php echo $row['hallNum']; ?></td>
                                    <td style="font-size: 20px"><?php echo $row['description']; ?></td>
                                    <td style="font-size: 20px"><?php echo $row['rate']; ?></td>
                                    <td style="font-size: 20px"><?php $dir_path = "../imgs/";
                                        $extensions_array = array('jpg','png','jpeg');

                                        if(is_dir($dir_path))
                                        {
                                            $files = scandir($dir_path);

                                            for($i = 0; $i < count($files); $i++)
                                            {
                                                if($files[$i] !='.' && $files[$i] !='..')
                                                {
                                                    // get file name

                                                    // get file extension
                                                    $file = pathinfo($files[$i]);
                                                    $extension = $file['extension'];

                                                    // check file extension
                                                    if("../imgs/".$files[$i]==$row['photo'])
                                                    {
                                                        // show image
                                                        echo "<img src='$dir_path$files[$i]' style='width:110px;height:100px;'><br>";
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td style="font-size: 20px"><?php $dir_path = "../video/";
                                        $extensions_array = array('mp4');

                                        if(is_dir($dir_path))
                                        {
                                            $files = scandir($dir_path);

                                            for($i = 0; $i < count($files); $i++)
                                            {
                                                if($files[$i] !='.' && $files[$i] !='..')
                                                {
                                                    $file = pathinfo($files[$i]);
                                                    $extension = $file['extension'];

                                                    // check file extension
                                                    if("../video/".$files[$i]==$row['video'])
                                                    {
                                                        echo "<video src='$dir_path$files[$i]'  width='110px' height='100px' autoplay muted loop></video><br>";
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </td>

                                </tr>
                                <?php
                            }
                        }
                        else{
                            echo "No Record Found";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="userinformation" style="margin-left:19%;padding:1px 16px;height:100%;" data-aos="fade-up">


    <div class="container-fluid" style="margin-top: 40px">
        <div class="card shadow mb-4">
            <div class="card-header py-3" >
                <div class="m-0 font-weight-bold " style="color: #a10202; font-size: 26px; font-weight: bold;">

                    SNACK
                </div>
            </div>
            <div class="card-body" >
                <?php
                if(isset($_SESSION['success']) && $_SESSION['success']!=''){
                    echo '<h2  style="background-color: lightgreen ; color: darkgreen; font-size: 20px">'.$_SESSION['success'].'</h2>';
                    unset($_SESSION['success']);
                }

                ?>
                <?php
                if(isset($_SESSION['status']) && $_SESSION['status']!=''){
                    echo '<h2  style="background-color: #f2797d; color: #a10202; font-size: 20px">'.$_SESSION['status'].'</h2>';
                    unset($_SESSION['status']);
                }

                ?>


                <div class="table-responsive" >
                    <?php
                    $connection=mysqli_connect("localhost","root","","cinema");

                    $query="SELECT foodName,price,description,photo FROM food";
                    $query_run=mysqli_query($connection,$query);

                    ?>

                    <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Snack Name</th>
                            <th>Snack Price</th>
                            <th>Snack Description</th>
                            <th>Snack Picture</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if(mysqli_num_rows($query_run)>0){
                            while ($row=mysqli_fetch_assoc($query_run)){
                                ?>


                                <tr>
                                    <td><?php echo $row['foodName']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td>
                                        <?php $dir_path1 = "../imgs/";
                                        $extensions_array1 = array('jpg','png','jpeg');

                                        if(is_dir($dir_path1))
                                        {
                                            $files1 = scandir($dir_path1);

                                            for($i1 = 0; $i1 < count($files1); $i1++)
                                            {
                                                if($files1[$i1] !='.' && $files1[$i1] !='..')
                                                {
                                                    // get file name

                                                    // get file extension
                                                    $file1 = pathinfo($files1[$i1]);
                                                    $extension1 = $file1['extension'];

                                                    // check file extension
                                                    if("../imgs/".$files1[$i1]==$row['photo'])
                                                    {
                                                        // show image
                                                        echo "<img src='$dir_path1$files1[$i1]' style='width:110px;height:100px;'><br>";
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </td>

                                </tr>
                                <?php
                            }
                        }
                        else{
                            echo "No Record Found";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="userinformation" style="margin-left:19%;padding:1px 16px;height:100%;" data-aos="fade-up">
    <!-- Button trigger modal -->
    <!--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
    <!--        Launch demo modal-->
    <!--    </button>-->


    <div class="container-fluid" style="margin-top: 40px">
        <div class="card shadow mb-4">
            <div class="card-header py-3" >
                <div class="m-0 font-weight-bold " style="color: #a10202; font-size: 26px; font-weight: bold;">

                    <?php
                    $connection=mysqli_connect("localhost","root","","cinema");
                    $query="SELECT C_ID,comment,rate FROM review ORDER BY R_ID";
                    $query_run=mysqli_query($connection,$query);
                    $row=mysqli_num_rows($query_run);
                    ?>
                    REVIEW
                </div>
            </div>

            <div class="card-body" >
                <?php
                if(isset($_SESSION['success']) && $_SESSION['success']!=''){
                    echo '<h2>'.$_SESSION['success'].'</h2>';
                    unset($_SESSION['success']);
                }

                ?>
                <?php
                if(isset($_SESSION['status']) && $_SESSION['status']!=''){
                    echo '<h2 class="bg-info">'.$_SESSION['status'].'</h2>';
                    unset($_SESSION['status']);
                }

                ?>


                <div class="table-responsive" >


                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>User Comment</th>
                            <th>User Rate</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        if(mysqli_num_rows($query_run)>0){
                            while ($row=mysqli_fetch_assoc($query_run)){
                                ?>


                                <tr>
                                    <td><?php echo $row['C_ID']; ?></td>
                                    <td><?php
                                        $connection=mysqli_connect("localhost","root","","cinema");
                                        $idc=$row['C_ID'];
                                        $query="SELECT C_ID,personal_ID FROM customer WHERE C_ID='$idc' ";
                                        $query_num=mysqli_query($connection,$query);
                                        $row1=mysqli_fetch_assoc($query_num);
                                        $idcd=$row1['personal_ID'];
                                        $query="SELECT personal_ID,Fname,Lname FROM person WHERE personal_ID='$idcd' ";
                                        $query_num=mysqli_query($connection,$query);
                                        $row11=mysqli_fetch_assoc($query_num);
                                        echo $row11['Fname'];
                                        echo " ";
                                        echo $row11['Lname'];
                                        ?>
                                    </td>
                                    <td><?php echo $row['comment']; ?></td>
                                    <td><?php echo $row['rate']; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        else{
                            echo "No Record Found";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<!--to make  things moving-->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
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