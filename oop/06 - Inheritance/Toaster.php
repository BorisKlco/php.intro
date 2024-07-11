<?php

class Toaster
{
    public function __construct(
        protected array $slices = [],
        protected int $size = 2
    ) {
    }

    public function addSlice(string $slice): void
    {
        if (count($this->slices) < $this->size) {
            $this->slices[] = $slice;
            echo $slice . ' inserted <br>';
        } else {
            echo 'Toaster full <br>';
        }
    }

    public function toast()
    {
        foreach ($this->slices as $i => $slice) {
            echo ($i + 1) . ': Toasting ' . $slice . PHP_EOL . '<br>';
        }
    }
}
