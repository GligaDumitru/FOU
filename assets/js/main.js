const toggleFolder = (folder, id) => {
  let element = document.getElementsByClassName(folder)[0];
  element.style.display = element.style.display == "block" ? "none" : "block";
  let arrow = document.getElementById(id);
  if (arrow.classList.contains("fa-caret-down")) {
    arrow.classList.remove("fa-caret-down");
    arrow.classList.add("fa-caret-right");
  } else {
    arrow.classList.remove("fa-caret-right");
    arrow.classList.add("fa-caret-down");
  }
};

const getVariablesFromUrl = () => {
  let arrayOfVars = {};
  let searchUrl = window.location.search.substring(1);
  if (searchUrl !== "") {
    let vars = searchUrl.split("&");
    for (let i = 0; i < vars.length; i++) {
      let el = vars[i].split("=");
      arrayOfVars[el[0]] = decodeURIComponent(el[1]);
    }
  }

  return arrayOfVars;
};

var input2 = document.querySelector("textarea[name=tagsFile]");

tagify2 = new Tagify(input2);

const searchFiles = str => {
  let val = document.getElementById(str).value;
  val &&
    location.replace(
      window.location.origin + window.location.pathname + "?q=" + val
    );
};

// column from DB, type ? 'ASC' : 'DESC'
const addFilter = (fileBy, column, type = "ASC") => {
  Object.prototype.isEmpty = function() {
    for (var key in this) {
      if (this.hasOwnProperty(key)) return false;
    }
    return true;
  };

  let pageTogo = "";
  let done = false;
  arrayOfVars = getVariablesFromUrl();
  console.log(arrayOfVars, arrayOfVars.isEmpty());
  // if there are some filters already applied
  if (!arrayOfVars.isEmpty()) {
    console.log("am intart");
    for (let el in arrayOfVars) {
      if (el === fileBy) {
        done = true;
        el = fileBy;
        arrayOfVars[el] = column + "_" + type;
        if (arrayOfVars.hasOwnProperty(el)) {
          if (pageTogo === "") {
            pageTogo = pageTogo + "?" + el + "=" + arrayOfVars[el];
          } else {
            pageTogo = pageTogo + "&" + el + "=" + arrayOfVars[el];
          }
        }
      } else {
        if (arrayOfVars.hasOwnProperty(el)) {
          if (pageTogo === "") {
            pageTogo = pageTogo + "?" + el + "=" + arrayOfVars[el];
          } else {
            pageTogo = pageTogo + "&" + el + "=" + arrayOfVars[el];
          }
        }
      }
    }

    if (done === false) {
      pageTogo = pageTogo + "&" + fileBy + "=" + column + "_" + type;
    }
  } else {
    // there are no filters
    pageTogo =
      type !== ""
        ? "?" + fileBy + "=" + column + "_" + type
        : "?" + fileBy + "=" + column;
  }

  location.replace(
    window.location.origin + window.location.pathname + pageTogo
  );
};
