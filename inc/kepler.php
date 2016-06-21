<?php

/**
 * Created by PhpStorm.
 * User: mbm
 * Date: 02/09/15
 * Time: 03:13
 */
class Kepler extends Nightsparrow
{
    function getSearchResultsForTerm($term, $results = 10, $scope = 'pages')
    {
        $dbconn = $this->mysqliConnect();
        $term = str_replace("'", "", $term);
        $term = str_replace("\"", "", $term);
        $term = str_replace("%", "", $term);
        $term = $dbconn->real_escape_string($term);
        $pagesResults = $this->searchPages($term, $results, $dbconn);
        if ($pagesResults == null) {
            echo 'No matching pages.';
        } else {
            echo $pagesResults;
        }
        if ($scope == 'everything') {

        }
    }

    private function searchPages($term, $results = 10, $dbconn)
    {
        $sql = "SELECT id, slug, title, body, summary, MATCH (title,body,summary) AGAINST ('$term') AS score FROM nb_pages WHERE MATCH (title,body,summary) AGAINST ('$term')";
        $sql = "SELECT id,slug, title, body, summary WHERE MATCH (title,body,summary) AGAINST ('$term') AS score FROM nb_pages WHERE MATCH (title,body,summary) AGAINST ('$term')";
        $res = $dbconn->query($sql);
        if ($res === false) {
            echo $dbconn->error;
            $this->throwError(0x010010);
        }
        if ($res->num_rows == 0) {
            return null;
        }
        $pages = $res->fetch_assoc();

        return $pages;
    }
}