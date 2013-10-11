<?php
/**
 *
 * PHP version 5
 *
 * @category   Dust-iCalendar
 * @package    Dust\Calendar
 * @subpackage Tests
 * @author     Dustin Breuer <dustin.breuer@googlemail.com>
 * @license    MIT License
 * @link       http://thedust.in
 */

$aPaths   = explode(PATH_SEPARATOR, get_include_path());
$aPaths[] = realpath(__DIR__ . '/../');
set_include_path(implode(PATH_SEPARATOR, $aPaths));

spl_autoload_register(function ($sClass) {
    $sClass = str_replace('\\', '/', $sClass);

    include 'src/' . $sClass . '.php';
});

//require_once 'PHPUnit/Autoload.php';