<?php 
session_start();

include("../dist/backend files/connection.php");
include("../dist/backend files/functions.php");

$doc_data = check_doc_login($con);
$doc_id = $doc_data['doctorID'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
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
            <a href="doctor-patient-file.php">
                <div
                    class="flex flex-col lg:w-[125px] lg:h-[144px] rounded-3xl mx-auto mt-[61px] justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/patient.png" alt="health-board-active">
                    <h1 class="text-white">Patient</h1>
                </div>
            </a>

            <!-- APPOINTMENT  -->
            <a href="doctor-appointment.php">
                <div
                    class="flex flex-col lg:w-[125px] lg:h-[144px] bg-white rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/appointment-active.png" alt="appointment">
                    <h1 class="text-side-navbar-active-text">Appointment</h1>
                </div>
            </a>

            <!-- MESSAGE  -->
            <a href="doctor-message.php">
                <div
                    class="flex flex-col lg:w-[125px] lg:h-[144px]  rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/message.png" alt="message">
                    <h1 class="text-white">Message</h1>
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
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap rounded-t-md"
                                href="doctor-profile.php">Profile</a></li>
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap" href="doctor-change-pass.php">Change
                                Password</a></li>
                        <hr>
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap rounded-b-md"
                                href="../dist/logout.php">Log out</a></li>
                    </ul>
                </div>

                <!-- USER PROFILE MOBILE  -->
                <div id="dropdown-button" class="lg:hidden mr-3 mt-6 rounded-lg">
                    <button class="">
                        <img src="../assets/profilesample.jpg" alt="profile pic"
                            class="rounded-full w-7 h-7 lg:w-10 lg:h-10">
                    </button>
                    <!-- profile dropdown -->
                    <ul id="dropdown-menu" class="absolute hidden w-40 right-3 mt-1">
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap rounded-t-md"
                                href="doctor-profile.php">Profile</a></li>
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap" href="doctor-change-pass.php">Change
                                Password</a></li>
                        <hr>
                        <li><a class="bg-white hover:bg-side-navbar py-2 px-4 block whitespace-no-wrap rounded-b-md"
                                href="../dist/logout.php">Log out</a></li>
                    </ul>
                </div>
            </div>

            <!-- MAIN CONTENT -->
            <div class="flex flex-col">
                <!-- TOP COTENT -->
                <div class="mt-4 mb-[28px]">
                    <h1 class="text-3xl text-sidebar-text-bold ml-4">Appointment</h1>
                </div>
            </div>

            <!-- TABLES -->
            <div class="w-[1680px] h-[750px] overflow-auto">
            <?php $appointmentQuery = "select * from appointment where doctorID = '$doc_id'"?>
            <?php $appointmentResult = mysqli_query($con,$appointmentQuery); ?>
                <!-- TABLE CELL -->
                <div class="mb-[28px] mr-10">
                    <?php while($appointmentRow = mysqli_fetch_assoc($appointmentResult)){ ?>
                    <table class=" w-[1600px] h-fit mt-4 ml-4 rounded-3xl shadow-custom bg-white border-collapse">
                        <!-- TABLE TITLE -->
                        <thead>
                            <caption class="mb-[23px]">
                                <div class="flex flex-row justify-center items-center">
                                    <p class="text-xl mr-[14px]"><?php echo $appointmentRow['date'] ?></p>
                                    <div class="w-[1461px] h-[0px] border border-zinc-600"></div>
                                </div>
                            </caption>
                        </thead>

                        <!-- TABLE BODY -->
                        <tbody class="text-center">
                            <tr class="h-20 border-b-gray-200 border-b-2 text-xl font-normal">
                                <td class="w-[100px] h-[50px]"><?php echo $appointmentRow['username']?></td>
                                <td class="w-[100px] h-[50px]"><?php echo $appointmentRow['contactnumber']?></td>
                                <td class="w-[100px] h-[50px]"><?php echo $appointmentRow['useremail']?></td>
                                <td class="text-teal-500  w-[100px] h-[50px]"><?php echo $appointmentRow['time']?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>

            </div>
    </div>
    <script src="../dist/JS animations/profile-dropdown.js"></script>
    <script src="../dist/JS animations/active-bg.js"></script>
</body>

</html>