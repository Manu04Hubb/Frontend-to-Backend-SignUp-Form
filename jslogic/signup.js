document.getElementById('signupForm').addEventListener('submit', function(e){
    const fullname = document.getElementById('fullName').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirmPassword').value;
    const errorMsg = document.getElementById('errorMsg');

    if(fullname === '' || email === '' || password === '' || confirmPassword === ''){
        e.preventDefault();
        errorMsg.textContent = 'All fields are required.';
    }
    if(fullname.length < 3){
        e.preventDefault();
        errorMsg.textContent = 'Full Name must be at least 3 characters long.';
    }
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if(!email.match(emailPattern)){
        e.preventDefault();
        errorMsg.textContent = 'Please enter a valid email address.';
    }
    if(password !== confirmPassword){
        e.preventDefault();
        errorMsg.textContent = 'Passwords do not match.';
        return;
    }
    if(password.length < 6){
        e.preventDefault();
        errorMsg.textContent = 'Password must be at least 6 characters long.';
    }
    errorMsg.textContent = '';
});
document.getElementById('signUpBtn').addEventListener('click', function(){
    document.getElementById('signupForm').submit();
});