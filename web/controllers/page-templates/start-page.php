<?php

public class Start_Page_Type extends Papi_Page_Type {

  /**
   * The page type meta options.
   *
   * @return array
   */

  public function page_type () {
    return [
      'name'        => 'Startsida',
      'description' => 'Första sidan man ser',
      'template'    => 'page-templates/start-page.php'
    ];
  }

}
