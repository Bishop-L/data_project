<?php
// src/Controller/DescriptionsController.php
declare(strict_types=1);

namespace App\Controller;


/**
 * Descriptions Controller
 *
 * @property \App\Model\Table\DescriptionsTable $Descriptions
 */
class DescriptionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Descriptions->find()
            ->contain(['Customers']);
        $descriptions = $this->paginate($query);

        $this->set(compact('descriptions'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $description = $this->Descriptions->newEmptyEntity();
        if ($this->request->is('post')) {
            $description = $this->Descriptions->patchEntity($description, $this->request->getData());
            try {
                if ($this->Descriptions->save($description)) {
                    $this->Flash->success(__('The description has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
            } catch (\Exception $e) {
                //Get specific error so we can give specific feedback
                $error = $e->getMessage();

                if(str_contains($error, '1216')){
                    $message = 'This customer does not exist yet. Please add them in the Customer API first.';
                } else{
                    $message = 'An error has occurred. Please try again.'; 
                }

                $this->Flash->error(__($message));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The description could not be saved. Please, try again.'));
        }
        $customers = $this->Descriptions->Customers->find('list', ['limit' => 200])->all();
        $this->set(compact('description', 'customers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Description id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $description = $this->Descriptions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $description = $this->Descriptions->patchEntity($description, $this->request->getData());
            if ($this->Descriptions->save($description)) {
                $this->Flash->success(__('The description has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The description could not be saved. Please, try again.'));
        }
        $customers = $this->Descriptions->Customers->find('list', ['limit' => 200])->all();
        $this->set(compact('description', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Description id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $description = $this->Descriptions->get($id);
        if ($this->Descriptions->delete($description)) {
            $this->Flash->success(__('The description has been deleted.'));
        } else {
            $this->Flash->error(__('The description could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
