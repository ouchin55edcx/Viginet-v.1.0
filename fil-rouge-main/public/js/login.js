document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        const usernameInput = document.getElementById('login');
        const passwordInput = document.getElementById('password');

        const username = usernameInput.value.trim();
        const password = passwordInput.value;

        if (!isValidUsername(username)) {
            alert('Username must be at least 5 characters long and can only contain lowercase letters (a-z) and digits (0-9)');
            return;
        }

        // Additional validation for password if needed

        // If all validation passes, submit the form
        form.submit();
    });

    function isValidUsername(username) {
        // Regex pattern to match username with minimum 5 characters, consisting of lowercase letters (a-z) and digits (0-9)
        const regex =  /^[a-zA-Z0-9_-]{3,16}$/;
        return regex.test(username);
    }
});

