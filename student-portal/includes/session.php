<?php
if (session_status() === PHP_SESSION_NONE) session_start();
function requireStudent() {
  if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] ?? '') !== 'student') {
    header('Location: /views/auth/login.php'); exit;
  }
}
