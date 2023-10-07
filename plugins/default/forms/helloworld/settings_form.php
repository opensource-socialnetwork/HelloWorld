<?php
$component = new OssnComponents();
$settings  = $component->getSettings('HelloWorld');

$setting_one = "";
$setting_two = "";
$setting_dropdown = "";

if($settings){
	if(isset($settings->setting_one)){
		$setting_one = $settings->setting_one;
	}
	if(isset($settings->setting_two)){
		$setting_two = $settings->setting_two;
	}	
	if(isset($settings->setting_dropdown)){
		$setting_dropdown = $settings->setting_dropdown;
	}		
}
?>
<div>
	<label>Form Setting One</label>
	<input type="text" name="setting_one" value="<?php echo $setting_one;?>" />
</div>
<div>
	<label>Form Setting Two</label>
	<input type="text" name="setting_two"   value="<?php echo $setting_two;?>"/>
</div>
<div>
	<label>Form Setting Dropdown</label>
	<?php 
	echo ossn_plugin_view('input/dropdown', array(
			'name' => 'setting_dropdown',
			'value' => $setting_dropdown,
			'placeholder' => 'Dropdown Example',
			'options' => array(
				'a' => 'Option A',
				'b' => 'Opton B',
			),
	));
	?>
</div>
<input type="submit" class="btn btn-success" value="Save" />