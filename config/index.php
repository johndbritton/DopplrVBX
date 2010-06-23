<?php
  $user = OpenVBX::getCurrentUser();
  $dopplr_token = PluginData::get("dopplr_token_{$user->id}", "");
  if (isset($_REQUEST['savebutton'])) {
    PluginData::set("dopplr_token_{$user->id}",$_REQUEST['token']);
    $dopplr_token = $_REQUEST['token'];
    $message = "Settings Saved!";
  }
?>

<div class="vbx-content-main">
    <div class="vbx-content-menu vbx-content-menu-top">
        <h2 class="vbx-content-heading">Dopplr Authentication</h2>
    </div>

    <div class="vbx-content-container">
      <div class="vbx-content-section">
      <h3>Connect to Dopplr</h3>
      <?php if (isset($message)) : ?>
        <h3><?php echo $message; ?></h3>
      <?php endif; ?>
      <form action="" class="vbx-form">
        <p style="width: 200px;">
          Paste your <a href="http://www.dopplr.com/account/api_session_token">development token</a>*.
          <input name="token" size="40" value="<?php echo $dopplr_token; ?>" type="text">
        </p>
        <button name="savebutton">SAVE</button>
      </form>
    </div>
    <p>*I know it's poor form to make you get your own API token, but Dopplr doesn't have really great support and I haven't been able to get one time use tokens to upgrade to session tokens.</p>
  </div>
</div>
