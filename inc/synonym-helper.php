<?php

class DocumentationSynonymHelper extends Nightsparrow {

  function returnStatusIntegerIDFromStatusName($name) {
    switch ($name) {
      case 'published':
        return 0;
        break;

      case 'draft':
        return 1;

      case 'awaitingReview':
        return 2;

      case 'archived':
        return 3;

      default:
        $ns->throwError(0x3A3A3A);
        break;
    }

  }
