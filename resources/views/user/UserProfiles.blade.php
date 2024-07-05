<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/UserProfiles.css') }}">
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
            <li class="active"><a href="{{ route('HalamanUser', ['id' => Auth::user()->id]) }}"><i class='bx bx-group'></i>Your Profile</a></li>
            <li><a href="{{ route('HalamanSetting') }}"><i class='bx bx-cog'></i>Settings</a></li>
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
                  <h1>Your Profile</h1>
                  <ul class="breadcrumb">
                      <li><a href="#"></a></li>
                  </ul>
              </div>
          </div>

          <div class="welcome">
            <div class="user-info">
                <h2>YOUR PROFILE</h2>
                <hr>
                <div class="profile-details">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Level:</strong> {{ $user->level ?? 'Beginner' }}</p> <!-- Assuming there's a level attribute, otherwise default to 'Beginner' -->
                    <p><strong>Total Time:</strong> {{ $user->total_time ?? 'XX hours XX mins' }}</p> <!-- Assuming total_time is stored in a readable format -->
                    <p><strong>Avg WPM:</strong> {{ $user->avg_wpm ?? 'XX' }}</p> <!-- Assuming there's an avg_wpm attribute -->
                    <p><strong>Avg Accuracy:</strong> {{ $user->avg_accuracy ?? 'XX%' }}</p> <!-- Assuming there's an avg_accuracy attribute -->
                </div>
            </div>
        </div>
    </main>

    <script>
      const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');

sideLinks.forEach(item => {
    const li = item.parentElement;
    item.addEventListener('click', () => {
        sideLinks.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
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
        e.preventDefault;
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
    </script>
    <script>
        const editProfileBtn = document.querySelector('.edit-profile-btn');
        const profileDetails = document.querySelector('.profile-details');

        editProfileBtn.addEventListener('click', () => {
            // Replace with logic for opening edit profile modal or form
            console.log('Edit profile clicked');
            // Example: Show a form or modal for editing profile
        });

    </script>
</body>
</html>
