const profileDrop = document.getElementById('profileDrop')
const profileDropList = document.getElementById('profileDropList')



profileDrop.addEventListener('click', ()=> {
    event.stopPropagation()
    // Memanggil metode stopPropagation() pada objek event yang secara otomatis dikirimkan sebagai parameter pertama ke fungsi. Metode ini akan mencegah event dari menyebar ke elemen-elemen lain di DOM. Dengan demikian, jika pengguna mengklik elemen profileDrop, event click tidak akan ditangani oleh event listener lain yang mungkin ada di window atau dokumen.

    profileDropList.classList.toggle('hidden')
    // Menambahkan atau menghapus kelas hidden dari elemen profileDropList dengan menggunakan metode classList.toggle(). Metode ini akan menambahkan nama kelas yang diberikan ke daftar kelas elemen jika belum ada atau menghapusnya jika sudah ada. Dengan demikian, elemen profileDropList akan ditampilkan atau disembunyikan di halaman web bergantung pada keberadaan kelas hidden.
    
})
window.addEventListener('click', ()=>{
    profileDropList.classList.add('hidden')
})


// code tersebut bertujuan untuk membuat elemen profileDropList dapat ditampilkan atau disembunyikan dengan cara mengklik elemen profileDrop atau di luar elemen tersebut.