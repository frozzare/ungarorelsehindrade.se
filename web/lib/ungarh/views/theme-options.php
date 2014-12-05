<div class="wrap">
    <h2><?php _e( 'Inställningar', 'urh' ); ?></h2>

    <form id="urh-theme-options" action="" method="post">

    <table>

      <tbody>

        <tr>

          <td>
            <label for="urh_theme_option_name">Name</label>
          </td>

          <td>
            <input type="text" name="urh_theme_option_name" value="<?php echo urh_get_theme_option( 'name', '' ); ?>" />
          </td>

        </tr>

        <tr>

          <td>
            <label for="urh_theme_option_description">Beskrivning</label>
          </td>

          <td>
            <textarea name="urh_theme_option_description"><?php echo urh_get_theme_option( 'description', '' ); ?></textarea>
          </td>

        </tr>

      </tbody>

    </table>

    <?php submit_button(); ?>

  </form>
</div>
