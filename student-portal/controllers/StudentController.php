<?php
require_once '../includes/session.php';
requireStudent();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'confirm_checkin') {
  // Chuyển hướng về trang chi tiết điểm danh, thêm tiền tố /student-portal
  header('Location: /student-portal/views/student/attendance_detail.php?id=' . urlencode($_POST['session_code']) . '&success=1');
  exit;
}
