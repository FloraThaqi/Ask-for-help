const button = document.getElementById("dark-mode");
const htmlTag = document.documentElement;

function darkMode() {
  htmlTag.classList.toggle("dark");
}
button.addEventListener("click", darkMode);

const buttonValue = button.innerText;
console.log(buttonValue);

if (buttonValue == 1 || buttonValue == true) {
  darkMode();
} else {
}
