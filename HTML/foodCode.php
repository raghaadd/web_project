<?php
session_start();
$connection=mysqli_connect("localhost","root","","cinema");
if(isset($_POST['registerbtn'])){
    $foodName=$_POST['foodname'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $photo="../imgs/".$_POST['photo'];
    if($foodName!=null && $price!=null && $description!=null && $photo!=null ){
        $query="INSERT INTO food(foodName,price,description,photo) VALUES ('$foodName','$price','$description','$photo')";
        $query_run=mysqli_query($connection,$query);
        if($query_run){
            $_SESSION['success']="Snack Added";
            header('Location:RegisterFood.php');
        }
        else{
            $_SESSION['status']="Snack Not Added";
            header('Location:RegisterFood.php');
        }
    }
    else{
        $_SESSION['status']="The Snack was NOT added because you did not fill in all the fields";
        header('Location:RegisterFood.php');
    }

}





//****************

if(isset($_POST['updatebtn'])){
    $foodName=$_POST['edit_foodname'];
    $price=$_POST['edit_foodprice'];
    $description=$_POST['edit_fooddiscription'];
    $photo="../imgs/".$_POST['edit_foodphoto'];
    $foodNameold=$_POST['foodname'];
    $query="UPDATE food SET foodName='$foodName',price='$price',description='$description',photo='$photo' WHERE foodName='$foodName'";
    $query_run=mysqli_query($connection,$query);
    if($query_run){
        $_SESSION['success']="Snack Is Updated";
        header('Location:RegisterFood.php');
    }
    else{
        $_SESSION['status']="Snack Is NOT Updated";
        header('Location:RegisterFood.php');
    }
}

//************
if(isset($_POST['delete_btn'])){
    $foodName=$_POST['delete_id'];

    $query="DELETE FROM food WHERE foodName='$foodName'";
    $query_run=mysqli_query($connection,$query);
    if($query_run){
        $_SESSION['success']="Snack Is Deleted";
        header('Location:RegisterFood.php');
    }
    else{
        $_SESSION['status']="Snack Is NOT Deleted";
        header('Location:RegisterFood.php');
    }
}

?>