function alertError(name = "") {
  const alert_error = document.getElementById("alert-error");
  const error = document.getElementById("error");
  alert_error.classList.add("alert");
  error.innerHTML = name;
  setTimeout(() => {
    alert_error.classList.remove("alert");
  }, 4000);
}

function alertSuccess(name = "") {
  const alert_success = document.getElementById("alert-success");
  const success = document.getElementById("success");
  alert_success.classList.add("alert");
  success.innerHTML = name;
  setTimeout(() => {
    alert_success.classList.remove("alert");
  }, 4000);
}

// modal function
function modal(modaltrigger, modalopen, modalclose) {
  modaltrigger.addEventListener("click", function () {
    modalopen.classList.add("active");
  });
  modalclose.addEventListener("click", function () {
    modalopen.classList.remove("active");
  });
}

function modalClose(ModalCloseBtn) {
  ModalCloseBtn.classList.remove("active");
}

// Disabled Button
function disabledBtn(giveElementId, htmlValue = "", setAtt = "") {
  giveElementId.innerHTML = htmlValue;
  if (!setAtt) {
    giveElementId.removeAttribute("disabled", "disabled");
  } else {
    giveElementId.setAttribute("disabled", "disabled");
  }
}

// Element Get with Document
function select(elementName) {
  return document.querySelector(elementName);
}

// <!-- Handle Tabs Container -->
const tabButton = document.querySelectorAll(".buttonContainer button");
const tabPanel = document.querySelectorAll(".panelContainer .tabPanel");

function showPanel(panelIndex, colorCode) {
  try {
    tabButton.forEach((node) => {
      node.classList.remove("active");
    });
    tabButton[panelIndex].classList.add("active");

    tabPanel.forEach((node) => {
      node.style.display = "none";
    });
    tabPanel[panelIndex].style.backgroundColor = colorCode;
    tabPanel[panelIndex].style.display = "block";
  } catch (error) {}
}
showPanel(0);
