<?php

class Start_Page_Type extends Papi_Page_Type {

  /**
   * The page type meta options.
   *
   * @return array
   */

  public function page_type () {
    return [
      'name'        => 'Startsida',
      'description' => 'Landningsidan för Unga Rörelsehindrade',
      'template'    => 'page-templates/start-page.php'
    ];
  }

}
