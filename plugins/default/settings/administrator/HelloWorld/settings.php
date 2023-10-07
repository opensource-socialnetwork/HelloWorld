<?php

echo ossn_view_form('helloworld/settings_form', array(
    'action' => ossn_site_url() . 'action/helloworld/admin/settings',
    'class' => 'ossn-admin-form'	
));