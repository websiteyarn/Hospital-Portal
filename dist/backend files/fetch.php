<?php

include("connection.php");
include("functions.php");

session_start();


$request = $_POST['request'];
if (isset($_POST['request'])){
    
    $request = $_POST['request'];

    $query = "SELECT * FROM `admin` WHERE `specialty` = '$request'";
    $result = mysqli_query($con, $query);
    ?>
    <?php while($row = mysqli_fetch_assoc($result)){?>        
        <span name="<?php echo $row['doctorID']?>" id="docID" class="block px-4 py-2 hover:bg-blue-500 hover:text-white cursor-pointer" onclick="updateDoctorText('<?php echo $row['name']?>')"><?php echo $row['name'] ?></span>
     <?php ;} ?>
    <?php
}
?>



