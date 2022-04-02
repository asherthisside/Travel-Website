<?php
session_start();
if (!isset($_SESSION['name'])) {
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
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            background-color: white;
            /* height: 100vh; */
            /* width: 100vw; */
            /* position: relative; */
        }

        .tablebox {
            background-color: rgb(221, 233, 234);
            /* height: 400px; */
            width: 100%;
            /* position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); */
            border-radius: 15px;
            box-shadow: 2px 4px 5px darkgray, -2px 4px 5px darkgray;
        }

        .firstrow {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            margin-top: 20px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: bold;
            font-size: 21px;
        }

        .row {
            background-color: white;
            margin: 40px auto;
            height: 60px;
            width: 90%;
            border-radius: 30px;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            box-shadow: 2px 3px 3px darkgray, -2px 3px 3px darkgray;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 20px;
            /* color: #7c7c7c; */
        }

        .firstrow span,
        .row span {
            width: 20%;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="bg-dark mb-4">
            <h1 class="text-center display-1 text-light">Hello, Admin!</h1>
            <p class="text-center text-light "> Here are all the messages</p>
        </div>
        <div class="tablebox">
            <div class="firstrow">
                <span>S. No.</span><span>Name</span><span>Message</span><span>Email</span><span>Time</span>
            </div>

            <?php
            $sql = "SELECT * FROM `message`";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($query);
            $count = 0;
            if ($row > 1) {
                while ($data = mysqli_fetch_assoc($query)) {
                    $count++;
            ?>
            <div class="row">
                <span><?php echo $count?></span>
                <span><?php echo $data['name']?></span>
                <span><?php echo $data['message']?></span>
                <span><?php echo $data['email']?></span>
                <span><?php echo $data['time']?></span>
            </div>
            <?php
                }
            }
            ?>
        </div>
        <!--Table-->
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>