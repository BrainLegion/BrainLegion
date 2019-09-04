<?
  require_once 'functions/functions.php';
?>
﻿<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BrainLegion</title>

    <!-- TODO: SEO -->
    <!-- TODO: Теги у картинок -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="res/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="res/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="res/bootstrap/css/bootstrap-reboot.css">

    <!-- Fontello Fonts -->
    <link rel="stylesheet" href="res/fontello/css/fontello.css">

    <!-- Own Styles -->
    <link rel="stylesheet" href="res/styles.css">

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="res/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="res/img/favicon/favicon-16x16.png">
  </head>
  <body>

    <!-- Cover Section (Video Background) -->
    <section class="container-fluid px-0" id="cover-video">
      <video id="video-background" poster="res/video/poster.png" autoplay muted loop style="margin-top: 122px;">
        <source src="res/video/24.mp4" type="video/mp4" style="height: 100%; width: 100%">
      </video>
      <div id="video-background-filter" style="margin-top: 122px;"></div>

      <!-- Top Navigation -->
      <div class="container-fluid px-0">
        <nav class="navbar fixed-top-desktop px-md-5 navbar-expand-lg navbar-light" id="top-menu">

          <!-- Logo -->
          <a href="index.php" class="navbar-brand">
            <img src="res/img/logos/brainlegion_main.svg" alt="FILL" class="img-fluid img-logo">
          </a>

          <!-- Menu Button for Mobile -->
          <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Menu Itself -->
          <div class="collapse navbar-collapse" id="navbar-toggler">
            <ul class="navbar-nav ml-auto text-right">
              <li class="nav-item">
                <a class="nav-link text-purple" href="studio.php"><span>Studio</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-purple" href="factory.php"><span>Factory</span></a>
              </li>
            </ul>
          </div>
        </nav>
        </div><!-- Top Navigation -->

        <!-- Cover Content -->
        <div class="container-fluid" id="cover-content">

          <!-- Text On Cover -->
          <div id="cover-text" class="container text-center text-light">
            <h1>Решаем задачи для вашего бизнеса</h1>
            <p class="lead mt-4">Когда результат нужен ВЧЕРА, ограничены РЕСУРСЫ, а очень ХОЧЕТСЯ... то Вы сделали ПРАВИЛЬНЫЙ выбор, придя к нам! Наши решения в сфере цифровой экономики дают качественный скачок для роста бизнеса.</p>
          </div>
          </div><!-- Cover Content -->
          </section><!-- Cover Section -->

          <!-- About Section -->
          <section class="container-fluid py-5" id="about">

            <!-- Snippet -->
            <div class="container py-2 text-center">
              <h1 class="text-center text-purple">О нас</h1>
              <p class="mt-4">
                Brain Legion – это бренд креативной компании, в состав которой входят студия цифрового дизайна BL Studio, современная обучающая площадка BL Scholae, научно-инженерный комплекс BL Factory.
              </p>
              <p class="mt-4">
                Сферы деятельности – разработка эффективных и «эффектных» презентационных материалов, промо-роликов и виртуальных туров, брендирование, стратегическое проектирование и планирование, it-автоматизация бизнес-процессов, организация и проведение мероприятий, практико-ориентированное обучение детей и молодежи, подготовка компетентных специалистов под разнообразные задачи, выполнение научно-исследовательских и опытно-конструкторских работ, инжиниринг и консалтинг.
              </p>
            </div>
            <!-- Workflow -->
            <div class="container mt-5 py-2">
              <h1 class="text-center text-purple">Как мы работаем</h1>

              <!-- Workflow Row -->
              <div class="mx-0 row justify-content-between">

                <!-- Ticket -->
                <div class="card-container col-sm-12 col-md-3 col-lg-2 p-2">
                  <div class="card no-border card-transparent">
                    <div class="card-body text-center">
                      <i class="icon-mail icon-large"></i>
                      <h6>Вы оставляете заявку</h6>
                    </div>
                  </div>
                </div>

                <!-- Arrow -->
                <div class="card-container col-md-1 col-lg-1 p-2 align-self-center d-none d-lg-block">
                  <div class="card no-border card-transparent">
                    <div class="card-body">
                      <i class="icon-right-big icon-medium"></i>
                    </div>
                  </div>
                </div>

                <!-- Call -->
                <div class="card-container col-sm-12 col-md-3 col-lg-2 p-2">
                  <div class="card no-border card-transparent">
                    <div class="card-body text-center">
                      <i class="icon-phone icon-large"></i>
                      <h6>Мы связываемся с Вами</h6>
                    </div>
                  </div>
                </div>

                <!-- Arrow -->
                <div class="card-container col-md-1 col-lg-1 p-2 align-self-center d-none d-lg-block">
                  <div class="card no-border card-transparent">
                    <div class="card-body">
                      <i class="icon-right-big icon-medium"></i>
                    </div>
                  </div>
                </div>

                <!-- Conversation -->
                <div class="card-container col-sm-12 col-md-3 col-lg-2 p-2">
                  <div class="card no-border card-transparent">
                    <div class="card-body text-center">
                      <i class="icon-commenting-o icon-large"></i>
                      <h6>Совместно обсуждаем детали</h6>
                    </div>
                  </div>
                </div>

                <!-- Arrow -->
                <div class="card-container col-md-1 col-lg-1 p-2 align-self-center d-none d-lg-block">
                  <div class="card no-border card-transparent">
                    <div class="card-body text-center">
                      <i class="icon-right-big icon-medium"></i>
                    </div>
                  </div>
                </div>

                <!-- Success -->
                <div class="card-container col-sm-12 col-md-2 col-lg-2 p-2">
                  <div class="card no-border card-transparent">
                    <div class="card-body text-center">
                      <i class="icon-smile icon-large"></i>
                      <h6>И вместе приходим к успеху</h6>
                    </div>
                  </div>
                </div>
                </div><!-- Workflow Row -->
                </div><!-- Workflow -->

                <!-- Directions of Work -->
                <div class="container mt-5 py-2">
                  <h1 class="text-center text-purple">Направления работы</h1>

                  <!-- Directions of Work Row -->
                  <div class="row mx-auto mt-4 py-2">
                    <?
                      $allDataFromWaysOfDev = getFromOneTable('waysofdevelopment');
                      for($counter = 0; $counter < count($allDataFromWaysOfDev); $counter++)
                      {
                        echo '<div class="card-container col-sm-12 col-md-6 col-lg-4 p-2">
                                <div class="card card-half-transparent h-100">
                                  <a href="studio.php" class="card-img-logo "><img src="'.$allDataFromWaysOfDev[$counter]['logo'].'" class="img-fluid card-logo-style"  alt=""></a>
                                  <div class="card-body d-flex flex-column text-center">
                                    <h4 class="card-title text-center"><b>'.$allDataFromWaysOfDev[$counter]['title'].'</b></h4>
                                    <p class="card-text">'.$allDataFromWaysOfDev[$counter]['description'].'</p>
                                    <a href="'.$allDataFromWaysOfDev[$counter]['link'].'" class="mt-auto text-center"><p class="btn btn-purple-outline">Подробнее</p></a>
                                  </div>
                                </div>
                              </div>';
                      }
                    ?>
                    </div><!-- Directions of Work Row -->
                    </div><!-- Directions of Work -->
                    </section><!-- About Section -->

                    <!-- News Section -->
                    <section class="container-fluid py-5" id="news">
                      <h1 class="text-center text-purple">Новости</h1>

                      <!-- News -->
                      <div class="container mt-4 py-2">

                        <!-- News Row -->
                        <div class="row mx-auto mt-4 py-2">
                          <?
                            $allDataFromNews = getFromOneTable('news');
                            for($counter = 0; $counter < count($allDataFromNews); $counter++)
                            {
                              if($allDataFromNews[$counter]['description'] != '')
                              {
                                $otherString = substr($allDataFromNews[$counter]['description'], 40);
                                $halfText = substr($allDataFromNews[$counter]['description'], 0, 40).substr($otherString, 0, strpos($otherString, ".") + 1);
                                echo '<div class="card-container col-sm-12 col-md-6  col-lg-4 p-2">
                                        <div class="card card-half-transparent h-100">
                                          <div class="card-body d-flex flex-column text-center">
                                            <img src="'.$allDataFromNews[$counter]['img'].'" alt="ALT" class="img-fluid pb-3 news-img-style">
                                            <h4 class="card-title text-center"><b>'.$allDataFromNews[$counter]['title'].'</b></h4>
                                            <p class="card-text">'.$halfText.'</p>
                                            <div class="text-center mt-auto"><p class="btn btn-purple-outline pointer" data-toggle="modal" data-target="#newsModal'.$allDataFromNews[$counter]['id'].'">Читать полностью</p></div>
                                          </div>
                                        </div>
                                      </div>';
                              }
                            }
                          ?>
                          </div><!-- News Row -->
                          </div><!-- News -->
                          </section><!-- News Section -->

                          <!-- Contact Section -->
                          <section class="container-fluid py-5" id="contact">
                            <h1 class="text-center text-purple">Связаться с нами</h1>

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
                                  <label for="phone">Телефон:</label>
                                  <input class="form-control form-purple" id="phone" type="text" placeholder="8 123 1231212" name="phone" onclick="addPhone(this)" oninput="validatePhone(this)" onchange="checkPhone(this)">
                                  <p id="phone-error" class="hidden invalid-feedback small">Введите корректный номер телефона</p>
                                </div>
                              </div>
                              <div class="text-center">
                                <button type="submit" id="submit" class="btn btn-purple-outline pointer">Заказать звонок</button>
                                <!-- <input type="submit" id="submit" class="btn btn-purple-outline" value="Заказать звонок"> -->
                                <p id="contact-form-status" class="hidden mt-2">Статус сообщения</p>
                              </div>
                            </form>
                          </section>
                          <!-- Contact Section -->
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
                              <!-- News Modals -->
                              <?
                                for($counter = 0; $counter < count($allDataFromNews); $counter++)
                                {
                                  if($allDataFromNews[$counter]['description'] != '')
                                  {
                                    echo '<div class="modal fade" id="newsModal'.$allDataFromNews[$counter]['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header text-center">
                                                  <h5 class="modal-title align-items-center" id="exampleModalLabel">'.$allDataFromNews[$counter]['title'].'</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body text-center">';
                                    for($counterImages = 0; $counterImages < count($allDataFromNews); $counterImages++)
                                    {
                                      if($allDataFromNews[$counterImages]['title'] == $allDataFromNews[$counter]['id'])
                                      {
                                        echo '<img src="'.$allDataFromNews[$counterImages]['img'].'" alt="ALT" class="img-fluid mx-auto d-block"><p class="mt-4"></p>';
                                      }
                                    }
                                    echo '        <p class="mt-4">'.$allDataFromNews[$counter]['description'].'</p>
                                                  <p class="mt-4">'.$allDataFromNews[$counter]['contacts'].'</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-purple-outline" data-dismiss="modal">Закрыть</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>';
                                  }
                                }
                              ?>
                      <!-- Bootstrap js -->
                      <script src="res/jquery/jquery-3.2.1.min.js"></script>
                      <script src="res/popper/popper.js"></script>
                      <script src="res/bootstrap/js/bootstrap.min.js"></script>
                      <!-- Form validation js -->
                      <script src="res/js/validate.js"></script>
                      <!-- YandexMap js -->
                      <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
                      <script src="res/js/map.js"></script>
                    </body>
                  </html>
