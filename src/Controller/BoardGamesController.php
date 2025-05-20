<?php

namespace App\Controller;

class BoardGamesController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->setLayout('board-games');
        $boardGames = $this->paginate($this->BoardGames);

        $this->set(compact('boardGames'));
    }

    public function view($slug = null)
    {
        $boardGame = $this->BoardGames->findBySlug($slug)->firstOrFail();

        $this->set(compact('boardGame'));
    }

    public function add()
    {
        $boardGame = $this->BoardGames->newEmptyEntity();

        if ($this->request->is('post')) {
            $boardGame = $this->BoardGames->patchEntity($boardGame, $this->request->getData());

            // TODO: Remove hardcode
            $boardGame->entry_creator = 1;

            if ($this->BoardGames->save($boardGame)) {
                $this->Flash->success(__('Board game added!'));

                return $this->redirect(['action' => 'view', $boardGame->slug]);
            }

            $this->Flash->error(__('Unable to add board game'));
        }

        $this->set(compact('boardGame'));
    }

    public function edit($slug)
    {
        $boardGame = $this->BoardGames->findBySlug($slug)->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $boardGame = $this->BoardGames->patchEntity($boardGame, $this->request->getData());

            if ($this->BoardGames->save($boardGame)) {
                $this->Flash->success(__('Board game update!'));

                return $this->redirect(['action' => 'view', $boardGame->slug]);
            }

            $this->Flash->error(__('Unable to add board game'));
        }

        $this->set(compact('boardGame'));
    }
}
