//whenever the button "delete" is pressed (on mousekey down)
$('#button_delete').mousedown(function(){
  //if at least one checkbox is "checked"
  if($("input:checked" ).length>0){
    //change the outline color of the selected items to Red
    $(this).css("background-color","red");
    $('.checkbox').each(function(){
      if($('#'+this.id).is(':checked')){
        $('.'+this.id+"class").each(function(){
          $(this).css("border","2px solid red");
        });
      }
    });
  }else{
    alert("You must select at least 1 item");
  }
});
//(on mousekey up)
$('#button_delete').mouseup(function(){
  //ask the user to confirm the "delete" action by clicking "OK"
  if (window.confirm('Press OK to Delete items'))
  {
    /*if the action is confirmed, perform an AJAX POST request to the appropriate controller
     in order to delete the selected items from the DB*/
    $('.checkbox').each(function(){
      if($('#'+this.id).is(':checked')){
        $.ajax({
          type: "POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "/Crud/Delete",
          data:{
            id:this.id,
          },
          success: function(result) {
            //remove the deleted objects from the screen (in order to update the screen without reloading the page)
            if(result['success']==true){
              $('#'+result['deleted_id']+"container").remove();
            }else{
              alert("Something went wrong!!")
            }
          }
        });
      }
    });
  }
  else
  {
    $('.checkbox').each(function(){
      if($('#'+this.id).is(':checked')){
        $(this).prop('checked', false);
        $('.'+this.id+"class").each(function(){
          $(this).css("border","");
        });
      }
    });
  }
  $(this).css("background-color","");
});
