const form = document.querySelector('form');

form.addEventListener('submit', function(event) {
    event.preventDefault();
    let isValid = true;

    // Validation for name
    const name = document.getElementById('name').value.trim();
    if (name === '') {
        isValid = false;
        alert('Please enter your name');
        return;
    }

    // Validation for age
    const age = document.getElementById('age').value.trim();
    if (age === '') {
        isValid = false;
        alert('Please enter your age');
        return;
    }

    // Validation for email
    const email = document.getElementById('email').value.trim();
    if (email === '' || !validateEmail(email)) {
        isValid = false;
        alert('Please enter a valid email address');
        return;
    }

    // Validation for phone
    const phone = document.getElementById('phone').value.trim();
    if (phone === '' || !validatePhone(phone)) {
        isValid = false;
        alert('Please enter a valid phone number');
        return;
    }

    // If all validations pass, submit the form
    if (isValid) {
        form.submit();
    }
});

// Function to validate email format
function validateEmail(email) {
    const re = /\S+@\S+\.\S+/;
    return re.test(email);
}

// Function to validate phone number format
function validatePhone(phone) {
    const re = /^\d{10}$/;
    return re.test(phone);
}
