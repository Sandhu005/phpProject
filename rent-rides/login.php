<?php
include("header.php");
?>
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="bg-secondary p-5 rounded">
                <h4 class="text-primary mb-4">Enter Your Credientials for Login</h4>
                <form action="validateLogins.php" method="post">
                    <div class="row g-4">
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Your Password">
                                <label for="pwd">Your Password</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-light w-25 py-3" name="lgnBtn">Login</button>
                            <a href="signup.php" class="btn btn-light w-25 py-3 ms-2" name="signBtn">Sign Up</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php

if(isset($_GET['msg'])){
    echo '<div class="alert alert-danger" role="alert">
            '.$_GET['msg'].'
        </div>';
}

include("footer.php");
?>