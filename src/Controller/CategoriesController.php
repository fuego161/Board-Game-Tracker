<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['index', 'view']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $query = $this->Categories->find();
        $categories = $this->paginate($query);

        $this->set(compact('categories'));
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $category = $this->Categories->get($id, contain: ['BoardGames']);
        $this->set(compact('category'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEmptyEntity();

        // Get the identity from the request
        $user = $this->request->getAttribute('identity');

        $authCheck = $user->can('delete', $category);

        if (!$authCheck) {
            $this->Flash->error(__('Only admin can add categories'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $boardGames = $this->Categories->BoardGames->find('list', limit: 200)->all();
        $this->set(compact('category', 'boardGames'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, contain: ['BoardGames']);

        // Get the identity from the request
        $user = $this->request->getAttribute('identity');

        $authCheck = $user->can('edit', $category);

        if (!$authCheck) {
            $this->Flash->error(__('Only admin can edit categories'));
            return $this->redirect(['action' => 'view', $category->id]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $boardGames = $this->Categories->BoardGames->find('list', limit: 200)->all();
        $this->set(compact('category', 'boardGames'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $category = $this->Categories->get($id, contain: ['BoardGames']);

        // Get the identity from the request
        $user = $this->request->getAttribute('identity');

        $authCheck = $user->can('delete', $category);

        if (!$authCheck) {
            $this->Flash->error(__('Only admin can delete categories'));
            return $this->redirect(['action' => 'view', $category->id]);
        }

        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
