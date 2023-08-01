
<?php 
session_start();

include("../dist/backend files/connection.php");
include("../dist/backend files/functions.php");

if(isset($_GET['delete_doctor'])){

    $delete_id = $_GET['delete_doctor'];
    $delete_users = $con->prepare("DELETE FROM `admin` WHERE doctorID = ?");
    $delete_users->execute([$delete_id]);
    header('location:admin-accounts.php');
 
 }

 $select_doctor = "select * from admin ";
 $query_doctor = mysqli_query($con, $select_doctor);


 if(isset($_GET['delete_patient'])){

    $delete_id = $_GET['delete_patient'];
    $delete_users = $con->prepare("DELETE FROM `user` WHERE userID = ?");
    $delete_users->execute([$delete_id]);
    header('location:admin-accounts.php');
 
 }

 $select_patient = "select * from user ";
 $query_patient = mysqli_query($con, $select_patient);

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
                    class="flex flex-col lg:w-[125px] lg:h-[144px] rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/appointment.png" alt="appointment">
                    <h1 class="text-white">Appointment</h1>
                </div>
            </a>

            <!-- ACCOUNTS -->
            <a href="../dist/admin-accounts.php">
                <div class="flex flex-col lg:w-[125px] lg:h-[144px] bg-white rounded-3xl mx-auto justify-center items-center space-y-3 hover:scale-105 transform transition-transform duration-300">
                    <img src="../assets/sidebar/accounts-active.png" alt="health-board-active">
                    <h1 class="text-side-navbar-active-text">Accounts</h1> 
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
            <div class="flex flex-row w-full">
                <!-- ACCOUNT LIST -->
                <div class="w-[50%] h-[820px] overflow-auto">
                    <div class="mb-7 ml-4">
                        <h1 class="text-3xl text-sidebar-text-bold">Doctor Accounts</h1>
                    </div>

                    <!-- DOCTORS ACCOUNT UN-ORDERED LIST -->
                    <ul id="doctorAccountListAdmin" class="space-y-5">
                        <!-- DOCTOR ACCOUNT BOXES  -->
                        <!-- All doctor boxes have an inactive default background color  -->
                        <!-- When clicked, the background color changes to active  -->
                        
                        <!-- use the id for each doctor account to delete the element -->
                            <!-- EACH TR IS A TABLE ROW -->
                            <?php 
                            $num = mysqli_num_rows($query_doctor);
                            if ($num>0) {
                                while ($result_doctor=mysqli_fetch_assoc($query_doctor)){
                                    echo "
                                    <li id='patientAccount1'>
                                    <div class='patientAccountAdmin w-[483px] h-[58px] flex bg-background-inactive cursor-pointer shadow-custom ml-4 rounded-3xl justify-between'>
                                        <h1 class='my-auto ml-9 text-2xl'>".$result_doctor['name']."</h1>   
                                        <a href = 'admin-accounts.php?delete_doctor=".$result_doctor['doctorID']."'>
                                        <button onclick='removeElement(\"patientAccount1\")'><img src='../assets/delete-btn.png' class='w-5 h-5 mr-9 mt-5 hover:scale-105 transform transition-transform duration-300 items-center'></button>
                                        </a>
                                    </div>                               
                                </li>";
                                }
                            }
                               
                              ?>    



                                
                    
                    </ul>                
                </div>

                <div class="w-[50%] h-[820px] overflow-auto">
                    <div class="mb-7 ml-4">
                        <h1 class="text-3xl text-sidebar-text-bold">Patient Accounts</h1>
                    </div>

                    <!-- PATIENTS ACCOUNT UN-ORDERED LIST -->
                    <ul id="patientAccountListAdmin" class="space-y-5">
                        <!-- PATIENT ACCOUNT BOXES  -->
                        <!-- All patient boxes have an inactive default background color  -->
                        <!-- When clicked, the background color changes to active  -->
                        
                        <!-- use the id for each patient account to delete the element -->

                        <?php 
                            $num = mysqli_num_rows($query_patient);
                            if ($num>0) {
                                while ($result_patient=mysqli_fetch_assoc($query_patient)){
                                    echo "
                                    <li id='patientAccount1'>
                                    <div class='patientAccountAdmin w-[483px] h-[58px] flex bg-background-inactive cursor-pointer shadow-custom ml-4 rounded-3xl justify-between'>
                                        <h1 class='my-auto ml-9 text-2xl'>".$result_patient['first_name']." <span> </span>".$result_patient['last_name']."</h1>   
                                        <a href = 'admin-accounts.php?delete_patient=".$result_patient['userID']."'>
                                        <button onclick='removeElement(\"patientAccount1\")'><img src='../assets/delete-btn.png' class='w-5 h-5 mr-9 mt-5 hover:scale-105 transform transition-transform duration-300 items-center'></button>
                                        </a>
                                    </div>                               
                                </li>";
                                }
                            }
                               
                              ?>
                      
                    </ul>                
                </div>
            </div>
        </div>
    </div>
    <script src="../dist/JS animations/profile-dropdown.js"></script>
    <script src="../dist/JS animations/active-bg.js"></script>
    <script src="../dist/JS animations/delete-action.js"></script>
</body>
</html>