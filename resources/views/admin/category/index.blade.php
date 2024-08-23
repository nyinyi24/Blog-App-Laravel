<x-admin-layout>
    <h1 class="text-3xl font-bold">Category List</h1>
    <!-- component -->
<table class="border-collapse w-full my-5">
    <thead>
        <tr>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Category Name</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Category Slug</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                {{$category->name}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                {{$category->slug}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                <a href="/admin/categories/{{$category->id}}/edit" class="text-blue-400 hover:text-blue-600 underline">Edit</a>
                
                <form action="/admin/categories/{{$category->id}}/delete" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-white bg-red-500 p-1 rounded" onclick="return confirm('Sure Want Delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{$categories->links()}}
</x-admin-layout>