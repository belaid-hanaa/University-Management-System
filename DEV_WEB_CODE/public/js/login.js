/*This is for the login page made by Mourad*/ 
const container = document.getElementById('container');
const registerBtn = document.getElementById('support');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});