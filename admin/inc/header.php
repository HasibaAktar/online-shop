        

        <?php
          require_once('session.php');
                 Session::checkSession();

        ?><nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">Dreamland</a>
            </div>
            <?php
              if (isset($_GET['action']) && $_GET['action']=="logout") {
                // session_destroy();
                 Session::destroy();
                // header("Location:login.php");
              }
            ?>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="inbox.php"><i class="fa fa-user"></i> Inbox</a></li>
                 <li><a href="adminreg.php"><i class="fa fa-user"></i> Staff Registration</a></li>
                <li><a href="msg.php"><i class="fa fa-user"></i> Message</a></li>
                <li><a href="?action=logout"><i class="fa fa-power-off"></i> Logout</a></li>

                
                
              </ul>
            </div>
          </div>
        </nav>