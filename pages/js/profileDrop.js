const profileDrop = document.getElementById('profileDrop')
const profileDropList = document.getElementById('profileDropList')



profileDrop.addEventListener('click', ()=> {
    event.stopPropagation()
    profileDropList.classList.remove('hidden')
    
})
window.addEventListener('click', ()=>{

    profileDropList.classList.add('hidden')
})