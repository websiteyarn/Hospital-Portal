<?php 
session_start();

require_once("../dist/backend files/connection.php");
require_once("../dist/backend files/functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
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
            <a>
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
                <div class="flex flex-col lg:w-[125px] lg:h-[144px] bg-white rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/message-active.png" alt="message">
                    <h1 class="text-side-navbar-active-text">Message</h1> 
                </div>
            </a>
           
            <!-- FINANCE  -->
            <a href="">
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
            <div class="flex flex-row w-fit">
                <!-- DOCTOR MESSAGE LIST -->
                <div class="w-[600px] h-[820px] overflow-auto">
                    <div class="mb-7 ml-4">
                        <h1 class="text-3xl text-sidebar-text-bold">Message</h1>
                    </div>

                    <!-- DOCTOR BOXES UN-ORDERED LIST -->
                    <ul id="doctorMessageList" class="space-y-5">
                        <li>
                            <!-- DOCTOR MESSAGE BOXES  -->
                            <!-- All doctor message boxes have an inactive default background color  -->
                            <!-- When clicked, the background color changes to active  -->
                            <div class="doctorMessage w-[483px] h-[177px] bg-background-inactive cursor-pointer shadow-custom ml-4 rounded-3xl">
                                <!-- DATE  -->
                                <div class="flex justify-end items-end px-7 pt-4">
                                    <span class="text-sm text-gray-text">April 20, 2023</span>
                                </div>

                                <!-- DOCTOR PROFILE  -->
                                <div class="flex flex-row ">
                                    <img src="../assets/doctor-sample.png" class="w-24 h-24 z-30 -mt-4 ml-3">

                                    <!-- DOCTOR DETAILS -->
                                    <div class="flex flex-col">
                                        <span class="text-3xl ml-3">Dr. Atlas</span>
                                        <span class="text-base ml-3 text-gray-text">Obstetrician-Gynecologist</span>
                                    </div>
                                </div>

                                <!-- LAST MESSAGE  -->
                                <div class="flex flex-row w-full h-[50px] overflow-hidden justify-center items-center">
                                    <p class="text-gray-text text-sm truncate mx-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt fuga culpa saepe provident ratione enim quod facere sint, quibusdam veniam a quas? Modi tenetur tempora ipsam vel itaque porro rem, illum illo non vero autem cum aliquid consequatur error ad laborum similique labore fuga commodi. Nostrum enim repellendus magnam veritatis.</p>
                                </div>
                            </div>
                        </li>

                        <li>
                            <!-- DOCTOR MESSAGE BOXES  -->
                            <!-- All doctor message boxes have an inactive default background color  -->
                            <!-- When clicked, the background color changes to active  -->
                            <div class="doctorMessage w-[483px] h-[177px] bg-background-inactive cursor-pointer shadow-custom ml-4 rounded-3xl">
                                <!-- DATE  -->
                                <div class="flex justify-end items-end px-7 pt-4">
                                    <span class="text-sm text-gray-text">April 20, 2023</span>
                                </div>

                                <!-- DOCTOR PROFILE  -->
                                <div class="flex flex-row ">
                                    <img src="../assets/doctor-sample.png" class="w-24 h-24 z-30 -mt-4 ml-3">

                                    <!-- DOCTOR DETAILS -->
                                    <div class="flex flex-col">
                                        <span class="text-3xl ml-3">Dr. Atlas</span>
                                        <span class="text-base ml-3 text-gray-text">Obstetrician-Gynecologist</span>
                                    </div>
                                </div>

                                <!-- LAST MESSAGE  -->
                                <div class="flex flex-row w-full h-[50px] overflow-hidden justify-center items-center">
                                    <p class="text-gray-text text-sm truncate mx-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt fuga culpa saepe provident ratione enim quod facere sint, quibusdam veniam a quas? Modi tenetur tempora ipsam vel itaque porro rem, illum illo non vero autem cum aliquid consequatur error ad laborum similique labore fuga commodi. Nostrum enim repellendus magnam veritatis.</p>
                                </div>
                            </div>
                        </li>

                        <li>
                            <!-- DOCTOR MESSAGE BOXES  -->
                            <!-- All doctor message boxes have an inactive default background color  -->
                            <!-- When clicked, the background color changes to active  -->
                            <div class="doctorMessage w-[483px] h-[177px] bg-background-inactive cursor-pointer shadow-custom ml-4 rounded-3xl">
                                <!-- DATE  -->
                                <div class="flex justify-end items-end px-7 pt-4">
                                    <span class="text-sm text-gray-text">April 20, 2023</span>
                                </div>

                                <!-- DOCTOR PROFILE  -->
                                <div class="flex flex-row ">
                                    <img src="../assets/doctor-sample.png" class="w-24 h-24 z-30 -mt-4 ml-3">

                                    <!-- DOCTOR DETAILS -->
                                    <div class="flex flex-col">
                                        <span class="text-3xl ml-3">Dr. Atlas</span>
                                        <span class="text-base ml-3 text-gray-text">Obstetrician-Gynecologist</span>
                                    </div>
                                </div>

                                <!-- LAST MESSAGE  -->
                                <div class="flex flex-row w-full h-[50px] overflow-hidden justify-center items-center">
                                    <p class="text-gray-text text-sm truncate mx-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt fuga culpa saepe provident ratione enim quod facere sint, quibusdam veniam a quas? Modi tenetur tempora ipsam vel itaque porro rem, illum illo non vero autem cum aliquid consequatur error ad laborum similique labore fuga commodi. Nostrum enim repellendus magnam veritatis.</p>
                                </div>
                            </div>
                        </li>
                    </ul>                
                </div>

                <!-- MESSAGE DETAILS -->
                <div class="flex flex-col w-[1050px] h-[800px] rounded-xl bg-white mt-5 shadow-custom">
                    <!-- DOCTOR'S DETAILS  -->
                    <div class="flex flex-row items-center">
                        <img src="../assets/doctor-sample.png" alt="doctor" class="w-20 h-20 rounded-full mt-5 ml-5">
                        <div class="flex w-full justify-between">
                            <!-- DOCTOR'S INFO -->
                            <div class="flex flex-col mt-4">
                                <h1 class="text-3xl">Dr. Cha</h1>
                                <span class="text-sm text-gray-text ml-0.5">Internal Medicine</span>
                            </div>
                        </div>
                    </div>
                    <!-- BREAK LINE -->
                    <hr>

                    <!-- ACTUAL MESSAGE BOX -->
                    <ul id="" class="flex flex-col h-[600px] mx-8 overflow-auto">
                        <!-- EACH MESSAGE BOX CORRESPONDS TO EACH li ELEMENT -->
                        <!-- if you're on admin side, the sender is always the doctor and will always have an id of sender -->
                        <!-- if you're on admin side, the patient will be the receiver and will have an id of receiver -->
                        <!-- if you're on patient side, the sender is always the patient and will always have an id of sender -->
                        <!-- if you're on patient side, the doctor will be the reciever and will have an id of reciever -->
                        <!-- the sender will always be on the right side of the screen and the receiver will always be on the left side of the screen -->

                        <!-- reciever (doctor) -->
                        <li id="receiver" class="w-full h-fit">
                            <div class="w-[500px] h-fit bg-white my-2 mx-10 rounded-2xl border border-doctor-convo-border">
                                <p class="text-gray-text mx-5 text-justify indent-5 py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi recusandae vero consectetur nisi, velit sequi quis non perferendis optio magni aperiam laboriosam praesentium ut illum quibusdam fugit facere doloribus perspiciatis? Illum sapiente ipsa dolorum dolore dolorem obcaecati inventore ex aperiam iure porro et molestias unde maiores, dolor repellat velit quos!</p>
                            </div>
                        </li>

                        <!-- sender (patient) -->
                        <li id="sender" class="flex w-full h-fit justify-end">
                            <div class="w-[500px] h-[100px] bg-user-convo-bg my-2 mx-10 rounded-2xl">
                                <p class="text-gray-text mx-5 text-justify indent-5 py-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa aliquam vitae tempora, atque nemo eligendi libero commodi est eveniet dolorum.</p>
                            </div>
                        </li>

                        <!-- sender (patient) -->
                        <li id="sender" class="flex w-full h-fit justify-end">
                            <div class="w-[500px] h-[100px] bg-user-convo-bg my-2 mx-10 rounded-2xl">
                                <p class="text-gray-text mx-5 text-justify indent-5 py-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa aliquam vitae tempora, atque nemo eligendi libero commodi est eveniet dolorum.</p>
                            </div>
                        </li>

                        <!-- sender (patient) -->
                        <li id="sender" class="flex w-full h-fit justify-end">
                            <div class="w-[500px] h-[100px] bg-user-convo-bg my-2 mx-10 rounded-2xl">
                                <p class="text-gray-text mx-5 text-justify indent-5 py-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa aliquam vitae tempora, atque nemo eligendi libero commodi est eveniet dolorum.</p>
                            </div>
                        </li>

                        <!-- reciever (doctor) -->
                        <li id="receiver" class="w-full h-fit">
                            <div class="w-[500px] h-fit bg-white my-2 mx-10 rounded-2xl border border-doctor-convo-border">
                                <p class="text-gray-text mx-5 text-justify indent-5 py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi recusandae vero consectetur nisi, velit sequi quis non perferendis optio magni aperiam laboriosam praesentium ut illum quibusdam fugit facere doloribus perspiciatis? Illum sapiente ipsa dolorum dolore dolorem obcaecati inventore ex aperiam iure porro et molestias unde maiores, dolor repellat velit quos!</p>
                            </div>
                        </li>

                        <!-- reciever (doctor) -->
                        <li id="receiver" class="w-full h-fit">
                            <div class="w-[500px] h-fit bg-white my-2 mx-10 rounded-2xl border border-doctor-convo-border">
                                <p class="text-gray-text mx-5 text-justify indent-5 py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi recusandae vero consectetur nisi, velit sequi quis non perferendis optio magni aperiam laboriosam praesentium ut illum quibusdam fugit facere doloribus perspiciatis? Illum sapiente ipsa dolorum dolore dolorem obcaecati inventore ex aperiam iure porro et molestias unde maiores, dolor repellat velit quos!</p>
                            </div>
                        </li>
                    </ul>

                    <!-- BREAK LINE  -->
                    <hr>
                    <!-- TEXTBOX FOR USER MESSAGE AND SEND BTN  -->
                    <div class="flex w-full h-[90px] items-center space-x-5">
                        <img src="../assets/profilesample.jpg" class="w-16 h-16 rounded-full ml-5">
                        <input type="text" placeholder="Type a message" class="w-[80%] py-2 px-3 rounded-lg  focus:outline-none focus:ring-2 focus:ring-side-navbar focus:border-transparent">
                        <button class="w-12 h-12 bg-save-button hover:bg-side-navbar rounded-full px-3 py-1">
                            <img src="../assets/send-arrow.png">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/dist/JS animations/profile-dropdown.js"></script>
    <script src="/dist/JS animations/active-bg.js"></script>
</body>
</html>