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
                            <div class="mdl-card__media" style="height:100%;" >
                                <iframe src="https://openload.co/embed/dnmYz5AsWRs/INVISIBLE_%28Bande_Annonce_S%C3%A9rie%29.mp4" scrolling="no" frameborder="0" width="100%" height="430" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-card" style="height:auto;">
                          <h6><?php echo $film['nom']?></h6>
                          <div class="mdl-grid">
                            <div class="md-cell--6-desktop ">
                                
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                    AJOUTER A MES FAVORIS
                                </button>
                                <!-- Accent-colored raised button -->
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                                    AJOUTER A MA PLAYLISTE
                                </button>
                            </div>
                          
                          </div>
                          <div class="md-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                                Brand new album 'Score' with the London Symphony Orchestra out NOW! iTunes - http://smarturl.it/Score2CELLOS Amazon mp3 - http://smarturl.it/Score2CELLOS-ad
                            </div>
                        </div>
                    </div>
                </div>
              <?php endwhile ?>
            <?php endif ?>
           
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
            
           
           

            
          </div>
        </div>

        <div class="dindin-more-section">
          <div class="dindin-section-title mdl-typography--display-1-color-contrast">More from dindin</div>
          <div class="dindin-card-container mdl-grid">
            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card">
              <div class="mdl-card__media">
                <img src="https://proxymedia.woopic.com/VOD/PHOTODEFAMIW0146319_COV4_2424_NEWTV.jpg">
              </div>

              <div class="mdl-card__actions" style="background: rgba(0, 0, 0, 1);">
                 <a class="dindin-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
                   Make the switch
                 </a>
              </div>
            </div>
            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card">
              <div class="mdl-card__media">
                <img src="https://proxymedia.woopic.com/VOD/PHOTODEFAMIW0146319_COV4_2424_NEWTV.jpg">
              </div>

              <div class="mdl-card__actions" style="background: rgba(0, 0, 0, 1);">
                 <a class="dindin-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
                   Make the switch
                 </a>
              </div>
            </div>
            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card">
              <div class="mdl-card__media">
                <img src="https://proxymedia.woopic.com/VOD/PHOTODEFAMIW0146319_COV4_2424_NEWTV.jpg">
              </div>

              <div class="mdl-card__actions" style="background: rgba(0, 0, 0, 1);">
                 <a class="dindin-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
                   Make the switch
                 </a>
              </div>
            </div>
             <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card">
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
      

<?php include 'partials/_footer.php';?>