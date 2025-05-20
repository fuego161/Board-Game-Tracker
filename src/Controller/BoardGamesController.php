<?php

namespace App\Controller;

class BoardGamesController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['index', 'view']);
    }

    public function index()
    {
        $this->Authorization->skipAuthorization();
        $boardGames = $this->paginate($this->BoardGames->find()->contain('Categories'));

        $this->set(compact('boardGames'));
    }

    public function view($slug = null)
    {
        $this->Authorization->skipAuthorization();
        $boardGame = $this->BoardGames
            ->findBySlug($slug)
            ->contain('Categories')
            ->firstOrFail();

        $this->set(compact('boardGame'));
    }

    public function add()
    {
        $boardGame = $this->BoardGames->newEmptyEntity();

        $this->Authorization->authorize($boardGame);

        if ($this->request->is('post')) {
            $boardGame = $this->BoardGames->patchEntity($boardGame, $this->request->getData());

            // Get the identity from the request
            $user = $this->request->getAttribute('identity');
            $boardGame->entry_creator = $user->getOriginalData()->id;

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

        // Get the identity from the request
        $user = $this->request->getAttribute('identity');

        $authCheck = $user->can('edit', $boardGame);

        if (!$authCheck) {
            $this->Flash->error(__('Can only edit if you created the entry or have admin privileges'));
            return $this->redirect(['action' => 'view', $boardGame->slug]);
        }

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

        // Get the identity from the request
        $user = $this->request->getAttribute('identity');

        $authCheck = $user->can('delete', $boardGame);

        if (!$authCheck) {
            $this->Flash->error(__('Only Admin may delete board games'));
            return $this->redirect(['action' => 'view', $boardGame->slug]);
        }

        if ($this->BoardGames->delete($boardGame)) {

            $this->Flash->success(__('The board game "{0}" has been deleted.', $boardGame->title));

            return $this->redirect(['action' => 'index']);
        }
    }
}
