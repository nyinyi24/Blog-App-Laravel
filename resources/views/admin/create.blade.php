<x-admin-layout>
    <h1 class="text-3xl font-bold">Blog Create</h1>

    <form enctype="multipart/form-data" action="/admin/blogs/store" method="POST"  class="my-3">
        @csrf
        <div>
            <label for="photo" class="block text-lg font-medium leading-6 text-gray-900">Blog Photo</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                </div>
                <input value="{{old('photo')}}" type="file" name="photo" id="photo" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('photo')
                <p class="text-red-500 text-xs">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="title" class="block text-lg font-medium leading-6 text-gray-900">Title</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                </div>
                <input value="{{old('title')}}" type="text" name="title" id="title" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('title')
                <p class="text-red-500 text-xs">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="slug" class="block text-lg font-medium leading-6 text-gray-900">Slug</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                </div>
                <input value="{{old('slug')}}" type="text" name="slug" id="slug" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('slug')
                <p class="text-red-500 text-xs">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="body" class="block text-lg font-medium leading-6 text-gray-900">Body</label>
            <textarea  class="shadow-md border border-2 p-3 w-full my-3 resize-none" id="body" cols="20" rows="10" name="body">{{old('body')}}</textarea>
            @error('body')
                <p class="text-red-500 text-xs">{{$message}}</p>
            @enderror
        </div>

        <div>
            <select id="" name="category_id" class="w-full rounded-md border-2 bg-transparent p-2">
                @foreach($categories as $category)
                <option {{$category->id == old('category_id') ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-xs">{{$message}}</p>
            @enderror
        </div>


        <div>
            <button type="submit" class="w-full bg-indigo-500 px-2 py-1 my-3 rounded-lg text-white">Create</button>
        </div>

    </form>
</x-admin-layout>