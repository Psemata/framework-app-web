function showForm() {
  const display = document.getElementById("changeTask").style.display;
  document.getElementById("removeTask").style.display = "none";
  if(display == "none"){
    document.getElementById("changeTask").style.display = "inline";
  }else if(display == "inline"){
    document.getElementById("changeTask").style.display = "none";
  }
}

function deleteTask() {
  document.getElementById("changeTask").style.display = "none";
  document.getElementById("removeTask").style.display = "inline";
}

function dontDelete() {
    document.getElementById("removeTask").style.display = "none";
}
