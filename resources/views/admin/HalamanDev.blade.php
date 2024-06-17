<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typing Master App Developers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
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
            background-color: black;
            color: white;
        }

        .header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        .developer-profiles {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 40px;
        }

        .profile {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 250px;
            margin: 20px;
            padding: 20px;
            text-align: center;
            opacity: 0; /* Mulai dengan elemen tersembunyi */
            transform: translateX(-100%); /* Mulai di luar layar sebelah kiri */
            transition: transform 1s ease, opacity 1s ease; /* Definisikan transisi */
        }

        .profile img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .profile h2 {
            margin-top: 10px;
            font-size: 1.5em;
        }

        .profile p {
            color: #666;
        }

        .profile.show {
            opacity: 1; /* Elemen terlihat */
            transform: translateX(0); /* Elemen bergerak ke posisi awal */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Typing Master App Developers</h1>
        </div>
        <div class="developer-profiles">
            <!-- Developer Profile 1 -->
            <div class="profile">
                <img src="developer1.jpg" alt="Developer 1 Photo">
                <h2>Akmal Rahmattullah Nugraha</h2>
                <p> BackEnd </p>
            </div>

            <!-- Developer Profile 2 -->
            <div class="profile">
                <img src="developer2.jpg" alt="Developer 2 Photo">
                <h2>Muhammad Ruhiyat</h2>
                <p> BackEnd </p>
            </div>

            <!-- Developer Profile 3 -->
            <div class="profile">
                <img src="developer3.jpg" alt="Developer 3 Photo">
                <h2>Muhammad Akmal Rahmatullah</h2>
                <p> BackEnd </p>
            </div>

            <!-- Developer Profile 4 -->
            <div class="profile">
                <img src="developer4.jpg" alt="Developer 4 Photo">
                <h2>Dhiksa Raja Nararya Hakim</h2>
                <p> UI/UX FrontEnd</p>
            </div>

            <!-- Developer Profile 5 -->
            <div class="profile">
                <img src="developer5.jpg" alt="Developer 5 Photo">
                <h2>Muhammad Hafizh Diyaul-Haq</h2>
                <p> UI/UX FrontEnd </p>
            </div>

            <!-- Developer Profile 6 -->
            <div class="profile">
                <img src="developer6.jpg" alt="Developer 6 Photo">
                <h2>Ahmad Zaky</h2>
                <p> UI/UX FrontEnd</p>
            </div>
        </div>
    </div>

    <script>
        // Jalankan setelah halaman selesai dimuat
        window.addEventListener('load', function() {
            // Ambil semua elemen dengan kelas 'profile'
            var profiles = document.querySelectorAll('.profile');

            // Tambahkan kelas 'show' dengan jeda untuk setiap elemen
            profiles.forEach(function(profile, index) {
                setTimeout(function() {
                    profile.classList.add('show');
                }, index * 300); // Tambahkan penundaan untuk setiap elemen (300ms)
            });
        });
    </script>
</body>
</html>
