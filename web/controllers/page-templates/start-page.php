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
      'template'    => 'page-templates/start-page.php',
      'post_type'         => 'start_sida'
    ];
  }

  public function register() {

    // Remove comments meta box
    $this->remove( 'comments' );

    // Remove Editor
    $this->remove( 'editor' );

    // Url properties
    $this->box( 'Slogan', array(
      $this->property( [
        'type'  => 'string',
        'title' => 'Slogan',
        'slug'  => 'ungarh_slogan'
      ] )
    ) );

  }

}
