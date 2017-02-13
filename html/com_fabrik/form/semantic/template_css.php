<?php
/**
 * Fabrik Form Template: Bootstrap CSS
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2015 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

header('Content-type: text/css');
$c = (int) $_REQUEST['c'];
$view = isset($_REQUEST['view']) ? $_REQUEST['view'] : 'form';
echo "

.fabrikGroup {
clear: left;
}
.input-append {
    width: 249px;
    display: inline-flex;
}
input#upcoming_events___price {
    width: 10em;
    display: block;
}
textarea#upcoming_events___description {
    width: 40em;
    display: block;
}
input#upcoming_events___label {
    width: 20em;
    display: block;
}
img.imagedisplayor {
    max-height: 200px;
}
.ui.fabrikGroup.segment {
    margin: 2em;
}
.header.jmoddiv.jmodinside {
    text-align: center;
}
label.fabrikLabel.control-label {
    font-size: 1.1em;
    font-weight: 700;
}
i.icon.calendar, i.icons {
    font-size: 1.2em;
    background: none;
    color: white;
    border: none;
    margin-right: 0em !important;
}
.ui.button.calendarbutton{
    padding: 0.75em;
}
.ui.button.timeButton{
    padding: 0.75em;
}
select#upcoming_events___image_image {
    width: 20em;
    display: inline-flex;
}
.fabrikinput.form-control.input-medium {
    width: 15em;
}
input.inputbox.fabrikinput.timeField.input.input-medium {
    width: 5em;
}
.ui.button:not(.icon)>.icon:not(.button):not(.dropdown) {
    margin: 0em 0 -.1875em !important;
}
.ui.segment.fabrikGroup {
    box-shadow: 0 0px 0px 0 rgba(0,0,0,.00) !important;
}
button.ui.button.btn-primary.button.save {
    margin: 1em 5em;
    width: 10em;
}
img.fabrikImg {
    border: solid #5d0303;
    background-color: #5d0303;
    border-radius: 3px;
    height: 2.2em;
}
";
?>
