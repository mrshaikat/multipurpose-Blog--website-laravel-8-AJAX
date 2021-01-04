(function($){

    $(document).ready(function(){
      //Post Datatable
      $('table.data-table').dataTable();

      // CK Editor
      CKEDITOR.replace('post_editor');
      CKEDITOR.replace('post_editor_edit');

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




      //Tag Edit

      $(document).on('click', 'a#tag-edit', function(e) {

        e.preventDefault();

        let id = $(this).attr('edit_id');

          $.ajax({
            url : "post-tag-edit/" + id,
           dataType : "json",
            success : function(data){

              $('#tag-modal-edit form input[name="name"]').val(data.name);
              $('#tag-modal-edit form input[name="id"]').val(data.id);
            }

          });

      });

      //Post Featured Image Load
      $(document).on('change', "input#fimage" , function(e){
          e.preventDefault();

          let post_image_url = URL.createObjectURL(e.target.files[0]);

          $('img#post_featured_img_load').attr('src', post_image_url);
      });



      // Post Edit
      $(document).on('click', '#post-edit', function(e){

        e.preventDefault();



        let edit_id = $(this).attr('edit_id');

        $.ajax({

            url: 'post-edit/'+edit_id,
            dataType : "json",
            success: function(data){
                $('#post-modal-edit form input[name="id"]').val(data.id);
                $('#post-modal-edit form input[name="title"]').val(data.title);
                $('#post-modal-edit textarea').text(data.post_content);
                $('#post_featured_img_edit').attr('src','admin/media/post/'+data.image);
                $('#post-modal-edit .cl').html(data.cat_list);
                $('#post-modal-edit').modal('show');

            }
        });


      });


    });


})(jQuery)
