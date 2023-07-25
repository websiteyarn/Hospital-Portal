<?php 
session_start();

require_once("../dist/backend files/connection.php");
require_once("../dist/backend files/functions.php");

$user_data = check_user_login($con);
$user_id = $user_data['userID'];
$query = "select * from finance where userID = '$user_id'";
$result = mysqli_query($con, $query);
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
    <link rel="icon" href="../assets/favicon.png" type="image/x-icon">
</head>
<body class="bg-custom-color p-0 m-0 font-Commissioner flex-nowrap">
    <div class="flex">
        <!-- SIDEBAR NAV -->
        <div class="sticky hidden lg:block lg:w-[172px] lg:h-screen bg-side-navbar rounded-tr-3xl rounded-br-3xl">
            <!-- logo -->
            <a href="health-board.php">
            <img src="../assets/logo.png" alt="logo" class="mx-auto pt-[34px]">
            </a>
            <!-- nav -->
            <!-- HEALTH BOARD  -->
            <a href="health-board.php">
                <div class="flex flex-col lg:w-[125px] lg:h-[144px] rounded-3xl mx-auto mt-[61px] justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/health-board.png" alt="health-board-active">
                    <h1 class="text-white">Health Board</h1> 
                </div>
            </a>

            <!-- MEDICINE  -->
            <a href="user-medication.php">
                <div class="flex flex-col lg:w-[125px] lg:h-[144px] rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/medicine.png" alt="medicine">
                    <h1 class="text-white">Medicine</h1> 
                </div>
            </a>
            
            <!-- APPOINTMENT  -->
            <a href="user-appointment.php">
                <div class="flex flex-col lg:w-[125px] lg:h-[144px] rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/appointment.png" alt="appointment">
                    <h1 class="text-white">Appointment</h1> 
                </div>
            </a>

            <!-- MESSAGE  -->
            <a href="user-message.php">
                <div class="flex flex-col lg:w-[125px] lg:h-[144px] rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/message.png" alt="message">
                    <h1 class="text-white">Message</h1> 
                </div>
            </a>
           
            <!-- FINANCE  -->
            <a href="user-finance.php">
                <div class="flex flex-col lg:w-[125px] lg:h-[144px] bg-white rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/finance-active.png" alt="finance">
                    <h1 class="text-side-navbar-active-text">Finance</h1> 
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
                        <img src="../assets/profilesample.jpg" alt="profile pic" class="rounded-full lg:w-10 lg:h-10"> 
                        <img id="dropdown-arrow" src="../assets/arrow.png" alt="dropdown-arrow" class="ml-7 rotate-180">
                    </button> 
                    <!--profile dropdown-->                
                    <ul id="dropdown-menu" class="absolute hidden w-40 right-3 mt-1"> 
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap rounded-t-md" href="user-profile.php">Profile</a></li> 
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap" href="user-change-pass.php">Change Password</a></li> 
                        <hr>
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap rounded-b-md" href="splash.php"><?session_start();unset($_SESSION);
                        session_destroy();session_write_close();header('Location: splash.php');die;?>Log out</a></li> 
                    </ul>
                </div>

                <!-- USER PROFILE MOBILE  -->
                <div id="dropdown-button" class="lg:hidden mr-3 mt-6 rounded-lg"> 
                    <button class=""> 
                        <img src="../assets/profilesample.jpg" alt="profile pic" class="rounded-full w-7 h-7 lg:w-10 lg:h-10"> 
                    </button> 
                    <!-- profile dropdown -->
                    <ul id="dropdown-menu" class="absolute hidden w-40 right-3 mt-1"> 
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap rounded-t-md"href="user-profile.php">Profile</a></li> 
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap" href="user-change-pass.php">Change Password</a></li> 
                        <hr>
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap rounded-b-md" href="splash.php"><?session_start();unset($_SESSION);
                        session_destroy();session_write_close();header('Location: splash.php');die;?>Log out</a></li> 
                    </ul>
                </div>
            </div>

            <!-- MAIN CONTENT -->
            <div class="flex flex-col">
                <!-- TOP CONTENT  -->
                <div class="mt-4">
                    <h1 class="text-3xl text-sidebar-text-bold ml-4">Finance</h1>
                </div>

                <!-- TABLE FOR HEADERS -->

                <!-- <div class="flex flex-row w-[1636px] h-fit text-center">
                    <span class="ml-[135px] text-2xl text-side-navbar-active-text">Agenda</span>
                    <span class="ml-[237px] text-2xl text-side-navbar-active-text">Doctor</span>
                    <span class="ml-[250px] text-2xl text-side-navbar-active-text">Amount</span>
                    <span class="ml-[240px] text-2xl text-side-navbar-active-text">Date</span>
                    <span class="ml-[280px] text-2xl text-side-navbar-active-text">Status</span>
                </div> -->

                <!-- TABLE  -->
                <div class="w-[1680px] h-[750px] overflow-auto">
                    <table class="w-[1636px] h-fit mt-4 ml-4 rounded-3xl shadow-custom bg-white">
                    
                        <!-- TABLE BODY  -->
                        <tbody class="text-center">
                            <!-- EACH TR IS A TABLE ROW -->
                                <tr class="h-20 border-b-gray-400 border-b-2 font-Commissioner">
                                    
                                            <td class="text-2xl text-side-navbar-active-text"> Agenda </td>
                                            <td class="text-2xl text-side-navbar-active-text"> Doctor </td>
                                            <td class="text-2xl text-side-navbar-active-text"> Amount </td>
                                            <td class="text-2xl text-side-navbar-active-text"> Date </td>
                                            <td class="text-2xl text-side-navbar-active-text"> Status </td>
                                </tr>
                            <?php while($row = mysqli_fetch_assoc($result)){?>
                                <tr class="h-20 border-b-gray-400 border-b-2 font-Commissioner">
                                    
                                            <td> <?php echo $row['agenda']; ?> </td>
                                            <td> <?php echo $row['doctor']; ?> </td>
                                            <td> <?php echo $row['amount']; ?> </td>
                                            <td> <?php echo $row['date']; ?> </td>
                                            <td> <?php echo $row['status']; ?> </td>
                                </tr>
                            <?php ;} ?>         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../dist/JS animations/profile-dropdown.js"></script>
</body>
</html>

<?php
    mysqli_close($con); 
?>