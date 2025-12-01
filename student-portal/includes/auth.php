<?php
if (session_status() === PHP_SESSION_NONE) session_start();


function login($username, $password) {
  
  if ($username === 'yuki' && $password === 'yuki@') {
    $_SESSION['user'] = [
      'username' => $username,
      'full_name' => 'Yuki',
      'role' => 'student'
    ];
    return true;
  }
  return false;
}

function logout() {
  $_SESSION = []; session_destroy();
}

function changePassword($old, $new) {
  if (!isset($_SESSION['user'])) return false;
  if ($old === $_SESSION['user']['password']) {
    $_SESSION['user']['password'] = $new; // demo
    return true;
  }
  return false;
}
