@extends("admin.layout.DashboardLayout")


@section("main")
    <!--  Main Content  -->
    <section class="grid grid-cols-1 left-52 md:grid-cols-1 xl:grid-cols-1 p-8 m-5" style="">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Content
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Property
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Reviewer
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($reviews as $review)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $review->id }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $review->content }}
                    </th>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.property.show', ['id' => $review->property->id]) }}">
                            {{ $review->property->title }}
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        {{ $review->user->name }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="/admin/reviews/{{ $review->id }}" class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            View
                        </a>
                        <a href="/admin/reviews/edit/{{ $review->id }}" class="cursor-pointer text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 me-2 mb-2 dark:bg-amber-500 dark:hover:bg-amber-600 focus:outline-none dark:focus:ring-blue-800">
                            Edit
                        </a>
                        <form action="/admin/reviews/delete/{{ $review->id }}" method="post" class="inline">
                            <button type="submit" class="cursor-pointer text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2 dark:bg-amber-500 dark:hover:bg-amber-600 focus:outline-none dark:focus:ring-blue-800">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <!--  Pagination  -->
        <nav aria-label="Page navigation example mt-5">
            <ul class="inline-flex items-center justify-center px-4 py-2 bg-white border rounded-md">
                <li class="" th:if="${currentPage > 1 }">
                    <a href="/admin/reviews" class="px-2 py-1 text-sm font-medium text-gray-500 hover:text-gray-700">Previous</a></li>

                <li th:classappend="${currentPage == page} ? 'disabled'" th:each="page : ${#numbers.sequence((currentPage > 2 ? currentPage - 2 : 1), (currentPage + 2 < totalPages ? currentPage + 2 : totalPages) )}">
                    <a
                            th:text="${page}"
                            th:href="${'/admin/reviews?page=' + page + '&size=' + pageSize }"
                            class="px-2 py-1 text-sm font-medium text-gray-700 hover:text-blue-500">
                    </a>
                </li>

                <li>
                    <a
                            th:href="${'/admin/reviews?page=' + totalPages }"
                            class="px-2 py-1 text-sm font-medium text-gray-700 hover:text-gray-700"
                            th:classappend="${currentPage == totalPages} ? 'disabled'"
                    >
                        Next
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Pagination  -->
    </section>
    <!-- End Main Content  -->
@endsection