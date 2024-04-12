<nav class="bg-black p-4 shadow-md">
	<div class="container mx-auto flex justify-between items-center">
		<!-- Logo -->
		<div class="text-white font-bold text-xl flex">
			<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
			     xmlns="http://www.w3.org/2000/svg">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
			</svg>
			<a href="/" class="gemini-2">
				Property<sup class="text-gray-50">M</sup>
			</a>
		</div>

		<!-- Menu Items -->
		<div class="hidden md:flex flex-grow justify-center">
			@foreach(\App\Models\Category::all()->take(5) as $category)
				<a href="/property/category/{{$category->id}}"
				   class="text-white hover:bg-gray-700 px-4 py-2 rounded-md">
					{!! $category->namewithicon !!}
				</a>
			@endforeach
			<div id="dropdown-menu" class="relative" style="z-index: 9999">
				<!-- Trigger Button -->
				<button class=" bg-gray-500 text-white px-4 py-2 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
					Categories
				</button>
				<!-- Dropdown Content -->
				<div id="dropdownContent" class="absolute top-full left-0 w-full bg-white shadow-md hidden"
				     style="min-width: 200px; max-width: 250px; width: auto;">
					@foreach($categories as $category)
						<a href="/property/category/{{$category->id}}" class="block px-4 py-2 bg-gray-900 text-gray-100 hover:bg-blue-900 hover:text-white-900">
							{!! $category->namewithicon !!}
							<span class="bg-gray-700 px-1 py-0 mr-1 rounded-md">
								{{ $category->properties->count() }}
							</span>
						</a>
					@endforeach
				</div>
			</div>
			<!-- Script to handle dropdown functionality -->
			<script>
				// Get the dropdown button and content
				const dropdownMenu = document.querySelector('#dropdown-menu');
				const dropdownContent = document.querySelector('#dropdownContent');

				// Toggle dropdown content when button is clicked
				dropdownMenu.addEventListener('mouseover', () => {
					dropdownContent.classList.remove('hidden');
				});

				// Close dropdown content when clicking outside
				dropdownMenu.addEventListener('mouseout', (event) => {
					dropdownContent.classList.add('hidden');
				});
			</script>
			<a href="{{ route('about') }}" class="text-white hover:bg-gray-700 px-4 py-2 rounded-md">
				<span class="mdi mdi-information-variant"></span>
				About
			</a>
			<a href="{{ route('contact') }}" class="text-white hover:bg-gray-700 px-4 py-2 rounded-md">
				<span class="mdi mdi-account-box-outline"></span>
				Contact
			</a>
		</div>

		<!-- Search Bar -->
		<div>
			<form action="/property/search">
				<input type="text"
				       name="propertyName"
				       placeholder="Search"
				       class="bg-gray-800 text-white px-4 py-2 rounded-md focus:outline-none">
			</form>
		</div>

		@if(\Illuminate\Support\Facades\Auth::check())
			<div>
				<form method="post" action="{{ route('logout') }}">
					@csrf
					<button type="submit" class="rounded mx-2 px-3 py-1.5 bg-blue-500 text-gray-50">Logout</button>
				</form>
			</div>
		@else
			<div>
				<a href="{{ route('login') }}" class="rounded mx-2 px-3 py-2 bg-green-500 text-gray-50">Login</a>
			</div>
		@endauth

		<!-- Mobile Menu Button -->
		<div class="md:hidden">
			<button class="text-white hover:text-gray-300 focus:outline-none">
				<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
				     xmlns="http://www.w3.org/2000/svg">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					      d="M4 6h16M4 12h16m-7 6h7"></path>
				</svg>
			</button>
		</div>
	</div>
</nav>
