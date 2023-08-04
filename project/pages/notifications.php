<?php
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_login.php');
  include_once('../templates/tpl_notifications.php');
  include_once('../includes/header.php');
  include_once('../database/db_user.php');

  $id = $_SESSION['username'];

  $adoptionnotifications = getAdoptionNotifications($id);
  $commentnotifications = getCommentNotifications($id);
  $applynotifications = getApplyNotifications($id);
  $unapplynotifications = getUnapplyNotifications($id);

  deleteNotifications($id, $applynotifications, $unapplynotifications);
  
  draw_notifications($adoptionnotifications, $commentnotifications, $applynotifications, $unapplynotifications);
?>