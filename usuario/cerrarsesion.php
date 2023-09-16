<?php
include '../mensajes.php';
session_start();

$_SESSION = array();

session_destroy();

echo '<div class="centered-spinner">
                <div class="spinner-border" role="status">
                </div>
                <div class="mt-1 text-center">
                    <span class="sr-only">Cerrando sesion...</span>
                </div>
                </div>';
header("refresh:2; ../Inicio/inicio.php");

exit();
