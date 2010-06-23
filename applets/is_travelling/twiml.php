<?php
require_once(dirname(__FILE__) . '/../../lib/dopplr.php');

$user = OpenVBX::getCurrentUser();
$dopplr_token = PluginData::get("dopplr_token_{$user->id}", "");

$dopplr = new Dopplr($dopplr_token);
$response = new Response();

if($dopplr->is_travelling()) {
  $response->addRedirect(AppletInstance::GetDropZoneUrl('on_the_road'));
} else {
  $response->addRedirect(AppletInstance::GetDropZoneUrl('at_home'));
}

$response->Respond();