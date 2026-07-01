<?php
// Copie este arquivo para config/database.php e ajuste as credenciais do ambiente.

define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_PORT', getenv('DB_PORT') ?: '3306');
define('DB_NAME', getenv('DB_NAME') ?: 'gabriela_site');
define('DB_USER', getenv('DB_USER') ?: 'gabriela_user');
define('DB_PASS', getenv('DB_PASS') ?: 'troque-esta-senha');
define('DB_CHARSET', getenv('DB_CHARSET') ?: 'utf8mb4');
