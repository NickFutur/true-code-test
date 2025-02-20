BX.ready(function () {
  const feedbackFormFileupload = document.getElementById(
    "feedback-form__file-upload"
  );
  // обработка поля "Прикрепить файл портфолио"
  feedbackFormFileupload.addEventListener("change", function () {
    let fileName = this.value.split("\\").pop(); // Получаем имя файла
    document.getElementById("feedback-form__file-upload-text").textContent =
      fileName ? fileName : "Прикрепить файл портфолио"; // Обновляем текст
  });

  // обработка поля согласия обработки данных
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
  // обработка событий в случае не заполненности поля
  const mainFeedbackFormSubmit = document.getElementById(
    "js-feedback-form__submit" // привязка к кнопке submit
  );
  const feedbackFormInputs = [
    {
      feedbackInput: document.getElementById("user_name"), // привязка к input по id
      feedbackErrorMessage: document.querySelector(
        ".feedback-form__name .feedback-form__error-message_none" // привязка к выводящем ошибку span (указываю класс блока в котором находится span и класс span)
      ),
    },
    {
      feedbackInput: document.getElementById("feedback-phone-email"),
      feedbackErrorMessage: document.querySelector(
        ".js-feedback-form__phone .feedback-form__error-message_none"
      ),
    },
  ];

  mainFeedbackFormSubmit.addEventListener("click", () => {
    // отслеживаю клик по кнопке
    feedbackFormInputs.forEach(({ feedbackInput, feedbackErrorMessage }) => {
      mainFeedbackFormValidate(feedbackInput, feedbackErrorMessage); // прогоняю через forEach массив объектов feedbackFormInputs
    });
  });

  function mainFeedbackFormValidate(input) {
    // ф-ция проверяет заполненность input и необходимость его заполнения
    if (input.hasAttribute("required") && input.value.trim() === "") {
      errorMessage.classList.add("feedback-form__error-message_block");
    } else {
      errorMessage.classList.remove("feedback-form__error-message_block");
    }
  }
});
