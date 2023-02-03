
window.addEventListener("load", showActiveName);
window.addEventListener("load", showActiveDesc);

//This function gets the ID of the first Tab Description Div and removes class 'hidden' from it
function showActiveName() {
  let tabContent = document.querySelector(".tab-content");
  if (tabContent) {
    let firstElement = tabContent.firstElementChild;
    firstElement.classList.remove("hidden");
  }
}

//This function adds text color and background color to the first Tab name which is active on load
function showActiveDesc() {
  let element = document.querySelector("#list-item");
  if (element) {
    element.classList.add("bg-[#4767c9]");
    element.classList.add("text-white");
    element.classList.remove("text-gray-600");
    element.classList.remove("bg-white");
  }
}

//This function changes the tab description based on which Tab Name we click
function changeActiveTab(event, tabID) {
  let element = event.target;
  ulElement = element.parentNode.parentNode;
  aElements = ulElement.querySelectorAll("li > a");
  tabContents = document
    .getElementById("tabs-id")
    .querySelectorAll(".tab-content > div");
  for (let i = 0; i < aElements.length; i++) {
    aElements[i].classList.remove("text-white");
    aElements[i].classList.remove("bg-[#4767c9]");
    aElements[i].classList.add("text-gray-600");
    aElements[i].classList.add("bg-white");
    tabContents[i].classList.add("hidden");
    tabContents[i].classList.remove("block");
  }
  element.classList.remove("text-gray-600");
  element.classList.remove("bg-white");
  element.classList.add("text-white");
  element.classList.add("bg-[#4767c9]");
  document.getElementById(tabID).classList.remove("hidden");
  document.getElementById(tabID).classList.add("block");
}




// Mark an answer as correct
function markAsCorrect(comment_id) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", ajax_object.ajax_url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      document.getElementById("iscorrect" + comment_id).innerHTML = "Correct";
    }
  };
  xhr.send("action=mark_as_correct&comment_id=" + comment_id);
}

// add the onclick event handler to the button
document.getElementById("iscorrect" + comment_id).onclick = function () {
  markAsCorrect(comment_id);
};
