<!DOCTYPE html>
<html lang="en">

<head>
  <style>
.typing-lesson-container {
    text-align: center;
    margin: 20px auto;
    max-width: 800px;
}

.lesson-content {
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    white-space: pre-wrap;
}

.typing-lesson-container .correct {
    color: green;
}

.typing-lesson-container .incorrect {
    color: red;
}

.typing-lesson-container .remaining {
    color: gray;
}

.typing-lesson-container .current-block {
    font-weight: bold;
    color: black;
}

#typing-input {
    width: 100%;
    font-size: 18px;
    line-height: 1.6;
}

#start-button {
    display: none; /* Initially hidden */
}

.input-typing {
    display: none; /* Initially hidden */
}

  </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Responsive Dashboard Design #2 | WikraType</title>
    <script>
       document.addEventListener('DOMContentLoaded', function () {
    const lessonContentDiv = document.querySelector('#lesson-content');
    const inputTyping = document.querySelector('#typing-input');
    const startButton = document.getElementById('start-button');

    // Ambil teks dari konten pelajaran dan buat array dari kata
    const lessonContent = `{!! addslashes($typing_lessons->lesson_content) !!}`;

    // Fungsi untuk memecah teks menjadi baris-baris (maksimal 2 baris)
    function splitIntoLines(text) {
        const lines = text.split('\n').slice(0, 2); // Ambil maksimal 2 baris
        return lines.join('\n'); // Gabungkan kembali menjadi teks
    }

    // Memisahkan konten pelajaran menjadi maksimal 2 baris
    const lessonLines = splitIntoLines(lessonContent);

    // Menyimpan kata-kata dari 2 baris konten pelajaran
    const words = lessonLines.split(/\s+/);
    const blocks = [];
    let currentBlockIndex = 0;

    // Fungsi untuk membagi teks menjadi blok-blok kata, masing-masing berisi enam kata
    function splitIntoWordBlocks(wordsPerBlock) {
        for (let i = 0; i < words.length; i += wordsPerBlock) {
            blocks.push(words.slice(i, i + wordsPerBlock).join(' '));
        }
    }

    splitIntoWordBlocks(6); // Split teks menjadi blok-blok kata dengan 6 kata per blok

    let startTime;
    let totalCharactersTyped = 0;

    // Fungsi untuk memperbarui tampilan konten pelajaran
    function updateLessonContent() {
        lessonContentDiv.innerHTML = '';

        // Menampilkan blok yang sedang ditulis
        const currentBlock = blocks[currentBlockIndex];
        const span = document.createElement('span');
        span.textContent = currentBlock;
        span.classList.add('current-block');
        lessonContentDiv.appendChild(span);
        lessonContentDiv.appendChild(document.createElement('br'));
    }

    // Mulai pelajaran saat tombol "Start Lesson" diklik
    startButton.addEventListener('click', function() {
        startButton.style.display = 'none'; // Sembunyikan tombol setelah diklik
        inputTyping.style.display = 'block'; // Tampilkan area input untuk mengetik
        inputTyping.focus(); // Fokus pada area input
        startLesson();
    });

    function startLesson() {
        currentBlockIndex = 0; // Reset ke blok pertama
        startTime = new Date().getTime(); // Catat waktu mulai
        inputTyping.focus(); // Fokus pada area input
        inputTyping.addEventListener('input', handleTyping); // Tambahkan event listener untuk mengetik
        updateLessonContent(); // Perbarui tampilan dengan blok pertama
    }

    function handleTyping() {
        const typedText = inputTyping.value; // Teks yang diketik pengguna

        // Dapatkan blok saat ini
        const currentBlock = blocks[currentBlockIndex];

        let displayContent = '';

        // Iterasi melalui setiap karakter di blok saat ini
        for (let i = 0; i < currentBlock.length; i++) {
            if (i < typedText.length) { // Jika huruf telah diketik atau sedang diketik
                if (typedText[i] === currentBlock[i]) {
                    displayContent += `<span class="correct">${currentBlock[i]}</span>`;
                } else {
                    displayContent += `<span class="incorrect">${currentBlock[i]}</span>`;
                }
            } else { // Huruf yang belum diketik
                displayContent += `<span class="remaining">${currentBlock[i]}</span>`;
            }
        }

        lessonContentDiv.querySelector('.current-block').innerHTML = displayContent;

        // Jika pengguna menyelesaikan satu baris
        if (typedText.trim() === currentBlock.trim()) {
            if (currentBlockIndex < blocks.length - 1) {
                currentBlockIndex++; // Pindah ke blok berikutnya
                inputTyping.value = ''; // Reset area input
                updateLessonContent(); // Perbarui tampilan dengan blok berikutnya
            } else {
                finishLesson(); // Selesaikan pelajaran jika sudah mencapai blok terakhir
            }
        }
    }

    function finishLesson() {
        const endTime = new Date().getTime();
        const durationInSeconds = (endTime - startTime) / 1000;
        const charactersPerMinute = Math.floor(totalCharactersTyped / durationInSeconds * 60);
        alert(`CPM: ${charactersPerMinute}`);
        resetLesson();
    }

    function resetLesson() {
        // Reset tampilan dan persiapan untuk pelajaran berikutnya
        lessonContentDiv.innerHTML = '';
        splitIntoWordBlocks(6); // Kembali membagi teks menjadi blok-blok kata
        currentBlockIndex = 0;
        inputTyping.value = '';
        totalCharactersTyped = 0;
        startButton.style.display = 'block'; // Tampilkan kembali tombol untuk memulai pelajaran baru
        inputTyping.style.display = 'none'; // Sembunyikan area input
        inputTyping.removeEventListener('input', handleTyping); // Hapus event listener untuk input
    }

    // Awalnya sembunyikan input area dan tampilkan tombol "Start Lesson"
    inputTyping.style.display = 'none';
    startButton.style.display = 'block';
});

    </script>
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
            <li><a href="{{route('HalamanAchievements')}}"><i class="fa-solid fa-trophy"></i></i>Achievement</a></li>
            <li><a href="{{ route('HalamanUser', ['id' => Auth::user()->id]) }}"><i class='bx bx-group'></i> Users</a></li>
            <li><a href="{{ route('HalamanSetting') }}"><i class='bx bx-cog'></i>Settings</a></li>
        </ul>
        <ul class="side-menu">
            <li>
              <a href="{{ route('LogoutUser') }}" onclick="confirm('Apakah Anda yakin ingin logout?')">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div> <div class="sidebar">
        <a href="#" class="logo">
            <img src="{{ asset('image/wikrama.png') }}" width="20%" style="margin-left: 7%" alt="">
            <div class="logo-name"><span>Wikra</span>Type</div>
        </a>
        <ul class="side-menu">
            <li class="#"><a href="{{ route('HalamanDashboard')}}"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="{{ route('HalamanGames') }}"><i class="fa-solid fa-gamepad"></i>Game</a></li>
            <li><a href="{{route('HalamanAchievements')}}"><i class="fa-solid fa-trophy"></i></i>Achievement</a></li>
            <li><a href="{{ route('HalamanUser', ['id' => Auth::user()->id]) }}"><i class='bx bx-group'></i>Your Profile</a></li>
            <li><a href="{{ route('HalamanSetting') }}"><i class='bx bx-cog'></i>Settings</a></li>
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
                  <h1>Selamat Datang Di Typing Master</h1>
                  <ul class="breadcrumb">
                      <li><a href="#">Dashboard</a></li>
                  </ul>
              </div>
          </div>
          @if (Auth::user())
          <div class="typing-lesson-container">
            <div class="user-info">
                <span class="username">Selamat Datang {{ Auth::user()->name }},</span>
                <p>Di Halaman Typing Lessons.</p>
            </div>

            <!-- Displaying lesson content here -->
            <div id="lesson-content" class="lesson-content">
                <!-- Lesson content will be dynamically inserted here -->
            </div>

            <!-- Input area for typing, positioned together with lesson content -->
            <textarea id="typing-input" class="form-control input-typing" rows="3" placeholder="Start typing here..."></textarea>

            <button id="start-button" class="btn btn-primary mt-3">Start Lesson</button>
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
