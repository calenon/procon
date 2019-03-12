/*this .js script is for filtering the text imputs of the application*/

//whenever the value of a text field of the class ".Letters" is changed:
$(document.body).on("input",'.Letters',function(){
  if($(this).data('val')==null){
    $(this).data('val',$(this).attr('defaultValue'));
  }
  //Check if the input matches the defined pattern (Regular Expression: only letters and scpaces are allowed).
  if(!$(this).val().match(/^[a-zA-Z\s]*$/) && $(this).val()!="")
  {
    alert("Only letters and spaces are allowed");
    //if not, the input is rejected (the value of the text field is rolled back)
    $(this).val($(this).data('val'));
  }else{
   $(this).data('val', $(this).val());
  }
});
//whenever the value of a text field (of the class .Numeric) is changed:
$(document.body).on("input",".Numeric",function(){
  if($(this).data('val')==null){
    $(this).data('val',$(this).attr('defaultValue'));
  }
   //Check if the input matches the defined pattern (regullar expression: only Numeric/Demical inputs are allowed)
  if(!$(this).val().match(/^\d+\.?\d*$/) && $(this).val()!="")
  {
    alert("Only Numeric input is allowed");
    //if not, the input is rejected (the value of the text field is rolled back)
    $(this).val($(this).data('val'));
  }
  else{
   $(this).data('val', $(this).val());
  }
});
