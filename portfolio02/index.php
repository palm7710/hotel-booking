<?php include 'header.php'; ?>
<div class="container mt-5">
    <h1 class="text-center">Welcome to Our Hotel</h1>
    <img src="images/hotel_exterior.webp" class="img-fluid mb-4" alt="Hotel Exterior">
    <p>Welcome to our hotel, where comfort meets elegance. We are located in the heart of the city, offering easy access to major attractions and business districts.</p>
    
    <h2 class="mt-5">Access</h2>
    <p>Our hotel is conveniently located in the heart of the city, making it easy to reach by various modes of transportation.</p>
    <h3>By Car</h3>
    <p>We offer ample parking space for our guests. Use the following address for GPS directions:</p>
    <p><strong>123 Main Street, City, Country</strong></p>
    <h3>By Public Transport</h3>
    <p>Our hotel is easily accessible by bus, train, and subway. The nearest subway station is just a 5-minute walk away.</p>
    <h3>By Air</h3>
    <p>The nearest airport is City Airport, located 20 km from our hotel. Airport shuttle services are available upon request.</p>
    <h3>Map</h3>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509616!2d144.95373531549745!3d-37.816279742012095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577a7a43fdf7f91!2s123%20Main%20St%2C%20Melbourne%20VIC%203001%2C%20Australia!5e0!3m2!1sen!2sus!4v1604377196130!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    
    <h2 class="mt-5">Contact Us</h2>
    <p>If you have any questions or need further information, please feel free to contact us using the form below or through our contact details provided.</p>
    <h3>Contact Details</h3>
    <p><strong>Address:</strong> 123 Main Street, City, Country</p>
    <p><strong>Phone:</strong> +123 456 7890</p>
    <p><strong>Email:</strong> info@hotel.com</p>
    <h3>Contact Form</h3>
    <form action="contact_submit.php" method="POST" class="mt-3">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Send Message</button>
    </form>
    
    <h2 class="mt-5">About Our Hotel</h2>
    <p>Welcome to our hotel, where comfort meets elegance. We are located in the heart of the city, offering easy access to major attractions and business districts.</p>
    <h3>Our Facilities</h3>
    <p>Our hotel offers a wide range of facilities to make your stay enjoyable and convenient:</p>
    <ul>
        <li>Restaurant and Bar</li>
        <li>Spa and Wellness Center</li>
        <li>Fitness Center</li>
        <li>Business Facilities</li>
        <li>Family-Friendly Services</li>
        <li>Special Event Venues</li>
        <li>Shopping Area</li>
    </ul>
    <h3>Current Campaigns</h3>
    <p>Take advantage of our special offers and packages designed to enhance your stay:</p>
    <ul>
        <li>Weekend Getaway Package</li>
        <li>Family Fun Package</li>
        <li>Romantic Escape Package</li>
        <li>Business Traveler Package</li>
    </ul>
</div>
<?php include 'footer.php'; ?>
