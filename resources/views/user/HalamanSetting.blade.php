<!DOCTYPE html>
<html lang="en">

<head>
  <style>
  </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('/css/Dashboard.css')}}">
    <title>Responsive Dashboard Design #2 | WikraType</title>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <img src="{{ asset('image/wikrama.png') }}" width="20%" style="margin-left: 7%" alt="">
            <div class="logo-name"><span>Wikra</span>Type</div>
        </a>
        <ul class="side-menu">
            <li><a href="{{ route('HalamanDashboard')}}"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="{{ route('HalamanGames') }}"><i class="fa-solid fa-gamepad"></i>Game</a></li>
            <li><a href="{{ route('HalamanTypingLessons') }}"><i class='bx bx-analyse'></i>Start Lesson</a></li>
            <li><a href="{{route('HalamanAchievements')}}"><i class="fa-solid fa-trophy"></i></i>Achievement</a></li>
            <li><a href="{{ route('HalamanUser', ['id' => Auth::user()->id]) }}"><i class='bx bx-group'></i>Your Profile</a></li>
            <li class="active"><a href="{{ route('HalamanSetting') }}"><i class='bx bx-cog'></i>Settings</a></li>
            <li><a href="{{ route('HalamanDev') }}"><i class="fa-solid fa-users"></i>Our Dev</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <li><a href="{{ route('LogoutUser') }}" onclick="return confirm('Apakah Anda yakin ingin logout?')"><i class='bx bx-log-out-circle'></i>Logout</a></li>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <a href="#" class="profile">
                <img src="{{ asset('images/wikrama.png') }}">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>
          <div class="header">
              <div class="left">
                  <h1>Setting</h1>
                  <ul class="breadcrumb">
                      <li><a href="#">{{ Auth::user()->name }}</a></li>
                  </ul>
              </div>
          </div>
          <div class="settings">
            <h2>Settings</h2>
            <form id="settings-form">
                <div class="form-group">
                    <label for="theme-toggle">Dark Mode</label>
                    <input type="checkbox" id="theme-toggle">
                </div>
                <div class="form-group">
                    <label for="language-select">Language</label>
                    <select id="language-select">
                        <option value="en">English</option>
                        <option value="id">Indonesian</option>
                        <!-- Add more languages as needed -->
                    </select>
                </div>
                <button type="submit">Save Settings</button>
            </form>
        </div>
    </main>


    </div>

    <script>
 document.addEventListener('DOMContentLoaded', (event) => {
        // Sidebar Menu Toggle
        const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');
        sideLinks.forEach(item => {
            const li = item.parentElement;
            item.addEventListener('click', () => {
                sideLinks.forEach(i => {
                    i.parentElement.classList.remove('active');
                });
                li.classList.add('active');
            });
        });

        const menuBar = document.querySelector('.content nav .bx.bx-menu');
        const sideBar = document.querySelector('.sidebar');

        menuBar.addEventListener('click', () => {
            sideBar.classList.toggle('close');
        });

        const searchBtn = document.querySelector('.content nav form .form-input button');
        const searchBtnIcon = document.querySelector('.content nav form .form-input button .bx');
        const searchForm = document.querySelector('.content nav form');

        searchBtn.addEventListener('click', function (e) {
            if (window.innerWidth < 576) {
                e.preventDefault();
                searchForm.classList.toggle('show');
                if (searchForm.classList.contains('show')) {
                    searchBtnIcon.classList.replace('bx-search', 'bx-x');
                } else {
                    searchBtnIcon.classList.replace('bx-x', 'bx-search');
                }
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth < 768) {
                sideBar.classList.add('close');
            } else {
                sideBar.classList.remove('close');
            }
            if (window.innerWidth > 576) {
                searchBtnIcon.classList.replace('bx-x', 'bx-search');
                searchForm.classList.remove('show');
            }
        });

        const toggler = document.getElementById('theme-toggle');

        toggler.addEventListener('change', function () {
            if (this.checked) {
                document.body.classList.add('dark');
            } else {
                document.body.classList.remove('dark');
            }
        });

        // Save Settings Form
        const settingsForm = document.getElementById('settings-form');
        settingsForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const isDarkMode = toggler.checked;
            const selectedLanguage = document.getElementById('language-select').value;
            localStorage.setItem('darkMode', isDarkMode);
            localStorage.setItem('language', selectedLanguage);
            alert('Settings saved!');
        });

        // Load Settings
        if (localStorage.getItem('darkMode') === 'true') {
            toggler.checked = true;
            document.body.classList.add('dark');
        } else {
            toggler.checked = false;
            document.body.classList.remove('dark');
        }

        const savedLanguage = localStorage.getItem('language');
        if (savedLanguage) {
            document.getElementById('language-select').value = savedLanguage;
        }
    });
    </script>
</body>


</html>
