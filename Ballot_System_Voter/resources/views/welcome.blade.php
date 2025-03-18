<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>BUKSU COMELEC: Welcome to bukSU COMELEC</title>
    <link rel="icon" href="{{ asset('images/tab_Icon.png') }}" type="image/x-icon" style="border-radius: 50%;">

</head>

<style>
    body {
        background-image: url("{{ asset('images/background.jpg') }}");
        background-size: cover;
        width: 100%;
        height: 100%;
    }
</style>

<body>
    <div class="mystyle">
        <section class="min-h-screen flex items-center justify-center">
        <!-- login container -->
        <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
            <!-- image -->
            <div class="md:block hidden w-1/2">
                <img class="rounded-2xl" style="max-width: 100%; height: auto;" src="{{asset('images/welcome.jpg')}}">
            </div>
            
            <div class="md:w-1/2 px-4 md:px-13" style="height: auto;">
                <div class="flex items-center mb-4 md:mb-8">
                    <img src="{{ asset('images/logo.jpg') }}" style="border-radius: 50%; width: 2cm; height: auto;">
                    <h2 class="font-bold text-lg md:text-2xl ml-2" style="color: #240A34;">Buk<span style="color: #FC9D22;">SU</span> COMELEC</h2>
                </div>

                <div class="mb-3">
                    <p class="tracking-tight text-gray-500 text-base md:text-lg dark:text-gray-400"><span class="text-lg md:text-2xl font-bold">Hello there!</span> <span class="font-semibold">{{$user->name}}</span> from <span class="font-semibold">{{$user->course}}</span> program within the <span class="font-semibold">{{$user->college}}</span>, <span class="text-lg md:text-xl font-bold">Welcome</span> to the BukSU COMELEC voting platform.</p>

                    <p class="tracking-tight text-gray-500 text-base md:text-lg dark:text-gray-400 mt-4"><span class="text-lg md:text-2xl font-bold">Once</span> you press "Vote" you are not allowed to close the program.</p>

                    <p class="tracking-tight text-gray-500 text-base md:text-lg dark:text-gray-400 mt-4"><span class="text-lg md:text-2xl font-bold">Remember,</span> your vote shapes our future, so choose wisely for the greater good.</p>
                </div>

                <div class="flex justify-center mt-4 md:mt-8">
                    <button class="bg-[#240A34] rounded-xl text-white py-2 px-4 md:px-8 hover:scale-105 duration-300" onclick="window.location.href='/sbo'">VOTE!</button>
                </div>
            </div>
        </div>
        </section>
    </div>
</body>

@if(Session::has('success'))
    <script>
        alert("{{ Session::get('success') }}");
    </script>
@endif

@if(Session::has('error'))
    <script>
        alert("{{ Session::get('error') }}");
    </script>
@endif
