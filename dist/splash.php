<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Splash</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Commissioner&display=swap" rel="stylesheet">
        <link rel="icon" href="../assets/favicon.png" type="image/x-icon">
    </head>
    <body class = "bg-gradient-to-tr from-gray-100 to to-slate-100 p-0 m-0 font-Commissioner flex-nowrap">
        <div class = "flex flex-row h-screen">
            <!-- LEFT SIDE -->
            <div class="bg-white flex items-center justify-center w-[75%] p-5 gap-x-12 rounded-r-[50px] shadow-2xl font-Commissioner">
                    <img class="items-center w-[280px] h-[300px] " src="../assets/Logo Enhanced.png">
                    <p class="text-[130px] leading-tight text-login-font-clr w-[40%] ">I SEE YOU</p>
            </div>
            <!-- RIGHT SIDE -->
            <div class="flex flex-col w-[100%] p-5 justify-center items-center gap-2">
                <h class="font-Commissioner text-5xl pb-5 w-[60%] text-gray-500 text-center leading-tight">Welcome!</h>
                    <div class=" w-[50%]">
                        <a href="user-authent.php">
                            <button class=" shadow appearance-none border rounded-[200px] bg-white border-slate-500 w-full py-5 px-7 text-gray-700 text-center text-2xl mb-3 leading-tight focus:outline-none focus:shadow-outline">
                                Patient
                            </button>
                        </a>
                    </div>
                    <div class="w-[50%]">
                        <a href="doctor-login.php">
                            <button class=" shadow appearance-none border rounded-[200px] bg-white border-slate-700 w-full py-5 px-7 text-gray-700 text-center text-2xl mb-3 leading-tight focus:outline-none focus:shadow-outline">
                                Doctor
                            </button>
                        </a>
                    </div>
                    <div class="w-[50%]">
                        <a href="admin-login.php">
                            <button class=" shadow appearance-none border rounded-[200px] bg-white border-slate-700 w-full py-5 px-7 text-gray-700 text-center text-2xl mb-3 leading-tight focus:outline-none focus:shadow-outline">
                                Admin
                            </button>
                        </a>
                    </div>
                <p class="font-Commissioner pt-4 w-[60%] text-center text-gray-500 ">By using this service, you understood and agree to the ISY Online Services Terms of Use and Privacy Statement</p>
            </div>
        </div>
    </body>
</html>
