<x-layout title="Account Setting">
    <x-setting-layout>
    <form action="/{{auth()->user()->username}}/setting/password/update" method="POST" class="my-3">
        @csrf
        @method('PUT')

        <div class="my-3">
            <label class="block text-lg font-medium leading-6 text-gray-900">Old Password</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                </div>
                <input  type="password" name="oldpassword"  class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('oldpassword')
                <p class="text-red-500 text-xs">{{$message}}</p>
            @enderror
        </div>
        <div class="my-3">
            <label class="block text-lg font-medium leading-6 text-gray-900">New Password</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                </div>
                <input type="password" name="newpassword" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('newpassword')
                <p class="text-red-500 text-xs">{{$message}}</p>
            @enderror
        </div>

        <div>
            <button type="submit" class="w-full bg-indigo-500 px-2 py-2 my-3 rounded-lg text-white">Change Password</button>
        </div>

    </form>
    </x-setting-layout>
</x-layout>