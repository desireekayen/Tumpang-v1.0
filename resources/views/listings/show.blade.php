<x-layout>
<!-- Single listing-->
@include('partials._search')

<a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i>&nbsp;Back</a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <div class="flex flex-col items-center">
                <div class="flex items-center">
                    <h3 class="text-3xl font-bold mb-4">Ride Description</h3><br>
                </div>
                    <div class="flex items-center">
                        <i class="fa-solid fa-location-dot"></i>&nbsp;
                        <h3 class="text-2xl mb-2"><strong>Pick Up</strong></h3><br>
                    </div>
                    <h3 class="text-2xl mb-2">{{$listing->pickup}}</h3>
                </div>
                <div class="flex flex-col items-center">
                    <div class="flex items-center">
                        <i class="fa-solid fa-location-dot" style="color: #ef3b2d;"></i>&nbsp;
                        <h3 class="text-2xl mb-2"><strong>Drop Off</strong></h3><br>
                    </div>
                    <h3 class="text-2xl mb-2">{{$listing->dropoff}}</h3>
                </div><br>
                
              
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <div class="text-lg space-y-6">
                            <h3 class="text-xl">Ride type: <strong>{{$listing->ride}}</strong></h3>
                            <h3 class="text-xl mb-4">Date posted: <strong>{{$listing->datetime}}</strong></h3>
                            <h3 class="text-xl mb-4">Num. passengers: <strong>{{$listing->passengers}}</strong></h3>

                        <div class="text-xl font-bold mb-4">Posted by: <strong>{{$listing->user->name}}</strong></div>
                        
                        <div class="flex justify-center"><x-listing-tags :tagsCsv="$listing->tags" /></div>

                            <div class="border-t border-gray-200 w-full my-4"></div>

                            <p class="mb-4">{{$listing->description}}</p>

                        <a href="https://wa.me/{{$listing->user->phone}}" class="block bg-laravel text-white 
                            mt-6 py-2 rounded-xl hover:opacity-80"><i class="fa-solid fa-phone"></i>&nbsp;
                            Contact Poster
                        </a>
                    </div>
                </div>
            </div>
        </x-card>

        <!--<x-card class="mt-4 p-2 flex space-x-6">
            <a href="/listings/{{$listing->id}}/edit">
                <i class="fa-solid fa-pencil"></i>&nbsp;Edit
            </a>

            <form method="POST" action="/listings/{{$listing->id}}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i>&nbsp;Delete</button>
            </form>
        </x-card>-->
    </div>
</x-layout>