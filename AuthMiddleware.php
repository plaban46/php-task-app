<?php 

class AuthMiddleware {
    /**
     * Check if the user is logged in
     * If not logged in redirect to the login page
     */
    public function handle() {
        if (!$this->isLoggedIn()) {
            header("Location: /login.php");
            exit;
        }
    }
    /**
     * Check if a session variable is set
     */
    private function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }
}