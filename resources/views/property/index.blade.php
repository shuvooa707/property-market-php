@extends("layout.layout")

@section("title")
	<title>Property Market</title>
@endsection

@section("scripts")
	<script type="text/javascript" defer>
		let title = document.title;
		let flag = 1;
		setInterval(() => {
			if (flag) {
				document.title = `🚃`;
				flag = 0;
			} else {
				document.title = title;
				flag = 1;
			}
		}, 2000)
	</script>
@endsection

@section("styles")
	<style type="text/css">
        .review .content {
            position: relative;
        }

        .review .content::after {
            content: '';
            position: absolute;
            top: 100%;
            z-index: 9999;
            left: 4px;
            transform: translateY(0%);
            border: 15px solid transparent;
            border-top-color: #e8eaed;
        }

        /*  Slick  */
        .slick-slider {
            position: relative;
        }

        .slick-prev {
            position: absolute;
            left: 10px;
            top: 50%;
            z-index: 9999;
            color: rgba(255, 255, 255, 0.73);
            font-size: 7em;
            transform: translateY(-50%);
            transition: .2s all linear;
            background: rgba(255, 255, 255, 0.17);
            border-radius: 50%;
            height: 100px;
            width: 100px;
            line-height: 100px;
            text-align: center;
        }
        .slick-prev:hover {
            background: rgba(255, 255, 255, 0.39);
        }
        .slick-next:hover {
            background: rgba(255, 255, 255, 0.39);
        }

        .slick-prev span {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        .slick-next span {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .slick-prev:hover {
            color: rgb(255, 255, 255);
        }

        .slick-next {
            position: absolute;
            right: 10px;
            top: 50%;
            z-index: 9999;
            color: rgba(255, 255, 255, 0.73);
            font-size: 7em;
            transform: translateY(-50%);
            transition: .2s all linear;
            background: rgba(255, 255, 255, 0.17);
            border-radius: 50%;
            height: 100px;
            width: 100px;
            line-height: 100px;
            text-align: center;
        }

        .slick-next:hover {
            color: rgb(255, 255, 255);
        }
	</style>
@endsection

@section("main")
	<!--  Main Content  -->
	<section class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-1 p-0 m-0"
	         style="max-height: 100vh;">

		<!--  Slick Slider  -->
		<div class="slick-slider mb-2">
			@foreach($properties as $property)
				<div class="bg-white rounded-lg overflow-hidden shadow-md my-4 mx-2">
					<a class="w-full h-full" href="{{ route('property.show', ['id' => $property->id]) }}">
						<img class="w-full h-56 object-cover"
						     src="{{ $property->thumbnail }}"
						     alt="Card image cap">
						<h1 style="position: absolute;" class="text-gray-50">
							{{ $property->title }}
						</h1>
					</a>
				</div>
			@endforeach
		</div>
		<script>
			$('.slick-slider').slick({
				arrows: true,
				autoplay: true
			});
			document.querySelector(".slick-prev").innerHTML = `<span class="mdi mdi-chevron-left"></span>`;
			document.querySelector(".slick-next").innerHTML = `<span class="mdi mdi-chevron-right"></span>`;
		</script>
		<!--  End Slick Slider  -->


		<!--  If filter By Category  -->
		{{--        <div th:if="${slug}" class="p-3 rounded-md bg-white text-gray-950">--}}
		{{--            <a href="/" class=" text-blue-600">All</a> \ <strong th:text="${slug}" class=""></strong>--}}
		{{--        </div>--}}
		<!--  End If filter By Category  -->

		<!--  Property List  -->
		<div class="grid grid-cols-4 px-3">
			<!--  Property List  -->
			<div class="col-span-3">
				@foreach($categories as $category)
					<div class="px-3">
						{{-- <div class="w-full bg-blue-500 rounded-s text-blue-50 px-5 py-3">Top Properties</div>--}}
						<div id="properties-container" class="grid grid-cols-4 md:grid-cols-4 xl:grid-cols-4 px-1 m-0">
							<div class="flex justify-between col-span-4 mt-2 border-b-2 border-black">
							<span class="bg-gray-900 text-gray-50 px-4 py-2">
								{!! $category->namewithicon !!}
							</span>
								<a href="/property/category/{{$category->id}}" class="text-blue-700">
									view all
								</a>
							</div>
							@foreach($category->properties->take(4) as $property)
								@include("layout.parts.CardProperty", [ "property" => $property ])
							@endforeach
						</div>
					</div>
				@endforeach
			</div>
			<!--  End Property List  -->

			<!-- Reviews -->
			<div class="col-span-1 bg-gray-50 ml-2 mt-43 rounded-sm" style="height: 600px; overflow-y: hidden">
				<div class="w-full py-3 px-5 bg-blue-900 text-white">
					<span class="mdi mdi-comment-multiple-outline"></span>
					Reviews
				</div>
				<div style="max-height: 100%; overflow-y: auto" class=" p-2">
					@foreach($reviews as $review)
						<div class="review w-full p-2 rounded-sm border shadow-sm mb-2 bg-gray-300">
							<div class="content text-gray-800">
								<div class="flex">
									<img class="m-2 rounded" style="width: 50px; height: 50px;"
									     src="{{ url($review->property->thumbnail) }}">
									<div class="flex flex-col items-center">
										<a class=" mx-1"
										   href="{{ route('property.show', [ 'id' => $review->property->id ]) }}">{{ $review->property->title }}</a>
										<div class="stars">
											@for($i = 0; $i< $review->rating; $i++)
												<span class="mdi mdi-star text-green-600"></span>
											@endfor
										</div>
									</div>
								</div>
								<div class="bg-gray-200 p-2 rounded-md">
									<span class="mdi mdi-format-quote-open"></span>
									{{ substr($review->content,0, 150) }}...
									<span class="mdi mdi-format-quote-close"></span>
								</div>
							</div>
							<hr>
							<div class="reviewer mt-4 flex">
								<img src="{{ url($review->user->image) }}"
								     class="inline-block mr-3"
								     alt=""
								     style="width:50px; height:50px; border: 3px solid white; outline: 1px solid #ddd; border-radius: 50%;"
								>
								<span class="inline-block text-blue-700">
											<strong>
												{{ $review->user->name }}
											</strong>
											<br>
											<span class="text-red-500" style="font-size: 10px!important;">
												{{ \Illuminate\Support\Carbon::make($review->created_at)->diffForHumans() }}
											</span>
										</span>
							</div>
						</div>
					@endforeach
				</div>

			</div>
			<!-- End Reviews -->

		</div>
	</section>
@endsection