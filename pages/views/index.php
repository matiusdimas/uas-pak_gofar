<?php
include('../connect.php');
// code tersebut meng-include file ../connect.php, yang berisi kode untuk membuat koneksi ke database MySQL menggunakan ekstensi mysqli.

session_start();
// yang berguna untuk membuat dan mengakses data session

$sql = "SELECT * FROM data_perumahan order by tanggal desc limit 5";
// code tersebut menentukan variabel $sql yang berisi perintah SQL untuk memilih semua data dari tabel data_perumahan dan mengurutkannya berdasarkan kolom tanggal secara menurun (descending) dengan batas 5 baris.

$conn->query($sql, MYSQLI_ASYNC);
// code tersebut menjalankan query SQL dengan menggunakan metode query() dari objek $conn yang dibuat di file ../connect.php. Metode ini menerima dua parameter, yaitu query SQL dan mode query. Mode query yang digunakan adalah MYSQLI_ASYNC, yang berarti query akan dieksekusi secara asinkron (tidak menunggu hasilnya)

$result =  $conn->reap_async_query();
// code tersebut menangkap hasil query asinkron dengan menggunakan metode reap_async_query() dari objek $conn dan menyimpannya di variabel $result.


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
                //  code Berikut ini memeriksa apakah variabel $result yang berisi objek mysqli_result memiliki jumlah baris yang lebih dari nol dengan menggunakan properti num_rows. Jika ya, maka code tersebut akan melanjutkan eksekusi. Jika tidak, maka code tersebut akan menampilkan pesan “Image not found.”.

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // code tersebut menggunakan perulangan while untuk mengambil setiap baris data dari objek mysqli_result dengan menggunakan metode fetch_assoc(), yang mengembalikan array asosiatif yang berisi nama kolom dan nilai data. Setiap baris data disimpan di variabel $row

                        
                        $imageData = base64_encode($row['gambar_rumah']); ?>
                        <!-- code tersebut mengubah data BLOB yang berisi gambar rumah dari kolom gambar_rumah menjadi encoding base64 dengan menggunakan fungsi base64_encode(). Encoding base64 ini disimpan di variabel $imageData -->

                            <form class="formRumah flex-shrink-0 snap-center cursor-pointer hover:bg-slate-400 duration-200 rounded-md px-3 py-1" action="./rumahdesc.php" method="GET">
                                <img class="rounded-lg w-52 h-36" src="data:image/jpeg;base64,<?php echo $imageData ?>" alt="rumah">
                                <div class="ml-2">
                                    <p class="text-blue-900 font-semibold">Rp <?php echo number_format($row['harga_rumah']) ?></p>
                                    <p>Tipe <?= $row['tipe'] ?></p>
                                    <p name='alamat' class="font-light text-xs first-letter:uppercase "><?php echo $row['alamat_rumah'] ?></p>
                                </div>
                                <input type="hidden" name="idRumah" value="<?php echo $row['id'] ?>">
                            </form >
                            <!-- code tersebut menampilkan data rumah dalam bentuk HTML yang berisi elemen-elemen -->
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


<script>
    const formRumah = document.querySelectorAll('.formRumah');
    //  code tersebut menggunakan metode querySelectorAll() untuk memilih semua elemen HTML yang memiliki kelas formRumah dan menyimpannya dalam variabel formRumah. Metode ini mengembalikan sebuah NodeList yang berisi elemen-elemen yang sesuai dengan selektor CSS yang diberikan.

    // code berikut menggunakan metode forEach() untuk melakukan iterasi terhadap setiap elemen dalam NodeList formRumah dan menjalankan sebuah fungsi callback. Metode ini menerima sebuah fungsi sebagai parameter yang akan dijalankan untuk setiap elemen dalam NodeList.
    formRumah.forEach(function(button) {

        // code tersebut menambahkan event listener untuk setiap elemen dalam NodeList formRumah dengan menggunakan metode addEventListener(). Metode ini menerima dua parameter, yaitu jenis event yang ingin ditangani dan fungsi yang akan dijalankan ketika event terjadi. Dalam hal ini, jenis event yang ditangani adalah click, yang berarti fungsi akan dijalankan ketika elemen diklik oleh pengguna.
        button.addEventListener('click', function() {


            button.submit();
            //  code tersebut menjalankan fungsi yang berisi perintah untuk mengirimkan form HTML yang diklik oleh pengguna dengan menggunakan metode submit(). Metode ini akan mengirimkan data form ke URL yang ditentukan dalam atribut action dengan menggunakan metode yang ditentukan dalam atribut method
        });
    });
</script>

<script src="../js/indexphp.js?v=4"></script>
<?php
include('../layouts/bottom.php')
?>