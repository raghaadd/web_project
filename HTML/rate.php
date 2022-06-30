<?php
session_start();
try{
    $email = $_SESSION['Email_Address'];
    $flagrate=false;
    if(isset($_POST['next-but'])) {
        if (isset($_POST['next-but']) && $_POST['message'] != null) {
            $feddback = $_POST['message'];
            $db = new mysqli('localhost', 'root', '', 'cinema');
            $qryStr = "select * from review ORDER BY R_ID DESC";
            $qryStr1 = "select * from person";
            $qryStr2 = "select * from customer";

            $res = $db->query($qryStr);
            $res2 = $db->query($qryStr1);
            $res3 = $db->query($qryStr2);
            for ($i = 0; $i < $res2->num_rows; $i++) {
                $row2 = $res2->fetch_object();
                if ($row2->Email_Address == $_SESSION['Email_Address']) {
                    $personalID = $row2->personal_ID;
                    for ($j = 0; $j < $res3->num_rows; $j++) {
                        $row3 = $res3->fetch_object();
                        if ($row3->personal_ID == $personalID) {
                            $cid = $row3->C_ID;
                        }//if(personal id)
                    }//for
                }
            }//for outer

            $number = "0";
            if ($_POST['g'] == "1") {
                $number = "1";
            } elseif ($_POST['g'] == "2") {
                $number = "2";

            } elseif ($_POST['g'] == "3") {
                $number = "3";
            } elseif ($_POST['g'] == "4") {
                $number = "4";
            } elseif ($_POST['g'] == "5") {
                $number = "5";

            } else {
                $flagrate = true;
            }
            if ($flagrate == false) {
                $qryStr3 = "INSERT INTO `review` ( `C_ID`, `comment`, `rate`) VALUES ( '" . $cid . "', '" . $feddback . "', '" . $number . "');";
                $rs = $db->query($qryStr3);
                $db->commit();
                $db->close();
                header('location:userpage.php');
            }//flagrate=false

        } else {
            $flagrate = true;
        }
    }

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <!--    change favicon: -->
    <link rel="shortcut icon" type="image/png" href="../imgs/popcornicon.png" sizes="128x128">
    <style>
        body{
            margin:0;
            padding: 0;
            background-color: #a10202;
            background-size: cover;
            font-family:  Bell MT;
        }
        div.ticket{
            background-color: #FFffff;
            width: 700px;
            height: 470px;
            margin-left: 400px;
            margin-top: 100px;
            border-radius: 80px 0 80px 0;
        }

        h2{
            margin: 0 10px;
            font-size: 20px;
        }
        button{

            width: 100px;
            height:30px;
            outline: none;
            border-style: none;
            font-size: 20px;
            background-color: #a10202;
            color: #FFffff;
            /*box-shadow: 8px 8px 20px #a10202, -8px -8px 20px #FFffff;*/
        }
        button:hover{
            cursor: pointer;
        }
        .btn{
            background-color: #a10202;
            font-family: "Bell MT";
            font-size: 15px;
            font-weight: bold;
            color:#FFFFFF;
            border: 2px solid #a10202;
            border-radius: 5px;
            cursor: pointer;
            /*margin-left: 700px;*/
            height: 36px;
            width: 300px;
            transition: all 0.5s;

        }

        .btn span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .btn span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .btn:hover span {
            padding-right: 25px;
        }

        .btn:hover span:after {
            opacity: 1;
            right: 0;
        }
        textarea{
            padding: 12px 20px;
            margin: 25px 0;
            box-sizing: border-box;
            border: none;
            border: 2px solid #a10202;
            background-color: #FFFFFF;
            color: #a10202;
        }
        .container{
            width: 300px;
            height: 50px;
            background-color: #FFFFFF;
            padding-right: 40px ;
            border-radius: 5px;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .container .star-widget input{
            display: none;
        }
        .star-widget label{
            font-size: 40px;
            color: #444;
            padding: 5px;
            float: right;
            transition: all 0.2s ease;

        }
          input:not(:checked)~ label:hover,
         input:not(:checked)~ label:hover ~ label{
            color: #fd4;
        }
         input:checked ~label{
             color: #fd4;
         }
        input#rate-5:checked ~label{
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }
        #rate-1:checked ~ .formclass header:before{
            content: "1";
        }
        #rate-2:checked ~ .formclass header:before{
            content: "2";
        }
        #rate-3:checked ~ .formclass header:before{
            content: "3";
        }
        #rate-4:checked ~ .formclass header:before{
            content: "4";
        }
        #rate-5:checked ~ .formclass header:before{
            content: "5";
        }
        .formclass header{
            width: 100%;
            font-size: 25px;
            color: #a10202;
            font-weight: 500;
            margin: 5px 0 0px 0;
            text-align: center;
            transition: all 0.2s ease;
        }

    </style>

    <script>

    </script>
</head>
<body>
<div class="ticket">
<center>
    <form action="rate.php" method="post">
        <br><br>
        <textarea  name="message" autocomplete="off" placeholder="Your Feedback" id="message" style="height:180px;width:300px"></textarea>
        <div class="container">
            <div class="star-widget">

                <input type="radio" name="g" id="rate-5" value="5">
                <label for="rate-5" class="fas fa-star" ></label>
                <input type="radio" name="g" id="rate-4" value="4">
                <label for="rate-4" class="fas fa-star"></label>
                <input type="radio" name="g" id="rate-3" value="3">
                <label for="rate-3" class="fas fa-star"></label>
                <input type="radio" name="g" id="rate-2" value="2">
                <label for="rate-2" class="fas fa-star"></label>
                <input type="radio" name="g" id="rate-1" value="1">
                <label for="rate-1" class="fas fa-star"></label><br><br><br>
            </div>

        </div>
    <br>


<form method="post" action="rate.php">
    <button class="btn btn-outline-primary"  name="next-but">Rate</button><br>
    <?php if($flagrate) {echo "<h5 style='color: black'>Make Sure To Rate!</h5>";}
    ?>

</form>
</center>

</div>
<br><br>

</body>
</html>

