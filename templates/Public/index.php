<!--  src/templates/Public/index.php -->

<!-- Search Form -->
<?= $this->Form->create(null, ['type' => 'post', 'url' => ['action' => 'index']]) ?>
        <div class="input-group mt-5 mb-3">
            <?= $this->Form->control('search', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Search by Kit Id or Name']) ?>
            <div class="input-group-append">
                <?= $this->Form->button('Search', ['class' => 'btn btn-secondary', 'type' => 'submit']) ?>
            </div>
        </div>
    <?= $this->Form->end() ?>

<!-- All Kits -->    
<div class="container mt-5">
    <?php if (count($kits) > 0): ?>
        <?php foreach ($kits as $kit): ?>
            <div class="row justify-content-left">
                <div class="col-md-4 mt-3 rounded p-4 bg-light shadow">
                    <div class="rounded p-4 bg-light shadow mb-3">
                        <h3> Kit: <?= $kit->kit_id ?> </h3>
                    </div>
                    <h4 class="mb-3">Name: <?= $kit->customer->customer_name ?></h4>
                    <?php if (count($kit->customer->descriptions) > 0): ?>
                        <h4>Description:</h4>
                        <p>
                            <?php foreach ($kit->customer->descriptions as $description): ?>
                                <p><?= h($description->description) ?></p>
                            <?php endforeach; ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>            
        <?php endforeach; ?>
    <?php else: ?>
        <div class="row justify-content-left">
            <div class="col-md-4 rounded p-4 bg-light shadow">
                <div class="rounded p-4 bg-light shadow mb-3">
                    <h3> Kit: No Kits Found </h3>
                </div>
                <h4 class="mb-3">Please search for a kit.</h4>
            </div>
        </div>
    <?php endif; ?>
</div>



  






