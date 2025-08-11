
  document.addEventListener("DOMContentLoaded", function () {
    const toggles = document.querySelectorAll(".mobile-dropdown-toggle");

    toggles.forEach((toggle) => {
      toggle.addEventListener("click", function () {
        const target = this.nextElementSibling;
        target.classList.toggle("hidden");

        // Ganti ikon panah (jika dipakai)
        const icon = this.querySelector("svg");
        if (icon) {
          icon.classList.toggle("rotate-180");
        }
      });
    });

    // Hamburger button toggle
    document.getElementById("menu-btn").addEventListener("click", function () {
      document.getElementById("mobile-menu").classList.toggle("hidden");
    });
  });

