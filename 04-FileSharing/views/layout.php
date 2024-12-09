<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title><?= $title ?></title>
</head>

<body class="h-full">
    <div>
        <nav class="mx-auto max-w-3xl my-4 flex justify-between ring-1 shadow-sm ring-black/10 rounded-full py-2 px-4">
            <div class="flex items-center gap-2">
                <img width="48" height="48" src="https://img.icons8.com/clouds/100/share.png" class="drop-shadow" />
                <h1 class="font-bold select-none text-gray-800 text-lg">FileSharing</h1>
            </div>
            <div class="flex items-center gap-2">
                <a href="#" class="px-4 py-1 text-gray-800 font-semibold text-sm">Register</a>
                <a href="#" class="px-4 py-1 rounded-full bg-teal-400 ring-1 ring-sky-600 text-gray-800 font-semibold text-sm hover:bg-teal-500">Sign in</a>
            </div>
        </nav>
    </div>
    <?php include $slot; ?>
</body>

</html>