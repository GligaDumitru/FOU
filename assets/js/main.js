const toggleFolder = (folder,id) => {
  let element = document.getElementsByClassName(folder)[0];
  element.style.display = element.style.display == "block" ? "none" : "block";
  let arrow = document.getElementById(id);
  if(arrow.classList.contains('fa-caret-down')){
      arrow.classList.remove('fa-caret-down');
      arrow.classList.add('fa-caret-right');
  }else{
    arrow.classList.remove('fa-caret-right');
    arrow.classList.add('fa-caret-down');
  }
};
