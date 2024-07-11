<?php

class Oven
{
    public function __construct(private ToasterPro $toaster)
    {
    }

    public function insertToOven(string $item)
    {
        $this->toaster->addSlice($item);
    }

    public function fry()
    {
    }

    public function toast()
    {
        $this->toaster->toast();
    }

    public function toastBagel()
    {
        $this->toaster->toastBagel();
    }
}
