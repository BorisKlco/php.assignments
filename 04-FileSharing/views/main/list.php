<div class="rounded-xl w-full max-w-3xl mx-auto shadow ring-black/5 bg-slate-50 py-8 px-8">
    <div class="px-4 sm:px-0">
        <h3 class="text-base/7 font-semibold text-gray-900">List of files</h3>
    </div>
    <?php if (empty($list)) : ?>
        <p class="text-sm/6 font-medium text-gray-900 mt-8">Nothing to see... Try upload something!</p>
    <?php else : ?>
        <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
                <?php foreach ($list as $link) : ?>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm/6 font-medium text-gray-900"><?= $link['name'] ?></dt>
                        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                            <?php if ($link['link']) : ?>
                                <a class="font-semibold text-teal-500 hover:text-teal-600 hover:underline"
                                    href="<?= '/d?id=' . $link['link'] ?>"
                                    target=" _blank" rel="noopener noreferrer">Link</a>
                            <?php else : ?>
                                <span class="font-semibold text-black">Expired</span>
                            <?php endif ?>
                        </dd>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
            </dl>
        </div>
</div>