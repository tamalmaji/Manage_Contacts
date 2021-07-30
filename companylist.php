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
    <?php
        $c_id = $_GET['catid'];
        $sql = "SELECT * FROM `companylist`  WHERE id =$c_id";
        $result= mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
             $companyname = $row['companyname'];
             $email = $row['email'];
             $phone = $row['phone'];
             $address = $row['address'];
             $city = $row['city'];
            }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <h1>company Details</h1>
                    <p>Company Name : <?php echo $companyname; ?> </p>
                    <p>Company Email Address: <?php echo $email; ?> </p>
                    <p>Company Phone No : <?php echo $phone; ?> </p>
                    <p>Company Address : <?php echo $address; ?> </p>
                    <p>Company City : <?php echo $city; ?> </p>
                </div>
            </div>
            <div class="col-12">
                <?php 
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $companyid = $_GET['catid'];
                        // $companyid = $_POST['companyid'];
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $designation = $_POST['designation'];
                        $sql2 = "INSERT INTO `contacts` (`companyid`, `name`, `email`, `phone`, `designation`) VALUES ('$companyid', '$name', '$email', '$phone', '$designation')";
                        $result = mysqli_query($conn, $sql2);
                    } 
                ?>
                <form action="<?php $_SERVER["REQUEST_METHOD"] ?>" method="post">
                    <div class="mb-3">
                        <label for="exampleInputcompanyname" class="form-label">Enter Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputemail" class="form-label">Enter Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputemail" class="form-label">Enter Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
                    </div>
                    <input type="hidden" name="">
                    <div class="mb-3">
                        <label for="exampleInputemail" class="form-label">Enter Designation</label>
                        <textarea class="form-control" name="designation" id="designation" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sno</th>
                            <th scope="col">Company ID</th>
                            <th scope="col">Name</th>
                            <!-- <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Designation</th> -->
                            <th scope="col">Edit</th>
                            <th scope="col">Deletion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $companyid = $_GET['catid'];
                            $sql2 = "SELECT * FROM `contacts` WHERE companyid=$companyid";
                            $result2= mysqli_query($conn, $sql2);
                            while($row = mysqli_fetch_assoc($result2)){
                                $id = $row['id'];
                                $companyid	 = $row['companyid'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $designation = $row['designation'];
                                echo '
                                <tr>
                                <th scope="row">'.$id.'</th>
                                <td class="td-link">  '.$companyid.'</td>
                                <td><a href="contacts.php?contactsid=' . $id . '">'.$name.' </a></td>';
                                //  <td class="td-link">  '.$email.'</td>
                                // <td class="td-link">  '.$phone.'</td>
                                // <td class="td-link">  '.$designation.'</td>
                                echo '<td>
                                    <a href="contacts.php?catid=' . $id . '" class="btn btn-primary">View</a>
                                </td>
                                <td>
                                <a href="updatecontacts.php?id='.$id.'&companyid='.$companyid.'&name='.$name.'&email='.$email.'&phone='.$phone.'&designation='.$designation.'"  class="btn btn-primary" >Edit</a>
                                </td>
                                <td>
                                <a href="partials/_deletecontacts.php?catid=' . $id . '" class="btn btn-primary">Delete</a>
                                </td>
                              </tr>
                                ';
                            }
                        ?>
                        <a href=""></a>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>