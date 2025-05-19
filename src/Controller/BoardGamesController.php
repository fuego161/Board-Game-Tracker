<?php

namespace App\Controller;

class BoardGamesController extends AppController
{
    public function index()
    {
        $boardGames = $this->paginate($this->BoardGames);

        $this->set(compact('boardGames'));
    }

    public function view($slug = null)
    {
        $boardGame = $this->BoardGames->findBySlug($slug)->firstOrFail();

        $this->set(compact('boardGame'));
    }
}
