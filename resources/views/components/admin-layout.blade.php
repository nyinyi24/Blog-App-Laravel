<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <h5 class="block antialiased tracking-normal font-sans text-xl font-semibold leading-snug text-white bg-gray-500 p-4">Nyi Nyi Min Lwin</h5>
    <div class=" flex">
        <div class="w-1/4">
            <!-- component -->
            <div class="h-full relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 h-[calc(100vh-2rem)] w-full max-w-[20rem] p-4 shadow-xl shadow-blue-gray-900/5">
                    <a href="/admin">
                    <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none font-bold">Dashboard
                    </div>
                    </a>
                    <a href="/admin/categorylist">
                    <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none font-bold">Category List
                    </div>
                    </a>
                    <a href="/admin/blogs/create">
                    <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none font-bold">Blog Create
                    </div>
                    </a>
                    <a href="/admin/categories/create">
                    <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none font-bold">Category Create
                    </div>
                    </a>
                    <form action="/logout" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" tabindex="0" class="flex items-center w-full p-3 rounded-lg bg-red-500 text-white font-bold" onclick="return confirm('Are you sure logout?')">Log Out
                        </button>
                    </form>
                </nav>
            </div>
        </div>
        <div class="w-3/4 p-5">
            {{$slot}}
        </div>
    </div>
</body>

</html>