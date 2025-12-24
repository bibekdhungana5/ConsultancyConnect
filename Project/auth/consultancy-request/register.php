<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Consultancy | Consultancy Connect</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>

<!-- ================= HEADER (SAME AS HOME) ================= -->
<header class="header">
    <div class="container header-flex">
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
            <span>Consultancy Connect</span>
        </div>

        <nav>
             <a href="/project/index.php">Home</a>
            <a href="/project/pages/explore/explore.php">Consultancies</a>
            <a href="/project/pages/about/about.php">About</a>
        </nav>

        <div class="auth">
            <!-- <button class="btn-outline"><a href="/project/auth/login/login.php">Login</a></button>
            <button class="btn-primary"><a href="/project/auth/register-user/register.php">Register</a></button> -->
        </div>
    </div>
</header>


<section class="form-section">
    <div class="form-card">

        <h2>Register Your Consultancy</h2>
        <p class="form-subtitle">
            Your application will be reviewed by admin .
        </p>
        <p class="form-subtitle">
            Already registered Your Consultancy? <a href="/project/auth/consultancy-login/login.php">Login here</a>
        </p>
        


        <form action="consultancy_register.php" method="post" id="consultancyForm">
                            <?php


                if (isset($_GET['error'])) {
                    echo "<p style='color:red'>Email Exists Registration failed. Try again.</p>";
                }

                if (isset($_GET['msg']) && $_GET['msg'] == 'applied') {
                    echo "<p style='color:green'>
                    Application submitted. Wait for admin approval.
                    </p>";
                }
                ?>


            <label>Consultancy Name</label>
            <input type="text" name="consultancy_name" placeholder="e.g. Everest Engineering Solutions" required>

          
            <label>Engineer / Owner Name</label>
            <input type="text" name="owner_name" placeholder="e.g. Ramesh Thapa" required>
           
            <label>Email Address</label>
            <input type="email" name="email" placeholder="e.g. info@company.com" required>


            <label>Password</label>
            <input type="password" name="password" placeholder="Create password" required>

         
            <label>Phone Number</label>
            <input type="text" name="phone" placeholder="e.g. +977-98XXXXXXXX" required>

            
            <label>Municipality</label>
            <select name="municipality" required>
                <option value="">Select municipality</option>
                <!-- Kathmandu District -->
                <option>Kathmandu Metropolitan City</option>
                <option>Budhanilkantha Municipality</option>
                <option>Chandragiri Municipality</option>
                <option>Tokha Municipality</option>
                <option>Kageshwari-Manohara Municipality</option>
                <option>Nagarjun Municipality</option>
                <option>Kirtipur Municipality</option>
                <option>Dakshinkali Municipality</option>
                <option>Shankharapur Municipality</option>

                <!-- Lalitpur District -->
                <option>Lalitpur Metropolitan City</option>
                <option>Godawari Municipality</option>
                <option>Mahalaxmi Municipality</option>
                <option>Konjyoson Rural Municipality</option>
                <option>Bagmati Rural Municipality</option>
                <option>Mahankal Rural Municipality</option>

                <!-- Bhaktapur District -->
                <option>Bhaktapur Municipality</option>
                <option>Madhyapur Thimi Municipality</option>
                <option>Suryabinayak Municipality</option>
                <option>Changunarayan Municipality</option>

            </select>

            <!-- Services -->
        
           <label>Services Offered</label>
                <label><input type="checkbox" name="services[]" value="Building Plan (Naksa)"> Building Plan (Naksa)</label>
                <label><input type="checkbox" name="services[]" value="Structural Design"> Structural Design</label>
                <label><input type="checkbox" name="services[]" value="Municipality Approval"> Municipality Approval</label>
                <label><input type="checkbox" name="services[]" value="Site Supervision"> Site Supervision</label>

            <!-- Document -->
            <label>Registration Document (PDF, max 5MB)</label>
            <input type="file" accept=".pdf">

            <!-- Submit -->
            <button type="submit" class="btn-primary full-btn">
                Submit Application
            </button>

        </form>
        <!-- FORM END -->

        <!-- SUCCESS MESSAGE -->
        <p id="successMsg" class="success-msg"></p>

    </div>
</section>

<!-- ================= FOOTER (SAME AS HOME) ================= -->
<footer class="footer">
    <div class="footer-grid">
        <div>
            <h4>Consultancy Connect</h4>
            <p>Connecting you with approved engineering consultancies in Kathmandu Valley.</p>
        </div>

        <div>
            <h4>Company</h4>
            <a href="#">About Us</a>
            <a href="#">Contact</a>
        </div>

        <div>
            <h4>Services</h4>
            <a href="#">Building Plan</a>
            <a href="#">Structural Design</a>
            <a href="#">Municipality Approval</a>
        </div>

        <div>
            <h4>Legal</h4>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
        </div>
    </div>

    <p class="copyright">
        © 2025 Consultancy Connect. All rights reserved.
    </p>
</footer>

</body>
</html>
