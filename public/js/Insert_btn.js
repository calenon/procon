//whenever the button "insert" is pressed
$('#button_Insert').click(function(){
  //Store the values of the text inputs to the following variables
  var New_currencyFrom = $( "#insert_currencyFrom_input").val();
  var New_currencyTo = $("#insert_currencyTo_input").val();
  var New_ratio = $("#insert_ratio_input").val();
  //if all the available inputs are properly filled
  if(New_currencyFrom!="" && New_currencyTo!="" && New_ratio!=""){
    //perform an AJAX POST request to the appropriate controller in order to insert a new currency conversion record
    $.ajax({
      type: "POST",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/Crud/Insert",
      //The request contains: the new base currency, the new target currency and the new ratio
      data:{
        id:this.id,
        New_currencyFrom: New_currencyFrom,
        New_currencyTo: New_currencyTo,
        New_ratio:New_ratio
      },
      success: function(response){
        //if the new record was created successfully
        if(response!=null){
          alert("The new record was created successfully");
          $( "#insert_currencyFrom_input").val("");
          $("#insert_currencyTo_input").val("");
          $("#insert_ratio_input").val("");
          //Append the new record to the screen withoud reloading the page
          var id = response['New_ID'];
          var New_currencyFrom = response['New_currencyFrom'];
          var New_currencyTo = response['New_currencyTo'];
          var New_ratio = response['New_ratio'];
          $('<div>').attr('id',id+"container").appendTo('#mydata');
          $('<input>').attr({type:"checkbox",id:id}).addClass('checkbox').appendTo('#'+id+"container");
          $('<input>').attr({type:"text", style:"height:40px;width:86px;margin-left:4px",value:New_currencyFrom,defaultValue:New_currencyFrom,id:id+"currencyFrom"}).addClass(id+'class Letters').prop('readonly', true).appendTo('#'+id+"container");
          $('<input>').attr({type:"text", style:"height:40px;width:86px;margin-left:4px",value:New_currencyTo,defaultValue:New_currencyTo,id:id+"currencyTo"}).addClass(id+'class Letters').prop('readonly', true).appendTo('#'+id+"container");
          $('<input>').attr({type:"text", style:"height:40px;width:86px;margin-left:4px",value:New_ratio,defaultValue:New_ratio,id:id+"ratio"}).addClass(id+'class Numeric').prop('readonly', true).appendTo('#'+id+"container");
          $('<br><br>').appendTo('#'+id+"container");
        }
        else{
          alert("Something went wrong!!");
        }
      }
    });
  }else{
    alert("You must fill all fields");
  }
});
