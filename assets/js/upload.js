document.getElementById("main-header").classList.add("hide");
document.getElementById("loader").classList.add("show");
window.onload = () => {
  document.getElementById("loader").classList.remove("show");
  document.getElementById("main-header").classList.remove("hide");
  emailForUser();
};

const getEmailForUser = _ => {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("userEmail").innerHTML = this.responseText;
    }
  };
  xmlhttp.open(
    "GET",
    "http://localhost:8080/FOU/views/pages/viewEmail.php",
    true
  );
  xmlhttp.send();
};

const emailForUser = _ => {
  getEmailForUser();
};
var dragAndDropEnable = function() {
  var div = document.createElement("div");
  return (
    ("draggable" in div || ("ondragstart" in div && "ondrop" in div)) &&
    "FormData" in window &&
    "FileReader" in window
  );
};

if (dragAndDropEnable) {
} else {
  document.getElementById("optionToDragAndDrop").style.display = "none";
}

document.getElementById("file") && document.getElementById("file").add;
// document.getElementByID('fileInputId');
document.getElementById("file") &&
  document.getElementById("file").addEventListener("click", () => {});
if (document.getElementById("submitFile"))
  document.getElementById("submitFile").disabled = true;

const handleChangeInput = event => {
  let value = event.target.value;
  let elementSpan = document.getElementById("fileForUpload");
  let inputFile = document.getElementById("file");
  let labelForInput = inputFile.labels[0];
  let selectFileMsg = document.getElementById("");
  if (value) {
    document.getElementById("submitFile").disabled = false;
    elementSpan.innerHTML = value.slice(
      value.lastIndexOf("\\") + 1,
      value.length
    );
    labelForInput.innerText = "Choose ANOTHER file";
  }
};
const copyToClipboard = str => {
  const el = document.createElement("textarea");
  el.value = str;
  document.body.appendChild(el);
  el.select();
  document.execCommand("copy");
  document.body.removeChild(el);
};

const copyToClipboardOnClick = linkToCopy => {
  while (linkToCopy.indexOf("amp;") !== -1) {
    linkToCopy = linkToCopy.replace("amp;", "");
  }
  console.log("el here:", linkToCopy);
  const elementToBeCreated = document.createElement("input");
  elementToBeCreated.value = linkToCopy;
  document.body.appendChild(elementToBeCreated);
  elementToBeCreated.select();
  document.execCommand("copy");
  document.body.removeChild(elementToBeCreated);
};

const copyLink = () => {
  const el = document.getElementById("linkToCopy").innerHTML;

  const span = document.getElementById("copyLinkForDownload");
  copyToClipboardOnClick(el);
  span.innerHTML = "Link copied(CTRL + V to use it)";
  span.className += " linkCopied";
};
const closeContainer = container => {
  document.getElementsByClassName(container)[0].style.display = "none";
  window.location.replace(
    "http://localhost:8080/FOU/views/pages/dashboard.php"
  );
};

// document.getElementById("linkForDownloadTheFileDirect") &&
//   document
//     .getElementById("linkForDownloadTheFileDirect")
//     .addEventListener("click"),
//   () => {
//     console.log("a intart aiic ");
//     redirectToPage("?message=thankyou");
//   };

// document.getElementById("linkForDownloadTheFileDirect") &&
// document.getElementById("linkForDownloadTheFileDirect").onclick = () => {
//   console.log("a intart aiic ");
//   redirectToPage("?message=thankyou");
// }

const redirectToPage = page => {
  location.replace(window.location.origin + window.location.pathname + page);
};
