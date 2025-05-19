<?php

namespace App\Controller;

class BoardGamesController extends AppController
{
    public function index()
    {
        $boardGames = $this->paginate($this->BoardGames);

        $this->set(compact('boardGames'));
    }
}
