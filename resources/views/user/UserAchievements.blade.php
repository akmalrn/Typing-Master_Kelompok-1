<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

:root {
    --light: #f6f6f9;
    --primary: #1976D2;
    --light-primary: #CFE8FF;
    --grey: #eee;
    --dark-grey: #AAAAAA;
    --dark: #363949;
    --danger: #D32F2F;
	--light-danger: #FECDD3;
    --warning: #FBC02D;
    --light-warning: #FFF2C6;
    --success: #388E3C;
    --light-success: #BBF7D0;
}

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

.bx{
    font-size: 1.7rem;
}

a{
    text-decoration: none;
}

li{
    list-style: none;
}

html{
    overflow-x: hidden;
}

body.dark{
    --light: #181a1e;
    --grey: #25252c;
    --dark: #fbfbfb
}

body{
    background: var(--grey);
    overflow-x: hidden;
}

.sidebar{
    position: fixed;
    top: 0;
    left: 0;
    background: var(--light);
    width: 230px;
    height: 100%;
    z-index: 2000;
    overflow-x: hidden;
    scrollbar-width: none;
    transition: all 0.3s ease;
}

.sidebar::-webkit-scrollbar{
    display: none;
}

.sidebar.close{
    width: 60px;
}

.sidebar .logo{
    font-size: 24px;
    font-weight: 700;
    height: 56px;
    display: flex;
    align-items: center;
    color: var(--primary);
    z-index: 500;
    padding-bottom: 20px;
    box-sizing: content-box;
}

.sidebar .logo .logo-name span{
    color: var(--dark);
}

.sidebar .logo .bx{
    min-width: 60px;
    display: flex;
    justify-content: center;
    font-size: 2.2rem;
}

.sidebar .side-menu{
    width: 100%;
    margin-top: 48px;
}

.sidebar .side-menu li{
    height: 48px;
    background: transparent;
    margin-left: 6px;
    border-radius: 48px 0 0 48px;
    padding: 4px;
}

.sidebar .side-menu li.active{
    background: var(--grey);
    position: relative;
}

.sidebar .side-menu li.active::before{
    content: "";
    position: absolute;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    top: -40px;
    right: 0;
    box-shadow: 20px 20px 0 var(--grey);
    z-index: -1;
}

.sidebar .side-menu li.active::after{
    content: "";
    position: absolute;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    bottom: -40px;
    right: 0;
    box-shadow: 20px -20px 0 var(--grey);
    z-index: -1;
}

.sidebar .side-menu li a{
    width: 100%;
    height: 100%;
    background: var(--light);
    display: flex;
    align-items: center;
    border-radius: 48px;
    font-size: 16px;
    color: var(--dark);
    white-space: nowrap;
    overflow-x: hidden;
    transition: all 0.3s ease;
}

.sidebar .side-menu li.active a{
    color: var(--success);
}

.sidebar.close .side-menu li a{
    width: calc(48px - (4px * 2));
    transition: all 0.3s ease;
}

.sidebar .side-menu li a .bx{
    min-width: calc(60px - ((4px + 6px) * 2));
    display: flex;
    font-size: 1.6rem;
    justify-content: center;
}

.sidebar .side-menu li a.logout{
    color: var(--danger);
}

.content{
    position: relative;
    width: calc(100% - 230px);
    left: 230px;
    transition: all 0.3s ease;
}

.sidebar.close~.content{
    width: calc(100% - 60px);
    left: 60px;
}

.content nav{
    height: 56px;
    background: var(--light);
    padding: 0 24px 0 0;
    display: flex;
    align-items: center;
    grid-gap: 24px;
    position: sticky;
    top: 0;
    left: 0;
    z-index: 1000;
}

.content nav::before{
    content: "";
    position: absolute;
    width: 40px;
    height: 40px;
    bottom: -40px;
    left: 0;
    border-radius: 50%;
    box-shadow: -20px -20px 0 var(--light);
}

.content nav a{
    color: var(--dark);
}

.content nav .bx.bx-menu{
    cursor: pointer;
    color: var(--dark);
}

.content nav form{
    max-width: 400px;
    width: 100%;
    margin-right: auto;
}

.content nav form .form-input{
    display: flex;
    align-items: center;
    height: 36px;
}

.content nav form .form-input input{
    flex-grow: 1;
    padding: 0 16px;
    height: 100%;
    border: none;
    background: var(--grey);
    border-radius: 36px 0 0 36px;
    outline: none;
    width: 100%;
    color: var(--dark);
}

.content nav form .form-input button{
    width: 80px;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: var(--primary);
    color: var(--light);
    font-size: 18px;
    border: none;
    outline: none;
    border-radius: 0 36px 36px 0;
    cursor: pointer;
}

.content nav .notif{
    font-size: 20px;
    position: relative;
}

