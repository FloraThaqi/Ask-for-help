const button = document.getElementById("dark-mode");
const bodyColor = document.querySelector("body");
const navBar = document.querySelector("nav");
const aText = document.querySelectorAll("a");
const footerColor = document.querySelector("footer");
const cardsModule = document.getElementById("cards-module");
let cardsTitle;
let cards;
if (cardsModule !== null && cardsModule !== undefined) {
  cardsTitle = cardsModule.querySelector("h1");
  cards = cardsModule.querySelector("div");
}
let cardsIndividual;
if (cards !== null && cards !== undefined) {
  cardsIndividual = cards.querySelectorAll("div");
}
const tabsColor = document.getElementById("tabs-id");
const tabsTitle = document.querySelectorAll("#list-item");
const tabsDescriptions = document.querySelector(".tab-content");
let tabsIndividual;
if (tabsDescriptions !== null && tabsDescriptions !== undefined) {
  tabsIndividual = tabsDescriptions.querySelectorAll("p");
}
const keyFeaturesModule = document.getElementById("key-features");
let keyFeaturesTitle;
if (keyFeaturesModule !== null && keyFeaturesModule !== undefined) {
  keyFeaturesTitle = keyFeaturesModule.querySelector("h1");
}
const offerModuleColor = document.getElementById("offer-module");
const userReactionsModule = document.getElementById("user-reactions");
let userTitle;
if (userReactionsModule !== null && userReactionsModule !== undefined) {
  userTitle = userReactionsModule.querySelector("h2");
}
const userCard = document.querySelectorAll("#user-card");
const userName = document.querySelectorAll("#user-name");
const contactFormColor = document.querySelector("#contact-form");
let innerContactFormColor;
if (contactFormColor !== null && contactFormColor !== undefined) {
  innerContactFormColor = contactFormColor.querySelector("div");
}
const teamLayoutColor = document.getElementById("team-layout");
let teamLayoutTitle;
let teamLayoutCards;
if (teamLayoutColor !== null && teamLayoutColor !== undefined) {
  teamLayoutTitle = teamLayoutColor.querySelector("h1");
  teamLayoutCards = teamLayoutColor.querySelector("div");
}
let teamCard;
if (teamLayoutCards !== null && teamLayoutCards !== undefined) {
  teamCard = teamLayoutCards.querySelectorAll("div");
}

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
