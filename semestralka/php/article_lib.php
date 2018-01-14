<?php
/**
 * Article handler library
 */

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
 * Get perex of specified article from db
 *
 * @param $id_article int of article
 * @return mixed plain text of article's perex
 */
function get_perex($id_article)
{
    $article = get_article($id_article);
    return $article["perex"];
}

/**
 * Get body of specified article from db
 *
 * @param $id_article int of article
 * @return mixed plain text of article's body
 */
function get_body($id_article)
{
    $article = get_article($id_article);
    return $article["body"];
}

/**
 * Get modified body of article from db. Add more breaks after paragraph
 *
 * @param $id_article int of article
 * @return mixed plain text of article's body with more breaks
 */
function get_body2($id_article)
{
    $article = get_article($id_article);
    $body = $article["body"];
    return str_replace('<br>', '<br><br>', $body);
}