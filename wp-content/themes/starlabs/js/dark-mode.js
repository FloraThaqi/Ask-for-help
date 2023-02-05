const button = document.getElementById("dark-mode");
const bodyColor = document.querySelector("body");
const navBar = document.querySelector("nav");
const aText = document.querySelectorAll("a");
const footerColor = document.querySelector("footer");
const cardsModule = document.getElementById("cards-module");
const cardsTitle = cardsModule.querySelector("h1");
const cards = cardsModule.querySelector("div");
const cardsIndividual = cards.querySelectorAll("div");
/*const tabsColor = document.getElementById("tabs-id");
const tabsTitle = document.querySelectorAll("#list-item");
const tabsDescriptions = document.getElementsByClassName("tab-content");*/

function darkMode() {
  button.classList.toggle("translate-x-full");
  bodyColor.classList.toggle("bg-gray-100");
  bodyColor.classList.toggle("bg-gray-700");
  navBar.classList.toggle("bg-white");
  navBar.classList.toggle("bg-black");
  for (let i = 0; i < aText.length; i++) {
    aText[i].classList.toggle("text-black");
  }
  for (let i = 0; i < aText.length; i++) {
    aText[i].classList.toggle("text-white");
  }
  footerColor.classList.toggle("bg-slate-200");
  footerColor.classList.toggle("bg-black");
  cardsTitle.classList.toggle("text-white");
  for (let i = 0; i < cardsIndividual.length; i++) {
    cardsIndividual[i].classList.toggle("bg-white");
  }
  for (let i = 0; i < cardsIndividual.length; i++) {
    cardsIndividual[i].classList.toggle("bg-black");
  }
  /*tabsColor.classList.toggle("bg-white");
  tabsColor.classList.toggle("bg-black");
  for (let i = 0; i < tabsTitle.length; i++) {
    tabsTitle[i].classList.toggle("text-black");
  }
  for (let i = 0; i < tabsTitle.length; i++) {
    tabsTitle[i].classList.toggle("text-white");
  }
  for (let i = 0; i < tabsTitle.length; i++) {
    tabsTitle[i].classList.toggle("text-gray-600");
  }
  for (let i = 0; i < tabIndividual.length; i++) {
    tabIndividual[i].classList.toggle("text-gray-600");
  }
  for (let i = 0; i < tabIndividual.length; i++) {
    tabIndividual[i].classList.toggle("text-white");
  }*/
}

button.addEventListener("click", darkMode);
