
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
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

        </style>
</head>

<body>

<div class="intro">
    <h1 class="logoheader">
            <span class="logo">Lo<span class="logo">go</span>
            </span>
    </h1>
</div>
<div class="first">
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

<div style="height: 500px"></div>
<br><br><br>
<!--    table for movies:    -->
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>ShowDay</th>
            <th>ShowHall</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>image 1</td>
            <td>Luca</td>
            <td>22/4/2021</td>
            <td>4A</td>
            <td>TEXT</td>
        </tr>
        <tr>
            <td>image 1</td>
            <td>Luca</td>
            <td>22/4/2021</td>
            <td>4A</td>
            <td>TEXT</td>
        </tr>
        <tr>
            <td>image 1</td>
            <td>Luca</td>
            <td>22/4/2021</td>
            <td>4A</td>
            <td>TEXT</td>
        </tr>
        </tbody>
<table>

</table>
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
