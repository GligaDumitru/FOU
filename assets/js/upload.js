var dragAndDropEnable = function() {
  var div = document.createElement("div");
  return (
    ("draggable" in div || ("ondragstart" in div && "ondrop" in div)) &&
    "FormData" in window &&
    "FileReader" in window
  );
};

if (dragAndDropEnable) {
  console.log("it is ok to drag and drop");
} else {
  document.getElementById("optionToDragAndDrop").style.display = "none";
}

document.getElementById("file") && document.getElementById("file").add;
// document.getElementByID('fileInputId');
document.getElementById("file") &&
  document.getElementById("file").addEventListener("click", () => {
    console.log(document.getElementById("file").value);
  });

document.getElementById("submitFile").disabled = true;
console.log();

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

const copyLink = () => {
  const el = document.getElementById("linkToCopy").innerHTML;
  const span = document.getElementById("copyLinkForDownload");
  copyToClipboard(el);
  span.innerHTML = "Link copied(CTRL + V to use it)";
  span.className += " linkCopied";
};

const closeContainer = container => {
  document.getElementsByClassName(container)[0].style.display = "none";
};

const redirectToPage = page => {
  console.log('redirectToPage');
  location.replace("http://localhost/FOU/" + page);
};
