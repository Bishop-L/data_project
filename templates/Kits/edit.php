<!-- src/Template/Kits/edit.php -->

<div class="container mt-5">
    <div class="row justify-content-left">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Kit</h3>
                </div>
                <div class="card-body">
                    <?= $this->Form->create($kit) ?>
                        <div class="form-group">
                            <?= $this->Form->control('id', ['type' => 'text','class' => 'form-control', 'readonly' => true, 'disabled' => true, 'label' => 'ID']) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('kit_id', ['type' => 'text','class' => 'form-control', 'label' => 'Kit ID']) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->button('Update Kit', ['class' => 'btn btn-primary mt-4']) ?>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>