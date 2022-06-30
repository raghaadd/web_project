<?php
session_start();

if($_SESSION['flag']==false) {
    $number = $_POST['numb'];
    $moviename = $_POST['name'];
    $_SESSION['Mname'] = $moviename;
    $flagseat=false;
    try {
        $db = new mysqli('localhost', 'root', '', 'cinema');
        $qryStr = "select * from issueticket ORDER BY ticket_ID DESC";
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
            }//if(email)
        }//end for

        $noticket = $number;
        $_SESSION['noticket'] = $noticket;
        $qryStr3 = "INSERT INTO `issueticket` ( `C_ID`, `Mname`, `price`, `notickets`) VALUES ( '" . $cid . "', '" . $moviename . "', '14.5', '" . $noticket . "');";
        $_SESSION['ticketprice'] = $noticket * 14.5;
        $rs = $db->query($qryStr3);
        $db->commit();
        $db->close();
//    $db->close();
    } catch (Exception $e) {
        echo e;
    }
}
elseif ($_SESSION['flag']==true)
{
    $flagseat=true;
}


try {
    $db = new mysqli('localhost', 'root', '', 'cinema');
    $qryStr4= "select * from seats";
    $res4= $db->query($qryStr4);


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
    <link href="https://fonts.googleapis.com/css2?family=Manjari:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="Nav_Footer.css">
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
            width: 800px;
            height: 520px;
            margin-left: 400px;
            margin-top: 60px;
            border-radius: 80px 0 80px 0;
        }
        h1{
            color: #a10202;
            text-align: center;
            padding-top: 15px;
        }
    /*    seat style: */
        .seat {
            background-color: #444451;
            height: 40px;
            width: 50px;
            margin: 3.5px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }


        .seat.selected {
            background-color: #a10202;
        }



        /*seat black: */
        .seatb {
            background-color: #444451;
            height: 40px;
            width: 50px;
            margin: 3.5px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .seatb.selected {
            background-color: #a10202;
        }
        .seatb:nth-of-type(2) {
            margin-right: 18px;
        }

        .seatb:nth-last-of-type(2) {
            margin-left: 18px;
        }

        .seatb:not(.occupied):hover {
            cursor: pointer;
            transform: scale(1.2);
        }

        /*red seat: */
        .seatr {
            background-color: #a10202;
            height: 40px;
            width: 50px;
            margin: 3.5px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }


        .seat.selected {
            background-color: #a10202;
        }
        .seat:nth-of-type(2) {
            margin-right: 18px;
        }

        .seat:nth-last-of-type(2) {
            margin-left: 18px;
        }

        .seat:not(.occupied):hover {
            cursor: pointer;
            transform: scale(1.2);
        }

        .showcase .seat:not(.occupied):hover {
            cursor: default;
            transform: scale(1);
        }

        .showcase {
            /*background: rgba(0, 0, 0, 0.1);*/
            padding: 5px 10px;
            border-radius: 5px;
            color: #777;
            list-style-type: none;
            display: flex;
            justify-content: space-between;

        }

        .showcase li {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 10px;
        }

        .showcase li small {
            margin-left: 2px;
        }

        span{
            color: #a10202;
            text-align: center;
        }

        button{

            width: 50px;
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
            background-color: #FFffff;
            font-family: "Bell MT";
            font-size: 15px;
            font-weight: bold;
            color: #a10202;
            border: 2px solid #a10202;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 700px;
            height: 36px;
            width: 200px;
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


    /*    check box style */
        .custom-checkbox {
            cursor: pointer;
            display: flex;
            align-items: center;
            margin: 10px 0;
        }

        .custom-checkbox .label {
            font-size: 1.2em;
            margin: 0 10px;
        }

        .custom-checkbox .checkmark {
            width:10px;
            height: 10px;
            border: 2px solid #222;
            display: inline-block;
            border-radius: 3px;
            background: #222 url(https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/White_check.svg/1200px-White_check.svg.png) center/1250% no-repeat;
            transition: background-size 0.2s ease;
        }

        .custom-checkbox input:checked + .checkmark {
            background-size: 60%;
            transition: background-size 0.25s cubic-bezier(0.7, 0, 0.18, 1.24);
        }

        .custom-checkbox input {
            display: none;
        }



        .showcase {
            background: rgba(0, 0, 0, 0.1);
            padding: 5px 10px;
            border-radius: 5px;
            color: #777;
            list-style-type: none;
            display: flex;
            justify-content: space-between;
            width: 250px;
        }

        .showcase li {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 2px;
        }

        .showcase li small {
            margin-left: 2px;
        }

    </style>
</head>
<body>
<br>
<div class="ticket">
    <br>
<h1>Pick Your Seat For <?php echo$_SESSION['Mname']; ?> Movie</h1>
<center>
    <ul class="showcase">
        <li>
            <div class="seat"></div>
            <small>Not Booked</small>
        </li>
        <li>
            <div class="seat selected"></div>
            <small>Booked</small>
        </li>
    </ul>
</center>
    <center>
    <h4 style="color: #a10202">Hall Number:<?php echo $_SESSION['hallNum'];?></h4>
    </center>
    <div class="seatb seat" style="display: none"></div>
    <div class="seatr seat" style="display: none"></div>
    <br>
    <form method="post" action="choose.php">

    <center>
    <table >

        <tr>
        <?php

        for($i=0;$i<$res4->num_rows;$i++) {
            $row4= $res4->fetch_object();
//2rj3 put it movie name
                if ($row4->Mname == $_SESSION['Mname']) {

                    if($row4->booked=='n')
                    {
                        ?>
                        <td>
                            <label class="custom-checkbox" tab-index="0" aria-label="Checkbox Label">
                            <div class="seatb seat" onclick="change();changebackground() " id="idseat" ></div><br>
                                <input type="checkbox" name="box[]" value="<?php echo $row4->seatNum;?>">
                                <span class="checkmark"></span>
                                <span class="label"><?php echo $row4->seatNum;?></span>
                            </label>
                        </td>
                        <?php
                    }//if

                    else{
                        ?>
                        <td>
                            <label class="custom-checkbox" tab-index="0" aria-label="Checkbox Label">
                            <div class="seatr seat"></div>
                                <input type=button value='Disable' onClick="chk_control('dsb')";>
                            <input type="checkbox" name="" value="<?php echo $row4->seatNum;?>" checked onload="chk_control('dsb')";>
                            <span class="checkmark"></span>
                            <span class="label"><?php echo $row4->seatNum;?></span>
                            </label>

                        </td>
                        <?php
                    }//else
                }//if(name==name)

        ?>
            <?php
            if($i==2)
            {
            ?>
        <tr>
            <?php
            }//if i==2
            if($i==5)
            {
            ?>
                <tr>
            <?php
            }//if i==5
            ?>

<?php
        }//for

        ?>
        </tr>
        </tr>
        </tr>
        <tr>
            <?php
if($flagseat==true)
{

    echo "<h5 style='color: black'>Make Sure That Number Of Booked Seats Same As Number Of Tickets!</h5>";
}?>
        </tr>

    </table>
    </center>

</div>
<br>

<br>

    <input type="text" name="name" value="<?php echo $moviename;?>" style="display: none;">
    <button class="btn btn-outline-primary" name="btn"><span>Next</span></button><br><br>
</form>

<script >
    const container = document.querySelector('.container1');
    // const seats = document.querySelectorAll('.row .seat:not(.occupied)');
    const count = document.getElementById('count');
    const total = document.getElementById('total');
    const movieSelect = document.getElementById('movie');

    populateUI();

    let ticketPrice = +movieSelect.value;

    // Save selected movie index and price
    function setMovieData(movieIndex, moviePrice) {
        localStorage.setItem('selectedMovieIndex', movieIndex);
        localStorage.setItem('selectedMoviePrice', moviePrice);
    }

    // Update total and count
    function updateSelectedCount() {
        const selectedSeats = document.querySelectorAll('.row .seat.selected');

        const seatsIndex = [...selectedSeats].map(seat => [...seats].indexOf(seat));

        localStorage.setItem('selectedSeats', JSON.stringify(seatsIndex));

        const selectedSeatsCount = selectedSeats.length;

        count.innerText = selectedSeatsCount;
        total.innerText = selectedSeatsCount * ticketPrice;

        setMovieData(movieSelect.selectedIndex, movieSelect.value);
    }

    // Get data from localstorage and populate UI
    function populateUI() {
        const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'));

        if (selectedSeats !== null && selectedSeats.length > 0) {
            seats.forEach((seat, index) => {
                if (selectedSeats.indexOf(index) > -1) {
                    seat.classList.add('selected');
                }
            });
        }

        const selectedMovieIndex = localStorage.getItem('selectedMovieIndex');

        if (selectedMovieIndex !== null) {
            movieSelect.selectedIndex = selectedMovieIndex;
        }
    }

    // Movie select event
    movieSelect.addEventListener('change', e => {
        ticketPrice = +e.target.value;
        setMovieData(e.target.selectedIndex, e.target.value);
        updateSelectedCount();
    });

    // Seat click event
    container.addEventListener('click', e => {
        if (
            e.target.classList.contains('seat')
        ) {
            e.target.classList.toggle('selected');

            updateSelectedCount();
        }
    });

    // Initial count and total set
    updateSelectedCount();
</script>


<script>
    <?php
    echo "var jsvar ='2';";
    ?>
    // alert(jsvar+"hhii");
</script>
<script>


    let ii=0;
    function change()
    {
        ii++;

       if(ii<=jsvar)
       {
           f();
       }

    }
    function f()
    {
        let h=document.getElementById('blackid').innerText;

        // alert(h);
    }
</script>


<!--to disable check box: -->
<script type="text/javascript">
    function chk_control(str) {
        if(str=='dsb'){document.getElementById('ck1').disabled=true;}
        else {document.getElementById('ck1').disabled=false;}
    }



</script>
</body>
</html>