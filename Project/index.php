<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultancy Connect</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- ================= HEADER ================= -->
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
            <button class="btn-outline"><a href="/project/auth/login/login.php">Login</a></button>
            <button class="btn-primary"><a href="/project/auth//register-user/register.php">Register</a></button>
        </div>
    </div>
</header>

<!-- ================= HERO ================= -->
<section class="hero">
    <h1>Find Approved Engineering Consultancies Near You</h1>
    <p>Search verified consultancies for building plan (Naksa), design, and municipality approval</p>

    <div class="hero-search">
        <select id="municipality">
            <option value="">Select Municipality</option>
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
        </select>

        <select id="service">
            <option value="">Select Service</option>
            <option value="Naksa">Building Plan (Naksa)</option>
            <option value="Structural">Structural Design</option>
            <option value="Approval">Municipality Approval</option>
            <option value="Supervision">Site Supervision</option>
        </select>

        <button onclick="searchConsultancy()" class="btn-primary">
            Search Consultancies
        </button>
    </div>
</section>

<!-- ================= CONSULTANCIES ================= -->
<section class="section">
    <h2>Top Approved Consultancies</h2>

    <!-- JS WILL RENDER CARDS HERE -->
    <div id="consultancy-list" class="consultancy-grid"></div>
</section>

<!-- ================= MUNICIPALITIES ================= -->
<section class="section light">
    <h2>Browse by Municipality</h2>

    <div class="municipality-grid">
        <div class="municipality-card">
            <img src="images/image1.png">
            <h4>Kathmandu Metropolitan</h4>
        </div>
        <div class="municipality-card">
            <img src="images/image1.png">
            <h4>Lalitpur Metropolitan</h4>
        </div>
        <div class="municipality-card">
            <img src="images/image1.png">
            <h4>Bhaktapur Municipality</h4>
        </div>
        <div class="municipality-card">
            <img src="images/image1.png">
            <h4>Kirtipur Municipality</h4>
        </div>
    </div>

    <button class="btn-primary center-btn">Show All Municipalities</button>
</section>

<!-- ================= SERVICES ================= -->
<section class="section">
    <h2>Services</h2>

    <div class="services-grid">
        <div class="service-card">
            <h4>Building Plan (Naksa)</h4>
            <p>Expert planning and design</p>
        </div>
        <div class="service-card">
            <h4>Structural Design</h4>
            <p>Safe and stable structures</p>
        </div>
        <div class="service-card">
            <h4>Municipality Approval</h4>
            <p>Fast approval process</p>
        </div>
        <div class="service-card">
            <h4>Site Supervision</h4>
            <p>Construction quality check</p>
        </div>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="cta">
    <h2>Ready to Connect?</h2>
    <p>Find experts or list your consultancy</p>
    <button class="btn-primary"><a href="/project/pages/explore/explore.php">Find Consultancy</a></button>
    <button class="btn-outline"><a href="/project/auth/consultancy-request/register.php">Apply as Engineering Consultancy</a></button>
</section>

<!-- ================= FOOTER ================= -->
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

<script src="script.js"></script>
</body>
</html>
