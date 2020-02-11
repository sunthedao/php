<?php require_once './connect.php' ?>
<?php $connection = DB() ?>
<?php
// button insertdata ถ้ามีการกดปุ่มจะเป็นการ insert และ
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

// ถ้ามีการส่งค่า ID มา จะเป็นการ update
if(isset($_POST['id'])){
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Email = $_POST['Email'];
    $MobileNo = $_POST['MobileNo'];
    $Address = $_POST['Address'];

    $query = "UPDATE users SET Firstname = '$Firstname', 
    Lastname = '$Lastname',
    Email = '$Email' ,
    MobileNo = '$MobileNo',
    Address = '$Address'
    WHERE id ='$_POST[id]'";
    $result = mysqli_query($connection,$query);
        if($result)
        {
            echo '<script> alert ("Data Saved"); </script>';
            header('Location: index.php');
    
        } else {
            echo '<script> alert ("Data Not Saved") ;</script>' .mysqli_error($connection);
        }
    
}

mysqli_close($connection);
?>