<!-- src/Template/Customers/index.php -->

<div class="container mt-5">
    <h1>Customers</h1>
    
    <!-- Add New Customer Button -->
    <div class="mb-3">
        <?= $this->Html->link('Add New Customer', ['action' => 'add'], ['class' => 'btn btn-outline-secondary']) ?>
    </div>
    
    <!-- Customer Table -->
    <table class="table table-striped">
        <thead>
            <tr>
				<th>Id</th>
                <th>Kit Id</th>
                <th>Customer Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
					<td><?= h($customer->id) ?></td>
                    <td><?= h($customer->kit_id) ?></td>
					<td><?= h($customer->customer_name) ?></td>
                    <td>
                        <?= $this->Html->link('Edit', ['action' => 'edit', $customer->id], ['class' => 'btn btn-sm btn-primary']) ?>
                        <?= $this->Form->postLink('Delete', ['action' => 'delete', $customer->id], ['confirm' => 'Are you sure?', 'class' => 'btn btn-sm btn-danger']) ?>
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