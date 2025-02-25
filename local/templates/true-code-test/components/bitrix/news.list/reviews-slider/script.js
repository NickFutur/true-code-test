BX.ready(function () {
  // reviews
  const reviewsSlider = new Swiper("#js-reviews-slider", {
    direction: "vertical",
    loop: true,
    autoplay: false,
    slidesPerView: 2,
    spaceBetween: 30,
    slidesPerGroup: 2,
    navigation: {
      nextEl: ".reviews-slider__pagination .reviews-slider__pagination-next",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 0,
      },
      290: {
        slidesPerView: 2,
        slidesPerView: 2,
        slidesPerGroup: 2,
        spaceBetween: 35,
      },
      651: {
        slidesPerView: 2,
        slidesPerView: 2,
        slidesPerGroup: 2,
        spaceBetween: 30,
      },
    },
  });
  const reviewsSiderSlide = document.querySelectorAll(".reviews-slider__slide");
  const reviewsSiderSlideArr = Array.from(reviewsSiderSlide);
  const reviewsSlidesEven = [];
  const reviewsSlidesOdd = [];
  reviewsSiderSlideArr.forEach((slide, index) => {
    if (index % 2 === 0) {
      reviewsSlidesEven.push(slide);
    } else {
      reviewsSlidesOdd.push(slide);
    }
  });

  reviewsSlidesEven.forEach((slide) => {
    slide.classList.add("reviews-slider__slide_even");
  });

  reviewsSlidesOdd.forEach((slide) => {
    slide.classList.add("reviews-slider__slide_odd");
  });
});
