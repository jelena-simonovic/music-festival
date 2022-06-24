<main>
    <div class="container">
        <form class="login_form" action="./login-page.php" method="POST">
            <div class="form-group col-5"><input type="text" class="form-control" name="username" placeholder="Enter Email"></div>
            <div class="form-group col-5">
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
            </div>
            <div class="form-group col-5">
                <button name="submit" class="form-control show" type="submit">SUBMIT</button>
            </div>
        </form>
        <div class="reg">
            <p> Don't have an account? </p>
            <a href="./register-page.php" class="cta login_button"> SIGN UP</a>
        </div>
    </div>
</main>