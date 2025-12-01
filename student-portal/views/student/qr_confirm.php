<?php require_once '../../includes/session.php'; requireStudent(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Xác nhận điểm danh</title>
  <!-- CSS đã đúng với /student-portal -->
  <link rel="stylesheet" href="/student-portal/assets/css/theme.css">
</head>
<body>
<?php include '../../includes/header.php'; ?>
<div style="display:flex;">
<?php include '../../includes/sidebar.php'; ?>
<main class="main">
  <?php $code = htmlspecialchars($_POST['session_code'] ?? ''); ?>
  <div class="card" style="max-width:560px;">
    <h3>Xác nhận thông tin điểm danh</h3>
    <p><strong>Mã phiên:</strong> <?= $code ?></p>
    <p><strong>Lớp:</strong> CT101</p>
    <p><strong>Thời gian QR:</strong> 08:00 - 08:10 (Cửa sổ phát 10 giây)</p>
    <!-- thêm tiền tố /student-portal vào action -->
    <form method="post" action="/student-portal/controllers/StudentController.php">
      <input type="hidden" name="action" value="confirm_checkin">
      <input type="hidden" name="session_code" value="<?= $code ?>">
      <div style="display:flex; gap:8px; margin-top:8px;">
        <button class="button" type="submit">Xác nhận điểm danh</button>
        <!-- thêm tiền tố /student-portal vào link Hủy -->
        <a class="button ghost" href="/student-portal/views/student/qr_checkin.php">Hủy</a>
      </div>
    </form>
  </div>
</main>
</div>
<?php include '../../includes/footer.php'; ?>
</body>
</html>
