<?php
// src/Controller/CustomersController.php
declare(strict_types=1);

namespace App\Controller;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class CustomersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Customers->find()
            ->contain(['Kits']);
        $customers = $this->paginate($query);

        $this->set(compact('customers'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customer = $this->Customers->newEmptyEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            try {
                if ($this->Customers->save($customer)) {
                    $this->Flash->success(__('The customer has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } 
            }catch (\Exception $e) {
                //Get specific error so we can give specific feedback
                $error = $e->getMessage();
                
                switch (true) {
                    case str_contains($error, '1062'):
                        $message = 'This kit already belongs to a customer. Please use the edit function.';
                        break;
                    case str_contains($error, '1216'):
                        $message = 'This kit does not exist yet. Please add it in the Kit API first.';
                        break;
                    default:
                        $message = 'An error has occurred. Please try again.';
                        break;
                }
            
                $this->Flash->error(__($message));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $kits = $this->Customers->Kits->find('list', ['limit' => 200])->all();
        $this->set(compact('customer', 'kits'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            
            try {
                if ($this->Customers->save($customer)) {
                    $this->Flash->success(__('The customer has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } 
            }catch (\Exception $e) {
                //Get specific error so we can give specific feedback
                $error = $e->getMessage();
                
                switch (true) {
                    case str_contains($error, '1062'):
                        $message = 'This kit already belongs to a customer.';
                        break;
                    case str_contains($error, '1216'):
                        $message = 'This kit does not exist yet. Please add it in the Kit API first.';
                        break;
                    default:
                        $message = 'An error has occurred. Please try again.';
                        break;
                }
            
                $this->Flash->error(__($message));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $kits = $this->Customers->Kits->find('list', ['limit' => 200])->all();
        $this->set(compact('customer', 'kits'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);

        // Check if there are associated records in the Descriptions table
        if ($this->Customers->Descriptions->exists(['customer_id' => $customer->id])) {
            $this->Flash->error('Cannot delete the customer because it is associated with descriptions.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
