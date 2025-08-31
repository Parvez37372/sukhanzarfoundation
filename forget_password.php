<?php include('includes/header.php') ?>

<div class="user-area ptb-100 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">



                
                    <form action="send_reset_link.php" method="post">
    <div class="forgetPass text-center">
        <div class="lock d-flex mx-auto">
            <img src="assets/images/lock.png" alt="">
        </div>
        <h3 class="">Forgot Password</h3>
        <h6 class="text-grey">Please enter your registered email*</h6>
        <input type="email" class="form-control mt-3" placeholder="Enter Email" name="email" required>
        <button type="submit" class="btn common-btn text-center mb-3">Reset Password</button>
    </div>
</form>

                
            </div>
            <div class="col-lg-6">
                <div class="right-swction">
                    <img src="assets/images/login.png" alt="">
                </div>
            </div>
        </div>


    </div>
</div>

<?php include('includes/footer.php') ?>