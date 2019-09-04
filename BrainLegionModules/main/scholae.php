<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>BrainLegion School</title>

    <!-- TODO: SEO -->
    <!-- TODO: Теги у картинок -->
    <!-- TODO: Модальные окна -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="res/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="res/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="res/bootstrap/css/bootstrap-reboot.css">

    <!-- Fontello Fonts -->
    <link rel="stylesheet" href="res/fontello/css/fontello.css">

    <!-- Own Styles -->
    <link rel="stylesheet" href="res/styles.css">
  </head>
  <body>

    <!-- Top Menu Section -->
    <section class="container-fluid sticky-top-desktop px-0" id="top-menu">

      <!-- Top Navigation -->
      <div class="container-fluid px-0">
        <nav class="navbar px-md-5 navbar-expand-lg navbar-light">

          <!-- Logo -->
          <a href="index.php" class="navbar-brand ">
            <img src="res/img/logos/brainlegion_scholae.svg" alt="FILL" class="img-fluid img-logo">
          </a>

          <!-- Menu Button for Mobile -->
          <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
          </button>

          <!-- Menu Itself -->
          <div class="collapse navbar-collapse text-right" id="navbar-toggler">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link text-purple" href="index.php"><span>На главную</span></a>
              </li>
            </ul>
          </div>

        </nav>
      </div><!-- Top Navigation -->

    </section><!-- Top Menu Section -->

    <section class="container-fluid py-5" id="courses">

      <h1 class="text-center text-purple">Раздел в разработке</h1>

    </section>

    <!-- Footer -->
    <section class="container-fluid" id="footer">
      <div class="container">

        <div class="row justify-content-center text-light py-5">

          <!-- Left Side -->
          <div class="col-sm-12 col-md-6 col-lg-6" id="footer-contacts">

            <!-- Footer Menu -->
            <ul class="nav mb-4" id="footer-menu">
              <li class="nav-item pr-3">
                <a class="nav-link p-0" href="index.php">Главная</a>
              </li>
              <li class="nav-item pr-3">
                <a class="nav-link p-0" href="studio.php">Studio</a>
              </li>
              <li class="nav-item pr-3">
                <a class="nav-link p-0" href="scholae.php">Scholae</a>
              </li>
              <li class="nav-item pr-3">
                <a class="nav-link p-0" href="factory.php">Factory</a>
              </li>
            </ul>

            <!-- Title & Snippet -->
            <div id="snippet" class="mb-4">
              <h5>BrainLegion</h5>
              <p class="text-muted">Оживляем идеи для решения Ваших задач</p>
            </div>

            <!-- Contacts (phone, email, address, etc) -->
            <div id="contacts" class="mb-4">
              <ul class="list-unstyled">
                <li>+7 (937) 326-11-85</li>
                <li>+7 (961) 364-08-86</li>
                <li><a href="mailto:ask@brainlegion.ru">ask@brainlegion.ru</a></li>
                <li><a href="mailto:support@brainlegion.ru">support@brainlegion.ru</a></li>
                <li><a href="mailto:nda@brainlegion.ru">nda@brainlegion.ru</a></li>
                <li><a href="mailto:info@brainlegion.ru">info@brainlegion.ru</a></li>
                <li>Адрес: г. Уфа, Проспект Октября, 2</li>
              </ul>
            </div>

            <!-- Social Links -->
            <!--
            <div id="socials" class="mb-4">
              <a href="#"><i class="icon icon-purple icon-vkontakte icon-standart"></i></a>
              <a href="#"><i class="icon icon-purple icon-instagram icon-standart"></i></a>
              <a href="#"><i class="icon icon-purple icon-facebook-squared icon-standart"></i></a>
            </div>
            -->

            <!-- Copyrights -->
            <div id="copyrights">
              <p>Все права защищены </p>
              <p>© <a class="link-footer" href="index.php">Brainlegion.ru</a>, 2018</p>
            </div>

          </div><!-- Left Side -->

          <!-- Right Side -->
          <div class="col-sm-12 col-md-6 col-lg-6 px-5 pt-sm-2 px-sm-0 d-none d-md-block" id="footer-map">
            <div id="map" class="w-100 h-100"></div>
          </div>

        </div>

      </div>
    </section><!-- Footer Section -->


    <!-- Bootstrap js -->
    <script src="res/jquery/jquery-3.2.1.min.js"></script>
    <script src="res/popper/popper.js"></script>
    <script src="res/bootstrap/js/bootstrap.min.js"></script>

    <!-- YandexMap js -->
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="res/js/map.js"></script>

    <!-- Form validation js -->
    <script src="res/js/validate.js"></script>

    <!-- Menu reaction to scrolling js -->
    <script src="res/js/scroll.js"></script>

    <!-- Form scrolling js -->
    <script src="res/js/order.js"></script>

    <!-- Custrom js for form -->
    <script type="text/javascript">
      $('input[name="file"]').change(function(){
        var fileName = $(this).val().replace(/^.*\\/, "");
        var pathElement = document.getElementById("upload-path");
        pathElement.innerHTML = fileName;
      });
    </script>

  </body>
</html>
