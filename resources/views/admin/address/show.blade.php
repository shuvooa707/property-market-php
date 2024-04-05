@extends("admin.layout.DashboardLayout")


@section("main")
    <!--  Main Content  -->
    <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-1 p-8 m-5" style="">
        <div class="relative overflow-x-auto">
            <table class="w-2/4 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $company->id }}
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ $company->name }}
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ $company->email }}
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ $company->phone }}
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Total Property
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ $company->properties->count() }}
                    </th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3 underline">
                        {{ $company->address->street }}, {{ $company->address->city }}, {{ $company->address->zip_code }},  {{ $company->address->state }}, {{ $company->address->country }}
                    </th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- End Main Content  -->
@endsection