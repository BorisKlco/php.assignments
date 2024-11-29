<div>
    <form action="/list" method="post" class="flex flex-col gap-4 max-w-2xl">
        <label for="name">
            Name:<input type="text" name="name" class="w-full py-1" value="<?= $old['name'] ?? '' ?>">
        </label>
        <label for="email">
            Email: <input type="email" name="email" class="w-full py-1" value="<?= $old['email'] ?? '' ?>">
        </label>
        <?php if ($error ?? false) : ?>
            <span class="text-red-600"><?= $error ?></span>
        <?php endif ?>
        <label for="tel">
            Tel: <input type="tel" name="tel" class="w-full py-1" value="<?= $old['tel'] ?? '' ?>">
        </label>
        <button class="w-full py-1 border mt-4 hover:border-black">Add</button>
    </form>
</div>