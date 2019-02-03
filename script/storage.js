function check_panier() {
  if(localStorage.getItem("panier")==null){
    var arr = [];
    localStorage.setItem("panier", JSON.stringify(arr));
  }
}

function addToPanier(value){
  check_panier();
  var today = new Date();
  var delay = today.getTime()+3600000;
  var date = localStorage.getItem("date");
  if(date<delay){
    var panier = JSON.parse(localStorage.getItem("panier"));

    console.log(panier);
    panier[panier.length]=value;
    console.log(panier);
    setPanier(panier);
    displayPanierNav();
  }else{
    clearPanier();
  }
}

function setPanier(value){
  var pan = JSON.stringify(value);
  localStorage.setItem("panier", pan);
  var today = new Date();
  localStorage.setItem("date", today.getTime());
}

function getPanier() {
  check_panier();
  var today = new Date();
  var delay = today.getTime()+3600000;
  var date = localStorage.getItem("date");
  if(date<delay){
    var pan=JSON.parse(localStorage.getItem("panier"));
    return pan;
  }else{
    clearPanier();
  }
}

function clearPanier($item) {
  localStorage.removeItem("panier");
  localStorage.removeItem("date");
}

function storageClear() {
  localStorage.clear();
}