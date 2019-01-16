<?php include 'partials/_header.php';?>


    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

    <?php include 'partials/_navbar.php';?>

      <div class="dindin-content mdl-layout__content">
        <a name="top"></a>

        <div class="dindin-more-section" style=" max-width: 100%;padding: 5px 0;">
          <div class="dindin-card-container mdl-grid" style="height:auto;">
            <?php if($film_resultat):?>
              <?php while($film = mysqli_fetch_assoc($film_resultat)):?>
                <div class="mdl-cell mdl-cell--8-col mdl-cell--12-col-tablet mdl-cell--4-col-phone " style="height:auto;">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-card" style="height:auto;">
                            <div class="mdl-card__media embed-container" style="height:100%;" >
                                <?php if($film['premium']): ?>
                                    <?php if($_SESSION['premium']):?>
                                          <?php echo $film['lien_film']?>
                                    <?php else: ?>
                                          Vous devez vous avoir un compte premium pour suivre ce film
                                    <?php endif?>
                                <?php elseif($film['classic']): ?>
                                    <?php if(isset($_SESSION['connected'])):?>
                                          <?php echo $film['lien_film']?>
                                    <?php else: ?>
                                          Vous devez vous connecter pour suivre ce film
                                    <?php endif?>
                                <?php else: ?>
                                  <?php echo $film['lien_film']?>
                                <?php endif ?>
                                
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-card" style="height:auto;">
                          <h4><?php echo $film['nom']?></h4>
                          <div class="mdl-grid">
                            <?php if(isset($_SESSION['connected'])):?>
                              <div class="md-cell--6-desktop ">
                                  
                                  <a  href="film.php?watch=<?php echo $film['nom'];?>&&f=<?php echo $film['id'];?>&&c=<?php echo $film['categorie_id'];?>&&favoris=yes" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                      AJOUTER A MES FAVORIS
                                  </a>
                                  <!-- Accent-colored raised button -->
                                  <a href="#" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                                      AJOUTER A MA PLAYLIST
                                  </a>
                              </div>
                            <?php endif ?>
                          </div>
                          <!-- <div class="md-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                                Brand new album 'Score' with the London Symphony Orchestra out NOW! iTunes - http://smarturl.it/Score2CELLOS Amazon mp3 - http://smarturl.it/Score2CELLOS-ad
                          </div> -->
                        </div>
                    </div>
                </div>
              <?php endwhile ?>
            <?php endif ?>
           
            <?php if(isset($_SESSION['premium']) && $_SESSION['premium']):?>
              <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                  <div class="mdl-grid">
                      <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card">
                          <div class="mdl-card__media">
                              <img src="https://proxymedia.woopic.com/VOD/PHOTODEFAMIW0146319_COV4_2424_NEWTV.jpg">
                          </div>

                          <div class="mdl-card__actions" style="background: rgba(0, 0, 0, 1);">
                              <a class="dindin-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
                              Make the switch
                              </a>
                          </div>
                      </div>

                      <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card">
                          <div class="mdl-card__media">
                              <img src="https://proxymedia.woopic.com/VOD/PHOTODEFAMIW0146319_COV4_2424_NEWTV.jpg">
                          </div>

                          <div class="mdl-card__actions" style="background: rgba(0, 0, 0, 1);">
                              <a class="dindin-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
                              Make the switch
                              </a>
                          </div>
                      </div>
                      
                  </div>
              </div>
            <?php else: ?>
              <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                  <div class="mdl-grid">
                      <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card">
                          <div class="mdl-card__media">
                              <img src="assets/images/pub/nescafe.jpg">
                          </div>

                         
                      </div>

                      <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card">
                          <div class="mdl-card__media">
                              <img src="assets/images/pub/evian.jpg">
                          </div>

                          
                      </div>
                      
                  </div>
              </div>
            <?php endif; ?>
            
           
           

            
          </div>
        </div>
        <?php if($filmbycategorie):?>
            <div class="dindin-more-section">
              <div class="dindin-section-title mdl-typography--display-1-color-contrast">Recommandation</div>
              <div class="dindin-card-container mdl-grid">
                <?php while($row = mysqli_fetch_assoc($filmbycategorie)):?>
                  
                  <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card">
                    <div class="mdl-card__media">
                      <img src="<?php echo 'data:image/jpg;base64,'.$row['cover_film'];?>">
                    </div>

                    <div class="mdl-card__actions" style="background: rgba(0, 0, 0, 1);">
                      <a class="dindin-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
                        Make the switch
                      </a>
                    </div>
                  </div>
                <?php endwhile ?>
              </div>
            </div>
          
        <?php endif ?>
      

<?php include 'partials/_footer.php';?>


<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>

