<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>BUKSU COMELEC: Login to Student Voting System</title>
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
            <!-- form -->
            <div class="md:w-1/2 px-4 md:px-13">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.jpg') }}" style="border-radius: 50%; width: 2cm; height: auto;">
                    <h2 class="font-bold text-lg md:text-2xl ml-2" style="color: #240A34;">Buk<span style="color: #FC9D22;">SU</span> COMELEC</h2>
                </div>

                <form action="{{ route('passkey.send') }}" class="flex flex-col gap-3" method="POST" onsubmit="disableButton()">
                    @csrf
                    <p class="text-xs mt-8 text-[#002D74]">Please enter your Student ID</p>
                    <input class="p-2 rounded-xl border" type="text" name="student_id" placeholder="Student ID" required>

                    <div class="">
                        <button type="submit" id="submitButton1" class="bg-[#240A34] p-5 rounded-xl text-white py-2 hover:scale-105 duration-300 mt-2" style="margin-right: 50px;">Send Mail</button>

                        <button type="button" id="submitButton2" class="bg-[#240A34] p-5 rounded-xl text-white py-2 hover:scale-105 duration-300 mt-2" style="float: inline-end; background-color:#003C43;" onclick="window.location.href='/login'">back</button>
                    </div>
                </form>
            </div>

            <!-- image -->
            <div class="md:block hidden w-1/2">
            <img class="rounded-2xl" style="max-width: 100%; height: auto;" src="{{asset('images/login_Logo2.jpg')}}">
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

<script>
    function disableButton() {
        document.getElementById('submitButton1').disabled = true;
    }
</script>
