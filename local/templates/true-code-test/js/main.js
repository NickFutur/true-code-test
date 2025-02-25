BX.ready(function () {
  const traineeshipSlider = new Swiper("#js-traineeship-slider", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    autoplay: false,
    slidesPerView: 3,
    spaceBetween: 35,
    slidesPerGroup: 3,

    // Navigation arrows
    navigation: {
      nextEl: ".traineeship-slider__btn-next",
      prevEl: ".traineeship-slider__btn-prev",
    },
    breakpoints: {
      0: {
        direction: "vertical",
        slidesPerView: 3,
        slidesPerView: 3,
        slidesPerGroup: 3,
      },
      481: {
        direction: "horizontal",
        slidesPerView: 1,
        slidesPerView: 1,
        spaceBetween: 15,
        slidesPerGroup: 1,
      },
      850: {
        slidesPerView: 2,
        slidesPerView: 2,
        slidesPerGroup: 2,
      },
      1250: {
        slidesPerView: 3,
        spaceBetween: 35,
        slidesPerGroup: 3,
      },
    },
  });

  const menuBurgerBtn = document.querySelectorAll(".js-burger-menu");
  const menuNavMobile = document.querySelector(".js-nav-block__mobile");
  const menuNavBlockMobile = document.querySelector(".nav-block__menu");
  menuBurgerBtn.forEach((burgerBtn) => {
    burgerBtn.addEventListener("click", () => {
      menuNavMobile.classList.toggle("open-menu");
    });
  });

  menuNavMobile.addEventListener("click", (e) => {
    if (!menuNavBlockMobile.contains(e.target)) {
      menuNavMobile.classList.toggle("open-menu");
    }
  });
});
