<nav id="topbar" class="bg-blue-700 w-full fixed flex justify-between align-middle top-0 z-50 justify-items-end" aria-label="Sidebar">
    <div style="width: 380px" class="inline-block bg-gray-900 px-5 py-5 text-white text-center">
        <a href="/" class="w-full h-full block">Home</a>
    </div>
    <div class="right flex mt-3 mr-5 align-baseline justify-around">
        <div class="mr-8">
            <form class="p-0 m-0" method="get" action="/property/search">
                <input type="text" class="rounded-md p-0 py-2 px-2" placeholder="Search Property" name="propertyName" id="search-property-input">
            </form>
        </div>
        <div class="ml-8 mr-5">
            @auth()
                <form class="p-0 m-0" method="post" action="/logout">
                    @csrf
                    <button type="submit" class="btn bg-blue-900 px-2 rounded-md text-white">
                        Logout
                    </button>
                </form>
            @endauth
            @if( !\Illuminate\Support\Facades\Auth::check() )
                <a href="/login" class="btn bg-blue-900 px-3 py-0 rounded-md text-white">
                    Login
                </a>
            @endif
        </div>
    </div>
</nav>
