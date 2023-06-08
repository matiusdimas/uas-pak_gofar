
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

