
// nav start
const hamburger = document.querySelector('#hamburger');
const navMenu = document.querySelector('#list-nav');

hamburger.addEventListener('click', function () {
    hamburger.classList.toggle('hamburger-active')
    navMenu.classList.toggle('navini')
    navMenu.classList.toggle('navnull')

});
// nav end

// form reload prevent
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
// code tersebut memeriksa apakah objek window memiliki properti history.replaceState atau tidak dengan menggunakan operator in. Properti ini adalah sebuah metode yang memungkinkan untuk mengubah URL saat ini tanpa memuat ulang halaman. Jika properti ini ada, maka code tersebut akan memanggil metode ini dengan tiga parameter: null, null, dan window.location.href. Parameter pertama adalah state object yang berisi informasi tentang state histori. Parameter kedua adalah title yang berisi judul halaman. Parameter ketiga adalah URL yang ingin diganti. Dengan memanggil metode ini, code tersebut akan mengganti URL saat ini dengan URL yang sama, sehingga mencegah form dari dikirim ulang ketika pengguna menekan tombol refresh.


// kesimpulannya code tersebut bertujuan untuk membuat elemen hamburger dapat menampilkan atau menyembunyikan elemen navMenu dengan cara diklik oleh pengguna dan mencegah form dari dikirim ulang ketika pengguna menekan tombol refresh.
