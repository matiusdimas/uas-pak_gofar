<?php
include("../connect.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("Location : ./index.php");
}
$iduser = $_SESSION["id"];
$sql = "  SELECT data_favorites.id_user, data_perumahan.* FROM data_favorites 
        INNER JOIN data_perumahan ON data_favorites.id_data_perumahan = data_perumahan.id
        where data_favorites.id_user = $iduser";
$conn->query($sql, MYSQLI_ASYNC);
$result =  $conn->reap_async_query();
?>
<?php
include("../layouts/head.php")
?>
<?php
include("../layouts/navbar.php")
?>

<div class="grid h-screen">
    <div class="mt-20 mb-5 px-4 grid place-items-center">
        <div class="grid place-items-center gap-4">
            <h1 class="font-bold text-xl">Your Favorites</h1>
            <div class="flex flex-wrap gap-4 justify-center">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $imageData = base64_encode($row['gambar_rumah']); ?>
                        <div>
                            <form class="formRumah" action="./rumahdesc.php" method="GET">
                                <div class="hover:bg-slate-200  pb-1 rounded-md duration-200">
                                    <a href="javascript: submit()">
                                        <img class="rounded-lg w-40 lg:w-56 h-36" src="data:image/jpeg;base64,<?php echo $imageData ?>" alt="rumah">
                                        <div class="ml-2">
                                            <p class="text-blue-900 font-semibold">Rp <?php echo number_format($row['harga_rumah']) ?></p>
                                            <p>Tipe <?php echo $row['tipe'] ?></p>
                                            <p class="font-light text-xs first-letter:uppercase "><?php echo $row['alamat_rumah'] ?></p>
                                            <input type="hidden" name="idRumah" value="<?php echo $row['id'] ?>">
                                        </div>
                                    </a>
                                </div>
                            </form>
                        </div>
                <?php }
                } else {
                    echo "Image not found.";
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    include('../layouts/footer.php')
    ?>

</div>
<script>
    const formRumah = document.querySelectorAll('.formRumah');

    formRumah.forEach(function(button) {
        button.addEventListener('click', function() {
            button.submit();
        });
    });
</script>
<?php
include("../layouts/bottom.php")
?>