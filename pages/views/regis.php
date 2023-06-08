<?php
include('../connect.php');
session_start();
?>


<?php
include('../layouts/head.php')
?>

<?php
include('../layouts/navbar.php')
?>

<div class="bg-slate-200 flex justify-center items-center h-screen ">   
    <div class="h-full w-full bg-bottom bg-cover bg-no-repeat grid place-items-center bg-[url('../pages/img/pexels-expect-best-323780.jpg')]">
    <form method="post">
        <div class=" px-20 py-10 bg-blue-950 flex gap-4 flex-col justify-center items-center rounded-md text-white">
            <h1 class="font-bold border-b-4 px-3 border-red-500">Register</h1>
            <div>
                <input type="text" class="rounded-md px-3 py-1 text-blue-950 focus:outline-none focus:border-2 focus:border-blue-500 border-2 border-transparent duration-100" placeholder="Username" required>
            </div>
            <div>
                <input type="email" class="rounded-md px-3 py-1 text-blue-950 focus:outline-none focus:border-2 focus:border-blue-500 border-2 border-transparent duration-100" placeholder="Email" required>
            </div>
            <div>
                <input type="password" class="rounded-md px-3 py-1 text-blue-950 focus:outline-none focus:border-2 focus:border-blue-500 border-2 border-transparent duration-100" placeholder="Password" required>
            </div>
            <div>
                <input type="password" class="rounded-md px-3 py-1 text-blue-950 focus:outline-none focus:border-2 focus:border-blue-500 border-2 border-transparent duration-100" placeholder="Confirm Password" required>
            </div>
            <button class="w-full py-1 bg-blue-500 hover:opacity-80 duration-200 active:scale-105 rounded-md font-semibold">Login</button>
            <p class="text-xs -mt-2 ">Sudah Punya Akun? <a href="./login.php" class="text-red-300 duration-200 underline hover:opacity-80 active:text-red-500 active:opacity-100">Registrasi</a></p>
        </div>
    </form>
    </div>
    
</div>


<?php
include('../layouts/bottom.php')
?>