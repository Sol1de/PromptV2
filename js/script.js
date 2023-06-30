//sidenav
function toggleNav(){
  
  var sidenav = document.getElementById("mySidenav");
  var main = document.getElementById("main");
  
  if (sidenav.style.width === "250px") {
    sidenav.style.width = "0";
    main.style.marginLeft = "0"; 
  } 

  if (sidenav.style.width === "150px") {
    sidenav.style.width = "0";
    main.style.marginLeft = "0";
  }
  
  else {
    if (window.matchMedia("(max-width: 450px)").matches) {
      sidenav.style.width = "150px";
      main.style.marginLeft = "150px";
    }
    else {
      sidenav.style.width = "250px";
      main.style.marginLeft = "250px";
    }
  }

}


//bouton modal
function openModal() {
  var modal = document.getElementById("modal");
  modal.style.display = "block";
}

function closeModal() {
  var modal = document.getElementById("modal");
  modal.style.display = "none";
}

window.onclick = function (event) {
  var modal = document.getElementById("modal");
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

//popup de non connexion
function no_connexion() {

  console.log("no connexion");
  var div1 = document.getElementById("no-connexion");
  var div2 = document.getElementById("no-connexion-container");

  if ((div1.style.display == "none" || div1.style.display == "") && (div2.style.display == "none" || div2.style.display == "")) {
        div1.style.display = "flex";
        div2.style.display = "flex";
}

}

no_connexion()

//affiche uniquement les posts lié au tag selectionné
function filter_tag(tag) {
  console.log(tag);
  var x = document.getElementsByClassName("post");
  var i;
  for (i = 0; i < x.length; i++) {
    if (x[i].classList.contains(tag)) {
      x[i].style.display = "block";
    } else {
      x[i].style.display = "none";
    }
  }
}

//fenetre de confirmation de suppression de post
function confirm_supp() {
  var answer = confirm("Confirmer la suppression du post ?");
  if (answer == true) {
      alert("Vous avez cliqué sur OK");
      document.querySelector(".form").action = "delete.php";
  } else {
      document.querySelector(".form").action = "";
      exit();
  }
}