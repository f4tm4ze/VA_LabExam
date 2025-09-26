document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('navLinks');
    
    if (hamburger && navLinks) {
        hamburger.addEventListener('click', function() {
            navLinks.classList.toggle('active');
        });
    }
    
    const userToggle = document.querySelector('.user-toggle');
    const userMenu = document.querySelector('.user-menu');
    
    if (userToggle && userMenu) {
        userToggle.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                e.stopPropagation();
                userMenu.classList.toggle('active');
            }
        });
        
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 768 && userMenu && userMenu.classList.contains('active')) {
                if (!userMenu.contains(e.target)) {
                    userMenu.classList.remove('active');
                }
            }
        });
    }
    
    if (hamburger && navLinks && userMenu) {
        hamburger.addEventListener('click', function() {
            userMenu.classList.remove('active');
        });
    }

    const toggleButtons = document.querySelectorAll('.password-toggle');
    
    toggleButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const wrapper = this.closest('.password-wrapper');
            const input = wrapper.querySelector('input');
            const icon = this.querySelector('i');
            
            console.log('Toggle clicked', input, icon); 
            
            if (input && icon) {
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                    console.log('Password shown');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                    console.log('Password hidden');
                }
            }
        });
    });
    
    // Form validation
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            let valid = true;
            
            const username = document.getElementById('loginUsername');
            const usernameError = document.getElementById('loginUsernameError');
            if (username.value.trim() === '') {
                usernameError.style.display = 'block';
                valid = false;
            } else {
                usernameError.style.display = 'none';
            }
            
            const password = document.getElementById('loginPassword');
            const passwordError = document.getElementById('loginPasswordError');
            if (password.value.trim() === '') {
                passwordError.style.display = 'block';
                valid = false;
            } else {
                passwordError.style.display = 'none';
            }
            
            if (!valid) {
                e.preventDefault();
            }
        });
    }
    
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            let valid = true;
            
            const name = document.getElementById('regName');
            const nameError = document.getElementById('regNameError');
            if (name.value.trim() === '') {
                nameError.textContent = 'Full name is required';
                nameError.style.display = 'block';
                valid = false;
            } else {
                nameError.style.display = 'none';
            }
            
            const email = document.getElementById('regEmail');
            const emailError = document.getElementById('regEmailError');
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email.value.trim() === '') {
                emailError.textContent = 'Email is required';
                emailError.style.display = 'block';
                valid = false;
            } else if (!emailPattern.test(email.value)) {
                emailError.textContent = 'Please enter a valid email address';
                emailError.style.display = 'block';
                valid = false;
            } else {
                emailError.style.display = 'none';
            }
            
            const username = document.getElementById('regUsername');
            const usernameError = document.getElementById('regUsernameError');
            if (username.value.trim() === '') {
                usernameError.style.display = 'block';
                valid = false;
            } else {
                usernameError.style.display = 'none';
            }
            
            const password = document.getElementById('regPassword');
            const passwordError = document.getElementById('regPasswordError');
            if (password.value.trim() === '') {
                passwordError.style.display = 'block';
                valid = false;
            } else if (password.value.length < 6) {
                passwordError.textContent = 'Password must be at least 6 characters';
                passwordError.style.display = 'block';
                valid = false;
            } else {
                passwordError.style.display = 'none';
            }
            
            if (!valid) {
                e.preventDefault();
            }
        });
    }
});

