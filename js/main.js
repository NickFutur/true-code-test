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
});

const applicationFormFileupload = document.getElementById(
  "application-form__fileupload"
);

applicationFormFileupload.addEventListener("change", function () {
  let fileName = this.value.split("\\").pop(); // Получаем имя файла
  document.getElementById("application-form__fileupload-text").textContent =
    fileName ? fileName : "Прикрепить файл портфолио"; // Обновляем текст
});
