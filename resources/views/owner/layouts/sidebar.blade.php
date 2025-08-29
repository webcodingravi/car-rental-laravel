<div
    class="relative min-h-screen md:flex flex-col items-center pt-8 max-w-13 md:max-w-60 w-full border-r border-slate-200 text-sm">
    <div class="group relative">
        <label>
            <img src="{{ asset('image/car_image1.png') }}" id="profile_pic"
                class='h-9 md:h-14 w-9 md:w-14 rounded-full mx-auto object-cover' />

            <input type="file" id='image' accept='image/*' hidden
                onchange="document.querySelector('#profile_pic').src=window.URL.createObjectURL(this.files[0])" />

            <div
                class='absolute hidden top-0 right-0 left-0 bottom-0 bg-black/10 rounded-full group-hover:flex items-center justify-center cursor-pointer'>
                <i class="ri-image-edit-line text-white"></i>
            </div>

        </label>

    </div>

    <button class='absolute top-0 right-0 flex p-2 gap-1 bg-indigo-500/10 text-indigo-500 cursor-pointer'>
        Save <i class="ri-checkbox-circle-line"></i>
    </button>

    <p class='mt-2 text-base max-md:hidden'>Ravi Kumar</p>

    <div class='w-full'>
        <a href="{{ route('OwnerDashboard') }}"
            class="relative flex items-center gap-2 w-full py-2 pl-3 first:mt-6 {{ Request::segment(2) == 'dashboard' ? 'bg-indigo-500/10 text-indigo-500' : 'text-gray-500' }}">
            <i class="ri-dashboard-horizontal-line text-xl"></i>
            <span class='max-md:hidden'>Dashboard</span>

            <div
                class="{{ Request::segment(2) == 'dashboard' ? 'w-1.5 h-8 rounded-1 right-0 absolute bg-indigo-500' : '' }}">
            </div>
        </a>

        <a href="{{ route('OwnerAddCar') }}"
            class="relative flex items-center gap-2 w-full py-2 pl-3 first:mt-6  {{ Request::segment(2) == 'add-car' ? ' bg-indigo-500/10 text-indigo-500' : 'text-gray-500' }}">
            <i class="ri-add-circle-line text-xl"></i>
            <span class='max-md:hidden'>Add Car</span>
            <div
                class="{{ Request::segment(2) == 'add-car' ? 'w-1.5 h-8 rounded-1 right-0 absolute bg-indigo-500' : '' }}">
            </div>
        </a>

        <a href="{{ route('OwnerManageCars') }}"
            class="relative flex items-center gap-2 w-full py-2 pl-3 first:mt-6  {{ Request::segment(2) == 'manage-cars' ? ' bg-indigo-500/10 text-indigo-500' : 'text-gray-500' }}">
            <i class="ri-car-line xl text-xl"></i>
            <span class='max-md:hidden'>Manage Cars</span>
            <div
                class="{{ Request::segment(2) == 'manage-cars' ? 'w-1.5 h-8 rounded-1 right-0 absolute bg-indigo-500' : '' }}">
            </div>
        </a>

        <a href="{{ route('OwnerManageBookings') }}"
            class="relative flex items-center gap-2 w-full py-2 pl-3 first:mt-6 {{ Request::segment(2) == 'manage-bookings' ? ' bg-indigo-500/10 text-indigo-500' : 'text-gray-500' }}">
            <i class="ri-survey-line text-xl"></i>
            <span class='max-md:hidden'>Manage Bookings</span>
            <div
                class="{{ Request::segment(2) == 'manage-bookings' ? 'w-1.5 h-8 rounded-1 right-0 absolute bg-indigo-500' : '' }}">
            </div>
        </a>

    </div>


    <div>
    </div>

</div>
