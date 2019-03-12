//when the user selects an option from the "base currency" selectbox
$('#Select_From').on('change', function() {
  $("#Select_To").empty();
  //The "target currency" selectbox is filled with the available convertible currencies options (based on the base currency option)
  $("#Select_To").append(new Option("target currency",""));
  $("option[value='']").attr("disabled", "disabled");
  for(var i=0; i<currencies.length; i++){
     /*e.g. by appending the option for the conversion from "Euro" => to "US Dollar" with ratio (1.3764),
      we have to append as well the option for the conversion from "US Dollar" => to "Euro" with ration (1/1.3764)*/
     if(this.value == currencies[i].currencyFrom){
       $("#Select_To").append(new Option(currencies[i].currencyTo));
     }
     if(this.value == currencies[i].currencyTo){
       $("#Select_To").append(new Option(currencies[i].currencyFrom));
     }
   }
});
