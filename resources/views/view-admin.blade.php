<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                <li >
                    <a href="admin"><i class="fas fa-upload"></i><span> Upload Kendaraan</span></a>
                </li>
                <li class="active">
                    <a href="view"><i class="fas fa-eye"></i><span> View Kendaraan</span></a>
                </li>
               
            </ul>    
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <div class="row" style="margin-bottom: 5px;">
            	<h4>View Kendaraan</h4>
            </div>
            <div class="row">
            	 <table class="table table-striped table-edit">
                        <thead style="align-items:center; background-color:#2C3A47; color:white;">
                            <tr>
                                <th style="min-width: 200px;">Nama Kendaraan</th>
                                <th style="width:120px;">Merk</th>
                                <th style="width:120px;">Kategori</th>
                                <th style="width:120px;">Harga</th>
                                <th style="text-align: center; min-width: 280px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kendaraans as $kendaraan)     
                            <tr>
                                <td>{{ $kendaraan->title }}</td>
                                <td>{{ $kendaraan->merk }}</td>
                                <td>{{ $kendaraan->kategori }}</td>
                                <td>{{ $kendaraan->harga }}</td>
                                <td style="text-align: center;">
                                <Button class="btn btn-edit" data-toggle="modal" data-target="#modview{{ $kendaraan->id }}" type="submit" name="submit"><i class="fas fa-edit"></i> Detail</Button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="modview{{ $kendaraan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Lihat Kendaraan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <label>Foto Kendaraan</label><br>
                                    <img style="max-width: 400px; margin-bottom: 5px;" src="images/{{$kendaraan->image}}">
                                    <!-- <img style="max-width: 200px; margin-bottom: 5px;" src="assets/img/dilan.jpg"><br>
                                    <img style="max-width: 200px; margin-bottom: 5px;" src="assets/img/dilan.jpg">
                                    <img style="max-width: 200px; margin-bottom: 5px;" src="assets/img/dilan.jpg"> <br> -->
                                    <label style="margin-top: 10px;">Deskripsi</label>
                                    <section>{{$kendaraan->deskripsi}}</section>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- /Modal-->
                            @endforeach  
                        </tbody>
                    </table>

            </div>
            <div class="row">
                  <div class="text-center">
                     {{ $kendaraans->links() }}
                  </div>
            </div>
        </div>
    </div>


    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


     <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

  
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

  </body>
</html>