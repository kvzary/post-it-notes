<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">   
    @vite('resources/css/app.css')

    <title>Create Post-It Note</title>
</head>

<body>
    <div style='width:900px;' class='container max-w-full mx-auto'>
        <h1 class='text-2xl font-bold mb-4'>Archived Post-It Notes</h1>
        
        <a href='/project-notes' id='cancelButton' style="display:inline-block;" class="bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full is-fullwidth">Cancel</a>
        
        @foreach ($notes as $note)
            <label class="block mb-2 text-sm font-medium text-black-900 dark:text-black-400 text-xl">Title</label>
            <label class="block mb-2 text-sm font-medium text-black-900 dark:text-gray-400 text-xl">{{$note->title}}</label>
            <p class="block mb-2 text-sm font-medium text-black-900 dark:text-black-400 text-xl">Description</p>
            <p class="block mb-2 text-sm font-medium text-black-900 dark:text-gray-400 text-xl">{{$note->description}}</p>
            <label class="block mb-2 text-sm font-medium text-black-900 dark:text-black-400 text-xl">Expires</label>
            <label class="block mb-2 text-sm font-medium text-black-900 dark:text-gray-400 text-xl">{{$note->expiry}}</label>
            <form method='POST' action="/project-notes/{{$note->id}}/archive/">    
                @csrf
                <button id='restoreButton' style="display:inline-block;" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full is-fullwidth">Restore</button>
            </form>

            <form method='POST' action="/project-notes/{{$note->id}}">
                @csrf
                @method('DELETE')
                <button id='permDelButton' style="display:inline-block;" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full is-fullwidth">Delete</button>
            </form>
            <hr>
        @endforeach
    </div>
</body>

</html>