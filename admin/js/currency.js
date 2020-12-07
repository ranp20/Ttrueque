$("#price-eeuu").keyup(function () {
  var soles = parseFloat($(this).val()) * 3.57;
  //   console.log("soles");
  $("#price-s").val(soles.toFixed(2));
});

$("#price-eeuu").keyup(function () {
  var mxn = parseFloat($(this).val()) * 22.41;
  $("#price-mxn").val(mxn.toFixed(2));
});
