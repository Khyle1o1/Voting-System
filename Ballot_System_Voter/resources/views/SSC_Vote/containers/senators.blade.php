<div class="p-6 rounded-lg mt-3 text-center justify-center flex flex-col bg-white">
    <p class="font-bold text-xl md:text-2xl inline">Senators <span class="font-bold text-lg md:text-xl" id="countSenator">(0)</span></p>
    <p class="text-sm md:text-base">(Select up to 12)</p>

    <hr class="my-4 w-4/5 mx-auto border-gray-300">

    <!-- SBO candidate list -->
    <div class="p-6 rounded-lg items-center flex flex-wrap justify-center">
        @foreach($candidate as $candidateData)
            @if($candidateData->position_id == "POS27724")
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 p-4">
                <div class="flex flex-col items-center">
                    <img src="{{asset('images/' . $candidateData->picture_id . '.jpg')}}" alt="person" class="w-full h-auto max-w-[150px] max-h-[150px] object-cover">
                    <div class="flex items-center justify-center mt-2">
                        <input class="senator mr-1" type="checkbox" name="senator[]" value="{{$candidateData->student_id}}" onchange="checkSelectedSenator()">
                        <p class="senatorName text-sm md:text-base">{{$candidateData->name}}</p>
                    </div>
                    <p class="hidden">{{$candidateData->partylist}}</p>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>
