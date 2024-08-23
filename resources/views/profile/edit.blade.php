<x-layout title="Account Setting">
    <x-setting-layout>
    <form enctype="multipart/form-data" action="/{{$user->username}}/setting/edit-profile/update" method="POST"  class="my-3">
        @method('PUT')
        @csrf
        <img src="/storage/{{$user->photo}}" alt="" class="w-80 h-60 mb-3">
        <div>
            <label for="photo" class="block text-lg font-medium leading-6 text-gray-900">Profile Photo</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                </div>
                <input value="{{old('photo' , $user->photo )}}" type="file" name="photo" id="photo" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('photo')
                <p class="text-red-500 text-xs">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label class="block text-lg font-medium leading-6 text-gray-900">Name</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                </div>
                <input value="{{old('name' , $user->name)}}" type="text" name="name"  class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('name')
                <p class="text-red-500 text-xs">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label class="block text-lg font-medium leading-6 text-gray-900">Username</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                </div>
                <input value="{{old('username' , $user->username)}}" type="text" name="username" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('username')
                <p class="text-red-500 text-xs">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label class="block text-lg font-medium leading-6 text-gray-900">Email</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                </div>
                <input value="{{old('email' , $user->email)}}" type="text" name="email" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('email')
                <p class="text-red-500 text-xs">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label class="block text-lg font-medium leading-6 text-gray-900">Bio</label>
            <textarea  class="shadow-md border border-2 p-3 w-full my-3 resize-none" id="body" cols="20" rows="10" name="biouser">{{old('biouser' , $user->biouser)}}</textarea>
        </div>

        <div>
            <button type="submit" class="w-full bg-indigo-500 px-2 py-2 my-3 rounded-lg text-white">Save Profile</button>
        </div>

    </form>
    </x-setting-layout>
</x-layout>