<?php
// Display flash message
if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success text-black">' . $_SESSION['success_message'] . '</div>';
    unset($_SESSION['success_message']);
}

if (isset($_SESSION['error_message'])) {
    echo '<div class="alert alert-danger text-black">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']);
}
