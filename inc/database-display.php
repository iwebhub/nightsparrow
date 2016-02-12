<?php

class PageDisplayManager extends Nightsparrow {
  function __construct() {
    parent::__construct();
  }

  /** dobavlja posljednjih x stranica s odrednicom vrste y i statusom z te ih vraća kao višedimenzionalni array **/
  function getLatestPagesWithTypeAndStatusAPI($numberOfPages, $type, $status) {
    $dbconn = $this->mysqliConnect();
    $numberOfPages = $dbconn->real_escape_string($numberOfPages);
    $type = $dbconn->real_escape_string($type);
    $status = $dbconn->real_escape_string($status);
    $sql = "SELECT * FROM nb_pages WHERE type = '$type' AND status = '$status' ORDER BY id DESC LIMIT $numberOfPages";
    $res = $dbconn->query($sql);
    if ($res === false) {
      echo $dbconn->error;
      $this->throwError(0x010010);
    }
    if ($res->num_rows == 0) {
      return 404;
    }
    $pages = array();
    while ($page = $res->fetch_assoc()) {
      $pages[] = $page;
    }

    return $pages;


  }
}
