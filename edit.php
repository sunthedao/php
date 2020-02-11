<?php require_once './connect.php';
$connection = DB();

$data = [
    'id' => '',
    'Firstname' => '',
    'Lastname' => '',
    'Email' => '',
    'MobileNo' => '',
    'Address' => '',
];

if (isset($_GET['id'])) {
    $sql = "SELECT * FROM users WHERE id ='$_GET[id]'";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($query);

    }




?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="style.css">

    <!-- awesome Font -->
    <script src="https://kit.fontawesome.com/c1e251547b.js" crossorigin="anonymous"></script>


    <title>Main Index</title>
</head>

<body>
    <div class="container">

        <h1 style="text-align: center">Edit Data</h1>

        <div class="container">
            <form action="save.php" method="POST" name="save" class="MyForm">
                <div class="modal-body">
                        <!-- check sent ID -->
                        <?php if (isset($_GET['id'])) ; ?> 
                    <input type="hidden" name="id" value="<?= $_GET['id']?>">
                        <? endif ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Firstname</label>
                        <input type="text" class="form-control" value="<?= $row['Firstname']?>" name="Firstname">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Lastname</label>
                        <input type="text" class="form-control" value="<?= $row['Lastname']?>" name="Lastname">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" class="form-control" value="<?= $row['Email']?>" name="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Mobile No.</label>
                        <input type="number" class="form-control" value="<?= $row['MobileNo']?>" name="MobileNo">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Address</label>
                        <textarea class="form-control" rows="3" name="Address"><?= $row['Address'] ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-default" data-dismiss="modal"><a href="index.php">Close</a></button>
                    <input button type="submit" class="btn btn-primary" name="editdata" value="SAVE"></input>
                 
                </div>
            </form>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<?php
mysqli_close($connection);
?>

</html>