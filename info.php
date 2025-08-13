<?php
include_once('infop.php');

// Get place name from POST or GET
$place_name = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach (['Amboli', 'Ratnagiri', 'Sawantwadi', 'Malvan', 'Redi', 'Kunkeshwar', 'Dodamarg', 'Vengurla'] as $place) {
        if (isset($_POST[$place])) {
            $place_name = $place;
            break;
        }
    }
} elseif (isset($_GET['place'])) {
    $place_name = $_GET['place'];
}

if (!empty($place_name)) {
    $que = "SELECT * FROM `information` WHERE pname='".mysqli_real_escape_string($db, $place_name)."'";
    $result = mysqli_query($db, $que);
    $place_data = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($place_name); ?> - Travel Destination</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --text-color: #333;
            --text-light: #7f8c8d;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: #f9f9f9;
        }

        /* Navigation */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 1rem 2rem;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: var(--shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
            transition: transform 0.5s ease;
        }

        .logo:hover img {
            transform: rotate(360deg);
        }

        .logo h1 {
            color: white;
            font-size: 1.5rem;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 1.5rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: var(--transition);
        }

        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .nav-links a.active {
            background-color: white;
            color: var(--primary-color);
        }

        .search-box {
            display: flex;
            align-items: center;
        }

        .search-box input[type="text"] {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px 0 0 4px;
            outline: none;
        }

        .search-box button {
            background-color: white;
            border: none;
            padding: 0.5rem;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            transition: var(--transition);
        }

        .search-box button:hover {
            background-color: var(--light-color);
        }

        /* Hero Section */
        .hero {
            height: 60vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('<?php echo htmlspecialchars($place_data['pi_main'] ?? ''); ?>');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            margin-top: 70px;
        }

        .hero-content {
            max-width: 800px;
            padding: 2rem;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .btn {
            display: inline-block;
            background-color: var(--accent-color);
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Place Info Section */
        .place-info {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--dark-color);
            display: inline-block;
            padding-bottom: 1rem;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--primary-color);
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .description {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: var(--shadow);
        }

        .description h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .description p {
            margin-bottom: 1.5rem;
            color: var(--text-color);
        }

        .highlights {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: var(--shadow);
        }

        .highlights h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .highlight-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .highlight-item i {
            color: var(--accent-color);
            margin-right: 1rem;
            font-size: 1.2rem;
        }

        .price-box {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem;
            border-radius: 8px;
            text-align: center;
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
        }

        .price-box h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .price {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }

        .price span {
            font-size: 1rem;
            font-weight: normal;
        }

        /* Gallery Section */
        .gallery {
            padding: 0 2rem 4rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .gallery-item {
            height: 250px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow);
            position: relative;
            transition: var(--transition);
        }

        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        /* Booking CTA */
        .booking-cta {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 4rem 2rem;
            text-align: center;
            color: white;
        }

        .booking-cta h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }

        .booking-cta p {
            max-width: 700px;
            margin: 0 auto 2rem;
            font-size: 1.2rem;
        }

        /* Footer */
        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 3rem 2rem;
            text-align: center;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            text-align: left;
        }

        .footer-column h3 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary-color);
        }

        .footer-column p {
            margin-bottom: 1rem;
            color: var(--light-color);
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-links a {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .social-links a:hover {
            background-color: var(--primary-color);
            transform: translateY(-5px);
        }

        .copyright {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 1rem;
            }
            
            .nav-links {
                margin-top: 1rem;
            }
            
            .nav-links li {
                margin-left: 1rem;
            }
            
            .hero {
                height: 50vh;
                margin-top: 120px;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .nav-links li {
                margin: 0.5rem;
            }
            
            .search-box {
                margin-top: 1rem;
                width: 100%;
            }
            
            .hero {
                height: 40vh;
            }
            
            .hero h1 {
                font-size: 1.8rem;
            }
            
            .gallery-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="logo">
            <a href="mainPage.html"><img src="earth-globe.png" alt="Travel Logo"></a>
            <h1>TravelEase</h1>
        </div>
        <ul class="nav-links">
            <li><a href="mainPage.html">Home</a></li>
            <li><a href="destination.html" class="active">Destinations</a></li>
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="feedback.html">Feedback</a></li>
            <li><a href="index.html">Logout</a></li>
        </ul>
        <div class="search-box">
            <form method="POST" action="info.php">
                <input type="text" name="search_p" placeholder="Search destinations...">
                <button type="submit" name="submit_p"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1><?php echo htmlspecialchars($place_data['pname'] ?? 'Explore Destination'); ?></h1>
            <p>Discover the beauty and culture of this amazing place</p>
            <a href="#booking" class="btn">Book Now</a>
        </div>
    </section>

    <!-- Place Information Section -->
    <section class="place-info">
        <div class="section-title">
            <h2>About <?php echo htmlspecialchars($place_data['pname'] ?? 'the Destination'); ?></h2>
        </div>
        
        <div class="info-grid">
            <div class="description">
                <h3>Description</h3>
                <p><?php echo htmlspecialchars($place_data['pdescription'] ?? 'No description available.'); ?></p>
                <p>Experience the unique blend of nature, culture, and adventure that makes this destination truly special.</p>
            </div>
            
            <div class="highlights">
                <h3>Highlights</h3>
                <div class="highlight-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Beautiful scenic views and landscapes</span>
                </div>
                <div class="highlight-item">
                    <i class="fas fa-utensils"></i>
                    <span>Local cuisine and dining experiences</span>
                </div>
                <div class="highlight-item">
                    <i class="fas fa-hiking"></i>
                    <span>Adventure activities and trekking</span>
                </div>
                <div class="highlight-item">
                    <i class="fas fa-camera"></i>
                    <span>Photography opportunities</span>
                </div>
                <div class="highlight-item">
                    <i class="fas fa-history"></i>
                    <span>Rich cultural heritage</span>
                </div>
            </div>
        </div>
        
        <div class="price-box">
            <h3>Tour Package</h3>
            <div class="price">₹<?php echo isset($place_data['package']) ? number_format($place_data['package']) : '0'; ?> <span>per person</span></div>
            <a href="#booking" class="btn">Book This Tour</a>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery">
        <div class="section-title">
            <h2>Gallery</h2>
        </div>
        
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="<?php echo htmlspecialchars($place_data['pi1'] ?? 'images/default1.jpg'); ?>" alt="<?php echo htmlspecialchars($place_data['pname'] ?? ''); ?> Photo 1">
            </div>
            <div class="gallery-item">
                <img src="<?php echo htmlspecialchars($place_data['pi2'] ?? 'images/default2.jpg'); ?>" alt="<?php echo htmlspecialchars($place_data['pname'] ?? ''); ?> Photo 2">
            </div>
            <div class="gallery-item">
                <img src="<?php echo htmlspecialchars($place_data['pi3'] ?? 'images/default3.jpg'); ?>" alt="<?php echo htmlspecialchars($place_data['pname'] ?? ''); ?> Photo 3">
            </div>
        </div>
    </section>

    <!-- Booking CTA -->
    <section class="booking-cta" id="booking">
        <h2>Ready for Your Adventure?</h2>
        <p>Book your trip now and experience the unforgettable beauty of <?php echo htmlspecialchars($place_data['pname'] ?? 'this destination'); ?>. Our team will ensure you have the best travel experience.</p>
        <a href="booking.html" class="btn">Book Your Tour</a>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>About Us</h3>
                <p>TravelEase is dedicated to providing unforgettable travel experiences with the best destinations and services.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-column">
                <h3>Quick Links</h3>
                <p><a href="mainPage.html" style="color: var(--light-color); text-decoration: none;">Home</a></p>
                <p><a href="destination.html" style="color: var(--light-color); text-decoration: none;">Destinations</a></p>
                <p><a href="gallery.html" style="color: var(--light-color); text-decoration: none;">Gallery</a></p>
                <p><a href="feedback.html" style="color: var(--light-color); text-decoration: none;">Feedback</a></p>
            </div>
            <div class="footer-column">
                <h3>Contact Us</h3>
                <p><i class="fas fa-map-marker-alt"></i> Sangeli, Sawantwadi City</p>
                <p><i class="fas fa-phone"></i> 8080722197</p>
                <p><i class="fas fa-envelope"></i> sarveshsawant450@gmail.com</p>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; <?php echo date('Y'); ?> TravelEase. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>