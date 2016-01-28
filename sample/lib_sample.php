<?php
require_once('../src/ci3.php'); // or require_open('ci2.php');

// load view
$that->load->view('welcome_message');
// rendering
$that->output->_display();