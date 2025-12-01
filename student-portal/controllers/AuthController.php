<?php
require_once '../includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'] ?? '';
  if ($action === 'login') {
    if (login($_POST['username'], $_POST['password'])) {
      // Sau khi đăng nhập, chuyển về trang chủ sinh viên
      header('Location: /student-portal/views/student/dashboard.php');
      exit;
    } else {
      // Sai tài khoản hoặc mật khẩu
      header('Location: /student-portal/views/auth/login.php?error=1');
      exit;
    }
  } elseif ($action === 'change_password') {
    if (changePassword($_POST['old_password'] ?? '', $_POST['new_password'] ?? '')) {
      // Đổi mật khẩu thành công
      header('Location: /student-portal/views/auth/change_password.php?changed=1');
      exit;
    } else {
      // Sai mật khẩu cũ
      header('Location: /student-portal/views/auth/change_password.php?error=1');
      exit;
    }
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && ($_GET['action'] ?? '') === 'logout') {
  logout();
  header('Location: /student-portal/views/auth/login.php');
  exit;
}
