<?php
require_once '../../includes/auth.php';
logout();
// thêm tiền tố /student-portal để đúng với URL thực tế
header('Location: /student-portal/views/auth/login.php'); 
exit;
