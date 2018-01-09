<?php
require("db_lib.php");

/**
 * Generate jumbotron for given article index
 *
 * article structure [id_article, title, perex, body]
 */
function get_jumbotron($id_article)
{
    $article = get_article($id_article);
    $result = '<section id="jumbotron">
        <div class="container jumbotron bg-light">
            <h4 class="display-4">';
    $result .= $article["title"];
    $result .= '</h4>
        <p class="lead">';
    $result .= $article["perex"];
    $result .= '</p>
        <hr class="my-4">
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="article.php?id='.$id_article.'" role="button">Číst</a>
        </p>
        </div>
        </section>';
    return $result;
}

/**
 * Get title of article
 *
 * @param $id_article id to current article
 * @return mixed pure text of title
 */
function get_title($id_article)
{
    $article = get_article($id_article);
    return $article["title"];
}

/**
 * TODO
 * @param $id_article
 * @return mixed
 */
function get_perex($id_article)
{
    $article = get_article($id_article);
    return $article["perex"];
}

/**
 * TODO
 * @param $id_article
 * @return mixed
 */
function get_body($id_article)
{
    $article = get_article($id_article);
    return $article["body"];
}

/**
 * TODO
 * @param $id_article
 * @return mixed
 */
function get_body2($id_article)
{
    $article = get_article($id_article);
    $body = $article["body"];
    return str_replace('<br>', '<br><br>', $body);
}


?>