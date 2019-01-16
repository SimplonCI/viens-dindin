<div class="dindin-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="dindin-title mdl-layout-title">
            <img class="dindin-logo-image" src="assets/images/dindin-logo.svg">
          </span>
          <!-- Add spacer, to align navigation to the right in desktop -->
          <div class="dindin-header-spacer mdl-layout-spacer"></div>
          <div class="dindin-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search-field">
            </div>
          </div>
          <!-- Navigation -->
          <div class="dindin-navigation-container">
            <nav class="dindin-navigation mdl-navigation">
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="/">Tout le catalogue</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="playlist.php">Mes vidéos</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="favoris.php">Mes favoris</a>
              
              <?php if(isset($_SESSION['connected'])):?>
               
                <?php if($_SESSION['premium'] == 1):?>
                  
                <?php else:?>
                <a href="login.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="background-color:#ff0000;">
                    Passer au premium
                  </a>
                <?php endif ?>
                
              <?php else: ?>
                <a href="login.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                  identifiez-vous
                </a>
              <?php endif ?>
            </nav>
          </div>
          <span class="dindin-mobile-title mdl-layout-title">
            <img class="dindin-logo-image" src="assets/images/dindin-logo.svg">
          </span>
          <?php if(isset($_SESSION['connected'])):?>
            <button class="dindin-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
              <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
              <li class="mdl-menu__item">
              <a class="mdl-navigation__link" href="#" style="">Profil</a>
              </li>
              <li class="mdl-menu__item">
                <a class="mdl-navigation__link" href="#" style="">Abonement</a>
              </li>
              <li  class="mdl-menu__item">
                <a class="mdl-navigation__link" href="login.php?logout=1" style="">déconnexion</a>
              </li>
              
            </ul>
          <?php endif ?>
        </div>
      </div>

      <div class="dindin-drawer mdl-layout__drawer">
       
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="/">Acceuil</a>
          <a class="mdl-navigation__link" href="abonement.php">Mes abonnements</a>
          <a class="mdl-navigation__link" href="playlist.php">Mes videos</a>
          <a class="mdl-navigation__link" href="favoris.php">Mes favoris</a>
          <?php if(isset($_SESSION['connected'])):?>
            <div class="dindin-drawer-separator"></div>
            <span class="mdl-navigation__link" href="">Abonement</span>
            <a class="mdl-navigation__link" href="abonement.php">Historique</a>
            <a class="mdl-navigation__link" href="">Durée</a>
            <div class="dindin-drawer-separator"></div>
            <span class="mdl-navigation__link" href="">Profil</span>
            <a class="mdl-navigation__link" href="">Mettre a jour</a>
            
            <a class="mdl-navigation__link" href="login.php?logout=1">déconnexion</a>
          <?php endif ?>
          <div class="dindin-drawer-separator"></div>
          <span class="mdl-navigation__link" href="">Aide</span>
          <a class="mdl-navigation__link" href="">contact</a>
         
        </nav>
      </div>