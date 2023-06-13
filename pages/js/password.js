const password = document.getElementById('password')
const cpassword = document.getElementById('cpassword')
const textcpass = document.getElementById('textcpass')

function confirmPassword(event) {
    let passvalue = password.value
    let cpassvalue = cpassword.value
    if (passvalue !== cpassvalue) {
        textcpass.classList.remove('hidden')
    } else {
        textcpass.classList.add('hidden')
    }
};


password.addEventListener('input', confirmPassword)
cpassword.addEventListener('input', confirmPassword)