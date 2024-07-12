<?php

require_once './Field.php';
require_once './Boolean.php';
require_once './Text.php';
require_once './Checkbox.php';
require_once './Radio.php';

$text = new Text("test");
$checkbox = new Checkbox("test");
$radio = new Radio("test");

echo "Text field " . $text->render() . "<br>";
echo "Checkbox field " . $checkbox->render() . "<br>";
echo "Radio field " . $radio->render() . "<br>";
