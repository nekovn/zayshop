class openEyePassword {
    constructor(idPassword) {
        const idInput = document.getElementById(idPassword);
        const labelEye = document.getElementById('eye');
        const eyeOn = document.getElementById('eye-on');
        const eyeOff = document.getElementById('eye-off');

        labelEye.addEventListener('click', (e) => {
            const type = idInput.getAttribute('type');
            if (type === 'password') {
                idInput.setAttribute('type', 'text');
                eyeOn.classList.add('d-none');
                eyeOff.classList.remove('d-none');
            } else {
                idInput.setAttribute('type', 'password');
                eyeOn.classList.remove('d-none');
                eyeOff.classList.add('d-none');
            }
        })
    }

}
export {openEyePassword};
new openEyePassword('eyes-password')
