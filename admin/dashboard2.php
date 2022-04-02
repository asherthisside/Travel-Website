<?php
session_start();
if(!isset($_SESSION['name'])) {
    header("location:index.php");
}
require "../dbcon.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Admin Dashboard - Adventure Website</title>
</head>

<body>
    <div class="container">
    <h1 class="text-center display-1 bg-primary text-light">Hello, Admin!</h1>
    <p class="text-center display-4 bg-info text-light mt-3"> Here are all the messages</p>

        <div class="table-responsive">
            <!--Table-->
            <table class="table table-striped">

                <!--Table head-->
                <thead class="table-dark">
                    <tr>
                        <th>S. No.</th>
                        <th>Name</th>
                        <th>Message</th>
                        <th>Email</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <!--Table head-->
                <?php
                $sql = "SELECT * FROM `message`";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($query);
                $count = 0;
                if($row > 1) {
                    while($data = mysqli_fetch_assoc($query)) {
                        $count++;
                ?>
                <!--Table body-->
                <tbody>
                    <tr>
                        <td><?php echo $count?></td>
                        <td><?php echo $data['name']?></td>
                        <td><?php echo $data['message']?></td>
                        <td><?php echo $data['email']?></td>
                        <td><?php echo $data['time']?></td>
                    </tr>
                </tbody>
                <!--Table body-->
                <?php
                  }
                }
                ?>
            </table>
            <!--Table-->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>