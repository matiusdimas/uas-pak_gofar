const profileDrop = document.getElementById('profileDrop')
const profileDropList = document.getElementById('profileDropList')




window.addEventListener('click', ()=>{
    profileDrop.addEventListener('click', ()=> {
        event.stopPropagation()
        profileDropList.classList.remove('hidden')
        
    })
    profileDropList.classList.add('hidden')
})