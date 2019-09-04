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
        <link rel="stylesheet" href="cssadmin/adminmain.css">
    </head>
<body style="background-color: white;">
    <!-- Top Navigation -->
    <div class="container-fluid px-0 id="top-menu">
        <nav class="navbar  navbar-expand-lg navbar-light" id="top-menu">
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
                        <a href="adminmain.php" class="nav-link desible"><span>Главная</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="adminstudio.php" class="nav-link text-purple"><span>Studio</span></a>
                    </li>
                    <!-- Логаут и завершение сессии -->
                    <li class="nav-item">
                        <a href="logOut.php" class="nav-link text-purple"><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid h-100 w-100 justify-content-center mt-5">
        <div class="row d-flex flex-column р-100 w-100 justify-content-center m-0">
        <p class="dropChanges m-0 mx-1">
                <button class="btn btn-purple-outline pointer btnsize" data-toggle="collapse" href="#areaOfWork" aria-expanded="false" aria-controls="collapseExample">
                    Направления работы
                </button>
<!-- кнопка добавления направления работы тут -->
                <button class="my-0 mx-2 btn btn-purple-outline pointer btnSizeAdd" data-toggle="modal" data-target="#addWorkField" aria-expanded="false"> +
                </button>
        </p>



            <div class="collapse" id="areaOfWork">
                <div class="card card-block dropChangesInfoField fieldChanges d-flex flex-wrap">
                  <?
                    $allDataFromWaysOfDev = getFromOneTable('waysofdevelopment');
                    for($counter = 0; $counter < count($allDataFromWaysOfDev); $counter++)
                    {
                      echo '<div class="card-container col-sm-12 col-md-12 col-lg-4 p-2">
                              <div class="card card-half-transparent h-100 d-flex flex-column align-items-center">
                                <a href="'.$allDataFromWaysOfDev[$counter]['link'].'" class="card-img-logo "><img src="'.$allDataFromWaysOfDev[$counter]['logo'].'" class="img-fluid card-logo-style"  alt=""></a>
                                <div class="card-body d-flex flex-column text-center">
                                    <h4 class="card-title text-center"><b>'.$allDataFromWaysOfDev[$counter]['title'].'</b></h4>
                                    <p class="card-text">'.$allDataFromWaysOfDev[$counter]['description'].'</p>
                                    <br>
                                      <div class=" w-100 d-flex justify-content-around mt-auto">
                                        <button type="button" class="btn btn-purple-outline pointer mt-auto" data-toggle="modal" data-target="#myModal'.$allDataFromWaysOfDev[$counter]['id'].'">Редактировать
                                        </button>
                                        <form action="" method="POST">
                                            <button name="deleteWay'.$allDataFromWaysOfDev[$counter]['id'].'" type="submit" class="btn btn-purple-outline pointer mt-auto">Удалить
                                            </button>
                                        </form>
                                      </div>
                                </div>
                            </div>
                        </div>';
                    }
                  ?>
                </div>
            </div>

        <!-- NEWS TAB -->
            <p class="dropChanges d-flex flex-start mx-1">
                <button class="btn btn-purple-outline pointer btnsize" data-toggle="collapse" href="#news" aria-expanded="false" aria-controls="collapseExample">
                    Новости
                </button>
                <!-- кнопка добавления новости тут -->
                <button class="my-0 mx-2 btn btn-purple-outline pointer btnSizeAdd" data-toggle="modal" data-target="#addNews" aria-expanded="false"> +
                </button>
            </p>
    <div class="collapse" id="news">
        <div class="card card-block dropChangesInfoField fieldChanges">
            <!-- News -->
            <div class="container mt-4 py-2">
                <!-- News Row -->
                <div class="row mx-auto mt-4 py-2">
                <!-- Новости -->
                <?
                  $dataAboutNews = getFromOneTable('news');
                  for($counter = 0; $counter < count($dataAboutNews); $counter++)
                  {
                    if($dataAboutNews[$counter]['description'] != '')
                    {
                      $otherString = substr($dataAboutNews[$counter]['description'], 40);
                      $halfText = substr($dataAboutNews[$counter]['description'], 0, 40).substr($otherString, 0, strpos($otherString, ".") + 1);
                      echo '<div class="card-container col-sm-12 col-md-6  col-lg-4 p-2">
                              <div class="card card-half-transparent h-100">
                                  <div class="card-body d-flex flex-column text-center">
                                      <img src="'.$dataAboutNews[$counter]['img'].'" alt="ALT" class="img-fluid pb-3 news-img-style">
                                      <h4 class="card-title text-center"><b>'.$dataAboutNews[$counter]['title'].'</b></h4>
                                      <p class="card-text">'.$halfText.'</p>
                                      <div class="text-center mt-auto d-flex justify-content-around">
                                          <button type="button" class="btn btn-purple-outline pointer" data-toggle="modal" data-target="#New'.$dataAboutNews[$counter]['id'].'">
                                            Редактировать
                                          </button>
                                          <form action="" method="POST">
                                              <button name="deleteNews'.$dataAboutNews[$counter]['id'].'" class="btn btn-purple-outline pointer" type="submit">Удалить</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                              </div>';
                    }
                  }
                  for($counter = 0; $counter < count($dataAboutNews); $counter++)
                  {
                    if(isset($_POST['deleteNews'.$dataAboutNews[$counter]['id']]))
                    {
                      $GLOBALS['mysqli']->query("DELETE FROM `news` WHERE `news`.`title` = '".$dataAboutNews[$counter]['id']."';");
                      $GLOBALS['mysqli']->query("DELETE FROM `news` WHERE `news`.`id` = ".$dataAboutNews[$counter]['id'].";");
                      echo '<script>document.location.href="adminmain.php"</script>';
                    }
                  }
                ?>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>


    <!-- Top Navigation
    <script src="res/js/dropMenu.js"></script>
    -->


