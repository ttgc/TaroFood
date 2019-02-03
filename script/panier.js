function create_panier() {
  if(localStorage.getItem("panier")==null){
    var arr = [];
    localStorage.setItem("panier", JSON.stringify(arr));
    localStorage.setItem("date", new Date());
  }
}

function addToPanier(value){
  create_panier();
  var today = new Date();
  var delay = today.getTime()+3600000;
  var date = localStorage.getItem("date");
  if(date<delay){
    var panier = JSON.parse(localStorage.getItem("panier"));
    panier[panier.length]=value;
    setPanier(panier);
  }else{
    clearPanier();
    addToPanier(value);
  }
}

function delFromPanier(value){
  create_panier();
  var today = new Date();
  var delay = today.getTime()+3600000;
  var date = localStorage.getItem("date");
  if(date<delay){
    var panier = JSON.parse(localStorage.getItem("panier"));
    panier.splice($.inArray(value,panier),1);
    setPanier(panier);
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

function getPanier(){
  create_panier();
  var today = new Date();
  var delay = today.getTime()+3600000;
  var date = localStorage.getItem("date");
  if(date<delay){
    var pan=JSON.parse(localStorage.getItem("panier"));
    return pan;
  }else{
    clearPanier();
    getPanier();
  }
}

function clearPanier(){
  localStorage.removeItem("panier");
  localStorage.removeItem("date");
  create_panier();
}

function storageClear(){
  localStorage.clear();
}

function display_panier(){
  var pan = getPanier();
  $.post("includes/panierContent.php",
  {
      panier : pan
  },
  function(data,status){
      $("#panierContent").html(data);
  });
}

function supprPanier(id){
      delFromPanier(id);
      display_panier();
      displayPanierNumber();
}

function displayPanierNumber(){
  var panier = getPanier();
  $("#panierItemNumber").html(panier.length);
}