<div class="mx-2">
    <div class="max-w-3xl mx-auto flex flex-col text-gray-800">
        <h1 class="mt-4 sm:mt-10 text-center text-xl sm:text-3xl font-semibold">Get Your Files Out There!</h1>
        <p class="mt-2 text-center sm:text-xl">Easily share your documents, photos, and others...</p>
        <div class="flex mt-4 py-4 gap-6 sm:gap-12 justify-center mb-4 sm:mb-8">
            <div class="w-36 h-24 sm:h-36 rounded-xl flex items-center justify-center flex-col gap-2 sm:gap-3 ring-1 shadow ring-black/5 bg-slate-50">
                <img class="size-6 sm:size-12" src="https://img.icons8.com/external-sbts2018-flat-sbts2018/58/external-select-camera-interface-1-sbts2018-flat-sbts2018.png" />
                <p class="font-semibold  text-sm">Select File</p>
            </div>
            <div class="w-36 h-24 sm:h-36 rounded-xl flex items-center justify-center flex-col gap-2 sm:gap-3 ring-1 shadow ring-black/5 bg-slate-50">
                <img class="size-6 sm:size-12" src="https://img.icons8.com/external-flatart-icons-flat-flatarticons/64/external-upload-project-planing-flatart-icons-flat-flatarticons.png" />
                <p class="font-semibold text-sm">Click upload</p>
            </div>
            <div class="w-36 h-24 sm:h-36 rounded-xl flex items-center justify-center flex-col gap-2 sm:gap-3 ring-1 shadow ring-black/5 bg-slate-50">
                <img class="size-6 sm:size-12" src="https://img.icons8.com/external-flatart-icons-flat-flatarticons/64/external-email-contact-us-flatart-icons-flat-flatarticons-3.png" />
                <p class="font-semibold text-sm">Share a link</p>
            </div>
        </div>

    </div>
</div>
<div class="mx-2">
    <div class="rounded-xl w-full max-w-3xl h-full mx-auto shadow ring-black/5 bg-slate-50 py-8 px-8">
        <form id='form' hx-encoding='multipart/form-data' hx-post='/upload'>
            <h1 class="mb-2 font-semibold">Set expiration date:</h1>
            <div class="flex divide-x divide-gray-300 ring-1 ring-black/5 rounded-xl w-full">
                <label class="flex-1 inline-flex items-center">
                    <input type="radio" name="options" value="Option1" class="hidden peer" />
                    <span class="block text-center px-4 py-2 bg-gray-200 cursor-pointer peer-checked:bg-teal-500 peer-checked:text-slate-50 w-full rounded-l-lg">
                        1 day
                    </span>
                </label>
                <label class="flex-1 inline-flex items-center">
                    <input type="radio" name="options" value="Option2" class="hidden peer" />
                    <span class="block text-center px-4 py-2 bg-gray-200 cursor-pointer peer-checked:bg-teal-500 peer-checked:text-slate-50 w-full">
                        1 week
                    </span>
                </label>
                <label class="flex-1 inline-flex items-center">
                    <input type="radio" name="options" value="Option3" class="hidden peer" checked />
                    <span class="block text-center px-4 py-2 bg-gray-200 cursor-pointer peer-checked:bg-teal-500 peer-checked:text-slate-50 w-full rounded-r-lg">
                        Never
                    </span>
                </label>
            </div>
            <div class="flex items-center justify-center w-full mt-2">
                <label
                    class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center"
                    id="drop-area">
                    <div class="h-full w-full text-center flex flex-col items-center justify-center">
                        <div class="flex flex-auto mx-auto">
                            <img
                                class="has-mask object-center"
                                src="https://img.icons8.com/clouds/100/workstation.png">
                        </div>
                        <p class="pointer-none text-gray-500">
                            <span class="text-sm">Drag and drop</span> files here
                            <br /> or select a file from your computer
                        </p>
                    </div>
                    <input type="file" name="file" class="hidden" id="file-input">
                </label>
            </div>
            <div id="toggle-progress" class="hidden mt-2 w-full bg-gray-200 rounded">
                <div id="progress-bar"
                    class="bg-teal-500 h-2 rounded"
                    style="width: 50%"></div>
            </div>
            <button class="mt-2 py-2 w-full ring-1 shadow ring-black/5 rounded-lg bg-teal-500 hover:bg-teal-600 text-slate-50">
                Upload
            </button>
        </form>
        <script>
            htmx.on('#form', 'htmx:xhr:progress', function(evt) {
                htmx.removeClass(htmx.find("#toggle-progress"), "hidden");
                const progressElement = htmx.find('#progress-bar');
                const percentage = (evt.detail.loaded / evt.detail.total) * 100;
                progressElement.style.width = `${percentage}%`;
            });

            const dropArea = document.getElementById('drop-area');
            const fileInput = document.getElementById('file-input');

            // Prevent default behaviors
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, (e) => e.preventDefault(), false);
                dropArea.addEventListener(eventName, (e) => e.stopPropagation(), false);
            });

            // Highlight drop area on dragover
            dropArea.addEventListener('dragover', () => {
                dropArea.classList.add('border-blue-500');
            });

            // Remove highlight on dragleave or drop
            dropArea.addEventListener('dragleave', () => {
                dropArea.classList.remove('border-blue-500');
            });

            dropArea.addEventListener('drop', (e) => {
                dropArea.classList.remove('border-blue-500');
                const files = e.dataTransfer.files;

                // Register the dropped files in the file input
                fileInput.files = files;

                // Log the files for debugging
                console.log(files);
            });
        </script>

    </div>
</div>