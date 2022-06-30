<?php
session_start();
$name=$_POST['ticket_but'];
$moviename=$_POST['moviename1'];
$_SESSION['movie_name']=$moviename;
$flag=false;
$_SESSION['flag']=$flag;
try {
    $db = new mysqli('localhost', 'root', '', 'cinema');
    $qryStr = "select * from movie";
    $res = $db->query($qryStr);
    for ($i = 0; $i < $res->num_rows; $i++) {
        $row = $res->fetch_object();
        if ($row->Mname == $moviename)
        {
            $_SESSION['showDate']=$row->showDate;
            $_SESSION['hallNum']=$row->hallNum;
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
            height: 500px;
            margin-left: 400px;
            margin-top: 100px;
            border-radius: 80px 0 80px 0;
        }
        td.header{
            font-weight: bold;
            color: #a10202;
            /*margin: 50px;*/
            padding: 35px;
        }
        td.cent{

            color: #a10202;
        }
        .card{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 0 50px;
        }
        h2{
            margin: 0 10px;
            font-size: 20px;
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
        #txtid{
            display: none;
        }
    </style>

    <script>

    </script>
</head>
<body>
<div class="ticket">
    <center>
<table>
    <tr>
        <td class="header"><h2>Movie Name: </h2></td>
        <td class="header"><h2><?php echo $moviename;?></h2></td>
    </tr>
    <tr>
        <td class="header"><h2>Show Date: </h2></td>
        <td class="header"><h2><?php echo $_SESSION['showDate']?></h2></td>
    </tr>
    <tr>
        <td class="header"><h2>Price: </h2></td>
        <td class="header"><h2>14.5₪</h2></td>
    </tr>
    <tr>
        <td class="header"><h2>Quantity: </h2></td>
                <td class="cent">
                    <div class="card">
                    <button onclick="decrement()">-</button>
                    <h2 id="root"></h2>


                    <button onclick="increment()">+</button>
                    </div>
                </td>
    </tr>
    <tr >
        <td class="header" ><h1 style="margin-top: -5px">Total Price: </h1></td>
        <td class="header"><h1 id="price" style="margin-top: -5px">14.5₪</h1></td>
    </tr>
</table>
        </center>
</div>
<br><br>
<form method="post" action="seat.php">
    <input type="text" name="name" value="<?php echo $moviename;?>" style="display: none;">
<button class="btn btn-outline-primary" onclick="next()" name="next-but"><span>Next</span></button><br><br>
    <input type="text" id="txtid" name="numb" value="9">
</form>

<script>
    let data=1;
    let price;
    document.getElementById("root").innerText=data;

        function decrement(){
            if(data>1)
            {
                price=0;
                data=data-1;
                price=data*14.5;
                document.getElementById("root").innerText=data;
                document.getElementById("price").innerText=price+"₪";
            }

        }
        function increment(){
            price=0;
            data=data+1;
            price=data*14.5;
            document.getElementById("root").innerText=data;
            document.getElementById("price").innerText=price+"₪";

        }
</script>

<script>
    function next(){
        let number=document.getElementById('root').innerText;
        document.getElementById('txtid').value=number;
    }

</script>
</body>
</html>
