<?php
  $input = 325489;
  if ($input == 1) {
    echo "Result = 0";
  } else {
    $inputSqrt = sqrt($input);
    $lowSqrt = floor($inputSqrt);
    $highSqrt = ceil($inputSqrt);
    if ($lowSqrt == $highSqrt) {
      $lowSqrt = $lowSqrt - 2;
    }
    if ($lowSqrt % 2 == 0) {
      $lowSqrt--;
    }
    if ($highSqrt % 2 == 0) {
      $highSqrt++;
    }
    $previousRingEnd = pow($lowSqrt, 2);
    $ringEnd = pow($highSqrt, 2);
    $ringPosition = $input - $previousRingEnd;
    $ringTotal = $ringEnd - $previousRingEnd;
    $sideLength = $ringTotal / 4;
    $halfSideLength = $sideLengthMinusOne / 2;
    $side = $ringPosition/$ringTotal;
    switch (true) {
      case $side <= 0.25:
        $x = $halfSideLength;
        $y = $halfSideLength - $ringPosition;
        break;
      case $side <= 0.5;
        $x = $halfSideLength - ($ringPosition - $sideLength);
        $y = -$halfSideLength;
        break;
      case $side <= 0.75:
        $x = -$halfSideLength;
        $y = -$halfSideLength + ($ringPosition - ($sideLength*2));
        break;
      case $side > 0.75:
        $x = -$halfSideLength + ($ringPosition - ($sideLength*3));
        $y = $halfSideLength;
        break;
    }
  }
  $result = abs($x) + abs($y);
  echo "Part 1 Result = $result\n";

  $spiral = [];
  $x = 0;
  $y = 0;
  $spiral[$x][$y] = 1;
  $x++;
  $value = 1;
  $direction = [0,-1];
  $neighbors = [[0, 1], [1, 1], [1, 0], [1, -1], [0, -1], [-1, -1], [-1, 0], [-1, 1]];
  while ($value <= $input) {
    $value = 0;
    foreach ($neighbors as $neighbor) {
      if (isset($spiral[$y + $neighbor[0]][$x + $neighbor[1]])) {
        $value += $spiral[$y + $neighbor[0]][$x + $neighbor[1]];
      }
    }
    $spiral[$x][$y] = $value;
    if ($direction[0] == -1) { // Left
      if (!isset($spiral[$x][$y+1])) {
        $direction = [0,1];
      }
    }
    if ($direction[0] == 1) { // Right
      if (!isset($spiral[$x][$y-1])) {
        $direction = [0,-1];
      }
    }
    if ($direction[1] == -1) { // Up
      if (!isset($spiral[$x-1][$y])) {
        $direction = [-1,0];
      }
    }
    if ($direction[1] == 1) { // Down
      if (!isset($spiral[$x+1][$y])) {
        $direction = [1,0];
      }
    }
    $x += $direction[0];
    $y += $direction[1];
  }
  echo "Part 2 Result = $value";
?>
