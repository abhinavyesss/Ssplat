<?php
  exec('python C:\xampp\htdocs\NewsApp\Index.py');
  $hostname="localhost";
  $username="root";
  $password="Aniket123$%^0987";
  $db="news";
  $dbconnect=mysqli_connect($hostname,$username,$password,$db);
  if ($dbconnect->connect_error) {
    die("Database connection failed: " . $dbconnect->connect_error);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>News!!</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="applause-button.css" />
    <script src="applause-button.js"></script>
    <link href="css/styles.css" rel="stylesheet" />
    <style>
      @media only screen and (max-width: 600px) {
        .hideformobile {
          display: None;
        }
      }
    </style>
  </head>
    <body id="page-top">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">NewsNation</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Upcoming</a>
            </li>
          </ul>
          <form class="form-inline">
            <input style="border-radius: 0; border: 2px solid black;" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button style="border-radius: 0; color: white;" class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
      <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
          <img class="masthead-avatar mb-5" src="assets/img/news.png" alt=""/>
          <h1 class="masthead-heading text-uppercase mb-0">Bringing You News!!</h1>
          <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
          </div>
          <p class="masthead-subheading font-weight-light mb-0">Exciting - Important - Recent</p>
        </div>
      </header>
      <section class="page-section portfolio" id="portfolio" style="background: #F9D9D2; font-family: 'Lora', serif;">
        <div class="container">
          <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Headlines Today</h2>
          <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <?php
            $query = mysqli_query($dbconnect, "SELECT * FROM news") or die (mysqli_error($dbconnect));
            $i=1;
            while ($row = mysqli_fetch_array($query)) {
              echo
              "<a href='{$row["url"]}' style='color: black; text-decoration: none;' target='_blank'>
              <div class='card' style='width: 50%; border-radius: 0; color: black; box-shadow: 5px 2px 8px 3px #888888;'>
              <img src='assets/img/images/{$i}.jpg' class='card-img-top' style='height: 380px; border-radius: 0;' alt='...'>
              <div class='card-body'>
              <h5 class='card-title'>{$row['title']}</h5>
              <p class='card-text'>{$row['description']}</p>
              <p style='font-size: 12px;'><em>{$row['author']}</em></p>
              </a>
              <applause-button style='width: 35px; height: 35px; position: absolute; bottom: 15px; left: 65px;'></applause-button>
              <a class='hideformobile' href='http://www.linkedin.com/shareArticle?mini=true&amp;url={$row["url"]}' target='_blank' style='position: absolute; bottom: 15px; right: 135px;'>
                  <img src='https://simplesharebuttons.com/images/somacro/linkedin.png' style='width: 35px; height: 35px;' alt='LinkedIn' />
              </a>
              <a class='hideformobile' href='http://www.facebook.com/sharer.php?u={$row["url"]}' target='_blank' style='position: absolute; bottom: 15px; right: 55px;'>
                <img src='https://simplesharebuttons.com/images/somacro/facebook.png' alt='Facebook' style='width: 35px; height: 35px;' />
              </a>
              <a class='hideformobile' href='https://twitter.com/share?url={$row["url"]}&amp;text=Check%20this%20out%20!!&amp;hashtags=news' target='_blank' style='position: absolute; bottom: 15px; right: 95px;'>
                <img src='https://simplesharebuttons.com/images/somacro/twitter.png' alt='Twitter' style='width: 35px; height: 35px;' />
              </a>
              <a href='whatsapp://send?text={$row['url']}' data-action='share/whatsapp/share' target='_blank' style='position: absolute; bottom: 15px; right: 15px;'>
                <img src='share.png' alt='WhatsApp' style='width: 35px; height: 35px;' />
              </a>
              <br><br>
              <button type='button' data-toggle='modal' data-target='#exampleModal' style='background: white; border: none; position: absolute; bottom: 15px; left: 15px; border-radius: 0;'>
                <img src='comment.png' style='width: 35px; height: 35px; background: trasparent;' />
              </button>
              <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
              <div class='modal-dialog'>
              <div class='modal-content'>
              <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLabel'>Comment</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button>
              </div>
              <div class='modal-body' style='padding-top: 10px; padding-bottom: 10px;'>
              <form action=''#' method='post'>
              <div>
              <textarea name='comments' id='comments' style='font-size: 0.9em; height: 180px; width: 100%; resize: none; overflow:hidden' placeholder='Let us know your thoughts in the comments!!'></textarea>
              </div>
              <input class='btn btn-success' type='submit' value='Submit'>
              </form>
              </div>
              <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>";
              $i++;
            }
            ?>
          </div>
        </div>
      </section>
      <footer class="footer text-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0">
              <h4 class="text-uppercase mb-4">Location</h4>
              <p class="lead mb-0">
                The Woods, Kalewadi Phata
                <br />
                Wakad, Pune - 411057
              </p>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
              <h4 class="text-uppercase mb-4">Around the Web</h4>
              <a class="btn btn-outline-light btn-social mx-1" href="https://www.reddit.com/user/abhinavyesss"><i class="fab fa-fw fa-reddit"></i></a>
              <a class="btn btn-outline-light btn-social mx-1" href="https://twitter.com/abhinavyesss"><i class="fab fa-fw fa-twitter"></i></a>
              <a class="btn btn-outline-light btn-social mx-1" href="https://www.linkedin.com/in/abhinavkumar7070/"><i class="fab fa-fw fa-linkedin-in"></i></a>
              <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/abhinavyesss/"><i class="fab fa-fw fa-instagram"></i></a>
            </div>
            <div class="col-lg-4">
              <h4 class="text-uppercase mb-4">About</h4>
              <p class="lead mb-0">Getting you news, as soon as it happens :)</p>
            </div>
          </div>
        </div>
      </footer>
      <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright © 2020</small></div>
      </div>
      <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
      <script src="assets/mail/jqBootstrapValidation.js"></script>
      <script src="assets/mail/contact_me.js"></script>
      <script src="js/scripts.js"></script>
  </body>
</html>
