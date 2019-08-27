<!-- imageupload.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Laravel Multiple Images Upload Using Dropzone</title>
    <meta name="_token" content="{{csrf_token()}}" />
    <meta charset="utf-8">
    <title>Simple Drag and Drop File Upload</title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/dropzone.css')}}">


</head>
<body>
 <section>
  <form action="{{ route('ajaxImageUpload') }}" method="POST" enctype="multipart/form-data" >
   <div class="container">
    <div class="row">
     <div class="col-md-12">
        <div class="form-group">
                        <label>Nama Kendaraan</label>
                        <input class="form-control" id="inpnama" type="text" name="title">
                    </div>
      <div class="form-group">
       <label class="control-label">Upload File</label>
       <div class="preview-zone hidden">
        <div class="box box-solid">
         <div class="box-header with-border">
          <div><b>Preview</b></div>
          
         </div>
         <div class="box-body"></div>
        </div>
       </div>
       <div class="dropzone-wrapper">
        <div class="dropzone-desc">
         <i class="glyphicon glyphicon-download-alt"></i>
         <p>Choose an image file or drag it here.</p>
        </div>
        <input type="file" name="file" class="dropzone">
       </div>
      </div>
     </div>
    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row">
     <div class="col-md-12">
      <button type="submit" class="btn btn-primary pull-right">Upload</button>
     </div>
    </div>
   </div>
  </form> 
 </section>
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
 <!-- <script src="assets/app.js"></script> -->
 <script src="{{ asset('assets/js/drag.js')}}"></script>
 
</body>
</html>