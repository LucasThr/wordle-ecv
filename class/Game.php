<?php

declare(strict_types=1);

class Game
{
    public string $word;
    public array $trials = [];
    public string $state = 'IN PROGRESS';

    public function __construct()
    {
        if (isset($_COOKIE['RANDOM_WORD'])) {
            $word = $_COOKIE['RANDOM_WORD'];
            if (isset($_COOKIE['trials'])) {
                // a la 2eme partie, ça existe mais vide, dont ça plante.
                // d'ou l'inmportance de dégager le cookie avec la date.
                $this->trials = json_decode($_COOKIE['trials']) ?? [];
            }
        }
        if (!isset($_COOKIE['RANDOM_WORD'])) {
            $word = new Word();
            $word = $word->getNewWord();
            setcookie('RANDOM_WORD', $word);
        }
        $this->word = $word;
    }

    public function send(string $inputs): void
    {
        $tabOfLetter = str_split(strtoupper($inputs));
        $letters = [];

        foreach ($tabOfLetter as $position => $value) {
            $letters[] = new Letter($value, $this->word, $position);
        }

        $this->trials[] = $letters;
        setcookie('trials', json_encode($this->trials));
        $this->setGameState();
    }

    public function setGameState(): void
    {
        if ($this->isWinning()) {
            $this->state = 'WIN';
            $this->cleanCookies();

            return;
        }
        if ($this->isLost()) {
            $this->state = 'LOSE';
            $this->cleanCookies();

            return;
        }
    }

    private function isWinning(): bool
    {
        foreach (end($this->trials) as $letter) {
            if ('green' !== $letter->color) {
                return false;
            }
        }

        return true;
    }

    private function isLost(): bool
    {
        return count($this->trials) >= 6;
    }

    private function cleanCookies(): void
    {
        setcookie('RANDOM_WORD', '', time()-10);// bug ! ça peut pas être null
        setcookie('trials', '',  time()-10);// bug ! ça peut pas être null

        // pour supprimer un cookie on met sa date dans le passé
    }
}
