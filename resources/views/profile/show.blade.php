<x-layout :title="$user->name">
    <div class="border-2 rounded-xl w-full">
        <form action="/{{$user->username}}/setting/edit-profile" class="m-4 float-right">
            <button type="submit"><i class="fa-solid fa-gear text-2xl"></i></button>
        </form>
        <div class="flex items-center">
            <img src="/storage/{{$user->photo}}" alt="" class="w-40 h-40 rounded-full m-5">
            <div class="my-5">
                <h1 class="text-3xl mb-2">{{$user->name}}</h1>
                <p><i class="fa-solid fa-envelope"></i><span class="mx-2">{{$user->email}}</span></p>
            </div>
            <div class="p-3 m-auto">
                <div class="w-40 h-40 border-2 mx-3 my-5 rounded-xl bg-slate-400">
                    <h1 class="text-5xl p-3 text-center">{{$blog->where('user_id',$user->id)->count()}}</h1>
                    <p class="text-2xl p-2 text-center font-bold">Your Blogs</p>
                </div>
            </div>
        </div>
        @if($user->biouser)
        <div class="m-5">
            <h1 class="text-2xl font-bold text-center mb-3">About me</h1>
            <p class="text-lg text-center">{{$user->biouser}}</p>
        </div>
        @endif
    </div>
</x-layout>