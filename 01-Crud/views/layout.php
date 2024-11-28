<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
        src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title><?= $title ?? 'Default' ?></title>
</head>

<body class="h-full grid place-items-center">
    <div class="flex flex-col items-center">
        <nav class="py-2 border mb-10 rounded-md">
            <ul class="flex justify-center items-center divide-x px-2">
                <li><a href="/" class="hover:underline px-4 font-semibold text-gray-600 hover:text-black">Home</a></li>
                <li><a href="/list" class="hover:underline px-4 font-semibold text-gray-600 hover:text-black">List</a></li>
                <li><a href="/search" class="hover:underline px-4 font-semibold text-gray-600 hover:text-black">Search</a></li>
            </ul>
        </nav>
        <?php include $slot ?>
    </div>
</body>

</html>