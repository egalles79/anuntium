<?php 
echo 'Status: '.$status.'<br />';
if (!empty($error)) {
	echo 'Error: '.$error.'<br />';
}
if (!empty($token)) {
	echo 'Token: '.$token.'<br />';
}