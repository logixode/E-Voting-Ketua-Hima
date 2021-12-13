<?php

function check_in_range($start_date, $end_date, $date_from_user) {
  // Convert to timestamp
  $start = strtotime($start_date);
  $end = strtotime($end_date);
  $check = strtotime($date_from_user);

  // Check that user date is between start & end
  return (($start <= $check ) && ($check <= $end));
}