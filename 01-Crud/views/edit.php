<form action="/edit" method="post" class="flex flex-col gap-4 max-w-2xl">
    <input type="hidden" name="id" value="<?= $id ?>">
    <label for="name">
        Name:<input type="text" name="name" class="w-full py-1" value="<?= $name ?>">
    </label>
    <label for="email">
        Email: <input type="email" name="email" class="w-full py-1" value="<?= $email ?>">
    </label>
    <label for="tel">
        Tel: <input type="tel" name="tel" class="w-full py-1" value="<?= $tel ?>">
    </label>
    <button type="submit" class="w-full py-1 border mt-4 hover:border-black">Edit</button>
</form>