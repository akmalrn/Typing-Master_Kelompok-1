<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/HalamanMengetik.css') }}">
    <title>Responsive Dashboard Design #2 | WikraType</title>
    <script>

    </script>
</head>
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
            <li><a href="{{ route('HalamanSetting') }}"><i class='bx bx-cog'></i>Settings</a></li>
            <li><a href="{{ route('HalamanDev') }}"><i class="fa-solid fa-users"></i>Our Dev</a></li>
        </ul>
        <ul class="side-menu">
            <li>
        <li><a href="#">    <i class='bx bx-cog'></i>Settings</a></li>
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
            <li><a href="{{ route('HalamanTypingLessons') }}"><i class='bx bx-analyse'></i>Start Lesson</a></li>
            <li><a href="{{ route('HalamanDashboard')}}"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="{{ route('HalamanGames') }}"><i class="fa-solid fa-gamepad"></i>Game</a></li>
            <li><a href="{{route('HalamanAchievements')}}"><i class="fa-solid fa-trophy"></i></i>Achievement</a></li>
            <li><a href="{{ route('HalamanUser', ['id' => Auth::user()->id]) }}"><i class="fa-solid fa-user"></i> Users</a></li>
            <li><a href="{{ route('HalamanUser', ['id' => Auth::user()->id]) }}"><i class='bx bx-group'></i>Your Profile</a></li>
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

        </nav>

        <!-- End of Navbar -->

        <main>
          <div class="header">
              <div class="left">
                  <h1>Selamat Datang Di Typing Lessons</h1>
                  <ul class="breadcrumb">
                      <li><a href="#">Typing Lessons</a></li>
                  </ul>
              </div>
          </div>
          @if (Auth::user())
          <i class="fa-solid fa-bars toggle-btn"></i>
    <section id="main-sec" class="main">
      <dialog class="mobile-msg">
        <h2>Silakan buka website ini di PC/laptopmu</h2>
      </dialog>
      <dialog id="result-dialog">
        <p class="result-text">
          Kecepatan Ngetikmu: <span id="result-wpm"></span> WPM! <br />
          Sepertinya Kamu musti latihan lebih sering lagi <br />
          biar tambah ngebut ngetiknya.
        </p>
        <div class="button-result">
          <button class="btn">OKE</button>
          <div class="btn wpm-info" onclick="showDialog('#abt-wpm')">
            apa itu WPM?
          </div>
        </div>
      </dialog>
      <dialog id="abt-wpm" class="about-wpm">
        <i class="fa-solid fa-xmark x close"></i>
        <div class="article">
          <h1 class="article-title">WPM <span>(Words per Minutes)</span></h1>
          <article>
            <p>
              WPM, singkatan dari "words per minute" atau kata per menit, adalah
              satuan ukuran yang umum digunakan untuk mengukur kecepatan
              mengetik. Satuan ini menunjukkan jumlah kata yang dapat diproses
              dalam satu menit.
            </p>
            <h2>Kategori:</h2>
            <h3>10-20 WPM:</h3>
            Si Santuy Masih nyari-nyari huruf di keyboard? Santai aja, bro!
            Semua orang pasti mulai dari nol. Terus gas latihan biar makin GG.
            <h3>21-40 WPM:</h3>
            Si Standar Ini kecepatan standar kebanyakan orang. Nggak terlalu
            lemot, nggak terlalu ngebut. Cukup lah buat ngetik tugas atau
            chatingan.
            <h3>41-60 WPM:</h3>
            Si Gesit Nah, kalau udah di level ini, jari-jarimu udah mulai lincah
            nih. Ngetik tugas atau email pasti cepet kelarnya. Keren!
            <h3>61-80 WPM:</h3>
            Si Pro Ini levelnya para pro player. Kecepatan ngetiknya udah kayak
            kesurupan setan ngebut! Biasanya yang kerjaannya banyak ngetik,
            kayak content creator atau penulis, ada di level ini.
          </article>
        </div>
        <div class="btn close">Tutup</div>
      </dialog>
      <dialog id="tutorial" class="txt">
        <p>
          Klik tombol startnya, terus tinggal ketik aja sesuai kalimat yang
          disediain.<br />
          Ga ada finish. Tapi Kamu diberi waktu
          <span style="color: red">60 DETIK</span>.<br />
          Setelah itu,
          <span> score WPM-mu akan dilihat dari seberapa banyak kata </span>
          yang kamu selesaikan dengan tepat dalam 60 detik. <br />
          Ingat ya: <span> Cepat dan Tepat</span>
          <br />
          Oh iya, saat lagi ngetik, kamu juga bisa
          <span>pantau WPM-mu</span> melalui live display yang ada di bawah
          timer ya!
        </p>
        <div class="btn close">oke</div>
      </dialog>
      <dialog id="contribution" class="txt">
        <p>
          Anda bisa berkontribusi untuk website ini dengan memberikan saran dan
          kritik ke kontak yang saya cantumkan di bawah menu
        </p>
        <div class="btn close">oke</div>
      </dialog>

      <!-- Paragraf pelajaran dari database -->
      <div class="paragraph">
        {{ $lesson->lesson_content }}
      </div>

      <div class="btn-time-container">
        <button class="btn ctr" id="start-typing-btn">Start</button>
        <div class="time-wpm-ctr">
          <div class="ctr">Time: <span class="time">00</span></div>
          <div class="display-est-wpm ctr">
            <span class="wpm-est">0</span> WPM
          </div>
        </div>
      </div>
    </section>

        <script>
        const btn = document.querySelector(".btn.ctr");
