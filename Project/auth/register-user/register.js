

// document.getElementById("registerForm").addEventListener("submit", function(e){
//     e.preventDefault(); 

//     const userData = {
//         name: document.getElementById("name").value,
//         email: document.getElementById("email").value,
//         phone: document.getElementById("phone").value,
//         password: document.getElementById("password").value
//     };
 
// //     // AJAX using fetch
// //     fetch("user_register.php", {
// //         method: "POST",
// //         headers: { "Content-Type": "application/json" },
// //         body: JSON.stringify(userData)
// //     })
// //     .then(res => res.json())
// //     .then(data => {
// //         // show message
// //         document.getElementById("message").innerText = data.message;

// //         // redirect to login if success
// //         if(data.status === "success"){
// //             setTimeout(() => {
// //                 window.location.href = "login.php";
// //             }, 1500); // wait 1.5 sec
// //         }
// //     })
// //     .catch(err => console.error(err));
// });
