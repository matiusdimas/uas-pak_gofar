<?php
include('../connect.php');
session_start();

$whereClauses = array();
if (!empty($_POST['optionDaerah'])) {
    $optionDaerah = $_POST['optionDaerah'];
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

// Cek apakah klausa WHERE kedua diberikan
// if (isset($_POST['tipe'])) {
//     $nilai2 = $_POST['tipe'];
//     $whereClauses[] = "tipe = '$nilai2'";
// }

$whereClause = "";
if (!empty($whereClauses)) {
    $whereClause = "WHERE " . implode(" AND ", $whereClauses);
}
$sql = "SELECT nm_rumah, harga_rumah, alamat_rumah, gambar_rumah, tipe FROM data_perumahan $whereClause limit 15";
$conn->query($sql, MYSQLI_ASYNC);
$result =  $conn->reap_async_query();
$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
$sqlFilterDaerah = "SELECT DISTINCT alamat_rumah FROM data_perumahan order by alamat_rumah asc";
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
<div class="grid h-screen">
    <div class="mt-20 mb-5 px-4 grid place-items-center">
        <div class="">
            <div class="flex justify-center mb-4">
                <form method="POST" class="bg-slate-200 px-3 py-2 rounded-md">
                    <div class="flex gap-4 items-center">
                        <div>
                            <select name="optionDaerah" class="bg-inherit cursor-pointer">
                                <?php
                                if ($daerahTrue) { ?>
                                    <option value="<?= $nilai1 ?>"><?= $nilai1 ?></option>
                                <?php }
                                ?>
                                <option value="Daerah">Semua Daerah</option>
                                <?php
                                if ($resultDaerah->num_rows > 0) {
                                    foreach ($rowsDaerah as $row) { ?>
                                        <option value="<?= $row['alamat_rumah'] ?>"><?= $row['alamat_rumah'] ?></option>
                                <?php }
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <select name="optionTipe" class="bg-inherit">
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
                        <button type="submit" name="submit" class="bg-blue-500 duration-200 rounded-md hover:opacity-80 active:scale-105 text-white px-3 py-1">Apply Filters</button>
                    </div>
                </form>
            </div>
            <div class="flex flex-wrap gap-4 justify-center">
                <?php
                if ($result->num_rows > 0) {
                    foreach ($rows as $row) {
                        $imageData = base64_encode($row['gambar_rumah']); ?>
                        <div>
                            <img class="rounded-lg w-40 lg:w-56 h-36" src="data:image/jpeg;base64,<?php echo $imageData ?>" alt="rumah">
                            <div class="ml-2">
                                <p class="text-blue-900 font-semibold">Rp 157 Juta</p>
                                <p>Tipe <?php echo $row['tipe'] ?></p>
                                <p class="font-light text-xs first-letter:uppercase "><?php echo $row['alamat_rumah'] ?></p>
                            </div>
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


<?php
include('../layouts/bottom.php')
?>