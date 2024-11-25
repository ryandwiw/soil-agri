document.querySelector("#sidebar-toggle").addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

document.querySelector("#themeToggle").addEventListener("click", () => {
    toggleLocalStorage();
    toggleRootClass();
    updateThemeText(); // Tambahkan pembaruan teks
    updateBlueTheme();
});

function toggleRootClass() {
    const current = document.documentElement.getAttribute('data-bs-theme');
    const inverted = current == 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-bs-theme', inverted);
}

function toggleLocalStorage() {
    if (isLight()) {
        localStorage.removeItem("light");
    } else {
        localStorage.setItem("light", "set");
    }
}

function isLight() {
    return localStorage.getItem("light");
}

function updateThemeText() {
    const themeText = document.querySelector("#themeText");
    const currentTheme = document.documentElement.getAttribute('data-bs-theme');
    
    // Perbarui teks berdasarkan tema saat ini
    themeText.textContent = currentTheme == 'dark' ? 'Light' : 'Dark';
}



// Inisialisasi teks tema saat halaman dimuat
updateThemeText();

function toggleContent(articleId) {
    var shortContent = document.getElementById('shortContent' + articleId);
    var fullContent = document.getElementById('fullContent' + articleId);
    var linkText = document.querySelector(`[onclick="toggleContent(${articleId})"]`);

    if (shortContent.style.display === 'none') {
        shortContent.style.display = 'block';
        fullContent.style.display = 'none';
        linkText.innerHTML = 'Selengkapnya';
    } else {
        shortContent.style.display = 'none';
        fullContent.style.display = 'block';
        linkText.innerHTML = 'Persingkat';
    }
}

function updateTanggalJam() {
    var sekarang = new Date();
    var tanggal = sekarang.getDate();
    var bulan = sekarang.getMonth() + 1;
    var tahun = sekarang.getFullYear();
    var jam = sekarang.getHours();
    var menit = sekarang.getMinutes();
    var detik = sekarang.getSeconds();

    var tanggalJamDiv = document.getElementById("tanggal-jam-sekarang");
    tanggalJamDiv.innerHTML =  tanggal + '/' + bulan + '/' + tahun + ' ' + jam + ':' + menit + ':' + detik;
  }

  // Memanggil fungsi pertama kali untuk menampilkan waktu awal
  updateTanggalJam();

  // Menggunakan setInterval untuk memperbarui informasi setiap detik (1000 milidetik)
  setInterval(updateTanggalJam, 1000);