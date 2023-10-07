<?php
$setting_one      = input('setting_one');
$setting_two      = input('setting_two');
$setting_dropdown = input('setting_dropdown');

$component = new OssnComponents();
$settings  = $component->setSettings('HelloWorld', array(
		'setting_one'      => $setting_one,
		'setting_two'      => $setting_two,
		'setting_dropdown' => $setting_dropdown,
));

if($settings) {
		ossn_trigger_message('Settings has been saved');
} else {
		ossn_trigger_message('Settings can not be saved', 'error');
}
redirect(REF);
