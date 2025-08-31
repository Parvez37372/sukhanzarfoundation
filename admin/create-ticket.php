<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<?php include('config.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $heading = $_POST['heading'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    $hostname = $_POST['hostname'];
    $location = $_POST['location'];
    $map_link = $_POST['map_link'];
    $audience_price = $_POST['audience_price'];
    $performer_price = $_POST['performer_price'];

    $sql = "INSERT INTO add_ticket 
    (image, heading, event_date, event_time, hostname, location, map_link, audience_price, performer_price) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssdd", $image, $heading, $event_date, $event_time, $hostname, $location, $map_link, $audience_price, $performer_price);

    if ($stmt->execute()) {
        echo "<script>alert('Ticket Added Successfully'); window.location='view_tickets.php';</script>";
    } else {
        echo "<script>alert('Error Adding Ticket');</script>";
    }
}
?>

<div class="page-wrapper">
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Add Ticket</h4>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-body">

                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Event Image</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Event Heading</label>
                                    <input type="text" name="heading" class="form-control" placeholder="Event Heading" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Event Date</label>
                                    <input type="date" name="event_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Event Time</label>
                                    <input type="text" name="event_time" class="form-control" placeholder="e.g. 7:00 PM - 10:00 PM" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Host Name</label>
                                    <input type="text" name="hostname" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Location</label>
                                    <input type="text" name="location" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Map Link (Embed URL)</label>
                                    <textarea name="map_link" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Audience Price</label>
                                    <input type="number" step="0.01" name="audience_price" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Performer Price</label>
                                    <input type="number" step="0.01" name="performer_price" class="form-control" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php include('includes/footer.php'); ?>
