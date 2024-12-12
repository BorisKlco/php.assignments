<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <script src="https://unpkg.com/htmx.org@2.0.3"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Playwrite+HR+Lijeva:wght@100..400&family=Quicksand:wght@500&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title><?= $title ?></title>
</head>
<!-- https://knowledgehubtemplate.webflow.io/home-pages/home-v2 -->

<body class="h-full font-['Nunito_Sans']">
    <div class="absolute inset-x-0 sm:inset-x-80 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-96" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-violet-800 to-blue-400 opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="flex justify-center">
        <nav class="max-w-3xl w-full my-4 mx-2 flex justify-between ring-1 shadow ring-black/10 rounded-full py-2 px-4 bg-slate-50">
            <a href="/" class="flex justify-center items-center gap-2 hover:drop-shadow-[1px_1px_1px_rgba(70,200,150,0.5)]">
                <img width="48" height="48" src="https://img.icons8.com/clouds/100/share.png" class="drop-shadow" />
                <h1 class="font-bold select-none text-zinc-700 text-lg font-['Playwrite_HR_Lijeva']">Dropie</h1>
            </a>
            <div class="flex items-center gap-2">
                <a href="/files" class="px-4 py-1 text-gray-700 font-semibold text-sm hover:text-black hover:underline underline-offset-2">Files</a>
                <a href="#" target="_blank" class="px-2 py-1 rounded-full bg-teal-500 ring-1 ring-black/10 text-slate-100 font-semibold text-sm hover:bg-teal-600 hover:text-white">
                    <span class="flex items-center gap-1 font-semibold">
                        <svg fill="currentColor" viewBox="0 0 24 24" aria-hidden="true" class="size-5">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                        </svg>
                        Github
                    </span>
                </a>
            </div>
        </nav>
    </div>
    <?php include $slot; ?>
    <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
        <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-blue-600 opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
</body>

</html>