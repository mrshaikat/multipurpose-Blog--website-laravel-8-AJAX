(function($){

    $(document).ready(function(){

      //Logout System 
      //Get logout button form Home page
      $('a#logout-button').click(function(e){
        e.preventDefault();

        //Submit form
        $('form#logout-form').submit();
      });





    });


})(jQuery)