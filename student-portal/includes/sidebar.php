<?php
function navLink($href, $label) {
  $active = (strpos($_SERVER['REQUEST_URI'], $href) !== false) ? 'active' : '';
  echo "<a class='$active' href='$href'>$label</a>";
}
?>
<aside class="sidebar">
  <a href="/student-portal/views/student/dashboard.php">Trang chủ sinh viên</a>
  <a href="/student-portal/views/student/attendance_history.php">Lịch sử điểm danh</a>
  <a href="/student-portal/views/student/qr_checkin.php">Điểm danh QR</a>
  <a href="/student-portal/views/common/profile.php">Thông tin cá nhân</a>
</aside>
