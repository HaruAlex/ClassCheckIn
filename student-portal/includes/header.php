<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$user = $_SESSION['user'] ?? null;
?>
<header class="header">
  <div class="logo" aria-label="Logo"></div>
  <div class="title">Cổng sinh viên – Điểm danh QR</div>
  <div style="margin-left:auto; display:flex; gap:12px; align-items:center;">
    <?php if ($user): ?>
      <span style="color:#e0e7ff;"><?= htmlspecialchars($user['full_name']) ?> (SV)</span>
      <a class="button ghost" href="/student-portal/views/auth/logout.php">Đăng xuất</a>
    <?php else: ?>
      <a class="button ghost" href="/student-portal/views/auth/login.php">Đăng nhập</a>
    <?php endif; ?>
  </div>
</header>
