<nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button -->
        <button id="mobile-menu-button" type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex shrink-0 items-center">
          <a href="{{ route('home')}}"><img class="h-10 w-auto" src="{{asset('Logo.png')}}" alt="Ecoseastem"></a>
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <a href="/articles" class="{{ Request::is('articles') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" 
                aria-current="{{ Request::is('articles') ? 'page' : 'false' }}" aria-current="page">Articles</a>
            <a href="/merch" class="{{ Request::is('merch') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" 
                aria-current="{{ Request::is('merch') ? 'page' : 'false' }}">Merch</a>
            <a href="/about-us" class="{{ Request::is('about-us') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" 
                aria-current="{{ Request::is('about.us') ? 'page' : 'false' }}">About Us</a>
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
          <span class="absolute -inset-1.5"></span>
          <span class="sr-only">View notifications</span>
          <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0="1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
          </svg>
        </button>


        <!-- Profile dropdown -->
        <div class="relative ml-3">
          @guest
          <div>
            <a href="{{ route('login') }}">
              <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <img class="size-8 rounded-full" src="{{ asset('avatar-icon.png')}}" alt="">
              </button>              
            </a>

          </div>

        @else
          <div>
            <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="absolute -inset-1.5"></span>
              @if(auth()->user()->profile_picture)
                <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture" class="w-24 h-24 mx-auto rounded-full object-cover">
              @else
                <img class="w-24 h-24 mx-auto rounded-full object-cover" src="{{ asset('avatar-icon.png')}}" alt="Profile Picture">
              @endif
            </button>
          </div>

            <!-- Dropdown menu -->
            <div id="user-menu" class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              @php
                  $current_username = auth()->user()->name;
              @endphp
              <a href="{{ route('profile', $current_username) }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

              <a href="{{ route('bookmark') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Bookmark</a>

              <!-- Transaction History Nav -->
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Transactions History</a> 

              <!-- Logout -->
              <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>   
              <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
              </form>

            </div>
        @endguest

        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu, initially hidden -->
  <div id="mobile-menu" class="sm:hidden hidden space-y-1 px-2 pb-3 pt-2">
    <a href="/articles" class="{{ Request::is('postcard') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium" aria-current="{{ Request::is('articles') ? 'page' : 'false' }}">Articles</a>
    
    <a href="/merch" class="{{ Request::is('merch') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium"  aria-current="{{ Request::is('merch') ? 'page' : 'false' }}">Merch</a>

    <a href="/about-us" class="{{ Request::is('about.us') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium" aria-current="{{ Request::is('about.us') ? 'page' : 'false' }}">About Us</a>
  </div>
</nav>