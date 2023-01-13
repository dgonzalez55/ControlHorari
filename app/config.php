<?php
    define('APP_DOMAIN','localhost');
    //? Cal emplenar sols quan el DocumentRoot no és la carpeta public (no s'ha d'incloure la barra final)
    //? Exemple: http://localhost/NIA-Framework/public/ => APP_BASE_URL = '/NIA-Framework/public'
    define('APP_BASE_URL','');
     //? Cal incloure la carpeta arrel del projecte (imprescindible per funcionament autocarregador de classes)
    define('APP_BASE_PATH','C:/Users/dgonzalez/Desktop/ControlHorari/');
    define('APP_SESSION_NAME','ControlHorari_SESSID');
    define('APP_SESSION_TIME',7200);

    // Database configuration
    define('DB_DSN','mysql:host=localhost;port=5306;dbname=controlhorari;charset=utf8');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_DATASET_TYPE',DB_DATASET_HARDCODED);