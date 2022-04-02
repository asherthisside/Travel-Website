<?php
$conn = mysqli_connect("localhost", "root", "", "adventure");
if(!$conn) {
    ?>
    <script>
        alert("Error while connecting to database");
    </script>
    <?php
}
?>