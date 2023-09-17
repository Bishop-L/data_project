<!-- src/Template/Descriptions/index.php -->
<div class="container mt-5">
    <h1>Descriptions</h1>
    
    <!-- Add New Kit Button -->
    <div class="mb-3">
        <?= $this->Html->link('Add New Description', ['action' => 'add'], ['class' => 'btn btn-outline-secondary']) ?>
    </div>
    
    <!-- Kits Table -->
    <table class="table table-striped">
        <thead>
            <tr>
				<th>Id</th>
                <th>Customer Id</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($descriptions as $description): ?>
                <tr>
					<td><?= h($description->id) ?></td>
                    <td><?= h($description->customer_id) ?></td>
					<td><?= h($description->description) ?></td>
                    <td>
                        <?= $this->Html->link('Revise', ['action' => 'edit', $description->id], ['class' => 'btn btn-sm btn-primary']) ?>
                        <?= $this->Form->postLink('Delete', ['action' => 'delete', $description->id], ['confirm' => 'Are you sure?', 'class' => 'btn btn-sm btn-danger']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Display pagination controls -->
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< First') ?>
            <?= $this->Paginator->prev('< Previous') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('Next >') ?>
            <?= $this->Paginator->last('Last >>') ?>
        </ul>
        <p><?= $this->Paginator->counter('Page {{page}} of {{pages}}, showing {{current}} records out of {{count}} total') ?></p>
    </div>
</div>