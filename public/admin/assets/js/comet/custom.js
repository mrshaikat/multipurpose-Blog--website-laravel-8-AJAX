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


      //Comet slider scriopt

      $(document).on('click', '#comet-add-slide', function() {

        let rand = Math.floor( Math.random() * 10000)  ;


        $('.comet-slider-container').append('<div id="slider-card-'+ rand +'" class="card">'+
        '                                                <div data-toggle="collapse" data-target="#slide-'+ rand +'" style="cursor: pointer;" class="card-header">'+
        ''+
        '                                                   <h4 class="">slide 1 <button id="comet-slide-remove-btn" remove_id="'+ rand +'" class="close">&times;</button></h4>'+
        '                                                </div>'+
        '                                                <div id="slide-'+ rand +'" class="collapse">'+
        '                                                    <div class="card-body">'+
        '                                                        <div class="form-group">'+
        '                                                            <label for="">Sub Title</label>'+
        '                                                            <input type="text" class="form-control">'+
        '                                                        </div>'+
        ''+
        '                                                        <div class="form-group">'+
        '                                                            <label for="">Title</label>'+
        '                                                            <input type="text" class="form-control">'+
        '                                                        </div>'+
        ''+
        '                                                        <div class="form-group">'+
        '                                                            <label for="">Button 01 Title</label>'+
        '                                                            <input type="text" class="form-control">'+
        '                                                        </div>'+
        ''+
        '                                                        <div class="form-group">'+
        '                                                            <label for="">Button 01 Link</label>'+
        '                                                            <input type="text" class="form-control">'+
        '                                                        </div>'+
        ''+
        '                                                        <div class="form-group">'+
        '                                                            <label for="">Button 02 Title</label>'+
        '                                                            <input type="text" class="form-control">'+
        '                                                        </div>'+
        ''+
        '                                                        <div class="form-group">'+
        '                                                            <label for="">Button 02 Link</label>'+
        '                                                            <input type="text" class="form-control">'+
        '                                                        </div>'+
        ''+
        ''+
        ''+
        ''+
        ''+
        ''+
        '                                                    </div>'+
        '                                                </div>'+
        ''+
        '                                               </div>'
            );

            return false;


      });


      //Slider Remove


      $(document).on('click', '#comet-slide-remove-btn', function() {

        let remove_code = $(this).attr('remove_id');

        $('#slider-card-'+ remove_code ).remove();
      });



      return false;
    });


})(jQuery)
