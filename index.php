<?php

require_once "blizzard_api/blizzard_api.php";
$apiClient = new BlizzardAPI\Wow\Wow('us');
$character = $apiClient->character()->get('blades-edge', 'canucker', ['locale'=>'en_US']);
?>