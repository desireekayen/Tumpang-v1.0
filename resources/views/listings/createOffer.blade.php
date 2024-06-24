<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Create a Ride</h2>
            <p class="mb-4">Post a ride to Tumpang</p>
        </header>

        <form method="POST" action="/listings" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="ride" class="inline-block text-lg mb-2">Type of ride:</label><br>
                <input type="radio" id="ride1"  name="ride" value="offer" {{ old('ride') == 'offer' ? 'checked' : '' }}/>
                    <label for="ride1">Offer</label>&nbsp;
                <input type="radio" id="ride2"  name="ride" value="request" {{ old('ride') == 'request' ? 'checked' : '' }}/>
                    <label for="ride2">Request</label>
            
                @error('type')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <i class="fa-solid fa-location-dot"></i>&nbsp;<label for="pickup" class="inline-block text-lg mb-2">Pick up</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="pickup"
                    placeholder="Example: Kolej Dahlia etc" value="{{old('pickup')}}"/>

                @error('pickup')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <i class="fa-solid fa-location-dot" style="color: #ef3b2d;"></i>&nbsp;<label for="dropoff" 
                class="inline-block text-lg mb-2">Drop off</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="dropoff"
                    placeholder="Example: FSKTM depan lobby etc" value="{{old('dropoff')}}"/>

                @error('dropoff')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="datetime" class="inline-block text-lg mb-2">Date & Time</label><br>
                <input type="datetime-local" class="border border-gray-200 rounded p-2 w-full" 
                    id="datetime" name="datetime" value="{{old('datetime')}}">

                @error('datetime')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="passengers" class="inline-block text-lg mb-2">Passengers</label><br>
                <select name="passengers" id="passengers" class="border border-gray-200 rounded p-2 w-full" >
                    <option value="1" {{ old('passengers') == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ old('passengers') == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ old('passengers') == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ old('passengers') == '4' ? 'selected' : '' }}>4</option>
                </select>

                @error('passengers')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">Tags (Comma Separated)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" 
                    placeholder="Example: FSKTM, Class, etc" value="{{old('tags')}}"/>

                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Ride Description</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Where you're going, what for, etc"
                >{{old('description')}}</textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">Create Ride</button>
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>