/* switch between "Manage currencies" and "insert" Functionality */
$('.toggle').click(function(){
  /*The element #container, contains the "Manage currencies" functionality and #container_add the "insert" functionality.
  whenever a button of the ".toggle" class is pressed, .show() is executed for the hidden element and .hide() for the visible one.*/
  if($('#container_add').is(":visible")){
    $('#container').show();
    $('#container_add').hide();
  }else{
    $('#container').hide();
    $('#container_add').show();
  }
});
