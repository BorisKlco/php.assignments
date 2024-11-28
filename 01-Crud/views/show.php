<div class="max-w-2xl">
    <table class="border-collapse table-fixed w-full text-sm">
        <thead>
            <tr>
                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Name</th>
                <th class="border-b font-medium p-4 pt-0 pb-3 text-slate-400 text-left">Email</th>
                <th class="border-b font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 text-left">Tel</th>
                <th class="border-b font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 text-left">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-slate-800">
            <?php foreach ($records as $record) : ?>
                <tr>
                    <td class="border-b border-slate-100  p-4 pl-8 text-slate-500 "><?= $record['name'] ?></td>
                    <td class="border-b border-slate-100  p-4 text-slate-500 "><?= $record['email'] ?></td>
                    <td class="border-b border-slate-100  p-4 pr-8 text-slate-500 "><?= $record['tel'] ?></td>
                    <td class="border-b border-slate-100  p-4 text-slate-500 flex gap-2">
                        <a href="/edit?id=<?= $record['id'] ?>"
                            class="px-2 py-1 border rounded-md hover:text-black hover:border-black">Edit</a>
                        <form action="/delete" method="post">
                            <button type="submit" name="id" value="<?= $record['id'] ?>"
                                class="px-2 py-1 border rounded-md hover:text-black hover:border-black">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>