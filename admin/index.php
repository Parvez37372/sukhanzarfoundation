<?php
session_start();

// Optional: protect this page
if (!isset($_SESSION['admin_user'])) {
    header("Location: login.php");
    exit();
}
?>
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <div>
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
            <div class="container-fluid">
                <!-- Row -->
                <div class="card-group">
                    <div class="card m-1" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="m-b-0"><i class="mdi mdi-briefcase-check text-info"></i></h2>
                                    <h3 class="">2456</h3>
                                    <h6 class="card-subtitle">View Property</h6></div>
                                <!-- <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card m-1" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="m-b-0"><i class="mdi mdi-alert-circle text-success"></i></h2>
                                    <h3 class="">546</h3>
                                    <h6 class="card-subtitle">View Users</h6></div>
                                <!-- <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 40%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card m-1" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="m-b-0"><i class="mdi mdi-wallet text-purple"></i></h2>
                                    <h3 class=""><?php
include('config.php');
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM blogs");
$data = mysqli_fetch_assoc($result);
$totalBlogs = $data['total'];
?>
<?= $totalBlogs ?> 
</h3>
                                    <h6 class="card-subtitle">View Blogs</h6></div>
                                <!-- <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 56%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <!-- <div class="card m-1" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="m-b-0"><i class="mdi mdi-buffer text-warning"></i></h2>
                                    <h3 class="">$30010</h3>
                                    <h6 class="card-subtitle">Total Earnings</h6></div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 26%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- Row -->  
            </div>
         <style>

    .blog-card {
        max-width: 600px;
        margin-right: 500px; /* Align to left */
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .blog-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .card-body {
        padding: 20px;
    }

    .read-more-content {
        display: none;
        margin-top: 15px;
    }

    .btn-toggle {
        margin-top: 10px;
    }
</style>
<?php include('config.php'); ?>

<div class="page-wrapper">
    <div class="container-fluid">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM blogs ORDER BY id DESC LIMIT 1");
        if ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="card blog-card">
                <img src="<?= $row['image'] ?>" alt="Latest Blog">
                <div class="card-body">
                    <h4 class="card-title"><?= htmlspecialchars($row['heading']) ?></h4>
                    <p class="text-muted mb-1">Published on <?= date('d M Y', strtotime($row['date'])) ?> by <?= htmlspecialchars($row['author']) ?></p>

                    <div id="readMoreContent" class="read-more-content">
                        <?= $row['content'] ?>
                    </div>

                    <button class="btn btn-primary btn-toggle" onclick="toggleContent()">Read More</button>
                </div>
            </div>
        <?php } else { ?>
            <div class="alert alert-info text-center mt-4">No blog available yet.</div>
        <?php } ?>
    </div>
</div>

<script>
    function toggleContent() {
        const content = document.getElementById('readMoreContent');
        const button = document.querySelector('.btn-toggle');

        if (content.style.display === 'none' || content.style.display === '') {
            content.style.display = 'block';
            button.innerText = 'Show Less';
        } else {
            content.style.display = 'none';
            button.innerText = 'Read More';
        }
    }
</script>


<?php include('includes/footer.php');?>

<?php if (isset($_GET['login']) && $_GET['login'] === 'success'): ?>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Login Successful 🎉',
    text: 'Welcome, Sukhanzar Foundation Admin!',
    confirmButtonColor: '#183b4a'
  });
</script>
<?php endif; ?>