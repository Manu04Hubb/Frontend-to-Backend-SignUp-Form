document.getElementById('signupForm').addEventListener('submit', function(e){
    const fullname = document.getElementById('fullName').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirmPassword').value;
    const errorMsg = document.getElementById('errorMsg');

    const nameErr = document.getElementById('nameErr');
    const emailErr = document.getElementById('emailErr');
    const passErr = document.getElementById('passErr');
    const confirmPassErr = document.getElementById('confirmPassErr');

    if(fullname === '' || email === '' || password === '' || confirmPassword === ''){
        e.preventDefault();
        errorMsg.textContent = 'All fields are required.';
        errorMsg.style.color = 'red';
        errorMsg.style.fontSize = '16px';
        return;
    }
    if(fullname.length < 3){
        e.preventDefault();
        nameErr.textContent = 'Full Name must be at least 3 characters long.';
        nameErr.style.color = 'red';
        nameErr.style.fontSize = '14px';
        return;
    }
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if(!email.match(emailPattern)){
        e.preventDefault();
        emailErr.textContent = 'Please enter a valid email address.';
        emailErr.style.color = 'red';
        emailErr.style.fontSize = '14px';
        return;
    }
    if(password !== confirmPassword){
        e.preventDefault();
        confirmPassErr.textContent = 'Passwords do not match.';
        confirmPassErr.style.color = 'red';
        confirmPassErr.style.fontSize = '14px';
        return;
    }
    if(password.length < 6){
        e.preventDefault();
        passErr.textContent = 'Password must be at least 6 characters long.';
        passErr.style.color = 'red';
        passErr.style.fontSize = '14px';
    }
    nameErr.textContent = passErr.textContent = emailErr.textContent = confirmPassErr.textContent = '';
    errorMsg.textContent = '';
});
document.getElementById('signUpBtn').addEventListener('click', function(){
    document.getElementById('signupForm').submit();
});