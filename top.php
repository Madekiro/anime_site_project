<?php
include "config.php";
session_start();
$_SESSION['conn'] = new mysqli(
    $config['DB_SERVER'],
    $config['DB_USERNAME'],
    $config['DB_PASSWORD'],
    $config['DB_NAME'],
    3306
);
if(!isset($_SESSION['loggedin'])){
    $_SESSION['loggedin'] = false;
}

$query = 'SELECT title, img_url, link from animes order by members desc limit 30';
$result = mysqli_query($_SESSION['conn'], $query);
$animes = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

?>
<!DOCTYPE html>
<html lang="ua">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyAnime</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="styles\index-css.css">
    <link rel="stylesheet" href="styles\hoveroverlay.css">
    <div class="title-header">
        <a href="index.php">MyAnime</a>
        <!-- <img src="recources/title-image.png"> -->
    </div>
    <nav role="navigation" class="navbar navbar-expand-md ">

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#news">Новини</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="genreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Жанри
                    </a>
                    <div class="dropdown-menu" aria-labelledby="genreDropdown">
                        <div class="column">
                            <a class=" dropdown-item" href="#genre">Бойові мистецтва</a>
                            <a class="dropdown-item" href="#genre">Війна</a>
                            <a class="dropdown-item" href="#genre">Драма</a>
                            <a class="dropdown-item" href="#genre">Детектив</a>
                            <a class="dropdown-item" href="#genre">Комедія</a>
                        </div>
                        <div class="column">
                            <a class="dropdown-item" href="#genre">Меха</a>
                            <a class="dropdown-item" href="#genre">Історія</a>
                            <a class="dropdown-item" href="#genre">Містика</a>
                            <a class="dropdown-item" href="#genre">Махо-шьоджо</a>
                            <a class="dropdown-item" href="#genre">Музика</a>
                        </div>
                        <div class="column">
                            <a class="dropdown-item" href="#genre">Повсякденність</a>
                            <a class="dropdown-item" href="#genre">Пригоди</a>
                            <a class="dropdown-item" href="#genre">Романтика</a>
                            <a class="dropdown-item" href="#genre">Шьонен</a>
                            <a class="dropdown-item" href="#genre">Шьоджо</a>

                        </div>
                        <div class="column">
                            <a class="dropdown-item" href="#genre">Спорт</a>
                            <a class="dropdown-item" href="#genre">Триллер</a>
                            <a class="dropdown-item" href="#genre">Жахи</a>
                            <a class="dropdown-item" href="#genre">Фентезі</a>
                            <a class="dropdown-item" href="#genre">Школа</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#top">Топ Аніме</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contacts">Контакти</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if ($_SESSION['loggedin']) { ?>
                    <li class="nav-item">
                    Доброго здоров'я, <?= $_SESSION['name'] ?>!
                    </li>
                    <li class="nav-item">
                        <a href="logout.php">Вихід</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login_form.html">Вхід</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sign_up_form.html">Реєстрація</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-8">
                <table class="table" height="100%">
                    <?php
                    $i = 0;
                    while ($i < 25) { ?>
                        <tr>
                            <?php while ($i < 5) { ?>
                                <td>
                                    <div class="hovereffect">
                                        <a href="anime_info.php?title=<?php echo $animes[$i]['title'] ?>">
                                            <img src="<?php echo htmlspecialchars($animes[$i]['img_url']) ?>" class="img-responsive" height="100%">
                                            <div class="overlay">
                                                <?php echo htmlspecialchars($animes[$i]['title']) ?>
                                            </div>
                                        </a>
                                    </div>
                                </td>
                            <?php ++$i;
                            } ?>
                        </tr>
                        <tr>
                            <?php while ($i < 10) { ?>
                                <td>
                                    <div class="hovereffect">
                                        <a href="anime_info.php?title=<?php echo $animes[$i]['title'] ?>">
                                            <img src="<?php echo htmlspecialchars($animes[$i]['img_url']) ?>" class="img-responsive" height="100%">
                                            <div class="overlay">
                                                <?php echo htmlspecialchars($animes[$i]['title']) ?>
                                            </div>
                                        </a>
                                    </div>
                                </td>
                            <?php ++$i;
                            } ?>
                        </tr>
                        <tr>
                            <?php while ($i < 15) { ?>
                                <td>
                                    <div class="hovereffect">
                                        <a href="anime_info.php?title=<?php echo $animes[$i]['title'] ?>">
                                            <img src="<?php echo htmlspecialchars($animes[$i]['img_url']) ?>" class="img-responsive" height="100%">
                                            <div class="overlay">
                                                <?php echo htmlspecialchars($animes[$i]['title']) ?>
                                            </div>
                                        </a>
                                    </div>
                                </td>
                            <?php ++$i;
                            } ?>
                        </tr>
                        <tr>
                            <?php while ($i < 20) { ?>
                                <td>
                                    <div class="hovereffect">
                                        <a href="anime_info.php?title=<?php echo $animes[$i]['title'] ?>">
                                            <img src="<?php echo htmlspecialchars($animes[$i]['img_url']) ?>" class="img-responsive" height="100%">
                                            <div class="overlay">
                                                <?php echo htmlspecialchars($animes[$i]['title']) ?>
                                            </div>
                                        </a>
                                    </div>
                                </td>
                            <?php ++$i;
                            } ?>
                        </tr>
                        <tr>
                            <?php while ($i < 25) { ?>
                                <td>
                                    <div class="hovereffect">
                                        <a href="anime_info.php?title=<?php echo $animes[$i]['title'] ?>">
                                            <img src="<?php echo htmlspecialchars($animes[$i]['img_url']) ?>" id="<?php echo htmlspecialchars($animes[$i]['title']) ?>" class="img-responsive" height="100%">
                                            <div class="overlay">
                                                <?php echo htmlspecialchars($animes[$i]['title']) ?>
                                            </div>
                                        </a>
                                    </div>
                                </td>
                            <?php ++$i;
                            } ?>
                        </tr>
                    <?php ++$i;
                    } ?>

                </table>
                <div id="contacts">
                    Contacts
                    hitexden@gmail.com
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>