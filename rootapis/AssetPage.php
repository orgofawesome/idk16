<?php

$assetId = intval($_GET["id"]) ?? 0;

die(header("Location: https://www.$domain/library/$assetId/{$vars['asset_name']}"));
?>