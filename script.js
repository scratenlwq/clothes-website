document.querySelector('.fa-user').addEventListener('click', function() {
    document.querySelector('.login-form').style.display = 'block';
    document.querySelector('.register-form').style.display = 'none';
});

document.querySelector('.fa-user-plus').addEventListener('click', function() {
    document.querySelector('.register-form').style.display = 'block';
    document.querySelector('.login-form').style.display = 'none';
});
