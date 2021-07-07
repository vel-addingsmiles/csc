<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-icon-right alert-danger alert-dismissible mb-2" role="alert">
<span class="alert-icon"><i class="fa fa-danger"></i></span>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">×</span>
</button>
<strong><?= $message ?></strong>
</div>