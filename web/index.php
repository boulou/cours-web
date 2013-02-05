<?php
require_once '../app/config.php';

coursWeb\App::handleConnectFrom();

if(isset($_SESSION['user']))
	include TEMPLATES_PATH.'game.tpl';
else
	include TEMPLATES_PATH.'connect.tpl';