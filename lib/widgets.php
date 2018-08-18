<?php
/**
 * Adds Social_List_Widget widget.
 */
class Social_List_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'social_list_widget', // Base ID
      esc_html__( 'Social List', 'text_domain' ), // Name
      array( 'description' => esc_html__( 'A widget that displays the social networks defined in the Site Settings', 'text_domain' ), ) // Args
    );
  }

  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {

    echo $args['before_widget'];
    if ( ! empty( $instance['instagram'] ) ) {
      echo $args['before_title'] . $instance['instagram']. $args['after_title'];
    }
    if ( ! empty( $instance['facebook'] ) ) {
      echo $args['before_title'] . $instance['facebook']. $args['after_title'];
    }
    if ( ! empty( $instance['twitter'] ) ) {
      echo $args['before_title'] . $instance['twitter']. $args['after_title'];
    }
    if ( ! empty( $instance['google_plus'] ) ) {
      echo $args['before_title'] . $instance['google_plus']. $args['after_title'];
    }
    if ( ! empty( $instance['linkedin'] ) ) {
      echo $args['before_title'] . $instance['linkedin']. $args['after_title'];
    }
    if ( ! empty( $instance['youtube'] ) ) {
      echo $args['before_title'] . $instance['youtube']. $args['after_title'];
    }
    if ( ! empty( $instance['pinterest'] ) ) {
      echo $args['before_title'] . $instance['pinterest']. $args['after_title'];
    }

    echo $args['after_widget'];
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    $instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : get_field('social_instagram', 'option');
    $facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : get_field('social_facebook', 'option');
    $twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : get_field('social_instagram', 'option');
    $google_plus = ! empty( $instance['google_plus'] ) ? $instance['google_plus'] : get_field('social_google_plus', 'option');
    $youtube = ! empty( $instance['youtube'] ) ? $instance['youtube'] : get_field('social_youtube', 'option');
    $linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : get_field('social_linkedin', 'option');
    $pinterest = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : get_field('social_pinterest', 'option');
    ?>
    <p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'social_instagram' ) ); ?>"><?php esc_attr_e( 'Instagram:', 'text_domain' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'social_instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'social_instagram' ) ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>">
    </p>
    <p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'social_facebook' ) ); ?>"><?php esc_attr_e( 'Facebook:', 'text_domain' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'social_facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'social_facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>">
    </p>
    <p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'social_twitter' ) ); ?>"><?php esc_attr_e( 'Twitter:', 'text_domain' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'social_twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'social_twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>">
    </p>
    <p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'social_google_plus' ) ); ?>"><?php esc_attr_e( 'Google Plus:', 'text_domain' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'social_google_plus' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'social_google_plus' ) ); ?>" type="text" value="<?php echo esc_attr( $google_plus ); ?>">
    </p>
    <p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'social_youtube' ) ); ?>"><?php esc_attr_e( 'Youtube:', 'text_domain' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'social_youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'social_youtube' ) ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>">
    </p>
    <p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'social_facebook' ) ); ?>"><?php esc_attr_e( 'Pinterest:', 'text_domain' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'social_pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'social_pinterest' ) ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>">
    </p>
    <?php
  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();

    $instance['instagram'] = ! empty( $new_instance['social_instagram'] ) ? sanitize_text_field( $new_instance['social_instagram'] ) : get_field('social_instagram', 'option');
    $instance['facebook'] = ! empty( $new_instance['social_facebook'] ) ? sanitize_text_field( $new_instance['social_facebook'] ) : get_field('social_facebook', 'option');
    $instance['twitter'] = ! empty( $new_instance['social_twitter'] ) ? sanitize_text_field( $new_instance['social_twitter'] ) : get_field('social_instagram', 'option');
    $instance['google_plus'] = ! empty( $new_instance['social_google_plus'] ) ? sanitize_text_field( $new_instance['social_google_plus'] ) : get_field('social_google_plus', 'option');
    $instance['youtube'] = ! empty( $new_instance['social_youtube'] ) ? sanitize_text_field( $new_instance['social_youtube'] ) : get_field('social_youtube', 'option');
    $instance['linkedin'] = ! empty( $new_instance['social_linkedin'] ) ? sanitize_text_field( $new_instance['social_linkedin'] ) : get_field('social_linkedin', 'option');
    $instance['pinterest'] = ! empty( $new_instance['social_pinterest'] ) ? sanitize_text_field( $new_instance['social_pinterest'] ) : get_field('social_pinterest', 'option');

    return $instance;
  }

} // class Social_List_Widget