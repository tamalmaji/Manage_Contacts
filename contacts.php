<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'partials/_dbconnect.php'?>
<?php include 'partials/_header.php'?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                 $contactsid = $_GET['catid'];
                    $sql2 = "SELECT * FROM `contacts`";
                    $result2= mysqli_query($conn, $sql2);
                    while($row = mysqli_fetch_assoc($result2)){
                        // $id = $row['id'];
                        $companyid	 = $row['companyid'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $phone = $row['phone'];
                        $designation = $row['designation'];                    
                    }
                ?>
                <div class="jumbotron">
                    <h1>Contacts Details</h1>
                    <p>Contacts Company ID : <?php echo $companyid; ?> </p>
                    <p>Contacts Name : <?php echo $name; ?> </p>
                    <p>Contacts Email Address: <?php echo $email; ?> </p>
                    <p>Contacts Phone No : <?php echo $phone; ?> </p>
                    <p>Contacts designation : <?php echo $designation; ?> </p>               
                </div>
            </div>
        </div>
    </div>
</body>
</html>