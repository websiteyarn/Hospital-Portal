<?php 
session_start();

include("../dist/backend files/connection.php");
include("../dist/backend files/functions.php");

if(isset($_POST['submit'])){
    if(isset($_POST['old-password']) && isset($_POST['new-password']) && isset($_POST['confirm-new-password'])){
        $op = $_POST['old-password'];
	    $np = $_POST['new-password'];
	    $c_np = $_POST['confirm-new-password'];

        if(empty($op)){
            echo "Old Password is required";
    }else if(empty($np)){
            echo "New Password is required";
    }else if($np !== $c_np){
        echo "Confirmation password  does not match";
    }else{

        $id = $_SESSION['userID'];
        $query = "SELECT password FROM user WHERE userID = '$id' AND password = '$op'";
        $result = mysqli_query($con, $query);


        if($result){
            if($result && mysqli_num_rows($result) > 0){
                $query_2 = "UPDATE user SET password = '$np' WHERE userID = '$id'";
                mysqli_query($con, $query_2);
                echo "Password has been changed successfully";
            }else {
                echo "Incorrect password";
            }
        }
    }


    }

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
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
            <img src="../assets/logo.png" alt="logo" class="mx-auto pt-[34px]">

            <!-- nav -->
            <!-- HEALTH BOARD  -->
            <a href="health-board.php">
                <div
                    class="flex flex-col lg:w-[125px] lg:h-[144px]  rounded-3xl mx-auto mt-[61px] justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/health-board.png" alt="health-board-active">
                    <h1 class="text-white">Health Board</h1>
                </div>
            </a>

            <!-- MEDICINE  -->
            <a href="user-medication.php">
                <div
                    class="flex flex-col lg:w-[125px] lg:h-[144px] rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/medicine.png" alt="medicine">
                    <h1 class="text-white">Medicine</h1>
                </div>
            </a>

            <!-- APPOINTMENT  -->
            <a href="user-appointment.php">
                <div
                    class="flex flex-col lg:w-[125px] lg:h-[144px] rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/appointment.png" alt="appointment">
                    <h1 class="text-white">Appointment</h1>
                </div>
            </a>

            <!-- MESSAGE  -->
            <!-- <a href="user-message.php">
                <div
                    class="flex flex-col lg:w-[125px] lg:h-[144px] rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/message.png" alt="message">
                    <h1 class="text-white">Message</h1>
                </div>
            </a> -->

            <!-- FINANCE  -->
            <a href="user-finance.php">
                <div
                    class="flex flex-col lg:w-[125px] lg:h-[144px] rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/finance.png" alt="finance">
                    <h1 class="text-white">Finance</h1>
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
                        <img src="../assets/profilesample.jpg" alt="profile pic" class="rounded-full w-10 h-10">
                        <img id="dropdown-arrow" src="../assets/arrow.png" alt="dropdown-arrow" class="hidden md:block md:mx-2 lg:ml-7 rotate-180">
                    </button>
                    <!--profile dropdown-->
                    <ul id="dropdown-menu" class="absolute hidden w-40 right-3 mt-1">
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap rounded-t-md"
                                href="user-profile.php">Profile</a></li>
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap"
                                href="user-change-pass.php">Change Password</a></li>
                        <hr>
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap rounded-b-md"
                                href="splash.php">
                                <?session_start();unset($_SESSION);
                        session_destroy();session_write_close();header('Location: splash.php');die;?>Log out
                            </a></li>
                    </ul>
                </div>
            </div>

            <!-- MAIN CONTENT -->
            <div class="flex flex-col ">
                <!-- TOP CONTENT  /-->
                <div class="mt-4">
                    <h1 class="text-3xl text-sidebar-text-bold  text-center lg:text-left">Change Password</h1>
                </div>

                <!-- CHANGE PASSWORD BOX  -->
                <div class="flex flex-col w-full lg:w-[90%] mt-[30px] px-5 py-5  bg-white rounded-[30px] shadow-custom ustify-center items-center">
                    <form method="post" class=" w-full">

                        <!-- OLD PASSWORD -->
                        <div class="flex flex-col justify-center items-center">
                            <span
                                class="block uppercase tracking-wide text-side-navbar-active-text text-lg font-bold ml-2 mb-2 ">Old
                                Password</span>

                            <!-- OLD PASSWORD INPUT -->
                            <input class="shadow appearance-none border rounded-[200px] bg-form-fill  border-gray-200 w-[70%] py-2 lg:py-5 px-7 text-gray-700
                        text-center text-xl mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password"
                                name="old-password" placeholder="">
                        </div>

                        <!-- NEW PASSWORD -->
                        <div class="flex flex-col justify-center items-center">
                            <span
                                class="block uppercase text-left tracking-wide text-side-navbar-active-text text-lg font-bold ml-2 mb-2 ">New
                                Password</span>

                            <!-- NEW PASSWORD INPUT -->
                            <input class="shadow appearance-none border rounded-[200px] bg-form-fill  border-gray-200 w-[70%]  py-2 lg:py-5 px-7 text-gray-700
                        text-center text-xl mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password"
                                name="new-password" placeholder="">
                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div class="flex flex-col justify-center items-center">
                            <span
                                class="block uppercase tracking-wide text-side-navbar-active-text text-lg font-bold ml-2 mb-2 ">CONFIRM
                                PASSWORD</span>

                            <!-- CONFIRM PASSWORD INPUT -->
                            <input class="shadow appearance-none border rounded-[200px] bg-form-fill  border-gray-200 w-[70%] py-2 lg:py-5 px-7 text-gray-700
                        text-center text-xl mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password"
                                name="confirm-new-password" placeholder="">
                        </div>

                        <!-- BOTTOM ITEMS  -->
                        <div class="flex w-full justify-center lg:justify-end items-center">
                            <!-- CANCEL BTN  -->
                            <div>
                                <a href="#">
                                    <button
                                        class="flex w-[90px] h-[45px] mt-3 mr-8 justify-center items-center rounded-3xl shadow-custom hover:scale-105 transform transition-transform duration-300">
                                        <span class=" text-gray-text text-lg">Cancel</span>
                                    </button>
                                </a>
                            </div>

                            <!-- SAVE BTN  -->
                            <div>
                                <a href="#">
                                    <button name="submit" type="submit"
                                        class="flex w-[90px] h-[45px] bg-save-button mt-3  justify-center items-center rounded-3xl shadow-custom hover:scale-105 transform transition-transform duration-300">
                                        <span name="submit" type="submit" class=" text-gray-text text-lg">Save</span>
                                    </button>
                                </a>
                            </div>

                        </div>

                    </form>
                </div>
            </div>


            <div
                class="flex flex-row lg:hidden w-screen fixed h-20 left-0 text-white bottom-0 mt-auto z-50 bg-side-navbar">
                <div class="w-[20%] flex flex-col justify-center items-center">
                    <a href="health-board.php">
                        <img src="../assets/sidebar/health-board.png" alt="health-board-active">
                    </a>
                    <span class="text-[8px] sm:text-xs">Health Board</span>
                </div>

                <div class="w-[20%] flex flex-col justify-center items-center">
                    <a href="user-medication.php">
                        <img src="../assets/sidebar/medicine.png" alt="medicine">
                    </a>
                    <span class="text-[8px] sm:text-xs">Medicine</span>
                </div>

                <div class="w-[20%] flex flex-col justify-center items-center">
                    <a href="user-appointment.php">
                        <img src="../assets/sidebar/appointment.png" alt="appointment">
                    </a>
                    <span class="text-[8px] sm:text-xs">Appointment</span>
                </div>

                <div class="w-[20%] flex flex-col justify-center items-center">
                    <a href="user-message.php">
                        <img src="../assets/sidebar/message.png" alt="message">
                    </a>
                    <span class="text-[8px] sm:text-xs">Message</span>
                </div>

                <div class="w-[20%] flex flex-col justify-center items-center">
                    <a href="user-finance.php">
                        <img src="../assets/sidebar/finance.png" alt="finance">
                    </a>
                    <span class="text-[8px] sm:text-xs">Finance</span>
                </div>
            </div>



        </div>
    </div>
    <script src="../dist/JS animations/profile-dropdown.js"></script>
</body>

</html>