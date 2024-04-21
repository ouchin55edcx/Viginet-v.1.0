
    document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('resetPasswordForm');
    const loginInput = document.getElementById('login');

    form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    const loginValue = loginInput.value.trim();

    const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (!regex.test(loginValue)) {
    alert('Please enter a valid email address or username.');
    return;
}

    // If validation passes, you can proceed with form submission or other actions
    form.submit();
});
});