const paragraph = document.querySelector(".paragraph");
const words = paragraph.innerHTML.split(" ");
const detik = document.querySelector(".time");
const resultDialog = document.querySelector("dialog#result-dialog");
const wpmEstDisplay = document.querySelector(".wpm-est");

let wordsFinished = 0;
let currentWord = 0;
let charCount = 0;
let falseCharInWordCount = 0;
let falseWord = 0;
let trueWord = 0;
let paragraphCount = 0;
let hitungMundur = 60;
let intervalId;

const typingSpeedMessages = {
  slow: {
    minWPM: 0,
    maxWPM: 15,
    message:
      "Lambat banget?!!, mungkin ngetik bukan passionmu deh. </br> kamu cocoknya joget aja! Oke gass oke gass",
    color: "red",
  },
  beginner: {
    minWPM: 16,
    maxWPM: 30,
    message:
      "Sepertinya Kamu musti latihan lebih sering lagi <br/> biar tambah ngebut ngetiknya.",
    color: "yellow",
  },
  average: {
    minWPM: 31,
    maxWPM: 45,
    message: "Kecepatan rata-rata, cukup lumayan.",
    color: "#008846",
  },
  fast: {
    minWPM: 46,
    maxWPM: 60,
    message: "Wah, cepat juga! Jari-jarimu lincah!",
    color: "#008846",
  },
  pro: {
    minWPM: 61,
    maxWPM: Infinity,
    message:
      "Ngebut banget busett! Lu olang bukan manusia ya! </br> btw keren sihh!!",
    color: "#008846",
  },
};

const arrayHTML = words.map(
  (word) =>
    `<span class= "word">${word
      .split("")
      .filter((e) => e !== "\n")
      .map((char) => `<span>${char}</span>`)
      .join("")}</span>`
);

const newHTML = paragraphChunks(arrayHTML);
paragraph.innerHTML = newHTML[paragraphCount].join(" ");

Array.from(resultDialog.children).forEach((e) =>
  e.addEventListener("click", () => {
    resultDialog.close();
  })
);

function paragraphChunks(arr, chunkLength = 8) {
  const subArrays = [];
  const arrFiltered = arr.filter((e) => e != '<span class= "word"></span>');
  while (arrFiltered.length > 0) {
    subArrays.push(arrFiltered.splice(0, chunkLength));
  }
  return subArrays;
}

function wordValidator() {
  if (
    charCount < paragraph.children[currentWord].children.length ||
    falseCharInWordCount > 0
  ) {
    Array.from(paragraph.children[currentWord].children).forEach(
      (char) => (char.style.color = "red")
    );
    falseWord++;
  } else {
    trueWord++;
  }
}

function getTypingSpeedMessage(wpm) {
  for (const level in typingSpeedMessages) {
    const { minWPM, maxWPM, message, color } = typingSpeedMessages[level];
    if (wpm >= minWPM && wpm <= maxWPM) {
      return { message, color };
    }
  }
}

