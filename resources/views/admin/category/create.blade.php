<x-admin-layout>
    <h1 class="text-3xl font-bold">Category Create</h1>

    <form action="/admin/categories/store" method="POST" class="my-3">
        @csrf
        <div class="my-2">
            <label for="" class="block text-lg font-medium leading-6 text-gray-900">Name</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                </div>
                <input value="{{old('name')}}" type="text" name="name" id="" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('name')
                <p class="text-red-500 text-xs">{{$message}}</p>
            @enderror
        </div>

        <div class="my-2">
            <label for="" class="block text-lg font-medium leading-6 text-gray-900">Slug</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                </div>
                <input value="" type="text" name="slug" id="" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('slug')
                <p class="text-red-500 text-xs">{{$message}}</p>
            @enderror
        </div>

        <div>
            <button type="submit" class="w-full bg-indigo-500 px-2 py-1 my-3 rounded-lg text-white">Create</button>
        </div>
    </form>
</x-admin-layout>