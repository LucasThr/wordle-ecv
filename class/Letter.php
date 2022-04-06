<?php
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
    if (!$this->IsInWord()) return;
    $this->color = 'yellow';
    if (!$this->IsAtGoodPosition()) return;
    $this->color = 'red';
  }

  private function IsInWord(): bool
  {
    return strpos($this->word, $this->letter) !== false;
  }

  private function IsAtGoodPosition(): bool
  {
    return $this->letter === str_split($this->word)[$this->position];
  }
}
