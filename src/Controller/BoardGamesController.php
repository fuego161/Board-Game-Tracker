<?php

namespace App\Controller;

class BoardGamesController extends AppController
{
    public function index()
    {
        $boardGames = $this->paginate($this->BoardGames->find()->contain('Categories'));

        $this->set(compact('boardGames'));
    }

    public function view($slug = null)
    {
        $boardGame = $this->BoardGames
            ->findBySlug($slug)
            ->contain('Categories')
            ->firstOrFail();

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

        $categories = $this->BoardGames->Categories->find('list')->all();

        $this->set(compact('boardGame', 'categories'));
    }

    public function edit($slug)
    {
        $boardGame = $this->BoardGames
            ->findBySlug($slug)
            ->contain('Categories')
            ->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $boardGame = $this->BoardGames->patchEntity($boardGame, $this->request->getData());

            if ($this->BoardGames->save($boardGame)) {
                $this->Flash->success(__('Board game update!'));

                return $this->redirect(['action' => 'view', $boardGame->slug]);
            }

            $this->Flash->error(__('Unable to add board game'));
        }

        $categories = $this->BoardGames->Categories->find('list')->all();
        $this->set(compact('boardGame', 'categories'));
    }

    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);

        $boardGame = $this->BoardGames->findBySlug($slug)->firstOrFail();

        // TODO: Make admin only
        if ($this->BoardGames->delete($boardGame)) {

            $this->Flash->success(__('The board game "{0}" has been deleted.', $boardGame->title));

            return $this->redirect(['action' => 'index']);
        }
    }
}
