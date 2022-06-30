<?php
session_start();
$flagpay=false;
if(isset($_POST['pay'])) {
    if ($_POST['vnumber'] != null && $_POST['vcode'] != null) {
        $vnumber = $_POST['vnumber'];
        $mname = $_SESSION['movie_name'];
        $code = $_POST['vcode'];
        $seat = $_SESSION['seat'];
        //$food = $_SESSION['food'];
        try {
            $db = new mysqli('localhost', 'root', '', 'cinema');
            $qryStr = "select * from person";
            $qryStr2 = "select * from customer";
            $qryStr4 = "select * from register";
            $qryStr6 = "select * from movie";
            $qryStr7 = "select * from issueticket";
            $res = $db->query($qryStr);
            $res2 = $db->query($qryStr2);
            $res4 = $db->query($qryStr4);
            $res5 = $db->query($qryStr6);
            $res6 = $db->query($qryStr7);
            for ($i = 0; $i < $row = mysqli_fetch_assoc($res); $i++) {
                if ($row['Email_Address'] == $_SESSION['Email_Address']) {
                    $personalid = $row['personal_ID'];
                    for ($i = 0; $i < $row2 = mysqli_fetch_assoc($res2); $i++) {
                        if ($row2['personal_ID'] == $personalid) {
                            $cid = $row2['C_ID'];
                        }
                    }
                }
            }
            $qryStr3 = "INSERT INTO `visa` (`cardNum`, `securityCode`, `C_ID`) VALUES ('" . $vnumber . "', SHA1('" . $code . "'), '" . $cid . "');";
            $rs = $db->query($qryStr3);
            $db->commit();
            $qryStr5 = "INSERT INTO `register` ( `C_ID`, `total price`) VALUES ( '" . $cid . "', '" . $_SESSION['total_price'] . "');";
            $rs2 = $db->query($qryStr5);
            $db->commit();


//    get movie information:
            for ($i = 0; $i < $row = mysqli_fetch_assoc($res5); $i++) {
                if ($row['Mname'] == $mname) {
                    $showdate = $row['showDate'];
                    $showday = $row['showDay'];
                    $hallnumber = $row['hallNum'];

                }
            }
            //get ticket information:
            for ($i = 0; $i < $row = mysqli_fetch_assoc($res6); $i++) {
                if ($row['C_ID'] == $cid) {
                    $noticket = $row['notickets'];

                }
            }

            $db->close();
        } catch (Exception $e) {
            echo e;
        }
    }
    else{
        $flagpay=true;
        $_SESSION['flagpay']=$flagpay;
        header('Location:visa.php');
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
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="Nav_Footer.css">
    <!--    change favicon: -->
    <link rel="shortcut icon" type="image/png" href="../imgs/popcornicon.png" sizes="128x128">
    <style>
        /* reset */

        *
        {
            border: 0;
            box-sizing: content-box;
            color: inherit;
            font-family: inherit;
            font-size: inherit;
            font-style: inherit;
            font-weight: inherit;
            line-height: inherit;
            list-style: none;
            margin: 0;
            padding: 0;
            text-decoration: none;
            vertical-align: top;
        }
        body{
            background-color: #a10202;
        }

        /* content editable */

        *[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

        *[contenteditable] { cursor: pointer; }

        *[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

        span[contenteditable] { display: inline-block; }

        /* heading */

        h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

        /* table */

        table { font-size: 75%; table-layout: fixed; width: 100%; }
        table { border-collapse: separate; border-spacing: 2px; }
        th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
        th, td { border-radius: 0.25em; border-style: solid; }
        th { background: #EEE; border-color: #BBB; }
        td { border-color: #DDD; }

        /* page */

        html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
        html { background: #999; cursor: default; }

        body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
        body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

        /* header */

        header { margin: 0 0 3em; }
        header:after { clear: both; content: ""; display: table; }

        header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
        header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
        header address p { margin: 0 0 0.25em; }
        header span, header img { display: block; float: right; }
        header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
        header img { max-height: 100%; max-width: 100%; }
        header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

        /* article */

        article, article address, table.meta, table.inventory { margin: 0 0 3em; }
        article:after { clear: both; content: ""; display: table; }
        article h1 { clip: rect(0 0 0 0); position: absolute; }

        article address { float: left; font-size: 125%; font-weight: bold; }

        /* table meta & balance */

        table.meta, table.balance { float: right; width: 36%; }
        table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

        /* table meta */

        table.meta th { width: 40%; }
        table.meta td { width: 60%; }

        /* table items */

        table.inventory { clear: both; width: 100%; }
        table.inventory th { font-weight: bold; text-align: center; }

        table.inventory td:nth-child(1) { width: 26%; }
        table.inventory td:nth-child(2) { width: 38%; }
        table.inventory td:nth-child(3) { text-align: right; width: 12%; }
        table.inventory td:nth-child(4) { text-align: right; width: 12%; }
        table.inventory td:nth-child(5) { text-align: right; width: 12%; }

        /* table balance */

        table.balance th, table.balance td { width: 50%; }
        table.balance td { text-align: right; }

        /* aside */

        aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
        aside h1 { border-color: #999; border-bottom-style: solid; }

        /* javascript */

        .add, .cut
        {
            border-width: 1px;
            display: block;
            font-size: .8rem;
            padding: 0.25em 0.5em;
            float: left;
            text-align: center;
            width: 0.6em;
        }

        .add, .cut
        {
            background: #9AF;
            box-shadow: 0 1px 2px rgba(0,0,0,0.2);
            background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
            background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
            border-radius: 0.5em;
            border-color: #0076A3;
            color: #FFF;
            cursor: pointer;
            font-weight: bold;
            text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
        }

        .add { margin: -2.5em 0 0; }

        .add:hover { background: #00ADEE; }

        .cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
        .cut { -webkit-transition: opacity 100ms ease-in; }

        tr:hover .cut { opacity: 1; }

        @media print {
            * { -webkit-print-color-adjust: exact; }
            html { background: none; padding: 0; }
            body { box-shadow: none; margin: 0; }
            span:empty { display: none; }
            .add, .cut { display: none; }
        }

        @page { margin: 0; }
        .btn{
            background-color: #242424;
            font-family: "Bell MT";
            font-size: 15px;
            font-weight: bold;
            color: #f0f0f0;
            border: 2px solid #242424;
            border-radius: 5px;
            cursor: pointer;
            height: 36px;
            width:700px;
            transition: all 0.5s;

        }
        </style>
</head>
<body>

<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="style.css">
    <link rel="license" href="https://www.opensource.org/licenses/mit-license/">
    <script src="script.js"></script>
</head>
<body>
<header>
    <h1>FLASH</h1>
    <address contenteditable>
        <p>Address:<br>Palestine, Nablus<br>Bayt Wazan </p>
    </address>
    <span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>
</header>
<article>

    <table class="meta">
        <tr>
            <th><span contenteditable>Movie Name:</span></th>
            <td><span contenteditable><?php echo $mname ?></span></td>
        </tr>
        <tr>
            <th><span contenteditable>Show Date:</span></th>
            <td><span contenteditable><?php echo $showday." ".$showdate ?> </span></td>
        </tr>
        <tr>
            <th><span contenteditable>Hall Number:</span></th>
            <td><span contenteditable><?php echo $hallnumber ?></span></td>
        </tr>


    </table>
    <table class="inventory">
        <thead>
        <tr>
            <th><span contenteditable>Ticket Price</span></th>
            <th><span contenteditable>Number Of Tickets:</span></th>
            <th><span contenteditable>Seats Number:</span></th>
            <th><span contenteditable>Food:</span></th>
            <th><span contenteditable>Food Price:</span></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><a class="cut">-</a><span contenteditable>14.5₪</span></td>
            <td><span contenteditable><?php echo $noticket ?></span></td>
            <td><span contenteditable> <?php
                    foreach ($seat as $key=>$values)
                    {
                        echo $values." , ";
                    }
                    ?></span></td>
            <td><span contenteditable> <?php
                    if(!empty($_SESSION['food']))
                    {
                        $food = $_SESSION['food'];
                    foreach ($food as $key=>$values)
                    {
                        echo $values." ";
                    }
                    }
                    ?></span></td>
             <td><span contenteditable><?php echo $_SESSION['foodprice']."₪" ?></span></td>
        </tr>
        </tbody>
    </table>
    <a class="add">+</a>
    <table class="balance">
        <tr>
            <th><span contenteditable style="font-size: 18px; font-weight: bold">Total Price:</span></th>
            <td><span contenteditable style="font-size: 25px; font-weight: bold"><?php echo $_SESSION['total_price']."₪" ?></span></td>
        </tr>

    </table>
</article>
<aside>
    <h1><span contenteditable>Additional Notes</span></h1>
    <div contenteditable>
        <p>This Bill To Confirm Your Booking.</p>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <center>
    <form method="post" action="userpage.php">
        <input type="submit" value="Done" class="btn">
    </form>
    </center>
</aside>

</body>
</html>
</body>
</html>
