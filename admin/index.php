<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Please Login</title>
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <h1>Please Login</h1>
                    <form action="index.php" method="POST">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Username</label>
                            <input type="text" id="form1Example13" class="form-control form-control-lg" name="name" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Password</label>
                            <input type="password" id="form1Example23" class="form-control form-control-lg" name="pass" />
                        </div>
                        <!-- Submit button -->
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Login" name="sub" />
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
<?php
if (isset($_POST['sub'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    // echo $name, $pass;
    require '../dbcon.php';
    $sql = "SELECT * FROM `admin` WHERE `username` = '$name' AND `password` = '$pass'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($query);
    if ($row >= 1) {
        // echo $row;
        header("location:dashboard.php");
        session_start();
        $_SESSION['name'] = $name;
    } 
    else {
        die("Your Message cannot be sent " . mysqli_error($conn));
    }
}
?>