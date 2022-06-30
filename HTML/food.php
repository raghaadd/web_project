<?php
session_start();
$_SESSION['flagfood']=true;
try{
    $db = new mysqli('localhost', 'root', '', 'cinema');
    $qryStr2 = "select * from food";
    $res2 = $db->query($qryStr2);

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <!--    for anmiation: -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <!--    change favicon: -->
    <link rel="shortcut icon" type="image/png" href="../imgs/popcornicon.png" sizes="128x128">
    <style>
        body {
            font-family: Bell MT;
            background-color:#a10202;
            width:100%;
            margin:0;
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


        ul.foodlist{
            text-align: left;
            list-style-type: none;
            font-size: 4rem;
            display: inline;
            left: 800px;
        }
        ul.foodlist li{
            float: left;
            padding-top: 0px;
            padding-left: 20px;
            color: #a10202;
            text-transform: capitalize;
        }

        ul.foodlist li {
            float: left;
            color: #a10202;
            text-transform: uppercase;
            transition: all 2s linear;
        }

        .foodText1{
            font-size: 18px;
            font-weight: lighter;
            color:#a10202;
            position: center;
            text-align: center;
            text-decoration: none;
            font-family: Bell MT;
            margin-bottom: -80px;
        }
        .foodText2{
            font-size: 16px;
            font-weight: lighter;
            color: #a10202;
            text-decoration: none;
            font-family: Bell MT;
            position: center;
            text-align: center;
            width: 340px;
            margin-left: 50px;
            margin-top: -110px;
        }
        .outside{
            position: center;
            width: 90%;
            margin-top: -150px;
            /*padding: 20px;*/
            margin-left: -30px;
            margin-bottom: 50px;
        }

        .inside2{
            /*border: 5px  #a10202;*/
            margin: 90px;
            padding-top: 30px;
            padding-bottom: 80px;
        }

        .inside img{
            width: 150px;
            height: 150px;
            margin: 0;
            padding: 0;
        }

        .POPCORNFLAVORS{
            font-size: 22px;
            font-weight: bold;
            color: #a10202;
            text-decoration: none;
            font-family: Bell MT;
            position: center;
            text-align: center;
            margin-top: 50px;
        }

        .Add{
            position: center;
            text-align: center;
            margin-bottom: 50px;
            margin-top: -10px;
        }
        .AddToCart{
            font-size: 30px;
            font-weight: lighter;
            color: #a10202;
            text-decoration: none;
            font-family: Bell MT;
            position: center;
            text-align: center;
            background-color: #a10202;
            width: 250px;
            height: 80px;
            border-radius: 5px;
            box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7);
        }
        /***********/

        .quantity {
            display: none;
            margin-top: 110px;
            position: center;
            margin-left: 160px;
            margin-bottom: -30px;
        }

        h2.root{
            margin: 0 0px;
            font-size: 22px;
            color: #a10202;
            position: center;
            text-align: center;
        }




        button{
            width: 30px;
            height:30px;
            outline: none;
            border-style: none;
            font-size: 20px;
            background-color: #a10202;
            color: #FFffff;
        }
        button.minus,button.plus:hover{
            cursor: pointer;
        }
        .check{
            background-color: white;
            border-radius: 50%;
            margin-top: 33px;
            margin-left: 260px;
        }
        .Add{
            margin-right:530px ;
        }

        span{
            color: #a10202;
            text-align: center;
        }
        span.btnspan{
            color: #a10202;
            text-align: center;
            font-size: 30px;
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
            background-color: #FFFFFF;
            font-family: "Bell MT";
            font-size: 15px;
            font-weight: bold;
            color: #a10202;
            border: 2px solid #a10202;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 700px;
            height: 36px;
            width: 400px;
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
            width:20px;
            height: 15px;
            /*border: 2px solid #a10202;*/
            display: inline-block;
            border-radius: 3px;
            background: #a10202 url(https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/White_check.svg/1200px-White_check.svg.png) center/1250% no-repeat;
            transition: background-size 0.2s ease;
        }

        .custom-checkbox input:checked + .checkmark {
            background-size: 60%;
            transition: background-size 0.25s cubic-bezier(0.7, 0, 0.18, 1.24);
        }

        .custom-checkbox input {
            display: none;
        }

    </style>
</head>
<body>

<br><br><br><br><br><br><br><br><br><br>


<!--    <div class="POPCORNFLAVORS"><p>POPCORN FLAVORS</p></div>-->
<center>
    <div id="popcorn" style="background-color: #FFFFFF; border-radius: 80px 0 80px 0; width: 90%;  ">
<center>
        <table class="outside" >
            <tr>
                <form method="post" action="visa.php">
                <?php
                for($i=1;$i<$row2=mysqli_fetch_assoc($res2);$i++){

                ?>

                <td class="inside2">

                    <label class="custom-checkbox" tab-index="0" aria-label="Checkbox Label">
                    <table class="inside" >

                        <div class="foodText1">
                            <?php echo $row2['foodName'];?>
                            <img src="<?php echo $row2['photo'];?>" style="width: 250px; height: 250px; margin-top: -30px"><br><br><br><br>
                            <p class="foodText2"><?php echo $row2['description'];?></p><br>
                            <input type="checkbox" name="food[]" value="<?php echo $row2['foodName'];?>">
                            <span class="checkmark"></span>
                            <span class="label"><?php echo $row2['price']."₪"; ?></span>

                        </div>
                    </table>
                    </label>

                </td>

            <?php
                    if($i%3==0)
                    {

                    ?>
            </tr>

                <?php
                }
            }//for
            ?>

            </tr>
        </table>
</center>
    </div>
</center>

<center>
    <div class="Add" style="margin-left:-100px ">

            <button class="btn btn-outline-primary"><span class="btnspan">Next</span></button><br><br>

        </form>
    </div>
</center>


<script>

    function show(){
        const togglebtn=document.querySelector('.check');
        const divquantity=document.querySelector('.quantity');
        togglebtn.addEventListener('click',() =>{
            if(divquantity.style.display==='none'){
                divquantity.style.display='flex';
            }
            else {
                divquantity.style.display='none';
            }
        });
    }

    let data=0;
    let price;
    document.getElementById("root").innerText=data;

    function decrement(){
        if(data>0)
        {
            price=0;
            data=data-1;
            price=data*14.5;
            document.getElementById("root").innerText=data;
            document.getElementById("price").innerText=price+"$";
        }

    }
    function increment(){
        price=0;
        data=data+1;
        price=data*14.5;
        document.getElementById("root").innerText=data;
        document.getElementById("price").innerText=price+"$";

    }


</script>


</body>
</html>