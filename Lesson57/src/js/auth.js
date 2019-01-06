document.addEventListener('DOMContentLoaded', function (e) {
    const showAuthBtn = document.getElementById('alecaddd-show-auth-form'),
        authContainer = document.getElementById('alecaddd-auth-container'),
        close = document.getElementById('alecaddd-auth-close');
    
    showAuthBtn.addEventListener('click', () => {
        authContainer.classList.add('show');        
        showAuthBtn.parentElement.classList.add('hide');
    });

    close.addEventListener('click', () => {
        authContainer.classList.remove('show');
        showAuthBtn.parentElement.classList.remove('hide');
    });
});