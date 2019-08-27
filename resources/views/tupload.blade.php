<!DOCTYPE html>
<html>
<head>
  <title>Laravel 5 - Ajax Image Uploading Tutorial</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="http://malsup.github.com/jquery.form.js"></script>


  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
  

  <!-- <script type="text/javascript" src="{{ asset('assets/js/dropzone.js')}}"></script> -->
</head>
<body>


<div class="container">
  <h1>Laravel 5 - Ajax Image Uploading Tutorial</h1>


  <form action="{{ route('ajaxImageUpload') }}" enctype="multipart/form-data" class="dropzone" id="myDropzone" method="POST">


    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>


    <input type="hidden" name="_token" value="{{ csrf_token() }}">


    <div class="form-group">
      <label>Alt Title:</label>
      <input type="text" name="title" class="form-control" placeholder="Add Title">
    </div>

   <!--  <div class="form-group">
      <label>Alt Merk:</label>
      <input type="text" name="merk" class="form-control" placeholder="Add Title">
    </div>

    <div class="form-group">
      <label>Alt kategori:</label>
      <input type="text" name="kategori" class="form-control" placeholder="Add Title">
    </div>

    <div class="form-group">
      <label>Alt harga:</label>
      <input type="number" name="harga" class="form-control" placeholder="Add Title">
    </div>

    <div class="form-group">
      <label>Alt deskripsi:</label>
      <input type="text" name="deskripsi" class="form-control" placeholder="Add Title">
    </div>

    <div class="form-group">
      <label>Alt Status:</label>
      <input type="text" name="status" class="form-control" placeholder="Add Title">
    </div>

 -->
    <div id="myDropZone">
      <div class="dz-message" data-dz-message><span>To Upload Click or Drag and Drop Image here</span></div>
      
      <div class="fallback">
          <input type="file" name="file" multiple>
      </div>

      <div id="dropzonePreview">
      </div>
    </div>


    <!-- <div class="dz-message" id="myDropzone">
        <div class="col-xs-8">
            <div class="message" data-dz-message>
                <p>Drop files here or Click to Upload</p>
            </div>
        </div>
    </div>
    <div class="fallback">
        <input type="file" name="file" multiple>
    </div>
    <div id="dropzonePreview">
      </div>
      <br><br> -->


    <div class="form-group">
      <button class="btn btn-success upload-image" id="submit" type="submit">Upload Image</button>
    </div>


  </form>


</div>

<script type="text/javascript">
   Dropzone.options.myDropzone = {
       autoProcessQueue: false,
       uploadMultiple: true,
       addRemoveLinks: true,
       maxFilesize: 7,
       maxFiles: 4,
       previewsContainer: '#dropzonePreview',
       clickable:'#myDropZone',
            init: function() {
                var myDropzone = this;
                this.element.querySelector("#submit").addEventListener("click", function(e) {
                    e.stopPropagation();
                    myDropzone.processQueue(); // this will submit your form to the specified action path
                });
            }

        }
</script>

<!-- <script type="text/javascript">
  $("body").on("click",".upload-image",function(e){
    $(this).parents("form").ajaxForm(options);
  });


  var options = { 
    complete: function(response) 
    {
      if($.isEmptyObject(response.responseJSON.error)){
        $("input[name='title']").val('');
        alert('Image Upload Successfully.');
      }else{
        printErrorMsg(response.responseJSON.error);
      }
    }
  };


  function printErrorMsg (msg) {
  $(".print-error-msg").find("ul").html('');
  $(".print-error-msg").css('display','block');
  $.each( msg, function( key, value ) {
    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
  });
  }
</script>
 -->

</body>
</html>