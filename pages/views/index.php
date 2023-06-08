<?php
include('../connect.php');
session_start();
$sql = "SELECT nm_rumah, harga_rumah, alamat_rumah, gambar_rumah, tipe FROM data_perumahan order by tanggal desc limit 5";
$conn->query($sql, MYSQLI_ASYNC);
$result =  $conn->reap_async_query();

?>


<?php
include('../layouts/head.php')
?>

<div class="h-96 w-full bg-bottom bg-cover bg-no-repeat grid place-items-center bg-[url('../pages/img/pexels-expect-best-323780.jpg')]">
    <?php
    include('../layouts/navbar.php')
    ?>
    <div class="bg-white/30 backdrop-blur-lg text-white px-5 py-3 mt-10  rounded-md grid place-items-center ">
        <h1 class="font-bold border-b-4 border-red-500 my-2">Cari Rumah</h1>
        <div class="mb-5">
            <form action="recommend.php" method="post">
                <input name='optionDaerah' class="rounded-md px-3 py-1 focus:outline-none text-black border-2 border-transparent duration-150 focus:border-blue-950" type="search" placeholder="Example: Bekasi">
            </form>
        </div>
    </div>


</div>


<!-- sect 2 rekomen rumah s -->

<div class="grid justify-center px-1 py-20 bg-slate-200">
    <div>
        <h1 class="text-center font-semibold mb-5">Rekomendasi Rumah</h1>
        <div class="w-full grid justify-center ">
            <div id="content-gambar" class="flex w-full overflow-x-auto no-scrollbar gap-x-5 snap-mandatory snap-x scroll-smooth">
                <div id="left-gambar" class="absolute z-[99] lg:hidden left-12 self-center bg-blue-800 px-4 py-2 text-white  font-semibold cursor-pointer opacity-75 text-lg rounded-full transition-all hover:opacity-100 active:bg-blue-950 select-none">
                    &lt;</div>
                <?php

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Convert BLOB data to base64 encoding
                        $imageData = base64_encode($row['gambar_rumah']); ?>
                        <div class="flex-shrink-0 snap-center">
                            <img class="rounded-lg  h-36" src="data:image/jpeg;base64,<?php echo $imageData ?>" alt="rumah">
                            <div class="ml-2">
                                <p class="text-blue-900 font-semibold">Rp <?php echo number_format($row['harga_rumah']) ?></p>
                                <p >Tipe <?= $row['tipe'] ?></p>
                                <p name='alamat' class="font-light text-xs first-letter:uppercase "><?php echo $row['alamat_rumah'] ?></p>
                            </div>
                        </div>

                <?php  }
                } else {
                    echo "Image not found.";
                }
                ?>

                <div id="right-gambar" class="absolute z-[99] lg:hidden right-12 self-center bg-blue-800 px-4 py-2 text-white  font-semibold cursor-pointer opacity-70 text-lg rounded-full transition-all hover:opacity-100 active:bg-blue-950 select-none">
                    &gt;</div>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="./recommend.php" class="bg-blue-500 text-xs text-white rounded-md px-3 py-1 duration-200 hover:opacity-80 active:bg-blue-950 active:opacity-100">Lihat Rekomendasi Lainnya</a>
        </div>
    </div>
</div>

<!-- sect 2 e -->


<?php
include('../layouts/footer.php')
?>



<script src="../js/indexphp.js?v=4"></script>
<?php
include('../layouts/bottom.php')
?>