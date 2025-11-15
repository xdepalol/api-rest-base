<?php
// src/bootstrap.php

require_once __DIR__ . '/../config/config.php';

// Muestra errores en entorno local
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
