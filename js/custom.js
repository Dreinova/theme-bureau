document.addEventListener("DOMContentLoaded", function () {
  if (typeof AOS !== "undefined") {
    AOS.init({
      duration: 1000,
      once: true,
    });
  } else {
    console.warn("AOS no está cargado");
  }
  const toggle = document.querySelector(".menu-toggle");
  const nav = document.querySelector(".main-navigation");
  toggle.addEventListener("click", () => {
    nav.classList.toggle("active");
  });
  const menuItems = document.querySelectorAll(".menu-item-has-children > a");

  menuItems.forEach((link) => {
    link.addEventListener("click", (e) => {
      // Solo en móvil
      if (window.innerWidth <= 768) {
        e.preventDefault();
        const parent = link.parentElement;
        parent.classList.toggle("open");
      }
    });
  });

  document.querySelectorAll(".videos-item__play").forEach((btn) => {
    btn.addEventListener("click", () => {
      const wrapper = btn.closest(".videos-item__image");
      const video = wrapper.querySelector(".videos-item__video");

      // Mostrar el video y ocultar la imagen y el botón
      wrapper.classList.add("playing");
      btn.style.display = "none";

      // Reiniciar y reproducir
      video.currentTime = 0;
      video.play();

      // Cuando el video se pausa manualmente o termina
      video.addEventListener("pause", () => {
        wrapper.classList.remove("playing");
        btn.style.display = "block";
        video.pause();
        video.currentTime = 0; // vuelve al inicio
      });

      // Si termina, también vuelve a imagen
      video.addEventListener("ended", () => {
        wrapper.classList.remove("playing");
        btn.style.display = "block";
        video.currentTime = 0;
      });
    });
  });
});

document.querySelectorAll(".faq-item summary").forEach((summary) => {
  summary.addEventListener("click", (e) => {
    const openItem = summary.parentElement;
    document.querySelectorAll(".faq-item").forEach((item) => {
      if (item !== openItem) item.removeAttribute("open");
    });
  });
});
