<div class="p-6 rounded-lg mt-3 text-center justify-center flex flex-col bg-white">
    <p class="font-bold text-xl md:text-2xl">Public Relation Officer</p>

    <hr class="my-4 w-4/5 mx-auto border-gray-300">

    <!-- SBO candidate list -->
    <div class="p-6 rounded-lg items-center flex flex-wrap justify-center">
        @foreach($candidateArray as $candidateArrayData)
            @if($candidateArrayData->position_id == "POS49266")
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 p-4">
                <div class="flex flex-col items-center">
                    <img src="{{asset('images/' . $candidateArrayData->picture_id . '.jpg')}}" alt="person" class="w-full h-auto max-w-[150px] max-h-[150px] object-cover">
                    <div class="flex items-center justify-center mt-2">
                        <input class="mr-1" type="radio" name="public_relation_officer" value="{{$candidateArrayData->student_id}}" onchange="displayPublic_relation_officer()">
                        <p class="public_relation_officer text-sm md:text-base">{{$candidateArrayData->name}}</p>
                    </div>
                    <p class="hidden">{{$candidateArrayData->partylist}}</p>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>
