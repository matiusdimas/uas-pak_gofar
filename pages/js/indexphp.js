const rightGambar = document.getElementById('right-gambar');
const leftGambar = document.getElementById('left-gambar');
const gambar = document.getElementById('content-gambar');
gambar.scrollLeft = 0;
let endGambar = (gambar.scrollWidth - gambar.clientWidth);

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
    if (Math.ceil(gambar.scrollLeft) === (gambar.scrollWidth - gambar.clientWidth) || (Math.floor(gambar.scrollLeft) === (gambar.scrollWidth - gambar.clientWidth)) || (Math.floor(gambar.scrollLeft) + 2 === (gambar.scrollWidth - gambar.clientWidth)) || (Math.floor(gambar.scrollLeft) + 2 === (gambar.scrollWidth - gambar.clientWidth))|| (Math.floor(gambar.scrollLeft) + 1 === (gambar.scrollWidth - gambar.clientWidth)) ) {
        rightGambar.addEventListener('click', () => {
            gambar.scrollLeft = 0
        })
    } else {
        rightGambar.addEventListener('click', function () {
            gambar.scrollLeft += 200
        });
        
    }
}
rightGambar.addEventListener('click', function () {
    gambar.scrollLeft += 200
});
leftGambar.addEventListener('click', function () {
    gambar.scrollLeft = endGambar;
})