<?php include 'partials/_header.php';?>


<link href="assets/css/custom.min.css" rel="stylesheet">
<link href="assets/css/error.css" rel="stylesheet">

<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Série</h3>
              </div>

             
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ajouter une série <small>Veuillez remplir le formulaire pour ajouter une série</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Statistiques</a>
                          </li>
                          <li><a href="#">Lister les séries</a>
                          </li>
                        </ul>
                      </li>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php if(isset($_POST['supprimer'])): ?>
                      <form name="serieForm" id="serieForm" action="serie-add.php" onSubmit="return confirm('Voulez vous vraiment supprimer cette serie?');" id="demo-form2"  accept="image/*"  enctype="multipart/form-data"   method='POST' data-parsley-validate class="form-horizontal form-label-left">
                    <?php else: ?>
                     <form name="serieForm" id="serieForm" action="serie-add.php"  id="demo-form2"  accept="image/*"  enctype="multipart/form-data"   method='POST' data-parsley-validate class="form-horizontal form-label-left">
                    <?php endif ?>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nom">
                            Nom de la serie <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nom" name="nom" value="<?php echo $nom?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nom">
                                categorie <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="categorie_id" id="categorie_id" class="form-control col-md-7 col-xs-12" require>
                                    <option value="" disabled >Selectionner la catégorie du film</option>
                                    <?php if($resultat_categorie):?>
                                        <?php while($rows = mysqli_fetch_assoc($resultat_categorie)):?>
                                        
                                            <?php if($rows['categorie_id'] == $categorie_id):?>
                                            
                                            <option value="<?php echo $rows['id']?>"  selected="selected" ><?php echo $rows['nom']?></option>
                                            <?php else:?>
                                            <option value="<?php echo $rows['id']?>"  ><?php echo $rows['nom']?></option>
                                            <?php endif ?>
                                        <?php endwhile?>
                                    <?php endif?>
                                </select>
                            
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="maison_production">
                                Nom de la maison de production <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nom" name="maison_production" value="<?php echo $maison_production?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="resumer">
                                Le resumé du film <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea  id="resumer" name="resumer"  style="width:100%;" class="form-control" rows="4" cols="50" value="<?php echo $lien_film?>" ></textarea>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="icone">cover de la serie <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="icone" name="icone"  class="form-control ">
                            </div>
                        </div>
                      <?php if(isset($_POST['modifier']) || isset($_POST['supprimer'])):?>
                        <div>
                          <input type="hidden" name="id" value=<?php echo $id?>>
                          <input type="hidden" name="icone_cat" value=<?php echo $icone?>>
                        </div>
                      <?php endif ?>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <?php if(isset($_POST['modifier']) || $update):?>
                         <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button">Retour à la liste</button>
                            <button type="submit" class="btn btn-danger" name="update">Metre a jour</button>
                          </div>
                        <?php elseif(isset($_POST['supprimer'])): ?>
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button">Retour à la liste</button>
                            <button type="submit" class="btn btn-danger" name="delete">Supprimer</button>
                          </div>
                         
                        <?php else: ?>
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button">Retour à la liste</button>
                            <button class="btn btn-warning" type="reset">Reset</button>
                            <button type="submit" class="btn btn-danger" name="ajouter">Submit</button>
                          </div>
                        <?php endif ?>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            </div>
            
        </div>



  <!-- /page content -->
  <?php include 'partials/_footer.php';?>



  <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
  <script src="assets/js/validation/serie.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="assets/js/custom.min.js"></script>

  <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>



  </body>
</html>