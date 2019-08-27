<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/admin.css')}}">

    <!-- icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

      <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="{{ asset('assets/css/dropzone.css')}}">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>

     <script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js')}}"></script>

        <link href="" rel="shortcut icon">
    <title>Admin</title>
  </head>
  <body>
    <div class="wrapper">
    	 <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="height: 50px;">
    	<div class="container col-lg-2 col-md-2 d-none d-md-block">
    		<h5 style="color: #fff; padding-top:9px;">Welcome</h5>
    	</div>
      <div class="container col-lg-10 col-md-10">
        <button type="button" id="sidebarCollapse" class="btn">
            <i class="fas fa-bars"></i>       
        </button>
      </div>
    </nav>
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="admin"><i class="fas fa-upload"></i><span> Upload Kendaraan</span></a>
                </li>
                <li>
                    <a href="view"><i class="fas fa-eye"></i><span> View Kendaraan</span></a>
                </li>
               
            </ul>    
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <div class="row" style="margin-bottom: 5px;">
            	<h4>Upload Kendaraan</h4>
            </div>
            <div class="row">
            	<form class="form-control" action="{{ route('admin') }}" enctype="multipart/form-data" method="post" style="width: 100%;">

                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

            		<div class="form-group">
            			<label>Nama Kendaraan</label>
            			<input class="form-control" id="inpnama" type="text" name="title">
            		</div>
                    <div class="form-group">
                        <label>Merk</label>
                        <input class="form-control" id="inpmerk" type="text" name="merk">
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input class="form-control" id="inpharga" type="number" name="harga">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" id="inpkat" name="kategori">
                            <option hidden="">-- Pilih Kategori --</option>
                            <option>Matic</option>
                            <option>Manual</option>
                            <option>Sport</option>
                        </select>
                    </div>

            		<div class="form-group">
                       <label class="control-label">Upload File</label>
                       <div class="preview-zone hidden" id="prezone">
                        <div class="box box-solid">
                            <div class="box-body"></div>
                        </div>
                       </div>
                       <div class="dropzone-wrapper">
                        <div class="dropzone-desc">
                         <i class="glyphicon glyphicon-download-alt"></i>
                         <p>Choose an image file or drag it here.</p>
                        </div>
                        <input type="file" name="image" id="uplImg" class="dropzone" multiple>
                       </div>
                    </div>

  					<div class="form-group">
    					<label for="exampleFormControlInput1">Deskripsi Kendaraan</label>
    					<textarea name="deskripsi" id="editor1" class="ckeditor"></textarea>
 	 				</div>
  					<div class="form-group">
  						<input style="width: 90px;" class="btn btn-dark upload-image" type="submit" name="submit" value="Post">
  					</div>
				</form>
            </div>
            
        </div>
    </div>

	<script>
	  CKEDITOR.replace( 'editor1' );
	</script>
    
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/drag.js')}}"></script>
  
    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

    <script type="text/javascript">
      $("body").on("click",".upload-image",function(e){
        $(this).parents("form").ajaxForm(options);
      });


      var options = { 
        complete: function(response) 
        {
          if($.isEmptyObject(response.responseJSON.error)){
            document.getElementById('inpnama').value = "";
            document.getElementById('inpmerk').value = "";
            document.getElementById('inpkat').value = "";
            document.getElementById('inpharga').value = "";
            document.getElementById('uplImg').value = "";
             var boxZone = $(this).parents('.preview-zone').find('.box-body');
             var previewZone = $(this).parents('.preview-zone');
             var dropzone = $(this).parents('.form-group').find('.dropzone');
             boxZone.empty();
             previewZone.addClass('hidden');
            CKEDITOR.instances.editor1.setData('');
            alert('Input Data Berhasil.');
          }else{
            printErrorMsg(response.responseJSON.error);
          }
        }
      };

        $('.upload-image').on('click', function() {
        });

        function reset(e) {
         e.wrap('<form>').closest('form').get(0).reset();
         e.unwrap();
        }

      function printErrorMsg (msg) {
      $(".print-error-msg").find("ul").html('');
      $(".print-error-msg").css('display','block');
      $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
      });
      }
    </script>

  </body>
</html>