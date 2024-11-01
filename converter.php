<?php
/*
Plugin Name: Unit Converter Pro
Version: 2.0
Plugin URI: https://converter.net
Description: Convert all units of measurement.
Author: XWM
Author URI: https://converter.net
*/
add_action( 'widgets_init', 'converter_init' );
 
function converter_init() {
    register_widget( 'converter' );
}

class converter extends WP_Widget {
 
    public function __construct()
    {
        $widget_details = array(
            'classname' => 'converter',
            'description' => 'Unit Conversion Widget'
        );
 

        parent::__construct( 'converter', 'Unit Converter Pro', $widget_details );
 
    }
 
 
	public function widget( $args, $instance ) {

			$type = $instance['type'];
			$formula = $instance['formula'];
		
			if($type == "")
			{
				$type = "all";
			}
		
			echo "<iframe src='https://converter.net/webmasters/get-converter?type=$type&formula=$formula' frameborder=\"0\" allowtransparency=\"true\" scrolling=\"no\" style='height:327px'></iframe>";
		
	}

public function form($instance)
	{
	     $instance = wp_parse_args( (array) $instance, array('type' => '') );
	     $type = $instance['type'];
		?>
<br><br>
<label for="<?php echo $this->get_field_id('type'); ?>">Choose Converter Type<br><br>
	<select name="<?php echo $this->get_field_name('type'); ?>" id="">
		<option value="all" <?php echo ($type=='all')?'selected':''; ?>>All</option>
		<option value="mass" <?php echo ($type=='mass')?'selected':''; ?>>Mass</option>
		<option value="length" <?php echo ($type=='lenght')?'selected':''; ?>>Length</option>
		<option value="temperature" <?php echo ($type=='temperature')?'selected':''; ?>>Temperature</option>
		<option value="area" <?php echo ($type=='area')?'selected':''; ?>>Area</option>
		<option value="volume" <?php echo ($type=='volume')?'selected':''; ?>>Volume</option>
		<option value="digital" <?php echo ($type=='digital')?'selected':''; ?>>Digital</option>
		<option value="time" <?php echo ($type=='time')?'selected':''; ?>>Time</option>
		<option value="partsPer" <?php echo ($type=='partsPer')?'selected':''; ?>>Parts-per</option>
		<option value="speed" <?php echo ($type=='speed')?'selected':''; ?>>Speed</option>
		<option value="pace" <?php echo ($type=='pace')?'selected':''; ?>>Pace</option>
		<option value="pressure" <?php echo ($type=='pressure')?'selected':''; ?>>Pressure</option>
		<option value="current" <?php echo ($type=='current')?'selected':''; ?>>Current</option>
		<option value="voltage" <?php echo ($type=='voltage')?'selected':''; ?>>Voltage</option>
		<option value="power" <?php echo ($type=='power')?'selected':''; ?>>Power</option>
		<option value="reactivePower" <?php echo ($type=='reactivePower')?'selected':''; ?>>Reactive Power</option>
		<option value="apparentPower" <?php echo ($type=='apparentPower')?'selected':''; ?>>Apparent Power</option>
		<option value="energy" <?php echo ($type=='energy')?'selected':''; ?>>Energy</option>
		<option value="reactiveEnergy" <?php echo ($type=='reactiveEnergy')?'selected':''; ?>>Reactive Energy</option>
		<option value="volumeFlowRate" <?php echo ($type=='volumeFlowRate')?'selected':''; ?>>Volume Flow Rate</option>
		<option value="illuminance" <?php echo ($type=='illuminance')?'selected':''; ?>>Illuminance</option>
		<option value="frequency" <?php echo ($type=='frequency')?'selected':''; ?>>Frequency</option>
		<option value="angle" <?php echo ($type=='angle')?'selected':''; ?>>Angle</option>	</select>
</label>
<br /><br />
		<?php

	}


	private function add_field($field_name, $field_description = '', $field_default_value = '', $field_type = 'text')
	{
		if(!is_array($this->fields))
			$this->fields = array();
		$this->fields[$field_name] = array('name' => $field_name, 'description' => $field_description, 'default_value' => $field_default_value, 'type' => $field_type);
	}

	/**
	 * Updating widget by replacing the old instance with new
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array
	 */
	public function update($new_instance, $old_instance)
	{
		return $new_instance;
	}
} // class converter
?>