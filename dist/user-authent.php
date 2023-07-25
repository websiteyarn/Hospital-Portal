<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Authentication</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Commissioner&display=swap" rel="stylesheet">
        <link rel="icon" href="../assets/favicon.png" type="image/x-icon">
    </head>
    <body class = "bg-gradient-to-tr from-gray-100 to to-slate-100 p-0 m-0 font-Commissioner flex-nowrap">
    <div class = "flex flex-col lg:flex-row h-screen">
            <!-- LEFT SIDE -->
            <div class=" fixed lg:relative bottom-0 right-0 left-0 order-last lg:order-first bg-white flex items-center justify-center w-full lg:w-[80%] h-[300px] lg:h-full pt-10 p-5 gap-x-12 rounded-t-[50px] lg:rounded-r-[50px] lg:rounded-tl-none shadow-2xl font-Commissioner">
                    <img class="items-center w-[130px] sm:w-[180px] lg:w-[200px] h-[150px] sm:h-[200px]  lg:h-[200px] " src="../assets/Logo Enhanced.png">
                    <p class="text-[40px] sm:text-[48px] lg:text-[80px] leading-tight text-login-font-clr w-[40%] ">I SEE YOU</p>
            </div>


            <!-- RIGHT SIDE -->
            <div class=" flex flex-col w-[100%] xl:w-[60%] p-5 justify-center items-center gap-2">
                <h class="font-Commissioner text-[30px] md:text-[38px] xl:text-5xl mt-[30px] mb-4 w-full text-gray-500 text-center leading-tight">Welcome to your gateway to wellness!</h>
                    <div class=" w-full sm:w-[65%] md:w-[70%] lg:w-[60%]  mb-4">
                        <a href="user-register.php">
                        <button class=" shadow appearance-none border rounded-[200px] bg-white border-slate-500 w-full py-3 lg:py-5 px-7 text-gray-700 text-center text-2xl leading-tight focus:outline-none focus:shadow-outline">
                                Sign up
                            </button>
                        </a>
                    </div>

                    <div class=" w-full sm:w-[65%] md:w-[70%] lg:w-[60%]  mb-4">
                        <a href="user-login.php">
                        <button class=" shadow appearance-none border rounded-[200px] bg-white border-slate-500 w-full py-3 lg:py-5 px-7 text-gray-700 text-center text-2xl leading-tight focus:outline-none focus:shadow-outline">
                                Login
                            </button>
                        </a>
                    </div>
                <p class="font-Commissioner pt-5 mb-12 w-[100%] sm:w-[80%] md:w-[70%] text-center text-gray-500 ">By using this service, you understood and agree to the ISY Online Services Terms of Use and Privacy Statement</p>
            </div>
        </div>
    </body>
</html>
