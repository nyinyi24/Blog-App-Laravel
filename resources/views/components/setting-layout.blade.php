<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="flex border-2 rounded">
     <div class="w-1/4">
<div class="h-full relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 h-[calc(100vh-2rem)] w-full max-w-[20rem] p-4 shadow-xl shadow-blue-gray-900/5">
  <nav class="flex flex-col gap-1 min-w-[240px] p-2 font-sans text-base font-normal text-gray-700">
    <div>
      <a href="/{{auth()->user()->username}}/setting/edit-profile" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none font-bold">Profile Edit</a>
    </div>
    <div>
      <a href="/{{auth()->user()->username}}/setting/password" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none font-bold">Password</a>
    </div>
    <form action="/logout" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" tabindex="0" class="flex items-center w-full p-3 rounded-lg bg-red-500 text-white font-bold" onclick="return confirm('Are you sure logout?')">Log Out <i class="fa-solid fa-arrow-right-from-bracket mx-1 "></i>
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