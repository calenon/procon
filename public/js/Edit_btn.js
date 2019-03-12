/*the button state is alternating between "Edit" and "Save" mode*/

//whenever the button "edit" is pressed
$('#button_edit').click(function(){
  var all_good=true;
  //if the button value is "Edit"
  if( $(this).val()=='Edit'){
     //if at least one checkbox is "checked"
     if($("input:checked" ).length>0){
       //change the button color to Green
       $(this).css("background-color","#3CB371");
       //change the button value to "save"
       $(this).prop('value', 'Save');
       //disable all the available checkboxes
       $('.checkbox').attr('disabled', 'true');
       $('.checkbox').each(function(){
         if($(this).is(':checked')){
           //provide write permission for the selected items (the deafault is readonly)
           $("."+this.id+"class").prop('readonly', false);
           //change the outline color of the selected items to green
           $("."+this.id+"class").css("border", "2px solid 	#3CB371");
         }
       });
     }else{
       alert("You must select at least 1 item");
     }
  }
  //if the button value is "Save"
  else{
    $('.checkbox').each(function(){
      // for every "selected/checked" item
      if($('#'+this.id).is(':checked')){
            //Store the values of the text inputs to the following variables
            var Updated_currency_from = $( "#"+this.id+"currencyFrom").val();
            var Updated_currency_to = $("#"+this.id+"currencyTo" ).val();
            var Updated_ratio_amount = $("#"+this.id+"ratio").val();
            //if all the available are properly filled
            if(Updated_currency_from!="" && Updated_currency_to!="" && Updated_ratio_amount!=""){
                /*Perform an AJAX POST request to the appropriate controller
                 in order to update the selected items into the DB*/
                $.ajax({
                    type: "POST",
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/Crud/Update",
                    //The request contains: the updated base currency, the updated target currency and the updated ratio
                    data:{
                      id:this.id,
                      currency_from_new: Updated_currency_from,
                      currency_to_new: Updated_currency_to,
                      currency_ratio_new:Updated_ratio_amount
                    },
                    success: function(result) {
                      if(result==false){
                         console.log("The Update failed OR there was nothing to Update");
                      }
                    }
                 });
            //the outline color of the selected items is restored to the default value
            $('.'+this.id+"class").each(function(){
                 $(this).prop('readonly', true);
                 $(this).css("border","");
            });
           }else{
              alert("You must fill all fields");
              all_good=false;
           }
      }
  });
  //when the procedure is done the button value is restored to "edit" + the button color is restored to the default value + the checkboxes are enebled
  if(all_good==true){
    $(this).prop('value', 'Edit');
    $(this).css("background-color","");
    $('.checkbox').removeAttr( "disabled" ).prop('checked', false);
  }
 }

});
