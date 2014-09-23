<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="listMovimento.php"><img src="images/logo.png" width="100"/></a>
    </div>
    <!-- /.navbar-header -->
      <ul class="nav navbar-top-links navbar-right">  
         <p></p>         
     <!--x   <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                </li>
            </ul>
           /.dropdown-user
        </li> -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="h4"><p><?php echo "Logado ".$_SESSION['NmUsuario'];?></p></i>  <i class="fa"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
         <!--  <li><a href="logout.php"><i class="fa fa-edit fa-fw"></i> Gerenciar Perfil</a>
                </li> -->
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                </li>                         
            </ul><!-- /.dropdown-user -->
        </li><!-- /.dropdown -->
    </ul><!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                 <div class="input-group custom-search-form">
                    </div>
                </li>
                <li class="sidebar-search">
                 <div class="input-group custom-search-form">                                
                 </div>

                </li>
                <li>
                    <a href="listUsuario.php" ><i class="fa fa-user fa-fw"></i>Usuário</a>                  
                </li>
                <li>
                    <a href="listCategoria.php"><i class="fa fa-table fa-fw"></i>Categoria</a>
                </li>
                <li>
                    <a href="listMovimento.php"><i class="fa fa-edit fa-fw"></i>Movimetos</a>
                </li>
            </ul>
        </div><!-- /.sidebar-collapse -->
    </div><!-- /.navbar-static-side -->
</nav>