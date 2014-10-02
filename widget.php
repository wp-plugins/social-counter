<?php
class Social_Counter extends WP_Widget {
function __construct() {
parent::__construct('Social_Counter','Social Counter',array( 'description' => '&nbsp;'));
}
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
$current_url = home_url(add_query_arg(array()));
$social = new Social;
echo '<div class="sc_div">
<img src="'.plugins_url('img/twitter.png', __FILE__ ).'"/>'.$social->get_tweets($current_url).'<br>
<img src="'.plugins_url('img/linkedin.png', __FILE__ ).'"/>'.$social->get_linkedin($current_url).'<br>
<img src="'.plugins_url('img/facebook.png', __FILE__ ).'"/>'.$social->get_fb($current_url).'<br>
<img src="'.plugins_url('img/google.png', __FILE__ ).'"/>'.$social->get_plusones($current_url).'<br>
<img src="'.plugins_url('img/stumbleupon.png', __FILE__ ).'"/>'.$social->get_stumble($current_url).'<br>
<img src="'.plugins_url('img/delicious.png', __FILE__ ).'"/>'.$social->get_delicious($current_url).'<br>
<img src="'.plugins_url('img/reddit.png', __FILE__ ).'"/>'.$social->get_reddit($current_url).'<br>
<img src="'.plugins_url('img/pinterest.png', __FILE__ ).'"/>'.$social->get_pinterest($current_url).'<br>
</div>';
echo $args['after_widget'];
}
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __('Pavadinimas','sc_lang');
}
echo '<p>
<label for="'.$this->get_field_id( 'title' ).'">'.__('Pavadinimas','sc_lang').':</label>
<input class="widefat" id="'.$this->get_field_id( 'title' ).'" name="'.$this->get_field_name( 'title' ).'" type="text" value="'.esc_attr( $title ).'" />
</p>';
}
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
}