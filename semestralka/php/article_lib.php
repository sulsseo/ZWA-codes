<?php 
    require("db_lib.php");

    /**
     * Generate jumbotron for given article index
     * 
     * article structure [id_article, title, perex, body]
     */
    function get_jumbotron($id_article) {
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
            <a class="btn btn-primary btn-lg" href="#" role="button">Číst</a>
        </p>
        </div>
        </section>';
        return $result;
    }

?>