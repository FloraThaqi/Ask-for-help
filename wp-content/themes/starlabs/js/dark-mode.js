const button = document.getElementById("dark-mode");

function darkMode() {
  //permanent elements dark mode

  const bodyColor = document.querySelector("body");
  const navBar = document.querySelector("nav");
  const aText = document.querySelectorAll("a");
  const footerColor = document.querySelector("footer");

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

  //cards module

  const cardsModule = document.getElementById("cards-module");
  let cardsTitle;
  let cards;
  if (cardsModule !== null && cardsModule !== undefined) {
    cardsTitle = cardsModule.querySelector("h1");
    cards = cardsModule.querySelector("div");
    cardsTitle.classList.toggle("text-white");
  }
  let cardsIndividual;
  if (cards !== null && cards !== undefined) {
    cardsIndividual = cards.querySelectorAll("div");
    for (let i = 0; i < cardsIndividual.length; i++) {
      cardsIndividual[i].classList.toggle("bg-white");
    }
    for (let i = 0; i < cardsIndividual.length; i++) {
      cardsIndividual[i].classList.toggle("bg-black");
    }
  }

  //tabs module

  const tabsColor = document.getElementById("tabs-id");
  if (tabsColor !== null && tabsColor !== undefined) {
    tabsColor.classList.toggle("bg-white");
    tabsColor.classList.toggle("bg-black");
  }
  const tabsTitle = document.querySelectorAll("#list-item");
  const tabsDescriptions = document.querySelector(".tab-content");
  let tabsIndividual;
  if (tabsDescriptions !== null && tabsDescriptions !== undefined) {
    tabsIndividual = tabsDescriptions.querySelectorAll("p");
    for (let i = 0; i < tabsIndividual.length; i++) {
      tabsIndividual[i].classList.toggle("text-gray-600");
    }
    for (let i = 0; i < tabsIndividual.length; i++) {
      tabsIndividual[i].classList.toggle("text-white");
    }
  }

  for (let i = 0; i < tabsTitle.length; i++) {
    tabsTitle[i].classList.toggle("text-black");
  }
  for (let i = 0; i < tabsTitle.length; i++) {
    tabsTitle[i].classList.toggle("text-white");
  }
  for (let i = 0; i < tabsTitle.length; i++) {
    tabsTitle[i].classList.toggle("text-gray-600");
  }

  //key features

  const keyFeaturesModule = document.getElementById("key-features");
  let keyFeaturesTitle;
  if (keyFeaturesModule !== null && keyFeaturesModule !== undefined) {
    keyFeaturesTitle = keyFeaturesModule.querySelector("h1");
    keyFeaturesTitle.classList.toggle("text-white");
  }

  //offer module

  const offerModuleColor = document.getElementById("offer-module");
  if (offerModuleColor !== null && offerModuleColor !== undefined) {
    offerModuleColor.classList.toggle("bg-[#4767c9]");
    offerModuleColor.classList.toggle("bg-black");
  }

  //user reactions

  const userReactionsModule = document.getElementById("user-reactions");
  let userTitle;
  if (userReactionsModule !== null && userReactionsModule !== undefined) {
    userTitle = userReactionsModule.querySelector("h2");
    userTitle.classList.toggle("text-white");
  }
  const userCard = document.querySelectorAll("#user-card");
  const userName = document.querySelectorAll("#user-name");

  for (let i = 0; i < userCard.length; i++) {
    userCard[i].classList.toggle("bg-white");
  }
  for (let i = 0; i < userCard.length; i++) {
    userCard[i].classList.toggle("bg-black");
  }
  for (let i = 0; i < userName.length; i++) {
    userName[i].classList.toggle("text-white");
  }

  //contact form

  const contactFormColor = document.querySelector("#contact-form");
  let innerContactFormColor;
  if (contactFormColor !== null && contactFormColor !== undefined) {
    innerContactFormColor = contactFormColor.querySelector("div");
    contactFormColor.classList.toggle("bg-split-white-blue");
    contactFormColor.classList.toggle("bg-black");
    innerContactFormColor.classList.toggle("bg-[#ffffff]");
    innerContactFormColor.classList.toggle("bg-gray-500");
  }

  //team layout

  const teamLayoutColor = document.getElementById("team-layout");
  let teamLayoutTitle;
  let teamLayoutCards;
  if (teamLayoutColor !== null && teamLayoutColor !== undefined) {
    teamLayoutTitle = teamLayoutColor.querySelector("h1");
    teamLayoutCards = teamLayoutColor.querySelector("div");
    teamLayoutColor.classList.toggle("bg-[#F2F2F2]");
    teamLayoutColor.classList.toggle("bg-gray-500");
    teamLayoutTitle.classList.toggle("text-black");
    teamLayoutTitle.classList.toggle("text-white");
  }
  let teamCard;
  if (teamLayoutCards !== null && teamLayoutCards !== undefined) {
    teamCard = teamLayoutCards.querySelectorAll(".container");
    for (let i = 0; i < teamCard.length; i++) {
      teamCard[i].classList.toggle("bg-white");
    }
    for (let i = 0; i < teamCard.length; i++) {
      teamCard[i].classList.toggle("bg-black");
    }
  }

  //login page dark mode
  const loginPage = document.getElementById("login-page");
  let loginContainer;
  if (loginPage !== null && loginPage !== undefined) {
    loginInnerDiv = loginPage.firstElementChild;
    loginContainer = loginInnerDiv.firstElementChild;
    loginContainer.classList.toggle("bg-white");
    loginContainer.classList.toggle("bg-black");
    loginContainer.classList.toggle("text-black");
    loginContainer.classList.toggle("text-white");
    let loginText = loginPage.querySelectorAll(".text-sm");
    for (let i = 0; i < loginText.length; i++) {
      loginText[i].classList.toggle("text-gray-700");
      loginText[i].classList.toggle("text-gray-200");
    }
    
  }
  
  //register page dark mode
  const registerPage = document.getElementById("register-page");
  let registerContainer;
  if (registerPage !== null && registerPage !== undefined) {
    registerInnerDiv = registerPage.firstElementChild
    registerContainer = registerInnerDiv.firstElementChild;
    registerContainer.classList.toggle("bg-white");
    registerContainer.classList.toggle("bg-black");
    registerContainer.classList.toggle("text-black");
    registerContainer.classList.toggle("text-white");
    let registerText = registerPage.querySelectorAll(".text-sm");
    for (let i = 0; i < registerText.length; i++) {
      registerText[i].classList.toggle("text-gray-700");
      registerText[i].classList.toggle("text-gray-200");
    }
  }
}

button.addEventListener("click", darkMode);
console.log(loginPage);
