<?php
require_once(dirname(__FILE__) . '/../../lib/dopplr.php');

$user = OpenVBX::getCurrentUser();
$dopplr_token = PluginData::get("dopplr_token_{$user->id}", "");

$dopplr = new Dopplr($dopplr_token);
$response = new Response();

$response->addSay($dopplr->timezone());
$response->addRedirect(AppletInstance::getDropZoneUrl('next'));
$response->Respond();

?>