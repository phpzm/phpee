<?php

// show all errors
error_reporting(E_ALL);

// system settings
ini_set('display_errors', Php\env('ERRORS_DISPLAY', 'On'));
ini_set('log_errors', Php\env('ERRORS_LOG', 'On'));
ini_set('track_errors', Php\env('ERRORS_TRACK', 'Off'));
ini_set('html_errors', Php\env('ERRORS_HTML', 'Off'));
