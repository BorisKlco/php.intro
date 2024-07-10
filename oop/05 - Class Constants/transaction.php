<?php

declare(strict_types=1);

require_once './enums.php';

class Transaction
{

    private string $status;

    public function __construct()
    {
        echo '<pre>', var_dump($this), '</pre>';
        echo '#END __construct <br>';
    }

    public function setStatus(string $user_status): self
    {
        if (!isset(Status::ALL_STATS[$user_status])) {
            throw new \InvalidArgumentException('Invadil Status');
        }
        $this->status = $user_status;

        echo '<pre>', var_dump($this), '</pre>';
        echo '$END setStatus <br>';
        return $this;
    }
}
