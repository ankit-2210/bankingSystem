<?php
    include("./dbConnection.php");
    include("./header.php");

?>


<div class="container my-4">
    <h1 class="text-center py-4">History</h1>
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Balance</th>
            </tr>
        </thead>
        <tbody>
            <?php
              $select = "SELECT * FROM tranfers";
              $select_query = mysqli_query($con, $select);
              $row = mysqli_num_rows($select_query);
              $sno = 0;

              while($row=mysqli_fetch_assoc($select_query)){
                  $sno = $sno + 1;
            ?>
            <tr>
                <th scope='row'><?php echo $sno ?></th>
                <td><?php echo $row['sender'] ?></td>
                <td><?php echo $row['receiver'] ?></td>
                <td>Rs. <?php echo $row['amount'] ?></td>
            </tr>

            <?php
            
            }

            ?>

        </tbody>
    </table>
</div>

<?php
    include("./footer.php");
?>