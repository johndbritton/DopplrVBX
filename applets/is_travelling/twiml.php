<?php
require_once(dirname(__FILE__) . '/../../lib/dopplr.php');
$dopplr = new Dopplr();
$response = new Response();

if($dopplr->is_travelling()) {
  $response->addRedirect(AppletInstance::GetDropZoneUrl('on_the_road'));
} else {
  $response->addRedirect(AppletInstance::GetDropZoneUrl('at_home'));
}

$response->Respond();