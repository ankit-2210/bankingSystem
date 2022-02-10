<?php
    include("./dbConnection.php");
    include("./header.php");


    $sid = $_GET['id'];
    $select = "SELECT * FROM users where id=$sid";
    $select_query = mysqli_query($con,$select);
    $row = mysqli_fetch_assoc($select_query);

    if(isset($_POST['transfer'])){
        $from = $_GET['id'];
        $to = $_POST['to'];
        $amount = $_POST['amount'];


        $sender = "SELECT * from users where id=$from";
        $sender_query = mysqli_query($con, $sender);
        $row1 = mysqli_fetch_array($sender_query);

        $receiver = "SELECT * from users where id=$to";
        $receiver_query = mysqli_query($con, $receiver);
        $row2 = mysqli_fetch_array($receiver_query);

        if(($amount) < 0){
            $msg = '<div class="alert alert-warning col-sm-6 my-3">Oops! Negative values cannot be transferred</div>';
        }
        else if($amount > $row1['balance']){
            $msg = '<div class="alert alert-warning col-sm-6 my-3">Insufficient Balance</div>';
        }
        else if($amount == 0){
            $msg = '<div class="alert alert-warning col-sm-6 my-3">Zero value cannot be transferred</div>';
        }
        else{
            $newbalance = $row1['balance'] - $amount;
            $newSql1 = "UPDATE users set balance=$newbalance where id=$from";
            mysqli_query($con, $newSql1);

            $newbalance = $row2['balance'] + $amount;
            $newSql2 = "UPDATE users set balance=$newbalance where id=$to";
            mysqli_query($con, $newSql2);


            $senderh = $row1['name'];
            $receiveh = $row2['name'];
            $insert = "INSERT INTO tranfers(`sender`, `receiver`, `amount`) VALUES ('$senderh','$receiveh','$amount')";
            $query = mysqli_query($con, $insert);

            if($query){
                echo "<script> alert('Transaction Successful');
                window.location='history.php';
                </script>";
            }
            else{
                $msg = '<div class="alert alert-danger col-sm-6 my-3">Unable to Transfer Transaction </div>';
            }

            $newbalance= 0;
            $amount =0;
            
        }

    }
    

?>

<div class="container">
    <h2 class="text-center" style="margin-top: 30px;">Transaction</h2>
    <br>
    <div class="row">
        <form method="POST" name="send">
            <table class="table table-hover">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                </thead>
                <tbody>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['balance'] ?></td>
                </tbody>
            </table>

            <br><br>

            <label>Transfer To:</label>
            <select name="to" class="form-control" required>
                <option value="" disabled selected>Choose</option>
                <?php
                    $sid = $_GET['id'];
                    $sql = "SELECT * FROM users where id != $sid";
                    $sql_query = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($sql_query)){
                ?>

                <option class="table" value="<?php echo $row['id'];?>">
                    <?php echo $row['name'] ;?>
                </option>

                <?php
                    }
                ?>

            </select>

            <br>
            <label>Amount:</label>
            <input type="number" class="form-control" step="0.01" name="amount" required>
            <br>
            <div>
                <button class="btn btn-danger" name="transfer" type="submit">Transfer</button>
            </div>

            <?php
            if(isset($msg)){
                echo $msg;
            }
        ?>
        </form>
    </div>
</div>


<?php
    include("./footer.php");
?>