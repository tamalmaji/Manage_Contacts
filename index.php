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
    <style>
    .td-link a {
        text-decoration: none;
    }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'?>
    <?php include 'partials/_header.php'?>
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $companyname = $_POST['companyname'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $city = $_POST['city'];

                        $sql = "INSERT INTO `companylist` (`companyname`, `email`, `phone`, `address`, `city`) VALUES ('$companyname', '$email', '$phone', '$address', '$city')";
                        $result = mysqli_query($conn, $sql);

                    }    
                ?>
                <form action="<?php $_SERVER["REQUEST_URI"] ?>" method="post">
                    <div class="mb-3">
                        <label for="exampleInputcompanyname" class="form-label">Enter Company Name</label>
                        <input type="text" class="form-control" id="companyname" name="companyname"
                            placeholder="CompanyName">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputemail" class="form-label">Enter Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputemail" class="form-label">Enter Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputemail" class="form-label">Enter Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputemail" class="form-label">Enter city</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="City">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sno</th>
                            <th scope="col">companyname</th>
                            <th scope="col">View</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Deletion</th>   
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql2 = "SELECT * FROM `companylist`";
                            $result2= mysqli_query($conn, $sql2);
                            
                            
                            while($row = mysqli_fetch_assoc($result2)){
                                $id = $row['id'];
                                $companyname = $row['companyname'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $address = $row['address'];
                                $city = $row['city'];
                                echo '
                                <tr>
                                <th scope="row">'.$id.'</th>
                                <td class="td-link"> <a href="companylist.php?catid=' . $id . '"> '.$companyname.'</a></td>
                                <td>
                                    <a href="companylist.php?catid=' . $id . '" class="btn btn-primary">View</a>
                                </td>
                                <td>
                                <a href="updatecompanylist.php?companyname='.$companyname.'&id='.$id.'&email='.$email.'&phone='.$phone.'&address='.$address.'&city='.$city.'"  class="btn btn-primary" >Edit</a>
                                </td>
                                <td>
                                    <a href="partials/_deletecompanylist.php?catid=' . $id . '" class="btn btn-primary">Delete</a>
                                </td>
                              </tr>
                                ';
                                
                            }
                        ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</body>

</html>