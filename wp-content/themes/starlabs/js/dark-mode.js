const button = document.getElementById("dark-mode");
const bodyColor = document.querySelector("body");
const navBar = document.querySelector("nav");
const aText = document.querySelectorAll("a");
const footerColor = document.querySelector("footer");
const cardsModule = document.getElementById("cards-module");
const cardsTitle = cardsModule.querySelector("h1");
const cards = cardsModule.querySelector("div");
const cardsIndividual = cards.querySelectorAll("div");
const tabsColor = document.getElementById("tabs-id");
const tabsTitle = document.querySelectorAll("#list-item");
const tabsDescriptions = document.querySelector(".tab-content");
const tabsIndividual = tabsDescriptions.querySelectorAll("p");
const keyFeaturesModule = document.getElementById("key-features");
const keyFeaturesTitle = keyFeaturesModule.querySelector("h1");
const offerModuleColor = document.getElementById("offer-module");
const userReactionsModule = document.getElementById("user-reactions");
const userTitle = userReactionsModule.querySelector("h2");
const userCard = document.querySelectorAll("#user-card");
const userName = document.querySelectorAll("#user-name");
const contactFormColor = document.querySelector("#contact-form");
const innerContactFormColor = contactFormColor.querySelector("div");
const teamLayoutColor = document.getElementById("team-layout");
const teamLayoutTitle = teamLayoutColor.querySelector("h1");
const teamLayoutCards = teamLayoutColor.querySelector("div");
const teamCard = teamLayoutCards.querySelectorAll("div");

function darkMode() {
  button.classList.toggle("translate-x-full");
  bodyColor.classList.toggle("bg-gray-100");
  bodyColor.classList.toggle("bg-gray-500");
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
  tabsColor.classList.toggle("bg-white");
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
  for (let i = 0; i < tabsIndividual.length; i++) {
    tabsIndividual[i].classList.toggle("text-gray-600");
  }
  for (let i = 0; i < tabsIndividual.length; i++) {
    tabsIndividual[i].classList.toggle("text-white");
  }
  keyFeaturesTitle.classList.toggle("text-white");
  offerModuleColor.classList.toggle("bg-[#4767c9]");
  offerModuleColor.classList.toggle("bg-black");
  userTitle.classList.toggle("text-white");
  for (let i = 0; i < userCard.length; i++) {
    userCard[i].classList.toggle("bg-white");
  }
  for (let i = 0; i < userCard.length; i++) {
    userCard[i].classList.toggle("bg-black");
  }
  for (let i = 0; i < userName.length; i++) {
    userName[i].classList.toggle("text-white");
  }
  contactFormColor.classList.toggle("bg-split-white-blue");
  contactFormColor.classList.toggle("bg-black");
  innerContactFormColor.classList.toggle("bg-[#ffffff]");
  innerContactFormColor.classList.toggle("bg-gray-500");
  teamLayoutColor.classList.toggle("bg-[#F2F2F2]");
  teamLayoutColor.classList.toggle("bg-gray-500");
  teamLayoutTitle.classList.toggle("text-black");
  teamLayoutTitle.classList.toggle("text-white");
  for (let i = 0; i < teamCard.length; i++) {
    teamCard[i].classList.toggle("bg-white");
  }
  for (let i = 0; i < teamCard.length; i++) {
    teamCard[i].classList.toggle("bg-black");
  }
}

button.addEventListener("click", darkMode);
console.log(userCard);
