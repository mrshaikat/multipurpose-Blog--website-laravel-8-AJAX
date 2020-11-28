(function($){

    $(document).ready(function(){

      //Logout System 
      //Get logout button form Home page
      $('a#logout-button').click(function(e){
        e.preventDefault();

        //Submit form
        $('form#logout-form').submit();
      });


      //Category Edit

      $(document).on('click', 'a#category-edit', function(e) {

        e.preventDefault();

        let id = $(this).attr('edit_id');

          $.ajax({
            url : "post-category-edit/" + id,
           dataType : "json",
            success : function(data){

              $('#category-modal-edit form input[name="name"]').val(data.name);
              $('#category-modal-edit form input[name="id"]').val(data.id);
            }

          });
        
      });


    });


})(jQuery)