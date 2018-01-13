<?php
require_once("db_lib.php");

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