<?php
require_once(dirname(__FILE__) . '/../../lib/dopplr.php');
$dopplr = new Dopplr();
$response = new Response();

$response->addSay($dopplr->local_time());
$response->addRedirect(AppletInstance::getDropZoneUrl('next'));
$response->Respond();

?>