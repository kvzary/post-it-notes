<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">   
    @vite('resources/css/app.css')

    <title>Post It Notes</title>
</head>

<body>
    <div style='width:900px;' class='container max-w-full mx-auto'>

        <form method='POST' action="/project-notes/{{$note->id}}">
            @csrf
            @method('PUT')            
            <div>
                <label class="block mb-2 text-sm font-medium text-black-900 dark:text-gray-400 text-xl">Title:</label>
                <input id='title' name='title' class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value='{{$note->title}}'>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-black-900 dark:text-gray-400 text-xl">Description:</label>
                <textarea id='description' name='description' class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$note->description}}</textarea>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-black-900 dark:text-gray-400 text-xl">Expiry:</label>
                <textarea id='expiry' name='expiry' class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$note->expiry}}</textarea>
            </div>

            <button id='updateButton' class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full is-fullwidth">Update</button>
        </form>
        
        <a href='/project-notes' id='cancelButton' class="inline-block bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full is-fullwidth">Cancel</a>
        
    </div>
</body>

</html>