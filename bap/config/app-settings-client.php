<?php
$memberPageSettings = require (config_path('/client/page/app-page-settings.php'));
$memberFormSettings = require (config_path('/client/form/app-form-settings.php'));
$appSettingClient = config('app-settings');
return array_merge_recursive($appSettingClient, $memberPageSettings, $memberFormSettings);
