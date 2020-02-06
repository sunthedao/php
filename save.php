<?php require_once './connect.php' ?>
<?php $connection = DB() ?>
<?php

if(isset($_POST['insertdata']))
{
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Email = $_POST['Email'];
    $MobileNo = $_POST['MobileNo'];
    $Address = $_POST['Address'];

    $query = "INSERT INTO users (Firstname,Lastname,Email,MobileNo,Address) VALUES ('$Firstname','$Lastname','$Email','$MobileNo','$Address')";
    $mysqli_run = mysqli_query($connection,$query);

    if($mysqli_run)
    {
        echo '<script> alert ("Data Saved"); </script>';
        header('Location: index.php');

    } else {
        echo '<script> alert ("Data Not Saved") ;</script>' .mysqli_error($connection);
    }


}


mysqli_close($connection);
?>