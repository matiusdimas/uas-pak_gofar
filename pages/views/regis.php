<?php
include('../connect.php');
session_start();
if (isset($_SESSION["username"])) {
    header("Location: ./index.php");
}

if (isset($_POST["submit"])) {
    $password = md5($_POST["password"]);
    $cpassword = md5($_POST["cpassword"]);
    if ($password == $cpassword) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $sqlemail = "SELECT email from users where email='$email'";
        $sqlusername = "SELECT username from users where username ='$username'";
        $resultemail = $conn->query($sqlemail);
        $resultusername = $conn->query($sqlusername);
        if ($resultemail->num_rows > 0) {
            $erremail = "Email sudah terdaftar";
        } else {
            $erremail = false;
        }
        if ($resultusername->num_rows > 0) {
            $errusername = "Username sudah terdaftar";
        } else {
            $errusername = false;
        }
        if ($erremail == false && $errusername == false) {
            $sql = "INSERT INTO users (email,username,password) VALUES ('$email', '$username', '$password')";
            $result = $conn->query($sql);
            $success = "Registrasi Berhasil Silahkan";
        }
    } else {
        $errpassword = "password tidak sama";
    }
}
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
            <div class=" px-5 md:px-16 py-10 bg-blue-950 flex gap-4 flex-col justify-center items-center rounded-md text-white">
                <h1 class="font-bold border-b-4 px-3 border-red-500">Register</h1>
                <div>
                    <input name="username" type="text" class="rounded-md px-3 py-1 text-blue-950 focus:outline-none focus:border-2 focus:border-blue-500 border-2 border-transparent duration-100" placeholder="Username" required>
                </div>
                <?php
                if (isset($_POST['submit']) && $password == $cpassword && $errusername) {
                    echo $errusername;
                }
                ?>
                <div>
                    <input name="email" type="email" class="rounded-md px-3 py-1 text-blue-950 focus:outline-none focus:border-2 focus:border-blue-500 border-2 border-transparent duration-100" placeholder="Email" required>
                </div>
                <?php
                if (isset($_POST['submit']) && $password == $cpassword  && $erremail) {
                    echo $erremail;
                }
                ?>
                <div>
                    <input id="password" name="password" type="password" class="rounded-md px-3 py-1 text-blue-950 focus:outline-none focus:border-2 focus:border-blue-500 border-2 border-transparent duration-100" placeholder="Password" required>
                </div>
                <div>
                    <input id="cpassword" name="cpassword" type="password" class="rounded-md px-3 py-1 text-blue-950 focus:outline-none focus:border-2 focus:border-blue-500 border-2 border-transparent duration-100" placeholder="Confirm Password" required>
                </div>
                <div id="textcpass" class="hidden text-center">
                    <p>Password Tidak Sama</p>
                </div>
                <?php
                if (isset($_POST['submit']) && $password !== $cpassword) {
                    echo $errpassword;
                }

                ?>
                <button type="submit" name="submit" class="w-full py-1 bg-blue-500 hover:opacity-80 duration-200 active:scale-105 rounded-md font-semibold">Daftar</button>
                <p class="text-xs -mt-2 ">Sudah Punya Akun? <a href="./login.php" class="text-red-300 duration-200 underline hover:opacity-80 active:text-red-500 active:opacity-100">Login</a></p>
                    <?php
                    if (isset($_POST['submit'])  && $password == $cpassword) {
                        if ($erremail == false && $errusername == false) { ?>
                            <div id="successmessage" class="fixed z-[999] bg-blue-500 px-2 py-4 rounded-md border-2 border-white grid place-items-center text-xs md:text-base">
                                <p>Register Berhasil Silahkan <a href="./login.php" class="underline text-red-200 hover:opacity-80">Login</a> <span id="closeX" class="bg-blue-950 px-2 py-1 rounded-full hover:opacity-80 cursor-pointer mt-1 ml-2">X</span> </p>
                            </div>
                    <?php }
                    }
                    ?>
            </div>
        </form>
    </div>

</div>

<?php 
if (isset($_POST['submit'])) {
    if ($erremail == false && $errusername == false && $password == $cpassword) { ?>
        <script>
            const successMessage = document.getElementById('successmessage')
            const closeX = document.getElementById('closeX')
            closeX.addEventListener('click', ()=>{
                successMessage.classList.add('hidden')
            })
        </script>
<?php }
}
?>

<script src="../js/password.js"></script>

<?php
include('../layouts/bottom.php')
?>