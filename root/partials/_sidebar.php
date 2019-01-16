<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Viens Dindin</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo 'data:image/jpg;base64,'.$_SESSION['photo_profil'];?>" alt="<?php echo $_SESSION['prenom'].' '.$_SESSION['nom']?>" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['prenom'].' '.$_SESSION['nom']?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Dashboard</a></li>
                      <li><a href="#">Dashboard2</a></li>
                      <li><a href="#">Dashboard3</a></li>
                    </ul>
                  </li>

                
                </ul>
              </div>
              <div class="menu_section">
                 <h3>GESTION</h3>
                <ul class="nav side-menu">
                <li>
                    <a>
                      <i class="fa fa-edit"></i> Catégorie 
                      <span class="fa fa-chevron-down"></span>
                    </a>
                    <ul class="nav child_menu">
                      <li><a href="categorie-add.php">Ajouter </a></li>
                      <li><a href="categorie.php">Afficher</a></li>
                    </ul>
                  </li>

                  <li>
                    <a>
                      <i class="fa fa-edit"></i> Films 
                      <span class="fa fa-chevron-down"></span>
                    </a>
                    <ul class="nav child_menu">
                      <li><a href="film-add.php">Ajouter </a></li>
                      <li><a href="film.php">Afficher</a></li>
                    </ul>
                  </li>

                  <li>
                    <a>
                      <i class="fa fa-edit"></i> Serie 
                      <span class="fa fa-chevron-down"></span>
                    </a>
                    <ul class="nav child_menu">
                      <li><a href="serie-add.php">Ajouter </a></li>
                      <li><a href="serie.php">Afficher</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

              <div class="menu_section">
                <h3>Utilisateurs</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Administrateurs <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="admin-list.php">Lister</a></li>
                      <li><a href="admin-add.php">Ajouter</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Abonnées <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Lister</a></li>
                      <li><a href="#">Ajouter</a></li>
                      
                    </ul>
                  </li>
                  
                </ul>
              </div>

              <div class="menu_section">
                <h3>Paramètres</h3>
                <ul class="nav side-menu">
                  
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">403 Error</a></li>
                      <li><a href="#">404 Error</a></li>
                      <li><a href="#">500 Error</a></li>
                      <li><a href="#">Plain Page</a></li>
                      <li><a href="#">Login Page</a></li>
                      <li><a href="#">Pricing Tables</a></li>
                    </ul>
                  </li>
                                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Acceuil <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->