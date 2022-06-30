<?php
session_start();
$connection=mysqli_connect("localhost","root","","cinema");
if(isset($_POST['registerbtn'])){
    $Mname=$_POST['moviename'];
    $day=$_POST['showday'];
    $date=$_POST['showdate'];
    $hallnum=$_POST['hallnumber'];
    $discription=$_POST['moviediscription'];
    $movierate=$_POST['movierate'];
    $picture="../imgs/".$_POST['moviepicture'];
    $trailer="../video/".$_POST['movietrailer'];

    if($Mname!=null && $day!=null && $date!=null && $hallnum!=null && $movierate!=null && $discription!=null && $picture!=null && $trailer!=null){

//        $query="INSERT INTO hall(hallNum) VALUES ('$hallnum')";
//        $query_run=mysqli_query($connection,$query);
//        $query="INSERT INTO days(showDay) VALUES ('$day')";
//        $query_run=mysqli_query($connection,$query);
        $query="INSERT INTO movie(Mname,showDay,hallNum,showDate,photo,description,video,rate) VALUES ('$Mname','$day','$hallnum','$date','$picture','$discription','$trailer','$movierate')";
        $query_run=mysqli_query($connection,$query);
        if($query_run){
            $_SESSION['success']="Movie Added";
            header('Location:RegisterMovie.php');
        }
        else{
            $_SESSION['status']="Movie Not Added";
            header('Location:RegisterMovie.php');
        }

        $query1="INSERT INTO seats(booked,seatNum,Mname) VALUES ('n','1A','$Mname')";
        $query_run1=mysqli_query($connection,$query1);
        $query1="INSERT INTO seats(booked,seatNum,Mname) VALUES ('n','2A','$Mname')";
        $query_run1=mysqli_query($connection,$query1);
        $query1="INSERT INTO seats(booked,seatNum,Mname) VALUES ('n','3A','$Mname')";
        $query_run1=mysqli_query($connection,$query1);
        $query1="INSERT INTO seats(booked,seatNum,Mname) VALUES ('n','1B','$Mname')";
        $query_run1=mysqli_query($connection,$query1);
        $query1="INSERT INTO seats(booked,seatNum,Mname) VALUES ('n','2B','$Mname')";
        $query_run1=mysqli_query($connection,$query1);
        $query1="INSERT INTO seats(booked,seatNum,Mname) VALUES ('n','3B','$Mname')";
        $query_run1=mysqli_query($connection,$query1);
        $query1="INSERT INTO seats(booked,seatNum,Mname) VALUES ('n','1C','$Mname')";
        $query_run1=mysqli_query($connection,$query1);
        $query1="INSERT INTO seats(booked,seatNum,Mname) VALUES ('n','2C','$Mname')";
        $query_run1=mysqli_query($connection,$query1);
        $query1="INSERT INTO seats(booked,seatNum,Mname) VALUES ('n','3C','$Mname')";
        $query_run1=mysqli_query($connection,$query1);
    }
    else{
        $_SESSION['status']="The movie was NOT added because you did not fill in all the fields";
        header('Location:RegisterMovie.php');
    }

}





//****************

if(isset($_POST['updatebtn'])){
    $Mname=$_POST['edit_name'];
    $day=$_POST['edit_showday'];
    $date=$_POST['edit_showdate'];
    $hallnum=$_POST['edit_hallnumber'];
    $rate=$_POST['edit_rate'];
    $discription=$_POST['edit_moviedescription'];
    $picture="../imgs/".$_POST['edit_moviephoto'];
    $trailer="../video/".$_POST['edit_movieTrailer'];
//    $hallnumold=$_POST['hallnumber'];
//    $dayold=$_POST['showday'];
//    $query="UPDATE hall SET hallNum='$hallnum' WHERE hallNum='$hallnumold' AND movie.Mname='$Mname'";
//    $query_run=mysqli_query($connection,$query);
//
//    $query="UPDATE days SET showDay='$day' WHERE showDay='$dayold' AND movie.Mname='$Mname'";
//    $query_run=mysqli_query($connection,$query);

    $query="UPDATE movie SET Mname='$Mname',showDay='$day',showDate='$date',hallNum='$hallnum',rate='$rate'
               ,description='$discription',photo='$picture',video='$trailer' WHERE Mname='$Mname'";
    $query_run=mysqli_query($connection,$query);
    if($query_run){
        $_SESSION['success']="Movie Is Updated";
        header('Location:RegisterMovie.php');
    }
    else{
        $_SESSION['status']="Movie Is NOT Updated";
        header('Location:RegisterMovie.php');
    }
}

//************
if(isset($_POST['delete_btn'])){
    $Mname=$_POST['delete_id'];
//    $day=$_POST['showday'];
//    $hallnum=$_POST['hallnumber'];
//    $query="DELETE FROM hall WHERE  hallNum='$hallnum' AND movie.Mname='$Mname'";
//    $query_run=mysqli_query($connection,$query);
//    $query="DELETE FROM days WHERE ShowDay='$day' AND movie.Mname='$Mname'";
//    $query_run=mysqli_query($connection,$query);
    $query="SELECT Mname FROM seats WHERE Mname='$Mname'" ;
    $query_run=mysqli_query($connection,$query);
    for ($i=0;$i<'9';$i++){
        $query="DELETE FROM seats WHERE Mname='$Mname'";
        $query_run=mysqli_query($connection,$query);
    }
    $query="DELETE FROM movie WHERE Mname='$Mname'";
    $query_run=mysqli_query($connection,$query);
    if($query_run){
        $_SESSION['success']="Movie Is Deleted";
        header('Location:RegisterMovie.php');
    }
    else{
        $_SESSION['status']="Movie Is NOT Deleted";
        header('Location:RegisterMovie.php');
    }
}

?>