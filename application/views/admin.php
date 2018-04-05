<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">City</th>
            <th scope="col">State</th>
            <th scope="col">Phone</th>
        </tr>
        </thead>
        <tbody>
        <?if(!empty($requests)):?>
        <? foreach ($requests as $request): ?>
            <tr>
                <th scope="row"><?= $request->id; ?></th>
                <td><?= $request->first_name; ?></td>
                <td><?= $request->last_name; ?></td>
                <td><?= $request->email; ?></td>
                <td><?= $request->address; ?></td>
                <td><?= $request->city; ?></td>
                <td><?= $request->state; ?></td>
                <td><?= $request->phone; ?></td>
            </tr>
        <? endforeach; ?>
        <?else:?>
            <td>
                <td colspan="8">There's no one here</td>
            </tr>
        <?endif;?>
        </tr>
        </tbody>
    </table>
</div>