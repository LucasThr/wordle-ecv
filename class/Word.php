<?php

class Word
{
  public function getNewWord(): string
  {
    $this->word = file('../config/words.txt', FILE_IGNORE_NEW_LINES);
    return $this->word[array_rand($this->word)];
  }
}