.content nav .notif .count{
    position: absolute;
    top: -6px;
    right: -6px;
    width: 20px;
    height: 20px;
    background: var(--danger);
    border-radius: 50%;
    color: var(--light);
    border: 2px solid var(--light);
    font-weight: 700;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.content nav .profile img{
    width: 36px;
    height: 36px;
    object-fit: cover;
    border-radius: 50%;
}

.content nav .theme-toggle{
    display: block;
    min-width: 50px;
    height: 25px;
    background: var(--grey);
    cursor: pointer;
    position: relative;
    border-radius: 25px;
}

.content nav .theme-toggle::before{
    content: "";
    position: absolute;
    top: 2px;
    left: 2px;
    bottom: 2px;
    width: calc(25px - 4px);
    background: var(--primary);
    border-radius: 50%;
    transition: all 0.3s ease;
}

.content nav #theme-toggle:checked+.theme-toggle::before{
    left: calc(100% - (25px - 4px) - 2px);
}

.content main{
    width: 100%;
    padding: 36px 24px;
    max-height: calc(100vh - 56px);
}

.content main .header{
    display: flex;
    align-items: center;
    justify-content: space-between;
    grid-gap: 16px;
    flex-wrap: wrap;
}

.content main .header .left h1{
    font-size: 36px;
    font-weight: 600;
    margin-bottom: 10px;
    color: var(--dark);
}

.content main .header .left .breadcrumb{
    display: flex;
    align-items: center;
    grid-gap: 16px;
}

.content main .header .left .breadcrumb li{
    color: var(--dark);
}

.content main .header .left .breadcrumb li a{
    color: var(--dark-grey);
    pointer-events: none;
}

.content main .header .left .breadcrumb li a.active{
    color: var(--primary);
    pointer-events: none;
}

.content main .header .report{
    height: 36px;
    padding: 0 16px;
    border-radius: 36px;
    background: var(--primary);
    color: var(--light);
    display: flex;
    align-items: center;
    justify-content: center;
    grid-gap: 10px;
    font-weight: 500;
}

.content main .insights{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    grid-gap: 24px;
    margin-top: 36px;
}

.content main .insights li{
    padding: 24px;
    background: var(--light);
    border-radius: 20px;
    display: flex;
    align-items: center;
    grid-gap: 24px;
    cursor: pointer;
}

