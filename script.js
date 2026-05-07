const authModal = document.getElementById('auth-modal');
const loginBtn = document.querySelector('.login-btn-modal');
const registerBtn = document.querySelector('.register-btn-modal');
const closeBtn = document.querySelector('.close');
const profileBox = document.querySelector('.profile-box');
const profileBoxAvatarCircle = document.querySelector('.profile-box .avatar');
loginBtn.addEventListener('click', () => {
    authModal.classList.add('active');
    authModal.classList.remove('register-active');
});

registerBtn.addEventListener('click', () => {
    authModal.classList.add('active');
    authModal.classList.add('register-active');
});

closeBtn.addEventListener('click', () => {
    authModal.classList.remove('active');
    authModal.classList.remove('register-active');
});