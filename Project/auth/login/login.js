// ================= LOGIN FORM SUBMIT =================
document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();

    // Collect form data
    const loginData = {
        email: document.getElementById("email").value,
        password: document.getElementById("password").value
    };

    // Call AJAX login
    loginUser(loginData);
});
