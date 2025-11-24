<?php
function oversCalculator($balls){
    $overs = floor($balls / 6);
    $rem   = $balls % 6;
    return $overs . "." . $rem;
}
?>
