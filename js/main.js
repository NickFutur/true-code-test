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
