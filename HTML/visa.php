<?php
session_start();
$flagcheck=false;
//echo "visa:".$_SESSION['movie_name'];
if($_SESSION['flagpay']==true)
{
 $flagcheck=true;
}
if(isset($_POST['btn_choose'])) {
    if($_SESSION['flagfood']==false){

    $_SESSION['foodprice'] = "0";
    $totalprice = $_SESSION['ticketprice'];
    $_SESSION['total_price'] = $totalprice;
    $_POST['food'] = "";
    }
}
try{
    if($_SESSION['flagfood']==true) {
        $_SESSION['food']=$_POST['food'];
        $seat = $_POST['food'];
        $_SESSION['food'] = $seat;
            $foodprice = 0;
        $totalprice = 0;
        $db = new mysqli('localhost', 'root', '', 'cinema');
        $qryStr = "select * from food";
        $res = $db->query($qryStr);
        for ($i = 1; $i < $row = mysqli_fetch_assoc($res); $i++) {
            foreach ($seat as $key => $values) {
                if ($row['foodName'] == $values) {
                    $foodprice += $row['price'];

                }
            }
        }
        $_SESSION['foodprice'] = $foodprice;
        $totalprice = $foodprice + $_SESSION['ticketprice'];
        $_SESSION['total_price'] = $totalprice;
    }

}catch (Exception $e)
{
    echo e;
}

try {
    $db = new mysqli('localhost', 'root', '', 'cinema');
    $qryStr = "select * from person";
    $qryStr2= "select * from customer";
    $res = $db->query($qryStr);
    $res2= $db->query($qryStr2);
    for($i=0;$i<$row=mysqli_fetch_assoc($res);$i++)
        {
            if($row['Email_Address']== $_SESSION['Email_Address'])
            {
                $personalid=$row['personal_ID'];
                for($i=0;$i<$row2=mysqli_fetch_assoc($res2);$i++)
                {
                    if($row2['personal_ID']==$personalid)
                    {
                        $cid=$row2['C_ID'];
                    }
                }
            }
        }

}catch (Exception $e)
{
    echo e;
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
        body{
            background-color: #a10202;
        }
        .submit-but{
            cursor: pointer;
            background-color: #a10202;
            color: #FFffff;
            font-size: 20px;
            border-radius: 15px;
            width: 200px;
            height: 32px;
        }
        input[type="number"]{
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

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

    </style>
</head>
<body>

<br><br><br><br>
        <center>
            <div class="sign"style="height: 440px;width: 600px;background-color:#FFffff; border-radius: 80px 0 80px 0;  margin-top: 60px; margin-bottom: 60px">
                <div style="position: absolute; left: 1%">
                    <form action="bill.php" method="post">
                        <div style="float:left; margin-left: 640px; margin-top: 50px; ">
                            <h1 style="color: #a10202;">Visa Information</h1>
                            <input type="number"  name="vnumber" autocomplete="off"  placeholder="Visa Number"style="width:200px"><br><br>
                            <input type="number" name="vcode" autocomplete="off"  placeholder="Visa Security Code"style="width:200px"><br><br><br><br>
                            <input class="submit-but"type="submit" value="pay" name="pay">
                            <?php
                            if ($flagcheck==true)
                            {
                                echo "<h5 style='color: black'>Make sure to fill all fields!</h5>";
                            }


                            ?>

                        </div>
                    </form>
                </div>
            </div>

        </center>

        <br>


</body>
</html>
