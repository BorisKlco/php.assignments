<?php

$url = $_SERVER['HTTP_REFERER'] ?? 'https://google.com/';
if ($expire) {
    $date = new DateTime($expire);
    $date = $date->format("j. F Y - H:i");
} else {
    $date = "Never";
}
?>
<div class="flex justify-between items-center sm:flex-row flex-col">
    <div class="sm:w-2/3 w-full">
        <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm/6 font-medium text-gray-900">Name</dt>
                    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $name ?></dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm/6 font-medium text-gray-900">Expirate at</dt>
                    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $date ?></dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm/6 font-medium text-gray-900">Download:</dt>
                    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <a class="truncate hover:underline font-semibold text-teal-500 hover:text-teal-600"
                            href="<?= $url . 'd?id=' . $token ?>" target="_blank" rel="noopener noreferrer">
                            Click me!</a>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
    <div class="flex items-center justify-center sm:w-1/3 w-full">
        <img class="object-contain sm:w-full rounded-xl drop-shadow" src="https://quickchart.io/qr?text=<?= $url . 'd?id=' . $token ?>" alt="">
    </div>
</div>