.content main .insights li .bx{
    width: 80px;
    height: 80px;
    border-radius: 10px;
    font-size: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.content main .insights li:nth-child(1) .bx{
    background: var(--light-primary);
    color: var(--primary);
}

.content main .insights li:nth-child(2) .bx{
    background: var(--light-warning);
    color: var(--warning);
}

.content main .insights li:nth-child(3) .bx{
    background: var(--light-success);
    color: var(--success);
}

.content main .insights li:nth-child(4) .bx{
    background: var(--light-danger);
    color: var(--danger);
}

.content main .insights li .info h3{
    font-size: 24px;
    font-weight: 600;
    color: var(--dark);
}

.content main .insights li .info p{
    color: var(--dark);
}

.content main .bottom-data{
    display: flex;
    flex-wrap: wrap;
    grid-gap: 24px;
    margin-top: 24px;
    width: 100%;
    color: var(--dark);
}

.content main .bottom-data>div{
    border-radius: 20px;
    background: var(--light);
    padding: 24px;
    overflow-x: auto;
}

.content main .bottom-data .header{
    display: flex;
    align-items: center;
    grid-gap: 16px;
    margin-bottom: 24px;
}

.content main .bottom-data .header h3{
    margin-right: auto;
    font-size: 24px;
    font-weight: 600;
}

.content main .bottom-data .header .bx{
    cursor: pointer;
}

.content main .bottom-data .orders{
    flex-grow: 1;
    flex-basis: 500px;
}

.content main .bottom-data .orders table{
    width: 100%;
    border-collapse: collapse;
}

.content main .bottom-data .orders table th{
    padding-bottom: 12px;
    font-size: 13px;
    text-align: left;
    border-bottom: 1px solid var(--grey);
}

.content main .bottom-data .orders table td{
    padding: 16px 0;
}

.content main .bottom-data .orders table tr td:first-child{
    display: flex;
    align-items: center;
    grid-gap: 12px;
    padding-left: 6px;
}

.content main .bottom-data .orders table td img{
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
}

.content main .bottom-data .orders table tbody tr{
    cursor: pointer;
    transition: all 0.3s ease;
}

.content main .bottom-data .orders table tbody tr:hover{
    background: var(--grey);
}

.content main .bottom-data .orders table tr td .status{
    font-size: 10px;
    padding: 6px 16px;
    color: var(--light);
    border-radius: 20px;
    font-weight: 700;
}

.content main .bottom-data .orders table tr td .status.completed{
    background: var(--success);
}

.content main .bottom-data .orders table tr td .status.process{
    background: var(--primary);
}

.content main .bottom-data .orders table tr td .status.pending{
    background: var(--warning);
}

.content main .bottom-data .reminders{
    flex-grow: 1;
    flex-basis: 300px;
}

.content main .bottom-data .reminders .task-list{
    width: 100%;
}

.content main .bottom-data .reminders .task-list li{
    width: 100%;
    margin-bottom: 16px;
    background: var(--grey);
    padding: 14px 10px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.content main .bottom-data .reminders .task-list li .task-title{
    display: flex;
    align-items: center;
}

.content main .bottom-data .reminders .task-list li .task-title p{
    margin-left: 6px;
}

.content main .bottom-data .reminders .task-list li .bx{
  cursor: pointer;  
}

.content main .bottom-data .reminders .task-list li.completed{
    border-left: 10px solid var(--success);
}

.content main .bottom-data .reminders .task-list li.not-completed{
    border-left: 10px solid var(--danger);
}

.content main .bottom-data .reminders .task-list li:last-child{
   margin-bottom: 0;
}

@media screen and (max-width: 768px) {
    .sidebar{
        width: 200px;
    }

    .content{
        width: calc(100% - 60px);
        left: 200px;
    }

}

@media screen and (max-width: 576px) {
    
    .content nav form .form-input input{
        display: none;
    }

    .content nav form .form-input button{
        width: auto;
        height: auto;
        background: transparent;
        color: var(--dark);
        border-radius: none;
    }

    .content nav form.show .form-input input{
        display: block;
        width: 100%;
    }

    .content nav form.show .form-input button{
        width: 36px;
        height: 100%;
        color: var(--light);
        background: var(--danger);
        border-radius: 0 36px 36px 0;
    }

    .content nav form.show~.notif, .content nav form.show~.profile{
        display: none;
    }

    .content main .insights {
        grid-template-columns: 1fr;
    }

    .content main .bottom-data .header{
        min-width: 340px;
    }

    .content main .bottom-data .orders table{
        min-width: 340px;
    }

    .content main .bottom-data .reminders .task-list{
        min-width: 340px;
    }
}
/* Adjusted styles for sidebar icons */
.sidebar .side-menu li a i {
    min-width: calc(60px - ((4px + 6px) * 2)); /* Adjusted width based on existing styles */
    display: flex;
    justify-content: center;
    font-size: 1.5rem;
}

.sidebar .side-menu li a i.fa-gamepad {
    min-width: calc(60px - ((4px + 6px) * 2)); /* Adjusted width for specific icon */
    display: flex;
    justify-content: center;
    font-size: 1.5rem;
    color: var(--dark); /* Custom color if needed */
}
.achievement {
    background-color: var(--light);
    border-radius: 20px;
    padding: 24px;
    margin-top: 24px;
}

.achievement h2 {
    font-size: 24px;
    color: var(--dark);
    margin-bottom: 16px;
}

.achievement-list {
    list-style-type: none;
    padding: 0;
}

.achievement-list li {
    margin-bottom: 12px;
}

.achievement-list li strong {
    color: var(--primary);
}

.back-btn {
    display: inline-block;
    margin-top: 16px;
    padding: 10px 20px;
    background-color: var(--primary);
    color: var(--light);
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.back-btn:hover {
    background-color: var(--dark-grey);
}


  </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
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
            <li class="#"><a href="{{ route('HalamanDashboard')}}"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="{{ route('HalamanGames') }}"><i class="fa-solid fa-gamepad"></i>Game</a></li>
            @foreach($typing_lessons as $lesson)
            @if($lesson->id == 1)
            <li><a href="{{ route('HalamanTypingLessons', $lesson->id) }}"><i class='bx bx-analyse'></i>Start Lesson {{ $lesson->id }}</a></li>
            @endif
            @endforeach
            <li class="active"><a href="#"><i class="fa-solid fa-trophy"></i></i>Achievement</a></li>
            <li><a href="{{ route('HalamanUser', ['id' => Auth::user()->id]) }}"><i class='bx bx-group'></i> Users</a></li>
            <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout">
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
                <img src="images/logo.png">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Achievements</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Achievements</a></li>
                    </ul>
                </div>
            </div>
        
            <!-- Achievement Section -->
            <section class="achievement">
                <h2>Achievement</h2>
                <ul class="achievement-list">
                    <li>
                        <strong>Achievement Name 1</strong> - Description of the achievement.
                    </li>
                    <li>
                        <strong>Achievement Name 2</strong> - Description of the achievement.
                    </li>
                    <li>
                        <strong>Achievement Name 3</strong> - Description of the achievement.
                    </li>
                    <!-- Add more achievements as needed -->
                </ul>
                <a href="#" class="back-btn">Back to Dashboard</a>
            </section>
            <!-- End Achievement Section -->
        
            <!-- Your existing content continues... -->
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
    <script>
        // Contoh penambahan event listener untuk tombol "Back to Dashboard"
        const backButton = document.querySelector('.back-btn');

        backButton.addEventListener('click', function(e) {
            e.preventDefault();
            // Tambahkan logika navigasi kembali ke dashboard atau sesuaikan dengan kebutuhan Anda
            console.log('Back to Dashboard clicked!');
        });

    </script>
</body>

</html>