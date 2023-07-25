<?php
include("../dist/backend files/connection.php");
include("../dist/backend files/functions.php");
session_start();
check_root_login($con);

if (isset($_COOKIE['financeID'])){
    $appPost = $_COOKIE['financeID'];
}else{
    $appPost = 1;
}

if (isset($_COOKIE['financeName'])){
    $appName = $_COOKIE['financeName'];
}else{
    $appName = "Juan Dela Cruz";
}

if (isset($_GET['delete_appointment'])){

    $appointmentID = $_GET['delete_appointment'];
    $delete_appointment = $con->prepare("DELETE FROM `appointment` WHERE appointmentID = ?");
    $delete_appointment->execute([$appointmentID]);
    header('location:admin-appontment.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Commissioner&display=swap" rel="stylesheet">
    <link rel="icon" href="/assets/favicon.png" type="image/x-icon">
</head>
<body class="bg-custom-color p-0 m-0 font-Commissioner flex-nowrap">
    
    <div class="flex">
        <!-- SIDEBAR NAV -->
        <div class="sticky hidden lg:block lg:w-[172px] lg:h-screen bg-side-navbar rounded-tr-3xl rounded-br-3xl">
            <!-- logo -->
            <a href="../dist/admin-finance.php">
            <img src="../assets/logo.png" alt="logo" class="mx-auto pt-[34px]">
            </a>
            <!-- nav -->

            <!-- FINANCE  -->
            <a href="../dist/admin-finance.php">
                <div class="flex flex-col lg:w-[125px] lg:h-[144px] rounded-3xl mx-auto mt-[61px] justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/finance.png" alt="health-board-active">
                    <h1 class="text-white">Finance</h1> 
                </div>
            </a>

            <!-- APPOINTMENT  -->
            <a href="../dist/admin-appointment.php">
                <div
                    class="flex flex-col lg:w-[125px] lg:h-[144px] bg-white rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/appointment-active.png" alt="appointment">
                    <h1 class="text-side-navbar-active-text">Appointment</h1>
                </div>
            </a>

            <!-- ACCOUNTS -->
            <a href="../dist/admin-accounts.php">
                <div class="flex flex-col lg:w-[125px] lg:h-[144px] rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/accounts.png" alt="health-board-active">
                    <h1 class="text-white">Accounts</h1> 
                </div>
            </a>
        </div>

        <!-- MAIN CONTENT -->
        <div class="flex-col flex-grow lg:ml-[60px]">
            <!-- TOP ITEMS (USER-DROPDOWN) -->
            <div class="flex justify-end">
                <!-- USER PROFILE -->
                <div id="dropdown-button" class="mr-3 mt-6 z-50"> 
                    <button class="flex flex-row lg:w-28 lg:h-12 bg-white justify-center rounded-3xl items-center"> 
                        <img src="../assets/doctor-sample.png" alt="profile pic" class="rounded-full lg:w-12 lg:h-12"> 
                        <img id="dropdown-arrow" src="../assets/arrow.png" alt="dropdown-arrow" class="ml-7 rotate-180">
                    </button> 
                    <!--profile dropdown-->                
                    <ul id="dropdown-menu" class="absolute hidden w-40 right-3 mt-1"> 
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap rounded-md" href="../dist/logout.php">Log out</a></li> 
                    </ul>
                </div>

                <!-- USER PROFILE MOBILE  -->
                <div id="dropdown-button" class="lg:hidden mr-3 mt-6 rounded-lg"> 
                    <button class=""> 
                        <img src="../assets/profilesample.jpg" alt="profile pic" class="rounded-full w-7 h-7 lg:w-10 lg:h-10"> 
                    </button> 
                    <!-- profile dropdown -->
                    <ul id="dropdown-menu" class="absolute hidden w-40 right-3 mt-1"> 
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap rounded-b-md" href="../dist/logout.php">Log out</a></li> 
                    </ul>
                </div>
            </div>
            
            <!-- MAIN CONTENT -->
            <div class="flex flex-row w-fit">
                <!-- PATIENT FINANCE LIST -->
                <div class="w-[600px] h-[820px] overflow-auto">
                    <div class="mb-7 ml-4">
                        <h1 class="text-3xl text-sidebar-text-bold">Doctor Appointments</h1>
                    </div>
                    <?php $appoint_query = "select * from admin"?>
                    <?php $appoint = mysqli_query($con, $appoint_query) or die(mysqli_error($con));?> 
                    <!-- PATIENT BOXES UN-ORDERED LIST -->
                    <ul id="patientFinanceListAdmin" class="space-y-5">
                        <!-- PATIENT FINANCE BOXES  -->
                        <!-- All patient finance boxes have an inactive default background color  -->
                        <!-- When clicked, the background color changes to active  -->
                        <?php while($appointRow = mysqli_fetch_assoc($appoint)){ ?>
                        <li>
                            <div name="<?php echo $appointRow['doctorID'] ?>" id="<?php echo $appointRow['name']?>" class="patientFinanceAdmin w-[483px] h-[58px] flex bg-background-inactive cursor-pointer shadow-custom ml-4 rounded-3xl">
                                <h1 id="financeSelect" class="my-auto ml-9 text-2xl"><?php echo $appointRow['name']?></h1>

                            </div>
                        </li>
                        <?php } ?>
                    </ul>                
                </div>

                <!-- PATIENT FINANCE DETAILS -->
                <div class="flex flex-col w-[1050px] h-[800px] rounded-xl bg-white mt-5 shadow-custom">
                    <!-- PATIENT'S DETAILS  -->
                    <?php $appdisplay_query = "select * from appointment where doctorID = '$appPost'"?>
                    <?php $appdisplay = mysqli_query($con, $appdisplay_query) or die(mysqli_error($con));?> 
                    <div class="flex flex-row items-center">
                        <img src="../assets/profilesample.jpg" alt="doctor" class="w-20 h-20 rounded-full mt-5 ml-5">
                        <div class="flex w-full justify-between">
                            <!-- PATIENT'S INFO -->
                            <div class="flex flex-col mt-4">
                                <h1 class="text-3xl ml-8"><?php echo $appName ?></h1>
                            </div>
                        
                            <!-- DATE INFO -->
                            <div class="flex flex-col mt-3 mr-8">
                                <span class="text-sm text-side-navbar-active-text">Doctor Number</span>
                                <span class="text-sm text-gray-text">000-000-000</span>
                            </div>   
                        </div>
                    </div>

                    <!-- ACTUAL PATIENT FINANCE LIST (PER BOX)-->
                    <ul id="" class="flex flex-col h-[570px] mx-8 overflow-auto mt-5">
                        <?php while($display_row = mysqli_fetch_assoc($appdisplay)){ ?>
                        <li class="flex flex-row w-full h-fit mt-4">

                            <!-- DOCTOR'S DETAILS  -->
                           <div class="w-[25%] h-fit flex flex-row">
                                <img src="../assets/Rectangle-yellow.png" class="w-2 h-16">
                                <!-- DR DETAILS -->
                                <div class="flex flex-col ml-5 my-auto">
                                    <span class="text-xl"><?php echo $display_row['username'] ?></span>
                                    <span class="text-xl"><?php echo $display_row['contactnumber'] ?></span>
                                </div>
                           </div>

                            <!-- DATE -->
                           <div class="w-[25%] h-fit flex my-auto justify-center">
                                <span class="text-xl text-gray-text"><?php echo $display_row['status'] ?></span>
                           </div>

                            <!-- AMOUNT AND STATUS-->
                           <div class="w-[25%] h-fit flex items-center justify-center">
                                <div class="flex flex-col">
                                    <span class="text-xl"><?php echo $display_row['date'] ?></span>
                                    <span class="text-xl text-orange-text"><?php echo $display_row['time'] ?></span>
                                </div>
                           </div>

                           <!-- DELETE BTN  -->
                           <div class="w-[25%] h-fit flex justify-center items-center my-auto gap-2">
                                <a href="../dist/admin-appointment-update.php?update_appointment=<?php echo $display_row['appointmentID'] ?>">
                                <button class="w-24 h-10 rounded-3xl bg-form-fill text-delete-btn hover:scale-105 transform transition-transform duration-300">Edit
                                </button>
                                </a>
                                <a href="../dist/admin-appointment.php?delete_appointment=<?php echo $display_row['appointmentID'] ?>">
                                <button class="w-24 h-10 rounded-3xl bg-form-fill text-delete-btn hover:scale-105 transform transition-transform duration-300">Delete</button>
                                </a>
                                
                           </div>
                        </li>
                        <?php } ?>
                    </ul>
   
                </div>
            </div>
        </div>
    </div>
    <script src="../dist/JS animations/profile-dropdown.js"></script>
    <script src="../dist/JS animations/active-bg.js"></script>
</body>
</html>