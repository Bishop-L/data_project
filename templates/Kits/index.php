<!-- src/Template/Kits/index.php -->
<div class="container mt-5">
    <h1>Kits</h1>

    <!-- Add New Kit Button -->
    <div class="mb-3">
        <?= $this->Html->link('Add New Kit', ['action' => 'add'], ['class' => 'btn btn-outline-secondary']) ?>
    </div>
    
    <!-- Kits Table -->
    <table class="table table-striped">
        <thead>
            <tr>
				<th>Id</th>
                <th>Kit Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kits as $kit): ?>
                <tr>
					<td><?= h($kit->id) ?></td>
                    <td><?= h($kit->kit_id) ?></td>
                    <td>
                        <?= $this->Html->link('Edit', ['action' => 'edit', $kit->id], ['class' => 'btn btn-sm btn-primary']) ?>
                        <?= $this->Form->postLink('Delete', ['action' => 'delete', $kit->id], ['confirm' => 'Are you sure?', 'class' => 'btn btn-sm btn-danger']) ?>
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