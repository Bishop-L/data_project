<!-- src/Template/Customers/add.php -->

<div class="container mt-5">
    <div class="row justify-content-left">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Add Customer</h3>
                </div>
                <div class="card-body">
                    <?= $this->Form->create($customer) ?>
                        <div class="form-group">
                            <?= $this->Form->control('kit_id', ['type' => 'number','class' => 'form-control', 'label' => 'Kit ID']) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('customer_name', ['type' => 'text','class' => 'form-control', 'label' => 'Customer Name']) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->button('Add Customer', ['class' => 'btn btn-primary mt-4']) ?>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>