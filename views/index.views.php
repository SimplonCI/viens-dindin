<?php include 'partials/_header.php';?>


    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

      <?php include 'partials/_navbar.php';?>

      <div class="dindin-content mdl-layout__content">
        <a name="top"></a>
            <div class="dindin-more-section">
              <div class="dindin-card-container mdl-grid">
                <?php if($resultat_film):?>
                  <?php while($film = mysqli_fetch_assoc($resultat_film)):?>   
                      <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card">
                        
                        <div class="mdl-card__media">
                       
                          <img src="<?php echo 'data:image/jpg;base64,'.$film['cover_film'];?>">
                        
                        </div>

                        <div class="mdl-card__actions" style="background: rgba(0, 0, 0, 1);">
                          <a href="film.php?watch=<?php echo $film['nom'];?>&&f=<?php echo $film['id'];?>&&c=<?php echo $film['categorie_id'];?>" class="dindin-link mdl-button mdl-js-button" >
                            <?php echo $film['nom'] ?>
                          </a>
                        </div>
                      </div>
                   
                  <?php endwhile ?>
                <?php endif?>
              </div>
            </div>
         
        

<?php include 'partials/_footer.php';?>