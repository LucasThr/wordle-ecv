<?php

declare(strict_types=1);
class Letter
{
    public $letter;
    public $word;
    public $position;
    public string $color = 'white';

    public function __construct(string $letter, string $word, int $position)
    {
        $this->position = $position;
        $this->word = $word;
        $this->letter = $letter;
        $this->verify();
    }

    private function verify(): void
    {
        if (!$this->IsInWord()) {
            return;
        }
        $this->color = 'yellow';
        if (!$this->IsAtGoodPosition()) {
            return;
        }
        $this->color = 'green';
    }

    private function IsInWord(): bool
    {
        return false !== strpos($this->word, $this->letter);
    }

    private function IsAtGoodPosition(): bool
    {
        return $this->letter === str_split($this->word)[$this->position];
    }
}