<?
  for($counter = 0; $counter < count($allDataFromWaysOfDev); $counter++)
  {
    echo '<div class="modal fade" id="myModal'.$allDataFromWaysOfDev[$counter]['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Редактирование</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="" method="POST">
                  <div class="modal-body">
                      <div class="form-group">
                        <label for="title" class="col-form-label">Заголовок направления</label>
                        <input name="titleForEditWay" type="text" class="form-control" id="recipient-name" value="'.$allDataFromWaysOfDev[$counter]['title'].'">
                      </div>
                      <div class="form-group">
                        <label for="discription" class="col-form-label">Описание направления</label>
                        <textarea name="textForEditWay" class="form-control" id="message-text">'.$allDataFromWaysOfDev[$counter]['description'].'</textarea>
                      </div>
                      <div class="form-group">
                        <label >Выберите логотип направления</label>
                        <input type="file" name="logoForEditWay" class="form-control" value="'.$allDataFromWaysOfDev[$counter]['logo'].'">
                      </div>
                      <div class="form-group">
                        <label>Напишите на что будет ссылаться данная статья</label>
                        <input type="text" name="linkForEditWay" value="'.$allDataFromWaysOfDev[$counter]['link'].'">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-purple-outline pointer" data-dismiss="modal">Закрыть</button>
                    <button name="editWay'.$allDataFromWaysOfDev[$counter]['id'].'" type="submit" class="btn btn-purple-outline pointer">Применить изменения</button>
                  </div>
                  </form>
                </div>
            </div>
        </div>
    </div>';
  }

  for($counter = 0; $counter < count($allDataFromWaysOfDev); $counter++)
  {
    $dataFromPost = $_POST;
    if(isset($dataFromPost['editWay'.$allDataFromWaysOfDev[$counter]['id']]))
    {
      $GLOBALS['mysqli']->query("UPDATE `waysofdevelopment` SET `title` = '".$dataFromPost['titleForEditWay']."',
                                `description` = '".$dataFromPost['textForEditWay']."',
                                `logo` = 'res/\img\/logos/".$dataFromPost['logoForEditWay']."',
                                `link` = '".$dataFromPost['linkForEditWay']."' WHERE `waysofdevelopment`.`id` = ".$allDataFromWaysOfDev[$counter]['id'].";");
      echo '<script>document.location.href="adminmain.php"</script>';
    }

    if(isset($dataFromPost['deleteWay'.$allDataFromWaysOfDev[$counter]['id']]))
    {
      $GLOBALS['mysqli']->query("DELETE FROM `waysofdevelopment` WHERE `waysofdevelopment`.`id` = ".$allDataFromWaysOfDev[$counter]['id'].";");
      echo '<script>document.location.href="adminmain.php"</script>';
    }
  }
?>

    <!-- MODALS FOR NEWS
        В них же записываются даннеы из БД с возможностью редактирования-->
<!-- Новость 1 -->

<?
  for($counter = 0; $counter < count($dataAboutNews); $counter++)
  {
    if($dataAboutNews[$counter]['description'] != '')
    {
      echo '<div class="modal fade" id="New'.$dataAboutNews[$counter]['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Редактирование новости</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="" method="POST">
                  <div class="modal-body">
                              <div class="form-group">
                                <label for="title" class="col-form-label">Заголовок новости</label>
                                <input name="titleForEditNew" type="text" class="form-control" id="recipient-name" value="'.$dataAboutNews[$counter]['title'].'">
                              </div>
                              <div class="form-group">
                                <label for="title" class="col-form-label">Контакты</label>
                                <input name="contactsForEditNew" type="text" class="form-control" id="recipient-name" value="'.$dataAboutNews[$counter]['contacts'].'">
                              </div>
                              <div class="form-group">
                                <label for="discription" class="col-form-label">Описание</label>
                                <textarea name="textForEditNew" class="form-control" id="message-text">'.$dataAboutNews[$counter]['description'].'</textarea>
                              </div>
                              <div class="form-group">
                                  <div class="images">';
        $counterForIndexImages = 0;
        for($counterImages = 0; $counterImages < count($dataAboutNews); $counterImages++)
        {
          if($dataAboutNews[$counterImages]['title'] == $dataAboutNews[$counter]['id'])
          {
            echo '<div class="imgs d-flex justify-content-center">

                    <div id="picture'.$dataAboutNews[$counterImages]['id'].'" style="display: block;">
                      <img src="'.$dataAboutNews[$counterImages]['img'].'" alt="ALT" class="img-fluid pb-3 news-img-style">
                    </div>
                    <button id="'.$dataAboutNews[$counterImages]['id'].'" type="button" class="close d-flex flex-column justify-content-start pointer" onclick="deletePic(this)" aria-label="Close">
                        <span>&times;</span>
                    </button>

                  </div>';
            $counterForIndexImages++;
          }
        }
        $counterForIndexImages = 0;
        echo '                </div>
                              </div>
                              <div class="form-group">
                                <label >Изображение</label>
                                <br>
                                <input type="file" name="imagesOfEditing[]" multiple>
                              </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-purple-outline pointer" data-dismiss="modal">Закрыть</button>
                    <button name="editNew'.$dataAboutNews[$counter]['id'].'" type="submit" class="btn btn-purple-outline pointer">Сохранить изменения</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>';
    }
  }
  $dataFromPostForEdit = $_POST;
  for($counter = 0; $counter < count($dataAboutNews); $counter++)
  {
    if(isset($dataFromPostForEdit['editNew'.$dataAboutNews[$counter]['id']]))
    {
      $GLOBALS['mysqli']->query("UPDATE `news` SET `title` = '".$dataFromPostForEdit['titleForEditNew']."',
                                `description` = '".$dataFromPostForEdit['textForEditNew']."',
                                `contacts` = '".$dataFromPostForEdit['contactsForEditNew']."' WHERE `news`.`id` = ".$dataAboutNews[$counter]['id'].";");
      if($dataFromPostForEdit['imagesOfEditing'][0] != "")
      {
        for($counterImages = 0; $counterImages < count($dataFromPostForEdit['imagesOfEditing']); $counterImages++)
        {
          $GLOBALS['mysqli']->query("INSERT INTO `news` (`title`, `description`, `contacts`, `img`)
                                    VALUES ('".$dataAboutNews[$counter]['id']."',
                                            '',
                                            '',
                                            'res/\img\/news/".$_POST['imagesOfEditing'][$counterImages]."')");
        }
      }
     echo '<script>document.location.href="adminmain.php"</script>';
    }
  }
?>


<!-- MODALS FOR ADDING + -->
<!-- Modal for adding work field -->
   <div class="modal fade" id="addWorkField" tabindex="-1" role="dialog" aria-labelledby="modalPortfolio_addLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-items-center" id="exampleModalLabel"> Добавить направление </h5>
                    <button type="button" class="close pointer" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body">

                        <!-- тут заголовок, который добавляется в бд -->
                        <div class="form-group">
                            <label for="title" class="col-form-label">Название направления</label>
                            <input type="text" name="titleForAddWay" class="form-control" id="title">
                        </div>

                        <!-- тут описание добавляется в бд -->
                        <div class="form-group">
                            <label for="discriptionPortfolio" class="col-form-label">Описание направления</label>
                            <textarea class="form-control" name="textForAddWay" id="discriptionPortfolio"></textarea>
                        </div>
                        <div class="form-group">
                          <label >Выберите логотип направления</label>
                          <input type="file" name="logoForAddWay" class="form-control" >
                        </div>
                        <div class="form-group">
                          <label>Напишите на что будет ссылаться данная статья</label>
                          <input type="text" name="linkForAddWay" class="form-control" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-purple-outline pointer" data-dismiss="modal">Закрыть</button>
                        <!-- По нажатию на эту кнопку все данные отсюда добавляются в бд и отображаются на сайте -->
                        <button type="submit" name="addWay" class="btn btn-purple-outline pointer">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?

      if(isset($_POST['addWay']))
      {
        $GLOBALS['mysqli']->query("INSERT INTO `waysofdevelopment`(`title`, `description`, `logo`, `link`)
                                  VALUES ('".$_POST['titleForAddWay']."',
                                          '".$_POST['textForAddWay']."',
                                          'res/\img\/logos/\\".$_POST['logoForAddWay']."',
                                          '".$_POST['linkForAddWay']."')");
        echo '<script>document.location.href="adminmain.php"</script>';
      }
    ?>

<!-- MODAL FOR ADDING NEWS -->
   <div class="modal fade" id="addNews" tabindex="-1" role="dialog" aria-labelledby="modalPortfolio_addLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-items-center" id="exampleModalLabel"> Добавить новость </h5>
                    <button type="button" class="close pointer" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" >
                    <div class="modal-body">

                        <!-- тут заголовок, который добавляется в бд -->
                        <div class="form-group">
                            <label for="title" class="col-form-label">Название новости</label>
                            <input name="titleForAddNew" type="text" class="form-control" id="title">
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-form-label">Контакты</label>
                            <input name="contactsForAddNew" type="text" class="form-control" id="title">
                        </div>

                        <!-- тут описание добавляется в бд -->
                        <div class="form-group">
                            <label for="discriptionPortfolio" class="col-form-label">Описание новости</label>
                            <textarea name="textForNewNew" class="form-control" id="discriptionPortfolio"></textarea>
                            <label for="">Изображение</label>
                            <br>
                            <input type="file" name="file[]" multiple>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-purple-outline pointer" data-dismiss="modal">Закрыть</button>
                        <!-- По нажатию на эту кнопку все данные отсюда добавляются в бд и отображаются на сайте -->
                        <button name="addNews" type="submit" class="btn btn-purple-outline pointer">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?
      $postFromAddNew = $_POST;
      if(isset($postFromAddNew['addNews']))
      {
        $GLOBALS['mysqli']->query("INSERT INTO `news` (`title`, `description`, `contacts`, `img`)
                                  VALUES ('".$postFromAddNew['titleForAddNew']."',
                                          '".$postFromAddNew['textForNewNew']."',
                                          '".$postFromAddNew['contactsForAddNew']."',
                                          'res/\img\/news/\\".$postFromAddNew['file'][0]."')");
        $dataAboutTheNew = findSmthFromTable('news', 'title', $postFromAddNew['titleForAddNew']);
        for($counter = 1; $counter < count($postFromAddNew['file']); $counter++)
        {
          $GLOBALS['mysqli']->query("INSERT INTO `news` (`title`, `description`, `contacts`, `img`)
                                    VALUES ('".$dataAboutTheNew[0]['id']."',
                                            '',
                                            '',
                                            'res/\img\/news/\\".$_POST['file'][$counter]."')");
        }
        echo '<script>document.location.href="adminmain.php"</script>';
      }


    ?>
    <script type="text/javascript">
      function deletePic(object)
      {
        var sex = object.id;
        $.ajax({
            type: 'POST',
            url: 'functions/deletePic.php?type=news',
            data: {sex: sex},
            success: function(data){
              $(object).parent().fadeOut().remove();
            }
          });
      }
    </script>

    <!-- Ours script -->
    <script src="res/js/deleteImages.js"></script>
    <!-- Bootstrap js -->
    <script src="res/jquery/jquery-3.2.1.min.js"></script>
    <script src="res/popper/popper.js"></script>
    <script src="res/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
