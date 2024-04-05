@extends("admin.layout.DashboardLayout")


@section("main")
    <!-- Main Content -->
    <div class="flex-1 bg-gray-200 mt-5">
        <div class="p-6">
            <h1 class="text-2xl font-semibold bg-blue-200 p-3 rounded">Dashboard</h1>
            <div class="mt-4 grid grid-cols-4 sm:grid-cols-4 lg:grid-cols-4 gap-6">
                <!-- Cards/Widgets -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold">Total Property</h2>
                    <p class="text-3xl font-bold mt-2">{{ $properties->count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold">Total Reviews</h2>
                    <p class="text-3xl font-bold mt-2">{{ $reviews->count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold">Total Company</h2>
                    <p class="text-3xl font-bold mt-2">{{ $companies->count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold">Total Users</h2>
                    <p class="text-3xl font-bold mt-2">{{ $users->count() }}</p>
                </div>

                <!-- Most Viewed Properties -->
                <div class="bg-white p-4  rounded-lg shadow-md col-span-2">
                    <h5 class="text-xl text-blue-100 bg-blue-500 p-2 py-1 rounded ">Most Viewed Properties</h5>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Views
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    21
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    John Doe
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    30
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>

                <!-- Most Reviewed Properties -->
                <div class="bg-white p-4  rounded-lg shadow-md col-span-2">
                    <h5 class="text-xl text-blue-100 bg-blue-500 p-2 py-1 rounded ">Most Viewed Properties</h5>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Views
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    21
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    John Doe
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    30
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- End Main Content -->

@endsection