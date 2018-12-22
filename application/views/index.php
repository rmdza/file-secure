<?php

$this->load->view('templates/header');

/* Horizontal Navigation */
$this->load->view('horizontal_navigation/subheader');
$this->load->view('horizontal_navigation/navigation');
$this->load->view($page, $data = NULL);

/* Side Navigation */
// $this->load->view('side_navigation/navigation', $nav = NULL);
// $this->load->view('side_navigation/subheader', $sub = NULL);
// $this->load->view($page, $data = NULL);


$this->load->view('templates/footer');

?>