<?php 
session_start();

include("../dist/backend files/connection.php");
include("../dist/backend files/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine</title>
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
            <a href="health-board.php">
            <img src="../assets/logo.png" alt="logo" class="mx-auto pt-[34px]">
            </a>
            <!-- nav -->
            <!-- HEALTH BOARD  -->
            <a href="">
                <div class="flex flex-col lg:w-[125px] lg:h-[144px] bg-white rounded-3xl mx-auto mt-[61px] justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/health-board-active.png" alt="health-board-active">
                    <h1 class="text-side-navbar-active-text">Health Board</h1> 
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
            <a href="#">
                <div class="flex flex-col lg:w-[125px] lg:h-[144px] rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/message.png" alt="message">
                    <h1 class="text-white">Message</h1> 
                </div>
            </a>
           
            <!-- FINANCE  -->
            <a href="user-finance.php">
                <div class="flex flex-col lg:w-[125px] lg:h-[144px] rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
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
                        <img src="/assets/profilesample.jpg" alt="profile pic" class="rounded-full lg:w-10 lg:h-10"> 
                        <img id="dropdown-arrow" src="/assets/arrow.png" alt="dropdown-arrow" class="ml-7 rotate-180">
                    </button> 
                    <!--profile dropdown-->                
                    <ul id="dropdown-menu" class="absolute hidden w-40 right-3 mt-1"> 
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap rounded-t-md" href="#">Profile</a></li> 
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap" href="#">Change Password</a></li> 
                        <hr>
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap rounded-b-md" href="#">Log out</a></li> 
                    </ul>
                </div>

                <!-- USER PROFILE MOBILE  -->
                <div id="dropdown-button" class="lg:hidden mr-3 mt-6 rounded-lg"> 
                    <button class=""> 
                        <img src="/assets/profilesample.jpg" alt="profile pic" class="rounded-full w-7 h-7 lg:w-10 lg:h-10"> 
                    </button> 
                    <!-- profile dropdown -->
                    <ul id="dropdown-menu" class="absolute hidden w-40 right-3 mt-1"> 
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap rounded-t-md" href="#">Profile</a></li> 
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap" href="#">Change Password</a></li> 
                        <hr>
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap rounded-b-md" href="#">Log out</a></li> 
                    </ul>
                </div>
            </div>
            
            <!-- MAIN CONTENT -->
            <div class="flex flex-row w-fit">
                <!-- MEDICATION LIST -->
                <div class="w-[600px] h-[820px] overflow-auto">
                    <div class="mb-7 ml-4">
                        <h1 class="text-3xl text-sidebar-text-bold">Medication</h1>
                    </div>

                    <!-- MEDICATION BOXES UN-ORDERED LIST -->
                    <ul id="medicationList" class="space-y-5">
                        <li>
                            <!-- MEDICATION BOXES  -->
                            <!-- All medication boxes have an inactive default background color  -->
                            <!-- When clicked, the background color changes to active  -->
                            <div class="item w-[483px] h-[120px] bg-background-inactive cursor-pointer shadow-custom ml-4 rounded-3xl">
                                <!-- FOR AND DATE  -->
                                <div class="flex flex-row justify-between ml-7 mr-7 pt-4">
                                    <span class="text-side-navbar-active-text text-lg">FOR</span>
                                    <span class="text-lg text-gray-text">April 20, 2023</span>
                                </div>

                                <!-- ILLNESS  -->
                                <div class="flex flex-row justify-between ml-7 mr-7">
                                    <span class="text-3xl">Diabetes</span>
                                </div>

                                <!-- PRESCRIBED BY  -->
                                <div class="flex flex-row justify-between ml-7 mr-7">
                                    <span class="text-xl text-gray-text">Prescribed by Dr. Cha</span>
                                </div>
                            </div>
                        </li>

                        <li>
                            <!-- MEDICATION BOXES  -->
                            <!-- All medication boxes have an inactive default background color  -->
                            <!-- When clicked, the background color changes to active  -->
                            <div class="item w-[483px] h-[120px] bg-background-inactive cursor-pointer shadow-custom ml-4 rounded-3xl">
                                <!-- FOR AND DATE  -->
                                <div class="flex flex-row justify-between ml-7 mr-7 pt-4">
                                    <span class="text-side-navbar-active-text text-lg">FOR</span>
                                    <span class="text-lg text-gray-text">April 20, 2023</span>
                                </div>

                                <!-- ILLNESS  -->
                                <div class="flex flex-row justify-between ml-7 mr-7">
                                    <span class="text-3xl">Diabetes</span>
                                </div>

                                <!-- PRESCRIBED BY  -->
                                <div class="flex flex-row justify-between ml-7 mr-7">
                                    <span class="text-xl text-gray-text">Prescribed by Dr. Cha</span>
                                </div>
                            </div>
                        </li>
                    </ul>                
                </div>

                <!-- MEDICATION DETAILS -->
                <div class="flex flex-col w-[1050px] h-[800px] rounded-xl bg-white mt-5 shadow-custom">
                    <!-- DOCTOR'S DETAILS  -->
                    <div class="flex flex-row items-center">
                        <img src="/assets/doctor-sample.png" alt="doctor" class="w-20 h-20 rounded-full mt-5 ml-5">
                        <div class="flex w-full justify-between">
                            <!-- DOCTOR'S INFO -->
                            <div class="flex flex-col mt-4">
                                <h1 class="text-3xl">Dr. Cha</h1>
                                <span class="text-sm text-gray-text ml-0.5">Internal Medicine</span>
                            </div>

                            <!-- DATE INFO -->
                            <div class="flex flex-col mt-8 mr-8">
                                <span class="text-sm text-gray-text">Prescribed</span>
                                <span class="text-sm text-gray-text">April 20, 2023</span>
                            </div>
                        </div>
                    </div>

                    <!-- ACTUAL MEDICATION LIST (PER BOX)-->
                    <ul class="flex flex-wrap h-[600px] mx-8 overflow-auto">
                        <li>
                            <!-- MEDICATION BOX -->
                            <div class="flex w-[482px] h-[300px]">
                                <img src="/assets/Rectangle-green.png" alt="normal" class="w-1.5 h-full py-10 ml-5">

                                <!-- MEDICATION DETAILS -->
                                <div class="flex flex-col mt-14">
                                    <!-- MEDICATION DETAILS -->
                                    <div class="flex flex-col w-fit h-fit ml-6 mb-12">
                                        <h1 class="text-3xl">Metformin</h1>
                                        <span class="text-3xl">(Glumet XR)</span>
                                        <span class="text-xl">500mg</span>
                                        <span class="text-lg text-side-navbar-active-text">Everyday</span>
                                    </div>

                                    <!-- MEDICATION NOTES -->
                                    <div class="flex w-fit h-fit ml-6">
                                        <span class="text-sm">Take one (1) tablet after breakfast and dinner </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                        <li>
                            <!-- MEDICATION BOX -->
                            <div class="flex w-[482px] h-[300px]">
                                <img src="/assets/Rectangle-green.png" alt="normal" class="w-1.5 h-full py-10 ml-5">

                                <!-- MEDICATION DETAILS -->
                                <div class="flex flex-col mt-14">
                                    <!-- MEDICATION DETAILS -->
                                    <div class="flex flex-col w-fit h-fit ml-6 mb-12">
                                        <h1 class="text-3xl">Metformin</h1>
                                        <span class="text-3xl">(Glumet XR)</span>
                                        <span class="text-xl">500mg</span>
                                        <span class="text-lg text-side-navbar-active-text">Everyday</span>
                                    </div>

                                    <!-- MEDICATION NOTES -->
                                    <div class="flex w-fit h-fit ml-6">
                                        <span class="text-sm">Take one (1) tablet after breakfast and dinner </span>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <!-- MEDICATION BOX -->
                            <div class="flex w-[482px] h-[300px]">
                                <img src="/assets/Rectangle-green.png" alt="normal" class="w-1.5 h-full py-10 ml-5">

                                <!-- MEDICATION DETAILS -->
                                <div class="flex flex-col mt-14">
                                    <!-- MEDICATION DETAILS -->
                                    <div class="flex flex-col w-fit h-fit ml-6 mb-12">
                                        <h1 class="text-3xl">Metformin</h1>
                                        <span class="text-3xl">(Glumet XR)</span>
                                        <span class="text-xl">500mg</span>
                                        <span class="text-lg text-side-navbar-active-text">Everyday</span>
                                    </div>

                                    <!-- MEDICATION NOTES -->
                                    <div class="flex w-fit h-fit ml-6">
                                        <span class="text-sm">Take one (1) tablet after breakfast and dinner </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                        <li>
                            <!-- MEDICATION BOX -->
                            <div class="flex w-[482px] h-[300px]">
                                <img src="/assets/Rectangle-green.png" alt="normal" class="w-1.5 h-full py-10 ml-5">

                                <!-- MEDICATION DETAILS -->
                                <div class="flex flex-col mt-14">
                                    <!-- MEDICATION DETAILS -->
                                    <div class="flex flex-col w-fit h-fit ml-6 mb-12">
                                        <h1 class="text-3xl">Metformin</h1>
                                        <span class="text-3xl">(Glumet XR)</span>
                                        <span class="text-xl">500mg</span>
                                        <span class="text-lg text-side-navbar-active-text">Everyday</span>
                                    </div>

                                    <!-- MEDICATION NOTES -->
                                    <div class="flex w-fit h-fit ml-6">
                                        <span class="text-sm">Take one (1) tablet after breakfast and dinner </span>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <!-- MEDICATION BOX -->
                            <div class="flex w-[482px] h-[300px]">
                                <img src="/assets/Rectangle-green.png" alt="normal" class="w-1.5 h-full py-10 ml-5">

                                <!-- MEDICATION DETAILS -->
                                <div class="flex flex-col mt-14">
                                    <!-- MEDICATION DETAILS -->
                                    <div class="flex flex-col w-fit h-fit ml-6 mb-12">
                                        <h1 class="text-3xl">Metformin</h1>
                                        <span class="text-3xl">(Glumet XR)</span>
                                        <span class="text-xl">500mg</span>
                                        <span class="text-lg text-side-navbar-active-text">Everyday</span>
                                    </div>

                                    <!-- MEDICATION NOTES -->
                                    <div class="flex w-fit h-fit ml-6">
                                        <span class="text-sm">Take one (1) tablet after breakfast and dinner </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                        <li>
                            <!-- MEDICATION BOX -->
                            <div class="flex w-[482px] h-[300px]">
                                <img src="/assets/Rectangle-green.png" alt="normal" class="w-1.5 h-full py-10 ml-5">

                                <!-- MEDICATION DETAILS -->
                                <div class="flex flex-col mt-14">
                                    <!-- MEDICATION DETAILS -->
                                    <div class="flex flex-col w-fit h-fit ml-6 mb-12">
                                        <h1 class="text-3xl">Metformin</h1>
                                        <span class="text-3xl">(Glumet XR)</span>
                                        <span class="text-xl">500mg</span>
                                        <span class="text-lg text-side-navbar-active-text">Everyday</span>
                                    </div>

                                    <!-- MEDICATION NOTES -->
                                    <div class="flex w-fit h-fit ml-6">
                                        <span class="text-sm">Take one (1) tablet after breakfast and dinner </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    
                    <div class="flex flex-col ml-8 mt-10 mb-5">
                        <span class="text-xs text-gray-text">License No: XXXXX </span>
                        <span class="text-xs text-gray-text">PTR No: XXXXXXX </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/dist/JS animations/profile-dropdown.js"></script>
    <script src="/dist/JS animations/active-bg.js"></script>
</body>
</html>