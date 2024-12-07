<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title><?= $title ?></title>
</head>

<body class="h-full">
    <div class="bg-slate-300">
        <nav class="mx-auto max-w-3xl flex justify-between py-2">
            <div class="flex items-center gap-2">
                <img width="48" height="48" src="https://img.icons8.com/clouds/100/share.png" class="drop-shadow" />
                <h1 class="font-bold select-none">FileSharing</h1>
            </div>
            <div class="flex items-center gap-2">
                <a href="#" class="px-4 py-1 border-2 rounded-md hover:bg-slate-200 hover:border-black">Login</a>
                <a href="#" class="px-4 py-1 border-2 rounded-md hover:bg-slate-200 hover:border-black">Register</a>
            </div>
        </nav>
    </div>
    <?php include $slot; ?>
</body>

</html>