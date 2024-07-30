<html>

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container p-5">
        <h1 class="text-2xl">글쓰기</h1>
        <form action="/articles" method="POST" class="mt-5">
            <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" /> -->
            @csrf
            <input type="text" name="body" class="block w-full mb-2 rounded" value="{{ old('body') }}">
            @error('body')
            <p class="text-xs text-red-500"> {{ $message }} </p>
            @enderror
            <button class="py-1 rounded px-3 bg-black text-white">저장하기</button>
            {{ dd(old('body')) }}
        </form>
    </div>
</body>

</html>