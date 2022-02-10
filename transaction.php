<?php
    include("./dbConnection.php");
    include("./header.php");
?>


<div class="container my-4" style="padding-bottom: 150px">
    <h1 class="text-center py-4">Transfer Money</h1>
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Balance</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $select = "SELECT * FROM users";
                $select_query = mysqli_query($con, $select);
                $row = mysqli_num_rows($select_query);
                $sno = 0;

                while($row=mysqli_fetch_assoc($select_query)){
                    $sno = $sno + 1;
            ?>
            <tr>
                <th scope='row'><?php echo $sno ?></th>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td>Rs. <?php echo $row['balance'] ?></td>
                <td><a href="transfer.php?id= <?php echo $row['id'] ; ?>"> <button type="button"
                            class="btn btn-sm btn-primary">Tranfer</button></a></td>
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