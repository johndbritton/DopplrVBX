<?php
$token = PluginData::get('dopplr_token');
$baseurl = PluginData::get('dopplr_baseurl');

$response = new Response();
$response->addSay('John is currently on the road.');
$response->Respond();