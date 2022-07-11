<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>Post-It Notes</title>
</head>

<body>
    <div style='width:900px;' class='container max-w-full mx-auto'>
        <div class='mb-4'>
            <h1 class='text-2xl font-bold mb-4'>Post It Notes</h1>
        
            <a href='/project-notes/create' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full is-fullwidth">Add</a>
            <a href='/project-notes/archive' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full is-fullwidth">Archived</a>
        </div>

        <div style="width: 900x" class="container max-w-full mx-auto">
            @foreach ($notes as $note)
                <label class="block mb-2 text-sm font-medium text-black-900 dark:text-black-400 text-xl">Title</label>
                <label class="block mb-2 text-sm font-medium text-black-900 dark:text-gray-400 text-xl">{{$note->title}}</label>
                <p class="block mb-2 text-sm font-medium text-black-900 dark:text-black-400 text-xl">Description</p>
                <p class="block mb-2 text-sm font-medium text-black-900 dark:text-gray-400 text-xl">{{$note->description}}</p>
                <label class="block mb-2 text-sm font-medium text-black-900 dark:text-black-400 text-xl">Expires</label>
                <label class="block mb-2 text-sm font-medium text-black-900 dark:text-gray-400 text-xl">{{$note->expiry}}</label>
                <div>
                    <a href='/project-notes/{{$note->id}}/edit' style="display:inline-block;" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full is-fullwidth">Edit</a>
                    <form method='POST' action='/project-notes/{{$note->id}}'>
                        @csrf
                        @method('DELETE')
                        <button id='deleteButton' style="display:inline-block;" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full is-fullwidth">Archive</button>
                    </form>                
                </div>
                <hr class='mt-2'>
            @endforeach
        </div>
    </div>
</body>

</html>