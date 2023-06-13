const profileDrop = document.getElementById('profileDrop')
const profileDropList = document.getElementById('profileDropList')



profileDrop.addEventListener('click', ()=> {
    event.stopPropagation()
    profileDropList.classList.toggle('hidden')
    
})
window.addEventListener('click', ()=>{

    profileDropList.classList.add('hidden')
})