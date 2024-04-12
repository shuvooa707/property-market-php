<div class="property bg-white overflow-hidden shadow-md my-4 mx-1">
	<img class="w-full h-36 object-cover" src="/{{$property->thumbnail}}"
	     alt="Card image cap">
	<div class="p-3 pb-0" style="line-height: 1.4em">
		<h5 class="mb-2">
			<a href="{{ route('property.show', ['id' => $property->id]) }}"
			   class="text-blue-900 text-xl">
				{{$property->title}}
			</a>
		</h5>
		<h5 class="flex justify-between">
			<small class="bg-red-200 rounded p-1 px-3 text-gray-700">
				<strong class="mdi mdi-android-studio"></strong>
				{{$property->sqft}} <sup>sqft</sup>
			</small>
			<small class="bg-orange-200 rounded p-1 px-3 text-gray-700">
				{{$property->price}} <b>₽</b>
			</small>
		</h5>
		<h5 class="my-2 flex justify-between">
			<small class="bg-blue-200 rounded p-1 px-2 text-gray-700">
				<span class="mdi mdi-bed-clock"></span>
				{{$property->bedrooms}}
			</small>
			<small class="bg-blue-200 rounded p-1 px-2 text-gray-700">
				<span class="mdi mdi-bathtub"></span>
				{{$property->bathrooms}}
			</small>
			<small class="bg-blue-200 rounded p-1 px-42 text-gray-700">
				<span class="mdi mdi-garage"></span>
				{{$property->garages}}
			</small>
			<small class="bg-blue-200 rounded p-1 px-2 text-gray-700">
				<strong class="mdi mdi-balcony"></strong>
				{{$property->balconies}}
			</small>
		</h5>
		<hr>
		<small class="text-gray-600 text-xm" style="text-align: justify">
			{{ substr($property->summery, 0, 55) }}...
		</small>
		<h5 class=" my-5  pb-0">
			<small class="bg-indigo-200 text-indigo-950 rounded px-2 py-1">
				<span class="mdi mdi-map-marker text-red-400"></span>
				{{ $property->address->city }}
			</small>
		</h5>
	</div>
</div>