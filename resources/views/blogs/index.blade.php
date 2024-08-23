<x-layout title="Home">

    <form action="">
        <input value="{{request('search')}}" name="search" type="text" placeholder="Search here" class="my-3 border border-2 px-2 py-2 rounded-2xl">
        <button type="sumit" class="mx-4 bg-indigo-500 px-2 py-1 text-white rounded-xl">Search</button>
    </form>
    <form action="">
        @if(request('search'))
        <input name="search" type="hidden" value="{{request('search')}}">
        @endif
        <label for="" class="mx-3">Category Filter</label>
        <select name="category_id" id="" class="border-2 px-4 py-2 rounded-lg">
            @foreach($categories as $category){
                <option {{$category->id == request('category_id') ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
            }
            @endforeach
        </select>
        <label for="" class="mx-3">User Filter</label>
        <select name="user_id" id="" class="border-2 px-4 py-2 rounded-lg">
            @foreach($users as $user){
                <option {{$user->id == request('user_id') ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
            }
            @endforeach
        </select>
        <button type="submit" class="mx-4 bg-indigo-500 px-2 py-1 text-white rounded-lg">Filter</button>
    </form>
    <div class="grid grid-cols-3 space-x-2 my-5 gap-3">
        @forelse($blogs as $blog)
        <div class="shadow-md border-2 border-gray-100 p-3">
            <img src="/storage{{$blog->photo}}" alt="" class="w-80 h-60 m-auto">
            <h1 class="text-2xl font-bold mb-3 mt-3">
                <a href="/blogs/{{$blog->slug}}">
                    {{$blog->title}}
                </a>
            </h1>
            <p>
                {{$blog->body}}
            </p>
            <p class="mt-3">Category - {{$blog->category->name}}</p>
            <p>Author - {{$blog->user->name}}</p>
        </div>
        @empty
        <p>no results found.</p>
        @endforelse
    </div>
    {{$blogs->links()}}
</x-layout>