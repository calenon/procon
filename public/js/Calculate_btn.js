// whenever the button "Convert" is pressed
$('#button_go').click(function(){
  // Store the values of select/text inputs to the following variables
  var currency_from = $( "#Select_From" ).val();
  var currency_to = $( "#Select_To" ).val();
  var currency_amount = $( "#input_Value" ).val();
  //if all the available inputs are properly filled
  if(currency_from!=null && currency_to!=null && currency_amount!=""){
    //perform an AJAX POST request to the appropriate controller in order to get the converted amount
    $.ajax({
      type: "POST",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/calculate/Exchange",
      //The request contains: the base currency, the target currency and the base currency amount that user selected/typed
      data:{
        currency_from: currency_from,
        currency_to: currency_to,
        currency_amount:currency_amount
      },
      //the converted amount is assigned at the "output" field
      success: function(result) {$("#output_Value").val(result); }
    });
  }else{
    alert("You must fill all fields")
  }
});
