<?php include('includes/header.php') ?>

<div class="user-area ptb-100 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="account1">
                    <div class="user-item loginsec">
                        <form action="signup-handler.php" method="post" class="login formSubmit" id="login_form">
                            <h3 class="text-center mt-3">CREATE AN ACCOUNT</h3>
                            <!-- <p class="font-md color-gray-500">Welcome back!</p> -->
                            <input type="hidden" name="logIn" value="logIn">
                            <div class="form-group">
                                <div class="text-center" id="login_formMsg"></div>
                            </div>
                            <div class="form-group">
                                <label class="mb-5 font-sm color-black-700">First Name</label>
                                <input type="text" class="form-control hny_frm checking input_check email_check" placeholder="First name" value="" name="First name" id="logInMobileNumber" maxlength="10" value="" autocomplete="off">
                                <div class="err_msg" id="logInMobileNumberErrMsg" style="color: red;"></div>
                            </div>
                            <div class="form-group" style="position: relative;">
                                <label class="mb-5 font-sm color-gray-700">Last name</label>
                                <input type="text" class="form-control hny_frm checking input_check  " value="" placeholder="Last name" name="Last name" id="logInPassword" value="">
                                <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
                                <div class="err_msg" id="logInPasswordErrMsg" style="color: red;"></div>
                            </div>
                            <div class="form-group" style="position: relative;">
                                <label class="mb-5 font-sm color-gray-700">Email</label>
                                <input type="text" class="form-control hny_frm checking input_check  " value="" placeholder="email" name="email" id="logInPassword" value="">
                                <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
                                <div class="err_msg" id="logInPasswordErrMsg" style="color: red;"></div>
                            </div>
                            <div class="form-group" style="position: relative;">
                                <label class="mb-5 font-sm color-gray-700">Phone Number</label>
                                <input type="number" class="form-control hny_frm checking input_check  " value="" placeholder="number" name="number" id="logInPassword" value="">
                                <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
                                <div class="err_msg" id="logInPasswordErrMsg" style="color: red;"></div>
                            </div>
                            
                            <div class="form-group" style="position: relative;">
                <label class="mb-5 font-sm color-gray-700">Password</label>
                <input type="password" class="form-control hny_frm checking input_check  " value="" placeholder="Password" name="password" id="logInPassword" value="">

                <div class="err_msg" id="logInPasswordErrMsg" style="color: red;"></div>

              </div>
                            <div class="d-flex m-auto justify-content-between ">
                                <button type="submit" class="btn common-btn text-center" id="lg_btn">Signup</button>

                                <!-- <a class="font-xs color-gray-500 mt-3" href="javascript:void(0);">Forgot your password?</a> -->

                            </div>



                            <h5 class="mt-5 font-xs text-center">Have already an account? <a href="account.php" class="registerfrm">Login</a></h5>
                        </form>
                    </div>
                </div>

                <div class="user-item otpVerify" style="display:none;">
                    <div class="form-container">
                        <h2> Otp Verification</h2>
                        <div class="form-inner">

                            <form method="POST" id="verifyOtpForm" class="otp-form">
                                <div class="customer-login-register">
                                    <div class="login-form">
                                        <p>Verify your mobile number<br>
                                            An OTP has been sent to your mobile number</p>
                                        <div class="form-fild">
                                            <input type="hidden" name="userInfo" id="userInfo" value="">
                                            <p><label>Verify Your Mobile <span class="required">*</span></label></p>
                                            <input id="codeBox1" class="codeBox" type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="otp[]" maxlength="1" onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)" />
                                            <input id="codeBox2" class="codeBox" type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="otp[]" maxlength="1" onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)" />
                                            <input id="codeBox3" class="codeBox" type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="otp[]" maxlength="1" onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)" />
                                            <input id="codeBox4" class="codeBox" type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="otp[]" maxlength="1" onkeyup="onKeyUpEvent(4, event)" onfocus="onFocusEvent(4)" />
                                        </div>
                                        <div class="register-submit">
                                            <button type="submit" class="form-button btn common-btn" id="otpsubmit" name="submit">Verify</button>
                                        </div>

                                        <div class="text-center" id="verifyOtpFormMsg"></div>
                                        <div class="timerdiv"><span id="timer"></span></div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
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