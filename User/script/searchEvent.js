// Ambil elemen yang dibutuhkan pakai DOM
var keyword = document.getElementById("keyword");
var tombolCari = document.getElementById("tombol-cari");
var container = document.getElementById("container");

// Tambahkan event ketika keyword ditulis
keyword.addEventListener("keyup", function () {
  // Buat object ajax
  var xhr = new XMLHttpRequest();

  // Cek kesiapan ajax
  xhr.onreadystatechange = function () {
    //   Ready state nilainy 0--4,sedangkan status readynya 200,jika ready nya 404 maka not found
    if ((xhr.readyState == 4) & (xhr.status == 200)) {
      container.innerHTML = xhr.responseText;
    }
  };
  //Eksekusi ajax
  xhr.open("GET", "../ajax/event.php?keyword=" + keyword.value, true);
  xhr.send();
});
