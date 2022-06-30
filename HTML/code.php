<?php
session_start();
$connection=mysqli_connect("localhost","root","","cinema");
if(isset($_POST['registerbtn'])){
    $id=$_POST['UserID'];
    $Fname=$_POST['Fname'];
    $Lname=$_POST['Lname'];
    $email=$_POST['email'];
    $password=SHA1($_POST['password']);
    $cpassword=SHA1($_POST['confirmpassword']);
    if($id!=null && $Fname!=null && $Lname!=null && $email!=null && $password!=null && $cpassword!=null) {
        if ($password === $cpassword) {
            $query = "INSERT INTO person(personal_ID,Fname,Lname,Email_Address) VALUES ('$id','$Fname','$Lname','$email')";
            $query_run = mysqli_query($connection, $query);
            $query = "INSERT INTO admin(personal_ID,Apassword) VALUES ('$id','$password')";
            $query_run = mysqli_query($connection, $query);
            if ($query_run) {
                $_SESSION['success'] = "Admin Profile Added";
                header('Location:RegisterAdmin.php');
            } else {
                $_SESSION['status'] = "Admin Profile Not Added";
                header('Location:RegisterAdmin.php');
            }
        } else {
            $_SESSION['status'] = "Password And Confirm Password Does Not Match";
            header('Location:RegisterAdmin.php');
        }
    }
    else{
        $_SESSION['status']="The admin was NOT added because you did not fill in all the fields";
        header('Location:RegisterAdmin.php');
    }

}





//****************

if(isset($_POST['updatebtn'])){
    $id=$_POST['edit_id'];
    $Lname=$_POST['edit_Lname'];
    $Fname=$_POST['edit_Fname'];
    $email=$_POST['edit_email'];
    $password=SHA1($_POST['edit_password']);

    $query="UPDATE person SET personal_ID='$id',Fname='$Fname',Lname='$Lname',Email_Address='$email' WHERE personal_ID='$id'";
    $query_run=mysqli_query($connection,$query);
    $query="UPDATE admin SET Apassword='$password',personal_ID='$id' WHERE personal_ID='$id'";
    $query_run=mysqli_query($connection,$query);
    if($query_run){
        $_SESSION['success']="Your Data Is Updated";
        header('Location:RegisterAdmin.php');
    }
    else{
        $_SESSION['status']="Your Data Is NOT Updated";
        header('Location:RegisterAdmin.php');
    }
}

//************
if(isset($_POST['delete_btn'])){
    $id=$_POST['delete_id'];
    $query="DELETE FROM person WHERE personal_ID='$id'";
    $query_run=mysqli_query($connection,$query);
    $query="DELETE FROM admin WHERE personal_ID='$id'";
    $query_run=mysqli_query($connection,$query);
    if($query_run){
        $_SESSION['success']="Your Data Is Deleted";
        header('Location:RegisterAdmin.php');
    }
    else{
        $_SESSION['status']="Your Data Is NOT Deleted";
        header('Location:RegisterAdmin.php');
    }
}

?>