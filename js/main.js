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
    480: {
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

const feedbackFormFileupload = document.getElementById(
  "feedback-form__file-upload"
);

feedbackFormFileupload.addEventListener("change", function () {
  let fileName = this.value.split("\\").pop(); // Получаем имя файла
  document.getElementById("feedback-form__file-upload-text").textContent =
    fileName ? fileName : "Прикрепить файл портфолио"; // Обновляем текст
});

const subscribeInput = document.getElementById("subscribe");
const feedbackFormCheckbox = document.querySelector(
  ".js-feedback-form__checkbox"
);
subscribeInput.addEventListener("change", () => {
  feedbackFormCheckbox.classList.toggle(
    "feedback-form__checkbox-agree",
    subscribeInput.checked
  );
});

const menuBurgerBtn = document.querySelectorAll(".js-burger-menu");
const menuNavMobile = document.querySelector(".js-nav-block__mobile");
menuBurgerBtn.forEach((burgerBtn) => {
  burgerBtn.addEventListener("click", () => {
    menuNavMobile.classList.toggle("open-menu");
  });
});
menuNavMobile.addEventListener("click", () => {
  menuNavMobile.classList.toggle("open-menu");
});
