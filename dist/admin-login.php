
<?php 
session_start();

include("../dist/backend files/connection.php");
include("../dist/backend files/functions.php");

if(isset($_POST['submit'])){
    $adminID = $_POST['adminID'];
    $password = $_POST['password'];

    //test commit

    if(!empty($adminID) && !empty($password)){
        // read from database
        $query = "select * from root where adminID = '$adminID' limit 1";
        $result = mysqli_query($con, $query);

        if($result){
            if($result && mysqli_num_rows($result) > 0){
                $admin_data = mysqli_fetch_assoc($result);
                if($admin_data['password'] === $password){
                    $_SESSION['adminID'] = $admin_data['adminID'];
                    header("Location: admin-finance.php");
                    die;
                }
            }
        }
        echo "Wrong username or password!";
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Commissioner&display=swap" rel="stylesheet">
        <link rel="icon" href="../assets/favicon.png" type="image/x-icon">
    </head>
    <body class = "bg-gradient-to-tr from-gray-100 to to-slate-100 p-0 m-0 font-Commissioner flex-nowrap">
        <div class = "flex flex-col lg:flex-row h-screen">
            <!-- LEFT SIDE -->
            <div class=" order-last lg:order-first bg-white flex items-center justify-center w-full lg:w-[80%] h-[300px] lg:h-full pt-10 p-5 gap-x-12 rounded-t-[50px] lg:rounded-r-[50px] lg:rounded-tl-none shadow-2xl font-Commissioner">
                    <img class="items-center w-[130px] sm:w-[180px] lg:w-[200px] h-[150px] sm:h-[200px]  lg:h-[200px] " src="../assets/Logo Enhanced.png">
                    <p class="text-[40px] sm:text-[48px] lg:text-[80px] leading-tight text-login-font-clr w-[40%] ">I SEE YOU</p>
            </div>
            
            <!-- RIGHT SIDE -->
            <div class=" flex flex-col w-[100%] xl:w-[60%] p-5 justify-center items-center gap-2">
                <h class="font-Commissioner text-[30px] md:text-[38px] xl:text-5xl mt-[30px] mb-4 w-full text-gray-500 text-center leading-tight">Welcome back, have a nice day!</h>
                <form class="w-full sm:w-[65%] md:w-[70%] lg:w-[60%] font-Commissioner" method="post">
                    <div class="mb-4">
                        <input class="shadow appearance-none border rounded-[200px] border-slate-500 w-full  py-3 xl:py-5 px-7 text-gray-700 text-center text-2xl leading-tight focus:outline-none focus:shadow-outline" name="adminID" type="text" placeholder="adminID">
                    </div>
                    <div class="mb-4">
                        <input class="shadow appearance-none border rounded-[200px] border-slate-500 w-full py-3 xl:py-5 px-7 text-gray-700 text-center text-2xl mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="Password">
                    </div>
                    <div class="">
                        <input class="shadow appearance-none border rounded-[200px] bg-gray-400 w-full py-3 px-7 text-gray-700
                        text-center text-2xl leading-tight focus:outline-none focus:shadow-outline" name="submit"  type="submit" placeholder="">
                    </div>
                </form>
                <a class="inline-block align-baseline font-bold text-md text-gray-500  hover:text-gray-900 " href="../dist/splash.php">
                    Back to splash?
                </a>
                <p class="font-Commissioner pt-5 mb-12 w-[100%] sm:w-[80%] md:w-[70%] text-center text-gray-500 ">By using this service, you understood and agree to the ISY Online Services Terms of Use and Privacy Statement</p>
            </div>
        </div>
    </body>
</html>
