<?php include 'partials/_header.php';?>

<!-- iCheck -->
<link href="assets/pluginsiCheck/skins/flat/green.css" rel="stylesheet">
<!-- Datatables -->
<link href="assets/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="assets/plugins/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="assets/plugins/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="assets/plugins/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="assets/plugins/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="assets/css/custom.min.css" rel="stylesheet">

<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Catégorie</h3>
              </div>

             
            </div>
            <div class="clearfix"></div>

           
            <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Liste des catégorie <small><a href="categorie-add.php">ajouter</a></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Ajouter un film</a>
                                  </li>
                                  <li><a href="#">Statistiques</a>
                                  </li>
                                </ul>
                              </li>
                              
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                           
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>Nom</th>
                                  <th>Action</th>
                                  
                                </tr>
                              </thead>


                              <tbody>
                               <?php if($resultat):?>
                                  <?php while($row = mysqli_fetch_assoc($resultat)):?>
                                    <tr>
                                      <td><?php echo $row['nom'];?></td>
                                      <td>
                                        <form action="film-add.php" method="post">
                                          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                          <button type="submit" class="btn btn-warning btn-xs" name="modifier">modifier</button>
                                          <button type="submit" class="btn btn-danger btn-xs" name="supprimer">supprimer</button>
                                        </form>
                                      </td>
                                      
                                    </tr>
                                  <?php endwhile?>
                                <?php endif ?>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
          </div>
        </div>



  <!-- /page content -->
  <?php include 'partials/_footer.php';?>


  <script src="assets/plugins/iCheck/icheck.min.js"></script>
  <!-- Datatables -->
  <script src="assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="assets/plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="assets/plugins/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="assets/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="assets/plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="assets/plugins/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="assets/plugins/jszip/dist/jszip.min.js"></script>
  <script src="assets/plugins/pdfmake/build/pdfmake.min.js"></script>
  <script src="assets/plugins/pdfmake/build/vfs_fonts.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="assets/js/custom.min.js"></script>

  </body>
</html>