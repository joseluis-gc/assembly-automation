<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8">
            <div class="card card-raised shadow-10 mt-5 mt-xl-10 mb-4">
                <div class="card-body p-5">
                    <!-- Auth header with logo image-->
                    <div class="text-center">
                        <img class="mb-3" src="./views/_assets/img/logo.png" alt="..." style="height: 150px" />
                        <h1 class="display-5 mb-0">Login</h1>
                    </div>
                    <!-- Login submission form-->
                    <form method="post" action="index.php" name="loginform">
                        <div class="mb-4 mt-5">
                            <input id="login_input_username" class="form-control w-100" placeholder="Username" type="text" name="user_name" required />
                        </div>
                        <div class="mb-4">
                            <input id="login_input_password" class="form-control w-100" placeholder="Password" type="password" name="user_password" autocomplete="off" required />
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                            <a class="small fw-500 text-decoration-none" href="register.php">Register new account</a>
                            <button class="btn btn-primary" type="submit" name="login">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>