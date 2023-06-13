<?php
include('../connect.php');
session_start();
if(isset($_SESSION['username'])) {
    header('Location: ./index.php');
}

if (isset($_POST['submit'])) {
    // Ambil data pengguna dari formulir login
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Persiapkan pernyataan SQL dengan prepared statements
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    // Eksekusi pernyataan SQL
    $stmt->execute();

    // Ambil hasil pernyataan SQL
    $result = $stmt->get_result();

    // Periksa apakah pengguna valid
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        header('Location: ./index.php');
        exit();
    } else {
        $errLogin = 'Username Atau Password Salah!!!';
    }

    // Tutup pernyataan dan koneksi database
    $stmt->close();
    $conn->close();
};

?>


<?php
include('../layouts/head.php');
?>

<?php
include('../layouts/navbar.php');
?>

<div class="bg-slate-200 flex justify-center items-center h-screen ">
    <div class="h-full w-full bg-bottom bg-cover bg-no-repeat grid place-items-center bg-[url('../pages/img/pexels-expect-best-323780.jpg')]">
        <form method="post">
            <div class=" px-5 md:px-16 py-10 bg-blue-950 flex gap-4 flex-col justify-center items-center rounded-md text-white">
                <h1 class="font-bold border-b-4 px-3 border-red-500">Login</h1>
                <div>
                    <input name="username" type="text" class="rounded-md px-3 py-1 text-blue-950 focus:outline-none focus:border-2 focus:border-blue-500 border-2 border-transparent duration-100" placeholder="Username/Email" required>
                </div>
                <div>
                    <input name="password" type="password" class="rounded-md px-3 py-1 text-blue-950 focus:outline-none focus:border-2 focus:border-blue-500 border-2 border-transparent duration-100" placeholder="Password" required>
                </div>
                <?php
                if (isset($_POST['submit'])) {

                    if ($errLogin) { ?>
                        <p class="text-xs text-red-300"><?php echo $errLogin ?>
                        </p>
                <?php }
                }
                ?>
                <button name="submit" class="w-full py-1 bg-blue-500 hover:opacity-80 duration-200 active:scale-105 rounded-md font-semibold">Login</button>
                <p class="text-xs -mt-2 ">Belum Punya Akun? <a href="./regis.php" class="text-red-300 duration-200 underline hover:opacity-80 active:text-red-500 active:opacity-100">Registrasi</a></p>
            </div>
        </form>
    </div>

</div>


<?php
include('../layouts/bottom.php')
?>