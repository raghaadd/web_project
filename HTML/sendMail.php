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
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <!--    change favicon: -->
    <link rel="shortcut icon" type="image/png" href="../imgs/popcornicon.png" sizes="128x128">

    <!--    send email using javascript: -->
    <script>
        function sendEmail(){
            let name=document.getElementById("name").value;
            let email=document.getElementById("email").value;
            let message=document.getElementById("message").value;
            Email.send({
                Host : "smtp.gmail.com",
                Username : "ciiinema22@gmail.com",
                Password : "0599333773an",
                To : 'ciiinema22@gmail.com',
                From : email,
                Subject : "This message sent by "+name,
                Body : ""+message
            }).then(
                Alert.render('Message Sent Successfully.')
            );
        }

    </script>

    <style>
        body{
            background-color: #FFFFFF;
        }

        div.contact{
            width: 100%;
            height: 400px;


            /*margin: 300px;*/
        }
        .submit-but{
            cursor: pointer;
            background-color: #a10202;
            color: #FFffff;
            font-size: 20px;
            border-radius: 15px;
            width: 200px;
            height: 30px;
        }
        .back-but{
            cursor: pointer;
            background-color: #a10202;
            color: #FFffff;
            font-size: 20px;
            border-radius: 15px;
            width: 200px;
            height: 30px;
        }
        input[type=text],
        input[type="email"]{

            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            border-bottom: 2px solid #a10202;
            background-color: #FFFFFF;
            color: #242424;
        }



        input::placeholder{
            color: #6c757d;
        }
        textarea{
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            border-bottom: 2px solid red;
            background-color: #242424;
            color: #FFffff;
        }

        img.imgclass{
            width: 500px;
            height: 480px;
            position: absolute;
            top:100px;
            left: 445px;
        }

        /*    unordered list style*/
        .container{
            margin: 0;
            position: absolute;
            top: 0px;
            left:10px;

        }
        .cont2{
            margin: 0;
            position: absolute;
            top: 0px;
            left:400px;

        }

        ul.unordered-list-class{
            text-align: left;
            list-style-type: none;
            font-size: 4rem;
            display: inline;
        }
        ul.unordered-list-class li{
            float: left;
            padding-top: 0px;
            padding-left: 20px;
            color: white;
            text-transform: capitalize;
        }

        ul.unorder_title li{
            float: left;
            color: white;
            text-transform: uppercase;
            transition: all 2s linear;
        }
        ul.unorder_title{
            text-align: left;
            list-style-type: none;
            font-size: 4rem;
            display: inline;

        }

        /*laert box styling:*/
        #dialogoverlay{
            display: none;
            opacity: .8;
            position: fixed;
            top: 0px;
            left: 0px;
            background: #6c757d;
            width: 100%;
            z-index: 10;
        }
        #dialogbox{
            display: none;
            position: fixed;
            background:#6c757d;
            border-radius:7px;
            width:550px;
            z-index: 10;
        }
        #dialogbox > div{ background:#FFF; margin:8px; }
        #dialogbox > div > #dialogboxhead{ background: #FFFFFF; font-size:19px; padding:10px;padding-top: 20px; color:#242424; border-bottom: #6c757d 2px solid}
        #dialogbox > div > #dialogboxbody{ background:#FFFFFF; padding:20px; color:#242424; padding-top: 20px}
        #dialogbox > div > #dialogboxfoot{ background: #FFFFFF; padding:10px; text-align:right; }

    </style>
</head>
<body>
<div class="intro">
    <h1 class="logoheader">
            <span class="logo">FLA<span class="logo">SH</span>
            </span>
    </h1>
</div>

<!--for alert box: -->
<div id="dialogoverlay"></div>
<div id="dialogbox">
    <div>
        <div id="dialogboxhead"></div>
        <div id="dialogboxbody"></div>
        <div id="dialogboxfoot"></div>
    </div>
</div>



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

    <div class="contact" >
        <br><br><br><br>
        <div style="float:left; margin-left: 400px; ">
            <h1 style="color: #a10202;">Contact Us</h1>

            <input type="text"  name="name" placeholder="Your Name" autocomplete="off" id="name"><br><br>
            <input type="email"  autocomplete="off" name="email" placeholder="Your Email" id="email" style="width:200px"><br><br>
            <input type="text" name="message" autocomplete="off" placeholder="Your Message" id="message" style="height:100px;width:200px"></input><br><br>
            <!--    <input class="submit-but"type="submit" value="Submit" onclick="sendEmail(); Alert.render('Message Sent Successfully.')"><br><br>-->
            <button class="submit-but" onclick="sendEmail(); ">Send Mail</button><br><br>
            <button class="back-but" onclick="history.back()">Back</button>
            <!--            <button onclick="Alert.render('Message Sent Successfully.')">Custom Alert</button>-->
        </div>
        <div style="float:left; margin-left: 200px ">
            <img src="../imgs/gmail.png" style="height: 400px; width: 450px;">
        </div>

    </div>
    <br><br><br><br>
    <br><br><br>
    <br><br><br><br>




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

    <!--alert box -->
    <script>
        function CustomAlert(){
            this.render = function(dialog){
                var winW = window.innerWidth;
                var winH = window.innerHeight;
                var dialogoverlay = document.getElementById('dialogoverlay');
                var dialogbox = document.getElementById('dialogbox');
                dialogoverlay.style.display = "block";
                dialogoverlay.style.height = winH+"px";
                dialogbox.style.left = (winW/2) - (550 * .5)+"px";
                dialogbox.style.top = "100px";
                dialogbox.style.display = "block";
                document.getElementById('dialogboxhead').innerHTML = "Acknowledge This Message";
                document.getElementById('dialogboxbody').innerHTML = dialog;
                document.getElementById('dialogboxfoot').innerHTML = '<button onclick="Alert.ok()">OK</button>';
            }
            this.ok = function(){
                document.getElementById('dialogbox').style.display = "none";
                document.getElementById('dialogoverlay').style.display = "none";
            }
        }
        var Alert = new CustomAlert();
    </script>

    <!--    clear input: -->
    <script>
        let btnclear=document.querySelector('button');
        let inputs=document.querySelectorAll('input');
        btnclear.addEventListener('click',()=>{
            inputs.forEach(input => input.value='');
        });
    </script>

</body>
</html>