<?php include('includes/header.php') ?>

<div class="user-area ptb-100 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">




                <div class="forgetPass">
                    <div class="lock">
                        <img src="assets/images/lock.png" alt="">
                    </div>
                    <h3 style="text-align: left;">Confirm Password</h3>

                    <div class="form-group" style="position: relative;">
                        <label class="mb-5 font-sm color-gray-700"> New Password*</label>
                        <input type="password" class="form-control hny_frm checking input_check mt-2 col-lg-12" value="" placeholder=" new password" name="userpassword" id="logInPassword" value="">

                        <div class="err_msg" id="logInPasswordErrMsg" style="color: red;"></div>

                    </div>

                    <div class="form-group " style="position: relative;">
                        <label class="mb-5 font-sm color-gray-700">Confirm Password*</label>
                        <input type="password" class="form-control hny_frm checking input_check mt-2  col-lg-12" value="" placeholder="confirm password" name="userpassword" id="logInPassword" value="">

                        <div class="err_msg" id="logInPasswordErrMsg" style="color: red;"></div>

                    </div>
                    <button type="submit" class="btn common-btn  confpass mb-5" id="lg_btn">Reset Password</button>

                </div>

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