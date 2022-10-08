<?php

class AuthHelper {

     /**
     * Verifica que el user este logueado y si no lo está lo redirige al login.
     */
    function checkLoggedIn() {
        session_start();
        if (!isset($_SESSION['IS_LOGGED'])) {
            header("Location: " . BASE_URL . 'Login');
            die();
        }
    }

    function checkSessionActive() {
        if(session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

}