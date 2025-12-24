// ================= TEMP AJAX SUBMIT =================
// Replace "register.json" with "register_consultancy.php" later

document.getElementById("consultancyForm").addEventListener("submit", function (e) {
    e.preventDefault();

    fetch("register.json")
        .then(res => res.json())
        .then(data => {
            document.getElementById("successMsg").innerText =
                "Application submitted successfully! Admin will review it.";
        })
        .catch(() => {
            alert("Something went wrong");
        });
});
