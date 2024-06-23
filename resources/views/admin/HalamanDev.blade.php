<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typing Master App Developers</title>
    <!-- Link to Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .header {
            padding: 20px 0;
            background: linear-gradient(90deg, #4b6cb7, #182848);
            color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative; /* Add relative positioning */
        }

        .header h1 {
            margin: 0;
            font-size: 2.5em;
            letter-spacing: 1px;
        }

        .logout {
            position: absolute; /* Position the icon absolutely */
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            text-decoration: none;
            font-size: 1.5em;
        }

        .developer-profiles {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 40px;
        }

        .profile {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 20px;
            padding: 20px;
            text-align: center;
            opacity: 0; /* Start hidden */
            transform: translateY(30px); /* Start slightly below */
            transition: transform 0.6s ease, opacity 0.6s ease; /* Define the transition */
        }

        .profile img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 4px solid #4b6cb7;
        }

        .profile h2 {
            margin-top: 15px;
            font-size: 1.8em;
            color: #4b6cb7;
        }

        .profile p {
            color: #666;
            font-size: 1.1em;
            margin-top: 10px;
        }

        .profile.show {
            opacity: 1; /* Make the element visible */
            transform: translateY(0); /* Move element to its original position */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Typing Master App Developers</h1>
            <a href="javascript:history.back()" class="logout" title="Logout"><i class="fas fa-sign-out-alt"></i></a>
        </div>
        <div class="developer-profiles">
            <!-- Developer Profile 1 -->
            <div class="profile">
                <img src="developer1.jpg" alt="Developer 1 Photo">
                <h2>Akmal Rahmattullah Nugraha</h2>
                <p>BackEnd</p>
            </div>

            <!-- Developer Profile 2 -->
            <div class="profile">
                <img src="developer2.jpg" alt="Developer 2 Photo">
                <h2>Muhammad Ruhiyat</h2>
                <p>BackEnd</p>
            </div>

            <!-- Developer Profile 3 -->
            <div class="profile">
                <img src="developer3.jpg" alt="Developer 3 Photo">
                <h2>Muhammad Akmal Rahmatullah</h2>
                <p>BackEnd</p>
            </div>

            <!-- Developer Profile 4 -->
            <div class="profile">
                <img src="developer4.jpg" alt="Developer 4 Photo">
                <h2>Dhiksa Raja Nararya Hakim</h2>
                <p>UI/UX FrontEnd</p>
            </div>

            <!-- Developer Profile 5 -->
            <div class="profile">
                <img src="developer5.jpg" alt="Developer 5 Photo">
                <h2>Almarhum Muhammad Hafizd Dhiya Ulhaq</h2>
                <p>UI/UX FrontEnd</p>
            </div>

            <!-- Developer Profile 6 -->
            <div class="profile">
                <img src="developer6.jpg" alt="Developer 6 Photo">
                <h2>Ahmad Zaky</h2>
                <p>UI/UX FrontEnd</p>
            </div>
        </div>
    </div>

    <script>
        // Run after the page has loaded
        window.addEventListener('load', function() {
            // Get all elements with the class 'profile'
            var profiles = document.querySelectorAll('.profile');

            // Add the 'show' class with a delay for each element
            profiles.forEach(function(profile, index) {
                setTimeout(function() {
                    profile.classList.add('show');
                }, index * 300); // Add a delay for each element (300ms)
            });
        });
    </script>
</body>
</html>
