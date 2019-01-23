



function store() {
  if(typeof localStorage != "undefined") {
    var item = localStorage.getItem("commande");
  }
}



function setItem($item, $value){
  sessionStorage.setItem("$item", "$value");
}

function getItem($item) {
  sessionStorage.getItem("$item");
}


function removeItem($item) {
  sessionStorage.removeItem("$item");
}


function storgeClear() {
  sessionStorage.clear();
}


<script>



</script>
