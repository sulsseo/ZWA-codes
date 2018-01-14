<?php
/**
 * Class generating html of dynamic elements on page
 *
 * User: kuba
 * Date: 10/01/2018
 * Time: 22:08
 */

require_once('article_lib.php');

/**
 * Easy getter for background tag for bootstrap. Base on id_color.
 *
 * @param $id_color int between 1 and 6 including
 * @return string of bootstrap tag
 */
function get_bgcolor_class($id_color) {
    switch ($id_color) {
        case 1:
            $color = 'bg-dark'; // by default - dark grey
            break;
        case 2:
            $color = 'bg-primary'; // blue
            break;
        case 3:
            $color = 'bg-secondary'; // light grey
            break;
        case 4:
            $color = 'bg-success'; // light green
            break;
        case 5:
            $color = 'bg-warning'; // yellow
            break;
        case 6:
            $color = 'bg-danger'; // red
            break;
        default:
            $color = 'bg-dark';
            break;
    }
    return $color;
}

/**
 * Easy getter for button tag for bootstrap css style. Base on id_color.
 *
 * @param $id_color int between 1 and 6 including
 * @return string of bootstrap btn tag
 */
function get_btncolor_class($id_color) {
    switch ($id_color) {
        case 1:
            $color = 'btn-dark'; // by default - dark grey
            break;
        case 2:
            $color = 'btn-primary'; // blue
            break;
        case 3:
            $color = 'btn-secondary'; // light grey
            break;
        case 4:
            $color = 'btn-success'; // light green
            break;
        case 5:
            $color = 'btn-warning'; // yellow
            break;
        case 6:
            $color = 'btn-danger'; // red
            break;
        default:
            $color = 'btn-dark';
            break;
    }
    return $color;
}

/**
 * Generator of navigation in html.
 *
 * @param $id_color int between 1 and 6 including
 * @param $login true/false if user is logged
 * @return string complete html of navigation
 */
function get_navigation($id_color, $login) {
    if ($login) {
        $hide = array(
            1 => '',
            2 => 'hiden',
            3 => 'hiden',
            4 => '',
            5 => 'hiden',
            6 => '',
            7 => '',
            8 => '',
            9 => '');
    } else {
        $hide = array(
            1 => '',
            2 => '',
            3 => '',
            4 => '',
            5 => 'hiden',
            6 => 'hiden',
            7 => 'hiden',
            8 => '',
            9 => '');
    }

    $navi = '<nav class="navbar navbar-expand-lg navbar-dark '.get_bgcolor_class($id_color).' fixed-top" id="mainNav">
                    <div class="container">
                        <a class="navbar-brand js-scroll-trigger" href="#page-top">Výběžek.eu</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item '.$hide[1].'">
                                    <a class="nav-link" href="index.php">Domů</a>
                                </li>
                                <li class="nav-item '.$hide[2].'">
                                    <a class="nav-link" href="login.php">Přihlášení</a>
                                </li>
                                <li class="nav-item '.$hide[3].'">
                                    <a class="nav-link" href="registration.php">Registrace</a>
                                </li>
                                <li class="nav-item '.$hide[4].'">
                                    <a class="nav-link" href="example.php">Rubrika</a>
                                </li>
                                <li class="nav-item '.$hide[5].'">
                                    <a class="nav-link" href="article.php">Článek</a>
                                </li>
                                <li class="nav-item '.$hide[6].'">
                                    <a class="nav-link" href="profile.php">Profil</a>
                                </li>
                                <li class="nav-item '.$hide[7].'">
                                    <a class="nav-link" href="logout.php">Odhlášení</a>
                                </li>
                                <li class="nav-item '.$hide[8].'">
                                    <a class="nav-link" href="documentation.pdf">Dokumentace</a>
                                </li>
                                <li class="nav-item '.$hide[9].'">
                                    <a class="nav-link" href="doxydoc/html/index.html">DoxyDoc</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>';
    return $navi;
}

/**
 * Get footer specified with color
 *
 * @param $id_color - number of color from 1 to 6, dark grey by default
 * @return string - html of specified footer
 */
function get_footer($id_color) {
    $footer = '<footer class="py-3 '.get_bgcolor_class($id_color).'">
                    <div class="container text-center text-white">
                        <p>Vytvořeno v rámci předmětu ZWA</p>
                        <p>Autor:  Jakub Trmal - trmaljak@fel.cvut.cz</p>
                    </div>
                </footer>';
    return $footer;
}

/**
 * Generate jumbotron for given article index
 *
 * article structure [id_article, title, perex, body, author, category]
 *
 * @param $id_article id in db to get specify article
 * @param $id_color int between 1 and 6 including
 * @return string html of specified jumbotron - bootstrap object
 */
function get_jumbotron($id_article, $id_color)
{
    $article = get_article($id_article);
    $result = '<section id="'.$id_article.'">
                    <div class="container jumbotron bg-light">
                        <h4 class="display-4">'.$article["title"].'</h4>
                        <p class="lead">'.$article["perex"].'</p>
                        <hr class="my-4">
                        <p class="lead">
                            <a class="btn '.get_btncolor_class($id_color).' btn-lg" href="article.php?id='.$id_article.'" role="button">Číst</a>
                        </p>
                    </div>
                </section>';
    return $result;
}

/**
 * HTML generator of pagination on bottom of page
 *
 * @param $a number of articles on one page
 * @param $p current page
 * @param $max_a number of articles in database
 * @param $id_color int between 1 and 6 including
 * @return string generated html of pagination
 */
function get_pagination($a, $p, $max_a, $id_color) {
    $num_pages = round($max_a/$a);
    $result = '<div class="bg-light">
                    <ul class="container pagination pagination-lg">';
    for ($i = 1; $i <= $num_pages; ++$i) {
        if ($i == $p) {
            $result .= '<li class="active '.get_btncolor_class($id_color).'"><a href="index.php?a='.$a.'&p='.$i.'">'.$i.'</a></li>';
        } else {
            $result .= '<li><a href="index.php?a='.$a.'&p='.$i.'">'.$i.'</a></li>';
        }
    }
    $result .= '</ul>
                    </div>';
    return $result;
}
