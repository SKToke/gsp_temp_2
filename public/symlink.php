<?php
$target = '/home2/czmbdqnd/genius.czm-bd.org/storage/app/public';
$shortcut = '/home2/czmbdqnd/genius.czm-bd.org/public/storage';
symlink($target, $shortcut);

echo "link created.";
?>