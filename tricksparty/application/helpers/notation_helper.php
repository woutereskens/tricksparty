<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// convert date to d/m/Y
function toDDMMYYYY($input) {
    if ($input == NULL) {
        return "";
    } else {
        return date("d/m/Y", strtotime($input));
    }
}

// convert date to j F Y
function tojFY($input) {
    if ($input == NULL) {
        return "";
    } else {
        return date("j F Y", strtotime($input));
    }
}

// convert date to Y-m-d
function toYYYYMMDD($input) {
    if ($input == NULL) {
        return "";
    } else {
        return date("Y-m-d", strtotime($input));
    }
}

// convert time to H:i
function toHoursMinutes($input) {
    if ($input == NULL) {
        return "";
    } else {
        return date("H:i", strtotime($input));
    }
}

// convert time to H:i:s
function toHoursMinutesSeconds($input) {
    if ($input == NULL) {
        return "";
    } else {
        return date("H:i:s", strtotime($input));
    }
}

?>