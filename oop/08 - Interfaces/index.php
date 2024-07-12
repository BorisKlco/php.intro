<?php


require_once "./CollectionAgency.php";
require_once "./Rocky.php";
require_once "./DebtCollectorService.php";


$service = new DebtCollectorService();

echo $service->collectDebt(new CollectionAgency());
echo $service->collectDebt(new Rocky());
