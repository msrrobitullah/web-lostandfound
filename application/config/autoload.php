<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| AUTO-LOADER SYSTEM (Clean Version)
| -------------------------------------------------------------------
*/

$autoload['packages'] = array();

// Ditambahkan 'session' untuk kebutuhan login/manajemen user nantinya
$autoload['libraries'] = array('database', 'session');

$autoload['drivers'] = array();

// 'url' helper wajib aktif untuk mendukung base_url()
$autoload['helper'] = array('url');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array();