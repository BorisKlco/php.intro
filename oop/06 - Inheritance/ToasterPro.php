<?php

class ToasterPro extends Toaster
{
    public function __construct(int $size)
    {
        parent::__construct();
        $this->size = $size;
    }

    public function toastBagel()
    {
        foreach ($this->slices as $i => $slice) {
            echo ($i + 1) . ': Toasting Bagel ' . $slice . PHP_EOL . '<br>';
        }
    }
}
