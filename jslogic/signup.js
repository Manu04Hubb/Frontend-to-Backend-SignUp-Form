document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('signupForm');
  if (!form) return; // safety

  //add submit event listener on the form
  form.addEventListener('submit', function (e) {
    // Grab trimmed values
    const fullname = document.getElementById('fullName').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirmPassword').value.trim();

    // Error containers
    const errorMsg = document.getElementById('errorMsg');
    const nameErr = document.getElementById('nameErr');
    const emailErr = document.getElementById('emailErr');
    const passErr = document.getElementById('passErr');
    const confirmPassErr = document.getElementById('confirmPassErr');

    // Clear previous errors
    if (errorMsg) errorMsg.textContent = '';
    if (nameErr) nameErr.textContent = '';
    if (emailErr) emailErr.textContent = '';
    if (passErr) passErr.textContent = '';
    if (confirmPassErr) confirmPassErr.textContent = '';

// Validation flag
    let hasError = false;

    // 1) Required fields
    if (!fullname || !email || !password || !confirmPassword) {
      if (errorMsg) {
        errorMsg.textContent = 'All fields are required.';
        errorMsg.style.color = 'red';
        errorMsg.style.fontSize = '16px';
      }
      hasError = true;
    }

    // 2) Name length
    if (fullname && fullname.length < 3) {
      if (nameErr) {
        nameErr.textContent = 'Full Name must be at least 3 characters long.';
        nameErr.style.color = 'red';
        nameErr.style.fontSize = '14px';
      }
      hasError = true;
    }

    // 3) Email format (practical regex)
    // This allows most common valid emails
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email && !emailPattern.test(email)) {
      if (emailErr) {
        emailErr.textContent = 'Please enter a valid email address.';
        emailErr.style.color = 'red';
        emailErr.style.fontSize = '14px';
      }
      hasError = true;
    }

    // 4) Password length
    if (password && password.length < 6) {
      if (passErr) {
        passErr.textContent = 'Password must be at least 6 characters long.';
        passErr.style.color = 'red';
        passErr.style.fontSize = '14px';
      }
      hasError = true;
    }

    // 5) Password match
    if (password && confirmPassword && password !== confirmPassword) {
      if (confirmPassErr) {
        confirmPassErr.textContent = 'Passwords do not match. Try again.';
        confirmPassErr.style.color = 'red';
        confirmPassErr.style.fontSize = '14px';
      }
      hasError = true;
    }

    // If any validation failed, prevent submission
    if (hasError) {
      e.preventDefault();
      // focus the first error (optional)
      if (nameErr && nameErr.textContent) {
        document.getElementById('fullName').focus();
      } else if (emailErr && emailErr.textContent) {
        document.getElementById('email').focus();
      } else if (passErr && passErr.textContent) {
        document.getElementById('password').focus();
      } else if (confirmPassErr && confirmPassErr.textContent) {
        document.getElementById('confirmPassword').focus();
      }
    }
    // else allow the form to submit naturally
  });
});