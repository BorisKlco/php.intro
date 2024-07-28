<?php

namespace App;

class View
{
    public function __construct(
        protected string $view,
        protected array $params = []
    ) {
    }

    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);
    }

    public function render(): string
    {
        ob_start();
        $header = $this->params['header'];
        $content = VIEW_PATH . 'content/' . $this->view . '/' . $this->params['content'] . '.php';
        include VIEW_PATH . $this->view . '.php';
        return (string) ob_get_clean();
    }

    public function __toString()
    {
        return $this->render();
    }
}
