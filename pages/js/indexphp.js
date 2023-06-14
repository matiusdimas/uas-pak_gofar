const rightGambar = document.getElementById('right-gambar');
const leftGambar = document.getElementById('left-gambar');
const gambar = document.getElementById('content-gambar');
// code tersebut menggunakan metode getElementById() untuk memilih tiga elemen HTML yang memiliki id right-gambar, left-gambar, dan content-gambar dan menyimpannya dalam variabel rightGambar, leftGambar, dan gambar. Metode ini mengembalikan elemen HTML yang sesuai dengan id yang diberikan atau null jika tidak ada elemen dengan id tersebut


gambar.scrollLeft = 0;
// code tersebut menetapkan nilai properti scrollLeft dari elemen gambar menjadi 0. Properti ini menunjukkan jumlah piksel yang telah digeser elemen secara horizontal dari posisi awalnya. Dengan menetapkan nilai ini menjadi 0, code tersebut membuat elemen gambar berada di posisi paling kiri.


let endGambar = (gambar.scrollWidth - gambar.clientWidth);
//  variabel endGambar yang berisi nilai properti scrollWidth dikurangi properti clientWidth dari elemen gambar. Properti scrollWidth menunjukkan lebar total elemen termasuk bagian yang tersembunyi karena overflow. Properti clientWidth menunjukkan lebar elemen termasuk padding tetapi tidak termasuk border, scrollbar, atau margin. Dengan mengurangi kedua properti ini, code tersebut mendapatkan jumlah piksel yang harus digeser elemen untuk mencapai posisi paling kanan.


gambar.onscroll = function () {

    console.log(gambar.scrollLeft)
    if (gambar.scrollLeft == 0) {
        leftGambar.addEventListener('click', () => {
            gambar.scrollLeft = endGambar
        })
    } else {
        leftGambar.addEventListener('click', function () {
            gambar.scrollLeft -= 200;
        })
    }
    // Memeriksa apakah nilai properti scrollLeft dari elemen gambar sama dengan 0 atau tidak dengan menggunakan operator perbandingan == Jika ya, maka code tersebut menambahkan event listener untuk event click pada elemen leftGambar yang akan menjalankan fungsi untuk menetapkan nilai properti scrollLeft dari elemen gambar menjadi variabel endGambar. Dengan demikian, ketika pengguna mengklik elemen leftGambar, elemen gambar akan digeser ke posisi paling kanan. Jika tidak, maka code tersebut menambahkan event listener untuk event click pada elemen leftGambar yang akan menjalankan fungsi untuk mengurangi nilai properti scrollLeft dari elemen gambar sebesar 200. Dengan demikian, ketika pengguna mengklik elemen leftGambar, elemen gambar akan digeser ke kiri sejauh 200 piksel.


    if (Math.ceil(gambar.scrollLeft) === (gambar.scrollWidth - gambar.clientWidth) || (Math.floor(gambar.scrollLeft) === (gambar.scrollWidth - gambar.clientWidth)) || (Math.floor(gambar.scrollLeft) + 2 === (gambar.scrollWidth - gambar.clientWidth)) || (Math.floor(gambar.scrollLeft) + 2 === (gambar.scrollWidth - gambar.clientWidth))|| (Math.floor(gambar.scrollLeft) + 1 === (gambar.scrollWidth - gambar.clientWidth)) ) {
        rightGambar.addEventListener('click', () => {
            gambar.scrollLeft = 0
        })
    } else {
        rightGambar.addEventListener('click', function () {
            gambar.scrollLeft += 200
        });
    }
    // Memeriksa apakah nilai properti scrollLeft dari elemen gambar sama dengan nilai variabel endGambar atau tidak dengan menggunakan operator perbandingan dan logika. Karena nilai properti ini bisa saja tidak tepat sama dengan nilai variabelnya karena pembulatan atau presisi angka desimal, code tersebut juga memeriksa apakah nilai properti ini sama dengan nilai variabelnya ditambah atau dikurangi 1 atau 2. Jika ya, maka code tersebut menambahkan event listener untuk event click pada elemen rightGambar yang akan menjalankan fungsi untuk menetapkan nilai properti scrollLeft dari elemen gambar menjadi 0. Dengan demikian, ketika pengguna mengklik elemen rightGambar, elemen gambar akan digeser ke posisi paling kiri. Jika tidak, maka code tersebut menambahkan event listener untuk event click pada elemen rightGambar yang akan menjalankan fungsi untuk menambahkan nilai properti

}


rightGambar.addEventListener('click', function () {
    gambar.scrollLeft += 200
});
// Untuk elemen rightGambar, ketika diclick maka akan menjalankan fungsi nilai properti scrollLeft dari elemen gambar sebesar 200. Dengan demikian, ketika pengguna mengklik elemen rightGambar, elemen gambar akan digeser ke kanan sejauh 200 piksel.


leftGambar.addEventListener('click', function () {
    gambar.scrollLeft = endGambar;
})
// Untuk elemen leftGambar,ketika diklik maka akan menjalankan fungsi dan akan menetapkan nilai properti scrollLeft dari elemen gambar menjadi variabel endGambar. Dengan demikian, ketika pengguna mengklik elemen leftGambar, elemen gambar akan digeser ke posisi paling kanan.

