<?php

require_once './Toaster.php';
require_once './ToasterPro.php';
require_once './Oven.php';

$oven = new Oven(new ToasterPro(6));

$oven->insertToOven('bread');
$oven->insertToOven('bread 1');
$oven->insertToOven('bread 2');
$oven->insertToOven('bread 3');
$oven->insertToOven('bread 4');
$oven->toast();
$oven->toastBagel();
