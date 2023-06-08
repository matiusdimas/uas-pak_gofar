<?php
include('../connect.php');
session_start();

$idRumah = $_GET['idRumah'];

$sql = "SELECT * FROM data_perumahan where id = $idRumah";
$conn->query($sql, MYSQLI_ASYNC);
$result =  $conn->reap_async_query();

if (isset($_SESSION['username'])) {
    $iduser = $_SESSION['id'];
    $sqlfavoritesiduser = "SELECT DISTINCT id_data_perumahan FROM data_favorites where id_user = $iduser and id_data_perumahan = $idRumah";
    $conn->query($sqlfavoritesiduser, MYSQLI_ASYNC);
    $residuser = $conn->reap_async_query();
    if ($residuser->num_rows > 0) {
        $check = true;
    } else {
        $check = false;
    }
}
?>



<?php
include('../layouts/head.php')
?>

<?php
include('../layouts/navbar.php')
?>

<div class="grid h-screen ">
    <div class="my-20 grid place-items-center">
        <div class="w-full flex gap-4 px-4 py-5 bg-slate-200 flex-col justify-center items-center">
            <?php
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imageData = base64_encode($row['gambar_rumah']); ?>
                    <img class="w-60 h-full" src="data:image/jpeg;base64,<?php echo $imageData ?>" alt="rumah">
                    <form action="<?php echo ($check) ? './deletefav.php' : './submitfav.php' ?>" method="post" class="grid">
                        <input type="hidden" name="idRumah" value="<?= $row['id'] ?>">
                        <div class="ml-2 border-2 grid border-blue-950 px-3 py-2 rounded-md">
                            <p><?= $row['nm_rumah'] ?></p>
                            <p class="text-blue-900 font-semibold">Rp <?php echo number_format($row['harga_rumah']) ?></p>
                            <p>Tipe <?php echo $row['tipe'] ?></p>
                            <p class="first-letter:uppercase "><?php echo $row['alamat_rumah'] ?></p>
                            <div>
                                <p>Keterangan : </p>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. A eum accusantium, error maxime saepe libero!</p>
                            </div>

                        </div>
                        <?php
                        if (isset($_SESSION['username'])) {
                            if ($check) { ?>
                                <button type="submit" name="submit" class="bg-red-500 text-white px-3 py-1 rounded-md place-self-center w-fit hover:opacity-80 active:scale-105 duration-200 mt-4">Remove To Favorites</button>
                            <?php } else { ?>
                                <button type="submit" name="submit" class="bg-blue-500 text-white px-3 py-1 rounded-md place-self-center w-fit hover:opacity-80 active:scale-105 duration-200 mt-4">Add To Favorites</button>
                            <?php }
                        } else { ?>
                            <p id='tombollogindulu' class="bg-blue-500 text-white px-3 py-1 rounded-md place-self-center w-fit hover:opacity-80 active:scale-105 duration-200 mt-4 cursor-pointer">Add To Favorites</p>
                            <p id='logindulu' class="hidden text-center">Silahkan <a class="text-red-500 underline" href="./login.php">Login</a> Terlebih Dahulu</p>
                        <?php }
                        ?>
                    </form>
            <?php }
            }
            ?>
        </div>
    </div>


    <?php
    include('../layouts/footer.php')
    ?>

</div>

<?php
if (!isset($_SESSION['username'])) {?>
    <script>
        const logindulu = document.getElementById('logindulu')
        const tombolLoginDulu = document.getElementById('tombollogindulu')
        tombolLoginDulu.addEventListener('click', ()=>{
            logindulu.classList.remove('hidden')
        })
    </script>
<?php }
?>


<?php
include('../layouts/bottom.php')
?>