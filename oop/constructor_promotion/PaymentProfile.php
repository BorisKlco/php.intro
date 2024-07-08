<?php

declare(strict_types=1);

class PaymentProfile
{
    public function __construct(
        public int $id
    ){
        $this->id = rand();
    }
}
