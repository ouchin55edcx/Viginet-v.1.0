
//drop douwn

const roleSelect = document.getElementById('role');
const clientFields = document.getElementById('client-fields');
const expertFields = document.getElementById('expert-fields');

roleSelect.addEventListener('change', () => {
    if (roleSelect.value === 'Client') {
        clientFields.classList.remove('hidden');
        expertFields.classList.add('hidden');
    } else if (roleSelect.value === 'Expert') {
        clientFields.classList.add('hidden');
        expertFields.classList.remove('hidden');
    } else {
        clientFields.classList.add('hidden');
        expertFields.classList.add('hidden');
    }
});


document.addEventListener('DOMContentLoaded', function() {
const form = document.getElementById('registrationForm');

form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    const usernameInput = document.getElementById('username');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const roleSelect = document.getElementById('role');
    const addressInput = document.getElementById('address');
    const certificateInput = document.getElementById('certificate');
    const experienceInput = document.getElementById('experience');

    const username = usernameInput.value.trim();
    const email = emailInput.value.trim();
    const password = passwordInput.value;
    const confirmPassword = confirmPasswordInput.value;
    const role = roleSelect.value;
    const address = addressInput.value.trim();
    const certificate = certificateInput.value.trim();
    const experience = experienceInput.value.trim();

    if (!isValidUsername(username)) {
        alert('Username must be 3-16 characters long and can only contain letters, numbers, underscores, and hyphens');
        return;
    }

    if (!isValidEmail(email)) {
        alert('Please enter a valid email address');
        return;
    }

    if (password.length < 8) {
        alert('Password must be at least 8 characters long');
        return;
    }

    if (password !== confirmPassword) {
        alert('Passwords do not match');
        return;
    }

    if (role === 'Client') {
        const phoneNumberInput = document.getElementById('phone_number');
        const addressInput = document.getElementById('address');
        const phoneNumber = phoneNumberInput.value.trim();
        const address = addressInput.value.trim();


        if (!address) {
            alert('Please enter your address');
            return;
        }
    }else if (role === 'Expert') {
        if (certificate === '') {
            alert('Please enter a certificate');
            return;
        }

        if (experience === '') {
            alert('Please enter experience details');
            return;
        }
    }

    form.submit();
});

function isValidUsername(username) {
    const regex = /^[a-zA-Z0-9_-]{3,16}$/;
    return regex.test(username);
}

function isValidEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

});





