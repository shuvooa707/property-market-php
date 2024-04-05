@extends("admin.layout.DashboardLayout")


@section("main")
	<!--  Main Content  -->
	<section class="grid grid-cols-2 w-3/4 md:grid-cols-1 xl:grid-cols-1 p-8 m-5 " style="margin-left: 0px">
		<div class="bg-blue-50 col-span-2 mb-4 p-2 rounded">
			<a class="text-blue-700" href="{{ route('admin.reviews.index') }}">All</a> \
			<strong>Review</strong>
		</div>
		<div class="bg-gray-50 p-0 mr-2 mb-1 rounded-sm inline-block">
			<table class="col-span-2 p-2 w-full divide-y text-gray-950 divide-gray-200">
				<thead class="bg-blue-600 text-blue-50 py-2">
				<tr>
					<th colspan="2" class="text-center" style="text-align: center;">
						<img src="/{{ $property->thumbnail }}" style="width: 100%;" class="w-full inline-block">
					</th>
				</tr>
				</thead>
				<tbody class="bg-white divide-y divide-gray-200">
				<tr>
					<td class="px-6 py-4 whitespace-nowrap">
						<span class="mdi mdi-relative-scale"></span>
						Total Area
					</td>
					<td class="px-6 py-4 whitespace-nowrap">
                                    <span>
                                        {{ $property->sqft }}
                                    </span><sup>sqft</sup>
					</td>
				</tr>
				<tr>
					<td class="px-6 py-4 whitespace-nowrap">
						<strong class="mdi mdi-balcony"></strong>
						Balconies
					</td>
					<td class="px-6 py-4 whitespace-nowrap">
						{{ $property->balconies }} m<sup>2</sup>
					</td>
				</tr>
				<tr>
					<td class="px-6 py-4 whitespace-nowrap">
						<span class="mdi mdi-garage"></span>
						Garages
					</td>
					<td class="px-6 py-4 whitespace-nowrap">
						{{ $property->garages }}
					</td>
				</tr>
				<tr>
					<td class="px-6 py-4 whitespace-nowrap">
						<span class="mdi mdi-bed-clock"></span>
						Bedrooms
					</td>
					<td class="px-6 py-4 whitespace-nowrap">
						{{ $property->bedrooms }}
					</td>
				</tr>
				<tr>
					<td class="px-6 py-4 whitespace-nowrap">
						<span class="mdi mdi-bathtub"></span>
						Bathrooms
					</td>
					<td class="px-6 py-4 whitespace-nowrap">
						{{ $property->bathrooms }}
					</td>
				</tr>
				<tr>
					<td class="px-6 py-4 whitespace-nowrap">
						<span class="mdi mdi-balcony"></span>
						Location
					</td>
					<td class="px-6 py-4 whitespace-nowrap">
						{{ $property->location }}
					</td>
				</tr>
				<tr>
					<td colspan="2" class="px-6 py-4 whitespace-nowrap">
						<strong class="block underline">Description</strong>
						<span class="text-gray-800">{{ $property->description }}</span>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
		<div class="bg-gray-50 p-3 rounded-md inline-block">
			<div>{{ $review->content }}</div>
			<br>
			<hr class="">
			<small class="text-gray-600">01-01-2020</small>
			<div class="text-end">
				<div>
					<img style="border-radius: 50%; overflow: hidden; display: inline-block; width: 60px; height: 60px; border: 1px solid #d9d9d9; box-shadow: 3px 3px 9px #aaa6;" src="{{ $review->user->image }}" class="inline-block" width="60" height="60" alt="">
					<a href="{{ route('admin.users.show', ['id' => $review->user->id]) }}">{{ $review->user->name }}</a>
				</div>
				<button type="submit" class="mt-3 ml-5 py-1.5 px-2 rounded cursor-pointer text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-sm text-sm px-2 py-.5 me-2 mb-2 dark:bg-amber-500 dark:hover:bg-amber-600 focus:outline-none dark:focus:ring-blue-800">
					<small>Delete</small>
				</button>
			</div>
		</div>
	</section>
	<!-- End Main Content  -->
@endsection