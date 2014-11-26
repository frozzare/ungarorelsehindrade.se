(function ($) {

  // Property Post

  papi.properties.post = {

    /**
     * Initialize pikaday field when added to repeater.
     *
     * @param object $this
     */

    updateSelect: function ($this) {
      $this.parent().find('select').select2();
    }

  };

  // Events

  $(document).on('papi_property_repeater_added', '[value="post"]', function (e) {
    e.preventDefault();

    papi.properties.post.updateSelect($(this));
  });

})(jQuery);
