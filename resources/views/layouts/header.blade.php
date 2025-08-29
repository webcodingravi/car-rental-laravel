  <nav
      class="flex items-center justify-between md:px-32 px-6 border-b border-slate-200 py-4 {{ Request::segment(1) == '' ? 'bg-slate-100' : 'bg-white' }} transition-all duration-500 sticky top-0 left-0 z-[999] text-gray-600">
      <img src={{ asset('image/logo/logo.svg') }} class=" cursor-pointer" alt="Logo">
      {{-- dasktop menu --}}
      <div class="space-x-8 md:block hidden">
          <a href="{{ route('home') }}" class="hover:text-indigo-500">Home</a>
          <a href="{{ route('cars') }}" class="hover:text-indigo-500">Cars</a>
          <a href="{{ route('MyBookings') }}" class="hover:text-indigo-500">MyBookings</a>
          @if (Auth::check() && Auth::user()->role == 'owner')
              <a href="#" class="hover:text-indigo-500 cursor-pointer focus:outline-none">Dashboard</button>
              @else
                  <button class="hover:text-indigo-500 cursor-pointer focus:outline-none" id="listCars">List
                      cars</button>
          @endif


          @if (!empty(Auth::check()))
              <a href="{{ route('logout') }}"
                  class="bg-indigo-500 px-8 py-2.5 text-white rounded hover:bg-indigo-600 cursor-pointer transition-all duration-200">
                  <i class="ri-login-circle-line"></i>
                  Logout
              </a>
          @else
              <button id="userLogin"
                  class="bg-indigo-500 px-8 py-2 text-white rounded hover:bg-indigo-600 cursor-pointer transition-all duration-200">
                  <i class="ri-user-line"></i>
                  Login
              </button>
          @endif

      </div>

      <button id="menu-btn" class="cursor-pointer md:hidden block">
          <i class="ri-menu-3-line text-xl font-semibold text-slate-600"></i>
      </button>



      {{-- mobile menu --}}

      <div class="w-full bg-slate-100 h-screen border-b border-slate-200 fixed top-0 left-0 flex flex-col items-center justify-center gap-8 transition-all duration-500 -translate-x-full"
          id="mobile-menu">

          <a href="{{ route('home') }}" class="hover:text-indigo-500">Home</a>
          <a href="{{ route('cars') }}" class="hover:text-indigo-500">Cars</a>
          <a href="{{ route('MyBookings') }}" class="hover:text-indigo-500">MyBookings</a>
          <a href="{{ route('OwnerDashboard') }}" class="hover:text-indigo-500">Dashboard</a>
          @if (!empty(Auth::check()))
              <a href="{{ route('logout') }}"
                  class="bg-indigo-500 px-8 py-2.5 text-white rounded hover:bg-indigo-600 cursor-pointer transition-all duration-200">
                  <i class="ri-login-circle-line"></i>
                  Logout
              </a>
          @else
              <button id="userLogin"
                  class="bg-indigo-500 px-8 py-2 text-white rounded hover:bg-indigo-600 cursor-pointer transition-all duration-200">
                  <i class="ri-user-line"></i>
                  Login
              </button>
          @endif

          <button class="cursor-pointer md:hidden block absolute top-6 right-6" id="close-menu">
              <i class="ri-close-large-line font-semibold text-slate-600"></i>

          </button>

      </div>

  </nav>
