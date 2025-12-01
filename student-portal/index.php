<?php
require_once 'includes/session.php';

if (!isset($_SESSION['user'])) {
  // Nếu chưa đăng nhập thì chuyển về trang login
  header('Location: /student-portal/views/auth/login.php');
  exit;
}

// Nếu đã đăng nhập thì chuyển về dashboard sinh viên
header('Location: /student-portal/views/student/dashboard.php');
exit;
