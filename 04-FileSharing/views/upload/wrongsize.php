<form id='form' hx-encoding='multipart/form-data' hx-post='/upload'>
    <h1 class="mb-2 font-semibold">Set expiration date:</h1>
    <div class="flex divide-x divide-gray-300 ring-1 ring-black/5 rounded-xl w-full">
        <label class="flex-1 inline-flex items-center">
            <input type="radio" name="expiration" value="day" class="hidden peer" />
            <span class="block text-center px-4 py-2 bg-gray-200 cursor-pointer peer-checked:bg-teal-500 peer-checked:text-slate-50 w-full rounded-l-lg">
                1 day
            </span>
        </label>
        <label class="flex-1 inline-flex items-center">
            <input type="radio" name="expiration" value="week" class="hidden peer" />
            <span class="block text-center px-4 py-2 bg-gray-200 cursor-pointer peer-checked:bg-teal-500 peer-checked:text-slate-50 w-full">
                1 week
            </span>
        </label>
        <label class="flex-1 inline-flex items-center">
            <input type="radio" name="expiration" value="never" class="hidden peer" checked />
            <span class="block text-center px-4 py-2 bg-gray-200 cursor-pointer peer-checked:bg-teal-500 peer-checked:text-slate-50 w-full rounded-r-lg">
                Never
            </span>
        </label>
    </div>
    <div class="flex items-center justify-center w-full mt-3">
        <label
            class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center cursor-pointer"
            id="drop-area">
            <div id="file-info" class="h-full w-full flex flex-col items-center justify-center">
                <div>Sorry, file is too big.</div>
                <div>Max file size 10MB</div>
            </div>
            <input type="file" name="file" class="hidden" id="file-input">
        </label>
    </div>
    <div id="toggle-progress" class="hidden mt-3 w-full bg-gray-200 rounded">
        <div id="progress-bar"
            class="bg-teal-500 h-2 rounded"
            style="width: 50%"></div>
    </div>
    <button id="submit-button" class="mt-3 py-2 w-full ring-1 shadow ring-black/5 rounded-lg bg-teal-500 hover:bg-teal-600 text-slate-50 disabled:bg-gray-400" disabled>
        Upload
    </button>
</form>