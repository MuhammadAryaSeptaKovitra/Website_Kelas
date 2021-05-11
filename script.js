const container = document.querySelector(".container1");

const jumbo = document.querySelector(".jumbo");
const thumbs = document.querySelectorAll(".thumb");

container.addEventListener("click", function (e) {
  // cek apakah yang diclik apakah thumb
  if (e.target.className == "thumb") {
    jumbo.src = e.target.src;
    jumbo.classList.add("fade");
    setTimeout(function () {
      jumbo.classList.remove("fade");
    }, 300);

    thumbs.forEach(function (thumb) {
      thumb.className = "thumb";
    });
    e.target.classList.add("active");
  }
});