function gamePlay(e) {
  if (e.code == "Space") {
    e.preventDefault();
    wordValidator();
    falseCharInWordCount = 0; // falseCharInWordCount dijadikan 0 sbelum masuk word selanjutnya
    paragraph.children[currentWord].style.backgroundColor = `transparent`;
    charCount = 0;
    wordsFinished++;
    currentWord++; // counter (current word) berpindah ke selanjutnya
    // Pengkondisian jika paragraph sekarang sudah habis, akan diupdate ke paragraph selanjutnya
    if (currentWord >= paragraph.children.length) {
      console.log(paragraphCount);
      paragraphCount++;
      if (paragraphCount >= newHTML.length) paragraphCount = 0;
      currentWord = 0;
      paragraph.innerHTML = newHTML[paragraphCount].join(" ");
      updateParagraph();
    }
    //====MASUK KE WORD SELANJUTNYA======
    Array.from(paragraph.children[currentWord].children).forEach(
      (char) => (char.style.color = "white")
    );
    paragraph.children[currentWord].style.backgroundColor = "#008846";
  } else if (
    e.key.length < 2 &&
    charCount < paragraph.children[currentWord].children.length
  ) {
    let currentChar = paragraph.children[currentWord].children[charCount];
    if (e.key === currentChar.innerText) {
      currentChar.style.color = "black";
      charCount++;
    } else {
      currentChar.style.color = "red";
      falseCharInWordCount++;
      charCount++;
    }
  } else if (e.key === "Backspace") {
    eraser();
  }
}
function updateParagraph() {
  Array.from(paragraph.children).forEach((word) => {
    word.style.backgroundColor = "transparent";
    Array.from(word.children).forEach((char) => {
      char.style.color = "white";
    });
  });
  paragraph.children[currentWord].style.backgroundColor = "#008846";
}

function eraser() {
  if (charCount == 0) return;
  charCount--;
  const hurufSekarang = paragraph.children[currentWord].children[charCount];
  if (hurufSekarang.style.color === "red") falseCharInWordCount--;
  hurufSekarang.style.color = "white";
}

function estimatingWPM() {
  const multiplier = Math.round(60 / (60 - hitungMundur));
  const finiteNum = isFinite(multiplier) ? multiplier : 1;
  const result = trueWord * finiteNum;
  const { color } = getTypingSpeedMessage(result);
  wpmEstDisplay.innerText = result;
  wpmEstDisplay.parentElement.style.color = `${color}`;
}

function gameResult() {
  const { message, color } = getTypingSpeedMessage(trueWord);
  wpmEstDisplay.innerText = trueWord;
  wpmEstDisplay.parentElement.style.color = `${color}`;
  resultDialog.children[0].innerHTML = `
        Kecepatan ngetikmu:
        <h1 class="wpm-result" style="color: ${color};">${trueWord} WPM</h1>
        <p>${message}</p>
        `;
  resultDialog.showModal();
}

const ketik = (event) => {
  gamePlay(event);
};

function restartBtn() {
  clearInterval(intervalId);
  document.removeEventListener("keydown", ketik);
  wordsFinished = 0;
  hitungMundur = 60;
  currentWord = 0;
  charCount = 0;
  falseCharInWordCount = 0;
  falseWord = 0;
  trueWord = 0;
  paragraphCount = 0;
  paragraph.innerHTML = newHTML[paragraphCount].join(" ");
  updateParagraph();
  wpmEstDisplay.innerText = 0;
  wpmEstDisplay.parentElement.style.color = "#f8f8f2";
  detik.innerText = 60;
  btn.innerText = "Start";
  btn.onclick = starto;
}

function intervalLogic() {
  if (hitungMundur > 0) {
    hitungMundur--;
    if (hitungMundur % 2 == 0) estimatingWPM();
    detik.innerText = hitungMundur;
  } else {
    clearInterval(intervalId);
    gameResult();
    document.removeEventListener("keydown", ketik);
  }
}

function starto() {
  paragraph.children[currentWord].style.backgroundColor = "#008846";
  Array.from(paragraph.children[currentWord].children).forEach(
    (char) => (char.style.color = "white")
  );
  detik.innerText = hitungMundur;
  document.addEventListener("keydown", ketik);
  intervalId = setInterval(intervalLogic, 1000);
  btn.innerText = "Reset";
  btn.onclick = restartBtn;
}

wpmEstDisplay.parentNode.addEventListener("click", () => {
  if (hitungMundur <= 1) gameResult();
});

btn.onclick = starto;

            </script>
</body>
@endif
</html>
