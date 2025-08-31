<?php 
include('includes/header.php');
include('includes/sidebar.php');
include('config.php'); // Database connection
?>
<style>
    .pd {
        padding: 0px 5px;
    }
    .ticket-img {
        width: 80px;
        height: auto;
        border-radius: 5px;
    }
</style>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">View Tickets</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Image</th>
                                    <th>Heading</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Host Name</th>
                                    <th>Location</th>
                                    <th>Map</th>
                                    <th>Audience Price</th>
                                    <th>Performer Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM add_ticket ORDER BY id DESC";
                                $result = mysqli_query($conn, $sql);
                                $count = 1;
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<tr>
                                            <td>".$count++."</td>
                                            <td><img src='uploads/".$row['image']."' class='ticket-img'></td>
                                            <td>".$row['heading']."</td>
                                            <td>".$row['event_date']."</td>
                                            <td>".$row['event_time']."</td>
                                            <td>".$row['hostname']."</td>
                                            <td>".$row['location']."</td>
                                            <td><a href='".$row['map_link']."' target='_blank'>View Map</a></td>
                                            <td>₹".$row['audience_price']."</td>
                                            <td>₹".$row['performer_price']."</td>
                                            <td>
                                                <a href='edit_ticket.php?id=".$row['id']."' class='btn btn-warning pd'><i class='fa fa-edit'></i></a>
                                                <a href='delete_ticket.php?id=".$row['id']."' class='btn btn-danger pd' onclick=\"return confirm('Are you sure?');\"><i class='fa fa-trash'></i></a>
                                            </td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='11' class='text-center'>No Tickets Found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
