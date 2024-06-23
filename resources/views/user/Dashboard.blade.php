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
   <link rel="stylesheet" href="{{asset('/css/style.css')}}">
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
            <li class="active"><a href="{{ route('HalamanDashboard')}}"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="{{ route('HalamanGames') }}"><i class="fa-solid fa-gamepad"></i>Game</a></li>
            @foreach($typing_lessons as $lesson)
            @if($lesson->id == 1)
            <li><a href="{{ route('HalamanTypingLessons', $lesson->id) }}"><i class='bx bx-analyse'></i>Start Lesson {{ $lesson->id }}</a></li>
            @endif
            @endforeach
            <li><a href="{{route('HalamanAchievements')}}"><i class="fa-solid fa-trophy"></i></i>Achievement</a></li>
            <li><a href="{{ route('HalamanUser', ['id' => Auth::user()->id]) }}"><i class="fa-solid fa-user"></i> Users</a></li>
            <li><a href="{{ route('HalamanSetting') }}"><i class='bx bx-cog'></i>Settings</a></li>
            <li><a href="{{ route('HalamanDev') }}"><i class="fa-solid fa-users"></i>Our Dev</a></li>
        </ul>
        <ul class="side-menu">
            <li>
              <a href="{{ route('LogoutUser') }}" onclick="confirm('Apakah Anda yakin ingin logout?')">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
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
                  <h1>Selamat Datang Di Typing Master</h1>
                  <ul class="breadcrumb">
                      <li><a href="#">Dashboard</a></li>
                  </ul>
              </div>
          </div>
          @if (Auth::user())
          <div class="welcome">
              <div class="user-info">
                <span class="username">Selamat Datang {{ Auth::user()->name }},</span>
                  <p>Di Halaman Typing Master.</p>
              </div>

              <div class="cards">
                  <div class="card">
                      <div class="icon"><i class='bx bxs-dashboard'></i></div>
                      <div class="info">
                          <h3>Total Score</h3>
                          <p>999999999</p>
                      </div>
                  </div>
                  <div class="card">
                      <div class="icon"><i class='bx bx-bar-chart'></i></div>
                      <div class="info">
                          <h3>WPM</h3>
                          <p>95.81%</p>
                      </div>
                  </div>
                  <div class="card">
                      <div class="icon"><i class='bx bx-bar-chart'></i></div>
                      <div class="info">
                          <h3>RAW</h3>
                          <p>87.65%</p>
                      </div>
                  </div>
              </div>
          </div>
      </main>


    </div>

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
    
</body>
@endif

</html>
