@props(['listing'])
<!--Multiple listing-->
<x-card>
    <a href="/listings/{{$listing->id}}">
        <div class="flex">
            <div>
                <h3 class="text-2xl">
                    <i class="fa-solid fa-location-dot"></i>&nbsp;<strong>Pick Up</strong><br>
                    {{$listing->pickup}}
                </h3><br>

                <h3 class="text-2xl">
                    <i class="fa-solid fa-location-dot" style="color: #ef3b2d;"></i>&nbsp;<strong>Drop Off</strong><br>
                    {{$listing->dropoff}}
                </h3><br>

                <h3 class="text-xl">Ride type: <strong>{{$listing->ride}}</strong></h3>
                <h3 class="text-xl">Date posted: <strong>{{$listing->datetime}}</strong></h3>
                <div class="text-xl mb-4">Posted by: <strong>{{$listing->user->name ?? 'N/A'}}</strong></div>
                <x-listing-tags :tagsCsv="$listing->tags" />
            </div>
        </div>
    </a>
</x-card>
