<x-layout :title="$blog->title">
    <p>
        {{$blog->body}}
    </p>

    {{-- comments --}}
    <div>
        {{-- comment input --}}
        <form action="/blogs/{{$blog->slug}}/handel-subscription" method="POST">
            @csrf
            <h1 class="text-3xl font-bold my-3">Comments
                @if(!auth()->user()->isSubscribed($blog))
                <button type="submit" class="bg-yellow-500 px-2 py-1 mx-3 text-sm text-white rounded-md">Subscribe</button>
                @else
                <button type="submit" class="bg-red-500 px-2 py-1 mx-3 text-sm text-white rounded-md">Unsubscribe</button>
                @endif
            </h1>
        </form>
        <form action="/blogs/{{$blog->slug}}/comments" method="POST">
            @csrf
            <textarea class="shadow-md border border-2 p-3 w-full my-3 resize-none" id="" cols="30" rows="10" name="body"></textarea>
            @error('body')
            <p class="text-xs my-2 text-red-500">{{$message}}</p>
            @enderror
            <button type="submit" class="bg-indigo-500 px-2 py-1 text-sm text-white rounded-md">Comment</button>
        </form>
        @php
        $comments = $blog->comments()->latest()->paginate(3);
        @endphp
        @foreach($comments as $comment)
        <div>
            <div class="shadow-md border border-2 p-3 w-full my-3 flex justify-between" >
                <div>
                <div>
                    <span class="text-2xl font-bold">{{$comment->author->name}}</span>
                    <span class="text-sm text-gray-500">{{$comment->created_at->diffForHumans()}}</span>
                </div>
                <p class="my-3">{{$comment->body}}</p>
            </div>
                @if(auth()->user()->can('delete', $comment))
                    <form action="/comment/{{$comment->id}}/destory" class="m-3" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-500 rounded p-3" onclick="return confirm('Sure Want Delete?')">Delete</button>
                    </form>
                @endif
            </div>
        </div>
        @endforeach

        <!-- design -->
        {{$comments->links()}}
    </div>
</x-layout>