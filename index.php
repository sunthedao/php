<?php require_once './connect.php';
$connection = DB();
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

    <!-- Search form -->
    <div class="container">
        <!--  //! div align left-right เค้าจะไม่นิยมใช้งานในนี้ เค้าจะจัด style ใน CSS -->
        <div align="left" id="first" class="row">
            <div class="col">
                <form class="form-inline md-form form-sm active-cyan-2 mt-2" action="" method="GET">
                    <input name="name" class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search" aria-label="Search" 
                    <?php echo ((isset($_GET['name'])) ? 'value= '. $_GET['name'] :'').''?> >
                    <! //!-- echo แบบมีเงื่อนไข -->
                    <i class="fas fa-search" aria-hidden="true"></i>
                </form>
            </div>
            
            <!-- icon -->

            <!-- //! div align left-right เค้าจะไม่นิยมใช้งานในนี้ เค้าจะจัด style ใน CSS -->
            <!-- //! พวก icon ให้จำไว้ว่าถ้าเป็นปุ่มน่ะ เราจะต้องใช้ tag button หรือ a ครอบด้วย  ถ้าเป็น icon ที่ใช้แสดงเฉยๆ ไม่ได้กดอะไร ก็ไม่ต้องครอบ -->
            <!-- //! แล้วก็การจัดปุ่ม ซ้าย ขวา กลาง มันจะมี class ชื่อว่า float-ตามด้วยตำแหน่งที่เราต้องการ ถ้าชิดขวาก็ float-right -->
            <div align="right" class="col">
                <button type="button" class="btn btn-sm btn-light color-green" value="1">
                    <i class="fas fa-2x fa-plus" id="icon" data-toggle="modal" data-target="#myModal"></i>
                </button>
            </div>
        </div>
    </div>
    <br>


    <!-- Show Table -->
    <div class="container">
        <table class="table table-striped" style="width: 100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Mobile No.</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($_GET['name'])) {
                    //! define how many results you want per page
                    $results_per_page = 10;

                    //! find out the number of results rows in database
                    $sql1 = "SELECT * FROM users";
                    $result = mysqli_query($connection, $sql1);
                    //! check how many rows with mysqli_num_rows
                    $number_of_results = mysqli_num_rows($result);


                    //! determine number of total pages available
                    // number of page = result / 10;
                    $number_of_pages = ceil($number_of_results / $results_per_page);

                    // !determine which page number visitor is currently on
                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $valueSearch = $_GET['name'];
                    $sql = "SELECT * from users WHERE firstname LIKE '%$valueSearch%' LIMIT 10";
                    $SearchResult = mysqli_query($connection, $sql);

                    while ($row = mysqli_fetch_array($SearchResult)) {
                        echo  "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["Firstname"] . "</td>";
                        echo "<td>" . $row["Lastname"] . "</td>";
                        echo "<td>" . $row["Email"] . "</td>";
                        echo "<td>" . $row["MobileNo"] . "</td>";
                        echo "<td>" . $row["Address"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    // $sql = "SELECT * from users LIMIT 10";
                    // $result = mysqli_query($connection, $sql);

                    //! define how many results you want per page
                    $results_per_page = 10;

                    //! find out the number of results rows in database
                    $sql1 = "SELECT * FROM users";
                    $result = mysqli_query($connection, $sql1);
                    //! check how many rows with mysqli_num_rows
                    $number_of_results = mysqli_num_rows($result);


                    //! determine number of total pages available
                    // number of page = result / 10;
                    $number_of_pages = ceil($number_of_results / $results_per_page);

                    // !determine which page number visitor is currently on
                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    //! determine the sql LIMIT starting number for the results on the displaying page
                    // page 1 10 results per page , LIMIT 0,10
                    // page 2 10 results per page , LIMIT 10,10
                    // page 3 10 results per page , LIMIT 20,10
                    // starting_limit_number = (page1-1)*10
                    $this_page_first_result = ($page - 1) * $results_per_page;
                    // retrieve selected results from database and display them on page
                    $sql = "SELECT * from users ORDER BY id DESC LIMIT " . $this_page_first_result .  ',' . $results_per_page;
                    $result = mysqli_query($connection, $sql);

                    while ($rows = mysqli_fetch_array($result)) {
                        echo  "<tr>";
                        echo "<td>" . $rows["id"] . "</td>";
                        echo "<td>" . $rows["Firstname"] . "</td>";
                        echo "<td>" . $rows["Lastname"] . "</td>";
                        echo "<td>" . $rows["Email"] . "</td>";
                        echo "<td>" . $rows["MobileNo"] . "</td>";
                        echo "<td>" . $rows["Address"] . "</td>";
                        echo "</tr>";
                    }
                }
                ?>


            </tbody>

        </table>
    </div>
    <br>

    <!-- pagination -->

    <div class="container">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php              
                for ($page = 1; $page <= $number_of_pages; $page++) {
                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $page . 
                    ((isset($_GET['name'])) ? "&name=" .$_GET['name']: '' ).'">'  .  $page   .  ' </a></li>  ';         
                    //! &name ถ้าให้มันแสดงออกไป url (www.gdsf.com/id=12&name=)  ใส่double quote แต่ถ้าให้มันแสดงเป็น Code ใส่ Single quote '<li>'
                    
                }
         
                ?>

                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
                </li>
            </ul>
        </nav>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Create Users</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="save.php" method="POST" name="save" class="MyForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Firstname</label>
                            <input type="text" class="form-control" name="Firstname">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Lastname</label>
                            <input type="text" class="form-control" name="Lastname">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email" class="form-control" name="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Mobile No.</label>
                            <input type="number" class="form-control" name="MobileNo">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Address</label>
                            <textarea class="form-control" rows="3" name="Address"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="insertdata" value="submit">Save</button>
                    </div>
                </form>
            </div>
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