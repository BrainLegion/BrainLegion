<?
  require 'functions/functions.php';

  if(!isset($_SESSION['admin']))
  {
    echo '<script>document.location.href="index.php"</script>';
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>BrainLegion Admin</title>

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

    <!--Top menu Selection -->
    <section class="container-fluid sticky-top-desktop px-0" id="top-menu">

        <!-- Top Navigation -->
        <div class="container-fluid px-0 id="top-menu">
            <nav class="navbar navbar-expand-lg navbar-light" id="top-menu">

                <!-- Logo -->
                <a href="adminpanel.php" class="navbar-brand">
                    <img src="res/img/logos/brainlegion_main.svg" alt="FILL" class="img-fluid img-logo">
                </a>

                <!-- Menu Button for Mobile -->
                <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu Itself -->
                <div class="collapse navbar-collapse text-right" id="navbar-toggler">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="adminmain.php" class="nav-link text-purple"><span>Главная</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="adminstudio.php" class="nav-link disabled"><span>Studio</span></a>
                        </li>

                        <!-- Логаут и завершение сессии -->
                        <li class="nav-item">
                            <a href="logOut.php" class="nav-link text-purple"><span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>

    <!-- Button menu selection -->
    <section class="container-fluid mt-5 d-flex justify-content-center">
        <div class="row d-flex justify-content-center text-center">
            <div class="d-flex flex-column flex-start">

                <!-- Button collapseServices -->
                <div class="ServicesAddandEdit d-flex flex-start">
                    <button class="mx-2 my-2 btn btn-purple-outline pointer btnsize" data-toggle="collapse" data-target="#collapseServices" aria-expanded="false" aria-controls="collapseServices"> Услуги </button>

                    <!-- кнопка открывает модальльное окно, где происходит добавление новой услуги-->
                    <button class="my-2 btn btn-purple-outline pointer" data-toggle="modal" data-target="#modalService_add" aria-expanded="false"> + </button>
                </div>

                <!-- Collapse Services -->
                <div class="collapse mx-auto" id="collapseServices">
                    <div class="card-container">
                        <div class="card card-half-transparent mt-auto h-100 d-flex flex-wrap flex-row align-items-center">

                            <!-- тут добавляются, изменяются услуги, которые выводятся на страничке Studio.php -->
                            <?
                              $allDataAboutServices = getFromOneTable('services');
                              for($counter = 0; $counter < count($allDataAboutServices); $counter++)
                              {
                                echo '<div class="card-body col-12 col-sm-6 col-md-4 d-flex flex-column text-center heightCards">
                                        <h4><b>'.$allDataAboutServices[$counter]['title'].'</b></h4>
                                        <p class="card-text">'.$allDataAboutServices[$counter]['description'].'</p>
                                        <div class="buttonServices d-flex flex-row justify-content-around mt-auto">
                                          <button type="button" class="btn btn-purple-outline mt-auto btnsize pointer" data-toggle="modal" data-target="#modalService_'.$allDataAboutServices[$counter]['id'].'">Редактировать</button>
                                          <form method="POST">
                                              <button name="serviceDelete'.$allDataAboutServices[$counter]['id'].'"class="btn btn-purple-outline btnsize mt-auto pointer">Удалить</button>
                                          </form>
                                        </div>
                                    </div>';
                              }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Button collapsePortfolio -->
                <div class="PortfolioAddandEdit d-flex flex-start">
                    <button class="mx-2 my-2 btn btn-purple-outline pointer btnsize pointer" data-toggle="collapse" data-target="#collapsePortfolio" aria-expanded="false" aria-controls="collapsePortfolio">Портфолио</button>

                    <!--ГАЗИНУР, кнопка открывает модальльное окно, где происходит добавление новой работы в портфолио -->
                    <button class="my-2 btn btn-purple-outline pointer pointer" data-toggle="modal" data-target="#modalPortfolio_add" aria-expanded="false">+</button>
                </div>

                <div class="collapse" id="collapsePortfolio">
                    <div class="card-container">
                        <div class="card card-half-transparent h-100 d-flex flex-wrap flex-row align-items-center">
                          <?
                            $exampleDB = $GLOBALS['mysqli']->query("SELECT * FROM `portfolio`, `img` WHERE `portfolio`.`id` = `img`.`idPort` and `type` = 'logo'");
                            $someDataBoutPortfolio;
                            while(($row = $exampleDB->fetch_assoc()) != false)
                            {
                              $someDataBoutPortfolio[] = $row;
                            }
                            for($counter = 0; $counter < count($someDataBoutPortfolio); $counter++)
                            {
                                echo '<img class="col-12 col-sm-6 col-md-4 img-fluid img-thumb" src="'.$someDataBoutPortfolio[$counter]['img'].'" alt="FILL" data-toggle="modal" data-target="#modalPortfolio'.$someDataBoutPortfolio[$counter]['id'].'">';
                            }
                          ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- модальные окна для "УСЛУГИ" находятся тут -->
    <?
      for($counter = 0; $counter < count($allDataAboutServices); $counter++)
      {
        if($allDataAboutServices[$counter]['link'] == 'NULL')
        {
          $link = '';
        }
        else
        {
          $link = $allDataAboutServices[$counter]['link'];
        }
        echo '<div class="modal fade" id="modalService_'.$allDataAboutServices[$counter]['id'].'" tabindex="-1" role="dialog" aria-labelledby="modalService_'.$allDataAboutServices[$counter]['id'].'Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Редактирование</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST">
                          <div class="modal-body">
                              <div class="form-group">
                                <label for="title" class="col-form-label">Редактирование</label>
                                <input name="title" type="text" class="form-control" id="title" value="'.$allDataAboutServices[$counter]['title'].'">
                              </div>
                              <div class="form-group">
                                <label for="discription" class="col-form-label">Заголовок услуги</label>
                                <textarea name="text" class="form-control" id="discription">'.$allDataAboutServices[$counter]['description'].'</textarea>
                              </div>
                              <div class="form-group">
                                <label for="typeMessage" class="col-form-label">Ссылка на пример услуги(необязательно)</label>
                                <input name="link" type="text" class="form-control" id="typeMessage" value="'.$link.'">
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-purple-outline pointer" data-dismiss="modal">Закрыть</button>
                            <button name="editService'.$allDataAboutServices[$counter]['id'].'" type="submit" class="btn btn-purple-outline pointer">Применить изменения</button>
                          </div>
                      </form>
                    </div>
                </div>
            </div>';
      }
      for($counter = 0; $counter < count($allDataAboutServices); $counter++)
      {
        $allDataAboutPost = $_POST;
        if(isset($allDataAboutPost['editService'.$allDataAboutServices[$counter]['id']]))
        {
          $linkOfService;
          if($allDataAboutPost['link'] == '')
          {
            $linkOfService = NULL;
          }
          else
          {
            $linkOfService = $allDataAboutPost['link'];
          }
          $GLOBALS['mysqli']->query("UPDATE `services` SET `title` = '".$allDataAboutPost['title']."',
                                    `description` = '".$allDataAboutPost['text']."',
                                    `link` = '".$linkOfService."' WHERE `services`.`id` = ".$allDataAboutServices[$counter]['id'].";");
          echo '<script>document.location.href="adminstudio.php"</script>';
        }
        if(isset($allDataAboutPost['serviceDelete'.$allDataAboutServices[$counter]['id']]))
        {
          $GLOBALS['mysqli']->query("DELETE FROM `services` WHERE `services`.`id` = ".$allDataAboutServices[$counter]['id'].";");
          echo '<script>document.location.href="adminstudio.php"</script>';
        }
      }
    ?>

    <!--  Модальное окно для добавления новой услуги находится тут -->
    <div class="modal fade" id="modalService_add" tabindex="-1" role="dialog" aria-labelledby="modalService_addLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавление услуги</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST">
                  <div class="modal-body">
                      <div class="form-group">
                        <label for="title" class="col-form-label">Заголовок услуги</label>
                        <input name="titleForNewService" type="text" class="form-control" id="title">
                      </div>
                      <div class="form-group">
                        <label for="discription" class="col-form-label">Описание услуги</label>
                        <textarea name="textForNewService" class="form-control" id="discription"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="typeMessage" class="col-form-label">Ссылка на пример услуги(необязательно)</label>
                        <input name="linkForNewService" type="text" class="form-control" id="typeMessage">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-purple-outline pointer" data-dismiss="modal">Закрыть</button>
                    <button name="addNewService" type="submit" class="btn btn-purple-outline pointer">Добавить</button>
                  </div>
              </form>
            </div>
        </div>
    </div>
    <?
      $allDataFromPostForNewService = $_POST;
      if(isset($allDataFromPostForNewService['addNewService']))
      {
        $GLOBALS['mysqli']->query("INSERT INTO `services`(`title`, `description`, `link`)
                                  VALUES ('".$allDataFromPostForNewService['titleForNewService']."',
                                          '".$allDataFromPostForNewService['textForNewService']."',
                                          '".$allDataFromPostForNewService['linkForNewService']."')");
        echo '<script>document.location.href="adminstudio.php"</script>';
      }
      ?>

      <?
        for($counter = 0; $counter < count($someDataBoutPortfolio); $counter++)
        {
            echo '<div class="modal fade" id="modalPortfolio'.$someDataBoutPortfolio[$counter]['id'].'" tabindex="-1" role="dialog" aria-labelledby="modalPortfolioLabel'.$allDataAboutPorfolio[$counter]['id'].'" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title align-items-center" id="exampleModalLabel"> Редактирование </h5>
                                <button type="button" class="close pointer" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="title" class="col-form-label">Заголовок портфолио</label>
                                        <input name="editTitlePort" type="text" class="form-control" id="title" value="'.$someDataBoutPortfolio[$counter]['title'].'">
                                    </div>
                                    <div class="form-group">
                                        <label for="discriptionPortfolio" class="col-form-label">Описание услуги</label>
                                        <textarea name="editInfoPort" class="form-control" id="discriptionPortfolio">'.$someDataBoutPortfolio[$counter]['info'].'</textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="imagesPorfolio f-flex justify-content-center text-center">';
            if(getFromOneTableWithTwoCondition('img', 'type', 'idPort', 'video' ,$someDataBoutPortfolio[$counter]['id']) == 'empty')
            {
              $allImagesForPortfolio = getFromOneTableWithTwoCondition('img', 'type', 'idPort', 'image' ,$someDataBoutPortfolio[$counter]['id']);
              for($counterImages = 0; $counterImages < count($allImagesForPortfolio); $counterImages++)
              {
                  echo '<div class="imgs d-flex justify-content-center">
                          <div id="picture'.$allImagesForPortfolio[$counterImages]['idImg'].'" style="display: block;">
                            <img src="'.$allImagesForPortfolio[$counterImages]['img'].'" alt="ALT" class="img-fluid pb-3 news-img-style">
                          </div>
                          <button id="'.$allImagesForPortfolio[$counterImages]['idImg'].'" type="button" style="display: block;" class="close d-flex flex-column justify-content-start pointer" onclick="deletePic(this)" aria-label="Close">
                              <span id="button'.$allImagesForPortfolio[$counterImages]['idImg'].'">&times;</span>
                          </button>
                        </div>';
                }
            }
            $memoryForVideo = "";
            if(getFromOneTableWithTwoCondition('img', 'type', 'idPort', 'video' ,$someDataBoutPortfolio[$counter]['id']) != 'empty')
            {
              $memoryForVideo = getFromOneTableWithTwoCondition('img', 'type', 'idPort', 'video' ,$someDataBoutPortfolio[$counter]['id'])[0]['img'];
            }
            echo                    '</div></div>
                                        <div class="form-group d-flex flex-column">
                                          <input type="radio" id="video" name="r'.$someDataBoutPortfolio[$counter]['id'].'" onclick="disp(document.getElementById(\'videoInput'.$someDataBoutPortfolio[$counter]['id'].'\'))"> Видео

                                          <!-- Скрытая форма для добавления видео -->
                                          <div name="video" id="videoInput'.$someDataBoutPortfolio[$counter]['id'].'" style="display: none;">
                                              <input type="text" name="editVideo" value="'.$memoryForVideo.'">
                                              <input type="file" name="editLogo">
                                          </div>
                                          <input type="radio" id="image" name="r'.$someDataBoutPortfolio[$counter]['id'].'" onclick="disp(document.getElementById(\'imageInput'.$someDataBoutPortfolio[$counter]['id'].'\'))"> Изображение

                                          <!-- Скрытая форма для добавления видео -->
                                          <div name="image" id="imageInput'.$someDataBoutPortfolio[$counter]['id'].'" style="display: none;">
                                              <input type="file" name="editImages[]" multiple>
                                          </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                  <button name="deletePort'.$someDataBoutPortfolio[$counter]['id'].'" type="submit" class="btn btn-purple-outline pointer">Удалить</button>
                                  <button type="button" class="btn btn-purple-outline pointer" data-dismiss="modal">Закрыть</button>
                                  <button name="editPort'.$someDataBoutPortfolio[$counter]['id'].'" type="submit" class="btn btn-purple-outline pointer">Применить изменения</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>';
        }
    ?>

    <?
      $dataFromPost = $_POST;
      for($counter = 0; $counter < count($someDataBoutPortfolio); $counter++)
      {
        if(isset($dataFromPost['deletePort'.$someDataBoutPortfolio[$counter]['id']]))
        {
          $GLOBALS['mysqli']->query("DELETE FROM `portfolio` WHERE `portfolio`.`id` = ".$someDataBoutPortfolio[$counter]['id'].";");
          echo '<script>document.location.href="adminstudio.php"</script>';
        }
        elseif(isset($dataFromPost['editPort'.$someDataBoutPortfolio[$counter]['id']]))
        {
          $GLOBALS['mysqli']->query("UPDATE `portfolio` SET `title` = '".$dataFromPost['editTitlePort']."',
                                    `info` = '".$dataFromPost['editInfoPort']."'  WHERE `portfolio`.`id` = ".$someDataBoutPortfolio[$counter]['id'].";");
          if($dataFromPost['editVideo'] != "" && $dataFromPost['editImages'][0] != "")
          {
            echo '<script>alert("Нельзя выбирать режим видео и изображений. Выберите пожалуйста только один режим!")</script>';
          }
          elseif($dataFromPost['editVideo'] != "" || $dataFromPost['editLogo'] != "")
          {
            $GLOBALS['mysqli']->query("DELETE FROM `img` WHERE `img`.`idPort` = '".$someDataBoutPortfolio[$counter]['id']."'and `img`.`type` = 'video';");
            $GLOBALS['mysqli']->query("INSERT INTO `img`(`img`, `type`, `idPort`)
                                      VALUES ('".$dataFromPost['editVideo']."', 'video' , '".$someDataBoutPortfolio[$counter]['id']."')");
            if($dataFromPost['editLogo'] != "")
            {
              $GLOBALS['mysqli']->query("UPDATE `img` SET `img` = 'res/img/portfolio/".$dataFromPost['editLogo']."'
                                              WHERE `img`.`idPort` = '".$someDataBoutPortfolio[$counter]['id']."' and
                                                      `img`.`type` = 'logo';");
            }
            $GLOBALS['mysqli']->query("DELETE FROM `img` WHERE `img`.`idPort` = '".$someDataBoutPortfolio[$counter]['id']." 'and `img`.`type` = 'image';");
          }
          elseif($dataFromPost['editImages'][0] != "")
          {
            foreach ($dataFromPost['editImages'] as $value)
            {
              $GLOBALS['mysqli']->query("INSERT INTO `img`(`img`, `type`, `idPort`)
                                        VALUES ('res/img/portfolio/".$value."', 'image' , '".$someDataBoutPortfolio[$counter]['id']."')");
            }
            $GLOBALS['mysqli']->query("DELETE FROM `img` WHERE `img`.`idPort` = '".$someDataBoutPortfolio[$counter]['id']."'and `img`.`type` = 'video';");
          }
          echo '<script>document.location.href="adminstudio.php"</script>';
        }
      }
    ?>


    <!-- ГАЗИНУР, модальное окно для добавления новой работы в "ПОРТФОЛИО" находится тут -->
    <div class="modal fade" id="modalPortfolio_add" tabindex="-1" role="dialog" aria-labelledby="modalPortfolio_addLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-items-center" id="exampleModalLabel"> Добавить работу </h5>
                    <button type="button" class="close pointer" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body">

                        <!-- ГАЗИНУР, тут заголовок, который добавляется в бд -->
                        <div class="form-group">
                            <label for="title" class="col-form-label">Заголовок портфолио</label>
                            <input name="titleForAddPotfolio" type="text" class="form-control" id="title">
                        </div>

                        <!-- ГАЗИНУР, тут описание добавляется в бд -->
                        <div class="form-group">
                            <label for="descriptionPortfolio" class="col-form-label">Описание услуги</label>
                            <textarea name="descriptionPortfolio" class="form-control" id="descriptionPortfolio"></textarea>
                        </div>

                        <!-- ГАЗИНУР, тут фотки или видосы добавляются в бд -->
                        <!-- ГАЗИНУР, выбор заливать видео или изображения -->
                        <div class="form-group d-flex flex-column">
                            <input type="radio" id="video" name="r" onclick="disp(document.getElementById('videoInput0'))" value="video"> Видео

                            <form id="test">

                            </form>

                            <!-- Скрытая форма для добавления видео -->
                            <div name="video" id="videoInput0" style="display: none;">
                              <!-- МАКС сюда добавь label то что изображение для логотипа портфолио -->
                                <input type="text" name="videoForAddPortfolio">

                                <input type="file" name="logoForAddPortfolio">
                            </div>

                            <input type="radio" id="image" name="r" onclick="disp(document.getElementById('imageInput0'))" value="images"> Изображение

                            <!-- Скрытая форма для добавления видео -->
                            <div name="image" id="imageInput0" style="display: none;">
                                <input type="file" name="imagesForAddPortfolio[]" multiple>

                            </div>
                          <div>
                            <input hidden class="my-3" type="text">
                            <input hidden type="file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-purple-outline pointer" data-dismiss="modal">Закрыть</button>

                        <!-- По нажатию на эту кнопку все данные отсюда добавляются в бд и отображаются на сайте -->
                        <button name="addPortfolio" type="submit" class="btn btn-purple-outline pointer">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?
      $dataFromPostForAddPortfolio = $_POST;

      if(isset($dataFromPostForAddPortfolio['addPortfolio']))
      {
        $GLOBALS['mysqli']->query("INSERT INTO `portfolio`(`title`, `info`)
                                  VALUES ('".$dataFromPostForAddPortfolio['titleForAddPotfolio']."', '".$dataFromPostForAddPortfolio['descriptionPortfolio']."')");
        $indexOfOurNewPortfolio = findSmthFromTable('portfolio', 'title', $dataFromPostForAddPortfolio['titleForAddPotfolio']);
        if($dataFromPostForAddPortfolio['r'] == 'video')
        {
          $GLOBALS['mysqli']->query("INSERT INTO `img`(`img`, `type`, `idPort`)
                                    VALUES ('res/img/portfolio/".$dataFromPostForAddPortfolio['logoForAddPortfolio']."', 'logo' , '".$indexOfOurNewPortfolio[0]['id']."')");
          $GLOBALS['mysqli']->query("INSERT INTO `img`(`img`, `type`, `idPort`)
                                    VALUES ('".$dataFromPostForAddPortfolio['videoForAddPortfolio']."', 'video' , '".$indexOfOurNewPortfolio[0]['id']."')");
        }
        elseif ($dataFromPostForAddPortfolio['r'] == 'images')
        {
          $counter = 0;
          foreach ($dataFromPostForAddPortfolio['imagesForAddPortfolio'] as $value)
          {
            if($counter == 0)
            {
              $GLOBALS['mysqli']->query("INSERT INTO `img`(`img`, `type`, `idPort`)
                                        VALUES ('res/img/portfolio/".$value."', 'logo' , '".$indexOfOurNewPortfolio[0]['id']."')");
            }
            else
            {
              $GLOBALS['mysqli']->query("INSERT INTO `img`(`img`, `type`, `idPort`)
                                        VALUES ('res/img/portfolio/".$value."', 'image' , '".$indexOfOurNewPortfolio[0]['id']."')");
            }
            $counter++;
          }
        }
       echo '<script>document.location.href="adminstudio.php"</script>';
      }
    ?>

    <script type="text/javascript">
      function deletePic(object)
      {
        var sex = object.id;
        $.ajax({
            type: 'POST',
            url: 'functions/deletePic.php?type=img',
            data: {sex: sex},
            success: function(data){
              $(object).parent().fadeOut().remove();
            }
          });
      }
    </script>

    <script src="res/js/showInputs.js"></script>
    <script src="res/js/deleteImages.js"></script>

    <!-- Bootstrap js -->
    <script src="res/jquery/jquery-3.2.1.min.js"></script>
    <script src="res/popper/popper.js"></script>
    <script src="res/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
