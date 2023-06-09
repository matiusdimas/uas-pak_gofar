<?php
include('../connect.php');
session_start();

$whereClauses = array();
//  code tersebut mendefinisikan sebuah variabel bernama $whereClauses yang berisi sebuah array kosong. Array ini akan digunakan untuk menyimpan klausa WHERE yang akan digunakan dalam query SQL nanti.

if (!empty($_POST['optionDaerah'])) {
    $optionDaerah = $_POST['optionDaerah'];
    // Variabel ini akan digunakan untuk menyimpan pilihan daerah yang dipilih oleh pengguna dari form HTML jika true.
}
if (!empty($_POST['optionTipe'])) {
    $optionTipe = $_POST['optionTipe'];
}


if (empty($optionDaerah) || isset($optionDaerah) && $optionDaerah == 'Daerah') {
} else {
    $nilai1 = $optionDaerah;
    $whereClauses[] = "alamat_rumah = '$nilai1'";
    $daerahTrue = true;
}
if (empty($optionTipe) || isset($optionTipe) && $optionTipe == 'Tipe') {
} else {
    $nilai2 = $optionTipe;
    $whereClauses[] = "tipe = '$nilai2'";
    $tipeTrue = true;
}


$whereClause = "";
// code tersebut mendefinisikan sebuah variabel bernama $whereClause yang berisi sebuah string kosong. Variabel ini akan digunakan untuk menyimpan klausa WHERE yang lengkap untuk query SQL nanti.

if (!empty($whereClauses)) {
    $whereClause = "WHERE " . implode(" AND ", $whereClauses);
}
// code tersebut memeriksa apakah array $whereClauses kosong atau tidak dengan menggunakan fungsi empty(). Jika tidak kosong, maka code tersebut akan menetapkan nilai dari variabel $whereClause menjadi "WHERE " ditambah dengan hasil dari fungsi implode(). Fungsi implode() menggabungkan elemen-elemen dari array menjadi sebuah string dengan menggunakan pemisah yang diberikan sebagai parameter pertama. Dalam hal ini, pemisahnya adalah " AND " yang merupakan operator logika untuk menggabungkan dua atau lebih kondisi dalam query SQL. Dengan demikian, variabel $whereClause akan berisi klausa WHERE yang terdiri dari kondisi-kondisi yang berasal dari array $whereClauses dan dipisahkan oleh operator AND.

$sql = "SELECT * FROM data_perumahan $whereClause limit 15";
$conn->query($sql, MYSQLI_ASYNC);
$result =  $conn->reap_async_query();
$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}


$sqlFilterDaerah = "SELECT DISTINCT alamat_rumah FROM data_perumahan order by alamat_rumah asc";
// Distinct dalam MySQL adalah sebuah klausa yang digunakan dalam perintah SELECT untuk menghapus baris duplikat dari hasil query

$conn->query($sqlFilterDaerah, MYSQLI_ASYNC);
$resultDaerah = $conn->reap_async_query();
$rowsDaerah = array();
while ($row = mysqli_fetch_assoc($resultDaerah)) {
    $rowsDaerah[] = $row;
}

$sqlFilterTipe = "SELECT DISTINCT tipe FROM data_perumahan order by tipe asc";
$conn->query($sqlFilterTipe, MYSQLI_ASYNC);
$resultTipe = $conn->reap_async_query();
$rowsTipe = array();
while ($row = mysqli_fetch_assoc($resultTipe)) {
    $rowsTipe[] = $row;
}



?>


<?php
include('../layouts/head.php')
?>
<?php
include('../layouts/navbar.php')
?>


<div class="grid h-screen bg-white">
    <div class="mt-20 mb-5 px-4 grid place-items-center">
        <div class="">
            <div class="flex justify-center mb-4">
                <form method="POST" class="bg-slate-200 px-1 md:px-3 py-2 rounded-md">
                    <div class="flex gap-4 items-center">
                        <div>
                            <select name="optionDaerah" class="bg-inherit cursor-pointer text-xs md:text-base">
                                <?php
                                if ($daerahTrue) { ?>
                                    <option value="<?= $nilai1 ?>"><?= $nilai1 ?></option>
                                <?php }
                                ?>
                                <option value="Daerah">Semua Daerah</option>
                                <?php
                                if ($resultDaerah->num_rows > 0) {
                                    foreach ($rowsDaerah as $row) { ?>
                                    <!-- foreach untuk mengambil data-data dari array $rowsDaerah dengan menggunakan variabel $row sebagai penampung sementara. Array $rowsDaerah menyimpan data-data yang berasal dari hasil query SQL asinkron  -->
                                        <option value="<?= $row['alamat_rumah'] ?>"><?= $row['alamat_rumah'] ?></option>
                                <?php }
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <select name="optionTipe" class="bg-inherit cursor-pointer text-xs md:text-base">
                                <?php
                                if ($tipeTrue) { ?>
                                    <option value="<?= $nilai2 ?>"><?= $nilai2 ?></option>
                                <?php }
                                ?>
                                <option value="Tipe">Semua Tipe</option>
                                <?php
                                if ($resultTipe->num_rows > 0) {
                                    foreach ($rowsTipe as $row) { ?>
                                        <option value="<?= $row['tipe'] ?>"><?= $row['tipe'] ?></option>
                                <?php }
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="bg-blue-500 duration-200 rounded-md hover:opacity-80 active:scale-105 text-white px-3 py-1 text-xs md:text-base">Apply Filters</button>
                    </div>
                </form>
            </div>
            <div class="flex flex-wrap gap-4 justify-center">
                <?php
                if ($result->num_rows > 0) {
                    foreach ($rows as $row) {
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
                    echo "Rumah Tidak Di Temukan";
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
include('../layouts/bottom.php')
?>