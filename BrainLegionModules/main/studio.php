<?
  require_once 'functions/functions.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>BrainLegion Studio</title>

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
            <img src="res/img/logos/brainlegion_studio.svg" alt="FILL" class="img-fluid img-logo">
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
              <li class="nav-item">
                <a class="nav-link text-purple" href="#competences"><span>Услуги</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-purple" href="#portfolio"><span>Портфолио</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-purple" href="#contact"><span>Связаться</span></a>
              </li>
            </ul>
          </div>

        </nav>
      </div><!-- Top Navigation -->

    </section><!-- Top Menu Section -->


    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid jumbotron-light m-0 p-5 text-light" id="jumbotron-about">
      <div class="container">
        <h1 class="text-purple">BrainLegion Studio</h1>
        <p class="lead">Анализируем задачу, находим нестандартный подход, оживляем идеи, реализуем Ваши самые смелые замыслы! </p>
      </div>
    </div>


    <!-- About Section -->
    <section class="container-fluid py-3" id="about">

      <!-- Snippet -->
      <div class="container py-2">

        <p class="mt-4 text-center">
          При выборе специализации своей компании, мы решили особое внимание уделить такой услуге, как создание 3D моделей. Эта услуга в последнее время очень востребована. С заказчика мы берем только чертежи и эскизы или придумываем все с «нуля», уточняем его пожелания и начинаем производство 3D модели. Наши специалисты готовы в короткие сроки создать для вас любую 3D модель — от отдельных машиностроительных деталей до целых машин, агрегатов, квартир и ландшафтов.
        </p>
      </div>

    </section>


    <!-- Competences Section -->
    <section class="container-fluid py-3" id="competences">
      <h1 class="text-center text-purple">Услуги</h1>

      <!-- Competency -->
      <div class="container mt-4 py-2">
        <!-- <h2 class="text-center">Мероприятия под ключ</h2> -->

        <!-- Competency Row -->
        <?
          $allDataAboutServices = getFromOneTable('services'); // Этот массив содержит все данные об услугах
          for($counter = 0; $counter < count($allDataAboutServices); $counter++)
          {
            // Если блок по счету является первым из трех, то заводим его в горизонтальный контейнер
            if($counter % 3 == 0)
            {
              echo '<div class="row mx-auto mt-4 py-2 justify-content-center">';
            }

            // Выводится в блок название и информация о б услуге
            echo '<div class="card-container col-sm-12 col-md-6 col-lg-4 p-2">
                    <div class="card card-half-transparent h-100">
                      <div class="text-center card-body d-flex flex-column">
                        <h4 class="card-title text-center"><b>'.$allDataAboutServices[$counter]['title'].'</b></h4>
                        <p class="card-text">'.$allDataAboutServices[$counter]['description'].'</p>';

            // Если есть ссылка на дизайн, то добавляется еще одна кнопка
            if($allDataAboutServices[$counter]['link'] == NULL)
            {
              echo '<a href="#takeTheOrder" class="mt-auto text-center"><p class="btn btn-purple-outline btn-purple" data-ordertype="3d">Заказать</p></a>';
            }
            else
            {
              echo '<div class="mt-auto d-flex justify-content-around">
                      <a href="'.$allDataAboutServices[$counter]['link'].'" class="link"><p class="btn btn-purple-outline btn-purple">Пример дизайна</p></a>
                      <a href="#takeTheOrder" class="mt-auto text-center"><p class="btn btn-purple-outline" data-ordertype="3d">Заказать</p></a>
                    </div>';
            }

            // Закрывающие теги
            echo '</div>
                </div>
              </div>';

            // Если конттейнер последний по счету или явно последний блок, то закрывается последний тег
            if($counter % 3 == 2 || $counter + 1 == count($allDataAboutServices))
            {
              echo '</div>';
            }
          }
        ?>

      </div><!-- Competency -->

    </section><!-- Competences Section -->


    <!-- Portfolio Section -->
    <section class="container-fluid py-1" id="portfolio">

      <h1 class="text-center text-purple">Наше портфолио</h1>

      <!-- Portfolio row -->
      <div class="container mt-5">
        <div class="row mx-auto">

          <!-- Portfolio slider -->
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
          <?
            $exampleDB = $GLOBALS['mysqli']->query("SELECT * FROM `portfolio`, `img` WHERE `portfolio`.`id` = `img`.`idPort` and `type` = 'logo'");
            $allDataAboutPortfolio;
            while(($row = $exampleDB->fetch_assoc()) != false)
            {
              $allDataAboutPortfolio[] = $row;
            }
            for($counter = 0; $counter < count($allDataAboutPortfolio); $counter++)
            {
                if($counter == 0)
                {
                  echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$counter.'" class="active"></li>';
                }
                else
                {
                  echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$counter.'"></li>';
                }
            }
          ?>
            </ol>

            <div class="carousel-inner">

              <!-- Slider`s elements -->
              <?
                // Цикл выводит все изображения портфолио
                for($counter = 0; $counter < count($allDataAboutPortfolio); $counter++)
                {
                  if($counter == 0)
                  {
                    echo '<div class="carousel-item active">';
                  }
                  else
                  {
                    echo '<div class="carousel-item">';
                  }
                    echo '
                        <h2>'.$allDataAboutPortfolio[$counter]['title'].'</h2>
                        <img class="img-fluid img-thumb" src="'.$allDataAboutPortfolio[$counter]['img'].'" data-toggle="modal" data-target="#r'.$allDataAboutPortfolio[$counter]['id'].'" alt="Card image cap">
                             <br>
                            </div>';
                }
              ?>
            </div>
            <!-- Arrows Next and Prev of Slider -->
            <a href="#carouselExampleIndicators" class="carousel-control-prev" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" style="width: 50px; height: 50px;" aria-hidden="true"></span>
            </a>
            <a href="#carouselExampleIndicators" class="carousel-control-next" role="button" data-slide="next">
              <span class="carousel-control-next-icon" style="width: 50px; height: 50px;" aria-hidden="true"></span>
            </a>

          </div>
        </div>
      </div><!-- Portfolio Row -->

    </section><!-- Portfolio Section -->


    <!-- ОТЗЫВЫ ТУТ -->


    <!-- Contact Section -->
    <section class="container-fluid py-5" id="contact">

      <h1 id="takeTheOrder" class="text-center text-purple">Сделать заказ</h1>

      <!-- Contact Form -->
      <form method="post" enctype="multipart/form-data" class="d-flex flex-column container pt-4 justify-center align-items-center" id="contact-form">

        <!-- Name & Subject -->
        <div class="row mx-auto text-center d-flex flex-column align-items-center">
          <div class="form-group col-md-6">
            <label for="name">Ваше имя:</label>
            <input class="form-control form-purple" id="name" type="text" placeholder="Иван Иванов" name="name">
            <p id="name-error" class="hidden invalid-feedback small">Напишите своё имя</p>
        	</div>

          <div class="form-group col-md-6">
            <label for="subject">Тема обращения:</label>
      			<select class="form-control form-purple" id="subjectSelect">
      				<option value="3d">3D визуализация</option>
      			 	<option value="virt-tour">Виртуальные туры</option>
              <option value="mockups">Макетирование</option>
              <option value="vr">VR/AR</option>
              <option value="events">Мероприятия</option>
              <option value="projecting">Стретегическое проектирование</option>
              <option value="other">Другое</option>
      			</select>
        	</div>
        </div>

        <!-- Phone & Email -->
        <!-- ГАЗИНУР, тут нужно сделать, чтобы эти данные добавлялись в базу -->
        <div class="row mx-auto text-center d-flex flex-column align-items-center">
          <div class="form-group col-md-6">
            <label for="phone">Телефон:</label>
            <input class="form-control form-purple" id="phone" type="text" placeholder="8 123 1231212" name="phone" onclick="addPhone(this)" oninput="validatePhone(this)" onchange="checkPhone(this)">
            <p id="phone-error" class="hidden invalid-feedback small">Введите корректный номер телефона</p>
          </div>


          <div class="form-group col-md-6">
            <label for="email">Email:</label>
            <input class="form-control form-purple" type="text" id="email" placeholder="ivanivanov@domain.com" name="email" onchange="checkMail(this)">
            <p id="email-error" class="hidden invalid-feedback small">Введите корректный email</p>
          </div>
        </div>

        <!-- Message -->
        <div class="row mx-auto text-center d-flex flex-column align-items-center">
          <div class="form-group col-sm-6">
            <label for="text">Сообщение:</label>
    				<textarea class="form-control form-purple" id="text" name="text" rows="5"></textarea>
    				<p id="textarea-error" class="hidden invalid-feedback small">Сообщение не может быть пустым</p>
    			</div>
        </div>

        <!-- File -->
        <div class="row mx-auto text-center d-flex flex-column align-items-center">
          <div class="form-group col-sm-6">
            <label for="file">Прикрепите файл при необходимости:</label>
            <label class="custom-file w-100">
              <input type="file" name="file" id="file" class="form-control form-purple custom-file-input">
              <span class="form-control form-purple custom-file-control" id="upload-path">Выберите файл...</span>
            </label>
          </div>
        </div>

        <div class="text-center mt-3">
          <input type="submit" id="submit" class="btn pointer btn btn-purple-outline" value="Отправить сообщение">
          <p id="contact-form-status" class="hidden mt-2">Статус сообщения</p>
        </div>

      </form>

    </section><!-- Contact Section -->


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

    <?
      // Этот цикл выводит все модальные окна на наше побережье
      for($counter = 0; $counter < count($allDataAboutPortfolio); $counter++)
      {
        // Если это изображение является полной(т.е вложенной инофрмацией)
          echo '<div class="modal fade" id="r'.$allDataAboutPortfolio[$counter]['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title align-items-center" id="exampleModalLabel">'.$allDataAboutPortfolio[$counter]['title'].'</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>'.$allDataAboutPortfolio[$counter]['info'].'</p>';
          // Если в данном контенте присуствует видео, то добавляется видео, а если нет то изображение.
          if(getFromOneTableWithTwoCondition('img', 'type', 'idPort', 'video' ,$allDataAboutPortfolio[$counter]['id']) == 'empty')
          {
            $imagesFromOneType = getFromOneTableWithTwoCondition('img', 'type', 'idPort', 'image' ,$allDataAboutPortfolio[$counter]['id']);
            echo '<img src="'.$allDataAboutPortfolio[$counter]['img'].'" alt="ALT" class="img-fluid"> <p class="mt-4"></p>';
            for($counterImages = 0; $counterImages < count($imagesFromOneType); $counterImages++)
            {
              echo '<img src="'.$imagesFromOneType[$counterImages]['img'].'" alt="ALT" class="img-fluid"> <p class="mt-4"></p>';
            }
          }
          else
          {
            $currentVideo = getFromOneTableWithTwoCondition('img', 'type', 'idPort', 'video' ,$allDataAboutPortfolio[$counter]['id']);
            echo '<div class="video-portfolio-youtube">
                    <iframe src="'.$currentVideo[0]['img'].'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                  </div>';
          }

          echo '</div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary pointer" data-dismiss="modal">Закрыть</button>
                </div>
              </div>
            </div>
          </div>';
      }
    ?>


    <!-- Bootstrap js -->
    <script src="res/jquery/jquery-3.2.1.min.js"></script>
    <script src="res/popper/popper.js"></script>
      <script src="res/bootstrap/js/bootstrap.js"></script>
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
