$("#submit").click(function(e) {
  $("#alert").hide();
  if ($("#pwd").val() != $("#confirm-pwd").val()) {
    e.preventDefault();
    $("#alert").show();
  }
});
