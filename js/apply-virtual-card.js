let digit = document.querySelectorAll('.digit');

digit.forEach((e, key) => {
  e.addEventListener("input", () => {
    // Limit input to one character only
    if (e.value.length > 1) {
      e.value = e.value.slice(0, 1);
    }
    // Move focus to next input if exists
    if (e.value.length === 1 && key + 1 < digit.length) {
      digit[key + 1].focus();
    }
});
});
