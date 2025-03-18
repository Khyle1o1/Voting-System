<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>BUKSU COMELEC: please vote your SBO officer</title>
    <link rel="icon" href="{{ asset('images/tab_Icon.png') }}" type="image/x-icon" style="border-radius: 50%;">
</head>

<style>
    .background {
        background-image: url("{{ asset('images/header.jpg') }}");
        background-size: cover;
    }

    body {
        background-color: #EAE2EC;
    }
</style>

<!-- this is the index of SBO form -->

<body>
    <div class="flex justify-center min-h-screen">
        <div class="w-full max-w-4xl mx-auto">

            <!-- header -->
            <div class="background p-6 rounded-lg mt-3 text-center justify-center items-center flex flex-col">
                <p class="font-bold text-xl md:text-2xl">Student Body Organization</p>
                <p class="mt-1 text-sm md:text-base">{{$college->name}}</p>
            </div>

            <form action="{{route('sbo.vote')}}" method="POST" onsubmit="disableButton()">
                @csrf
                <!-- governor container -->
                @include('SBO_Vote.officer_containers.governor')

                <!-- vice governor -->
                @include('SBO_Vote.officer_containers.vice_Governor')

                <!-- sbo secretary and associate secretary -->
                @include('SBO_Vote.officer_containers.secretary')

                <!-- treasurer and associate treasurer -->
                @include('SBO_Vote.officer_containers.treasurer')

                <!-- auditor -->
                @include('SBO_Vote.officer_containers.auditor')

                <!-- public relations officer -->
                @include('SBO_Vote.officer_containers.public_relation_officer')

                <!-- year representatives -->
                @include('SBO_Vote.officer_containers.representatives.index')

                <!-- Footer -->
                <div class="background p-6 rounded-lg mt-3 text-center justify-center items-center flex flex-col">
                    <div class="w-full flex justify-end">
                        @include('SBO_Vote.summary_modal.summary_modal')
                    </div>
                </div>
            </form>
        </div>
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
