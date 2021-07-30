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
    <?php include 'partials/_header.php';?>
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <?php
                    // error_reporting(0);
                    $id2 = $_GET['id'];
                    $companyname2 = $_GET['companyname'];
                    $email2 = $_GET['email'];
                    $phone2 = $_GET['phone'];
                    $address2 = $_GET['address'];
                    $city2 = $_GET['city'];                        

                    
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $id = $_GET['id'];
                        $companyname = $_POST['companyname'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $city = $_POST['city'];

                        $sql = "UPDATE `companylist` SET `companyname` = '$companyname', `email` = '$email', `phone` = '$phone', `address` = ' $address', `city` = '$city' WHERE `companylist`.`id` = $id";
                        $result = mysqli_query($conn, $sql);

                    } 
                ?>
                <form action="<?php $_SERVER["REQUEST_URI"] ?>" method="post">
                    <div class="mb-3">
                        <label for="exampleInputcompanyname" class="form-label">Enter Company Name</label>
                        <input type="text" value="<?php echo $companyname2; ?>" class="form-control" id="companyname"
                            name="companyname" placeholder="CompanyName">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputemail" class="form-label">Enter Email</label>
                        <input type="text" value="<?php echo $email2; ?>" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputemail" class="form-label">Enter Phone</label>
                        <input type="text" value="<?php echo $phone2; ?>" class="form-control" id="phone" name="phone" placeholder="phone">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputemail" class="form-label">Enter Address</label>
                        <input type="text" value="<?php echo $address2; ?>" class="form-control" id="address" name="address" placeholder="Address">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputemail" class="form-label">Enter city</label>
                        <input type="text" value="<?php echo $city2; ?>" class="form-control" id="city" name="city" placeholder="City">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>