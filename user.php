<?php
    include("./dbConnection.php");
    include("./header.php");

    if(isset($_REQUEST['newUser'])){
        // Checking for empty fields
        if(($_REQUEST['name'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['balance'] == "")){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        }
        else{
            // Capture the data coming from input
            $name = mysqli_real_escape_string($con,$_POST['name']);
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $balance = mysqli_real_escape_string($con,$_POST['balance']);
            
            $len = strlen($name);
            $select="SELECT id, email FROM users WHERE email='$email'";
            $select_query=mysqli_query($con,$select);
            $row= mysqli_num_rows($select_query);

            if (($balance) < 100 ){
                $msg = '<div class="alert alert-warning col-sm-6 my-3">Minimum balance should be 100rs</div>';
            }
            else if (($len)< 3 ){
                $msg = '<div class="alert alert-warning col-sm-6 my-3">Enter your full name</div>';
            }
            else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                $msg = '<div class="alert alert-warning col-sm-6 my-3">Invalid email format</div>';
            }
            else if($row >0){
                $msg = '<div class="alert alert-warning col-sm-6 my-3">User existed</div>';

            }
            else{
                $insert = "INSERT INTO users (name, email, balance) VALUES ('$name', '$email', '$balance')";
            
                $insert_query=mysqli_query($con,$insert);
                if($insert_query){
                    $msg = '<div class="alert alert-success col-sm-6 my-3">User Creation Succesfully !</div>';  
                    echo "<script>
                    window.location='transaction.php';
                    </script>";
                }
                else{
                    $msg = '<div class="alert alert-danger col-sm-6 my-3">Unable To User Creation </div>';
                }

            }
        }
    }
?>


<div class="container py-4">
    <h1 class="text-center">New User</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="name">Total Balance</label>
            <input type="text" class="form-control" id="balance" name="balance" placeholder="Enter your total balance">
        </div>

        <button id="submit" class="btn btn-primary" id="newUser" name="newUser">Submit</button>
        <?php
            if(isset($msg)){
                echo $msg;
            }
        ?>
    </form>

</div>


<?php
    include("./footer.php");
?>