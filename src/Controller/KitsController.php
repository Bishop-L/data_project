<?php
// src/Controller/KitsController.php
declare(strict_types=1);

namespace App\Controller;

/**
 * Kits Controller
 *
 * @property \App\Model\Table\KitsTable $Kits
 */
class KitsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Kits->find();
        $kits = $this->paginate($query);

        $this->set(compact('kits'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $kit = $this->Kits->newEmptyEntity();
        if ($this->request->is('post')) {
            $kit = $this->Kits->patchEntity($kit, $this->request->getData());
            if ($this->Kits->save($kit)) {
                $this->Flash->success(__('The kit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kit could not be saved. Please, try again.'));
        }
        $this->set(compact('kit'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Kit id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $kit = $this->Kits->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $kit = $this->Kits->patchEntity($kit, $this->request->getData());
            if ($this->Kits->save($kit)) {
                $this->Flash->success(__('The kit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kit could not be saved. Please, try again.'));
        }
        $this->set(compact('kit'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Kit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $kit = $this->Kits->get($id);
        
        // Check if there are associated records in the Customers table
        if ($this->Kits->Customers->exists(['kit_id' => $kit->id])) {
            $this->Flash->error('Cannot delete the kit because it is associated with a customer.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Kits->delete($kit)) {
            $this->Flash->success('The kit has been deleted.');
        } else {
            $this->Flash->error('The kit could not be deleted. Please, try again.');
        }

        return $this->redirect(['action' => 'index']);
    }
}
