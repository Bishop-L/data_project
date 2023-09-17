<!-- src/Template/Descriptions/edit.php -->

<div class="container mt-5">
    <div class="row justify-content-left">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Description</h3>
                </div>
                <div class="card-body">
                    <?= $this->Form->create($description) ?>
                        <div class="form-group">
                            <?= $this->Form->control('id', ['type' => 'text','class' => 'form-control', 'readonly' => true, 'disabled' => true, 'label' => 'ID']) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('customer_id', ['type' => 'number','class' => 'form-control', 'label' => 'Customer ID']) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('description', ['type' => 'textarea','class' => 'form-control', 'label' => 'Description']) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->button('Update Description', ['class' => 'btn btn-primary mt-4']) ?>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>