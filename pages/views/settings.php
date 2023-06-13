<?php
include('../connect.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ./index.php");
}

$sql = "SELECT * FROM data_perumahan order by tanggal desc limit 5";
$conn->query($sql, MYSQLI_ASYNC);
$result =  $conn->reap_async_query();

if (isset($_POST["submit"])){
    
    $iduser=$_SESSION["id"];
    $password=md5($_POST["password"]);
    $npassword=md5($_POST["npassword"]);
    $sqlpass = "SELECT password FROM users where id = $iduser";
    $resultpass = $conn->query($sqlpass);
    while($row = $resultpass->fetch_assoc()){
        if($password == $row['password']) {
            $pass = true;
            $sqlupdate = "UPDATE users SET password = '$npassword' WHERE id = $iduser";
            $resultupdate=$conn->query($sqlupdate);
            $success = "Password Berhasil Di Ganti";
        } else {
            $pass=false;
            $errpass = "pass tidak sesuai";
        }
    }
}
?>


<?php
include('../layouts/head.php')
?>

<div class="w-full h-screen grid place-items-center">
    <?php
    include('../layouts/navbar.php')
    ?>
    <div class="bg-slate-200 my-32 px-2 md:px-10 py-5">
        <h1 class="font-bold text-lg border-b-2 w-full  pt-5 border-black">Ganti Password</h1>
        <form method="post" class="grid gap-4">
            <div class="flex gap-4 mt-5">
                <div class="grid gap-2 items-center">

                    <p>password lama</p>
                    <p>password baru</p>
                </div>
                <div class="grid gap-2">
                    <div><input name="password" type="password" class="rounded-md px-3 py-1 focus:outline-none text-black border-2 border-transparent duration-150 focus:border-blue-950" required></div>
                    <div><input name="npassword" type="password" class="rounded-md px-3 py-1 focus:outline-none text-black border-2 border-transparent duration-150 focus:border-blue-950" required></div>

                </div>
            </div>
            <?php 
                    if (isset($_POST['submit'])) {
                        if($pass == false) {
                            echo $errpass;
                        } else {
                            echo $success;
                        }
                    }
                    ?>
            <button class="place-self-center w-fit bg-blue-500 rounded-md hover:opacity-80 duration-200 active:scale-105 text-white px-3 py-1" name="submit">Submit</button>
        </form>
    </div>

    <!-- sect 2 e -->


    <?php
    include('../layouts/footer.php')
    ?>

</div>
<?php
include('../layouts/bottom.php')
?>