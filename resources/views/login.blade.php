<div class="fixed top-0 bottom-0 left-0 right-0 z-100 flex items-center justify-center text-sm text-gray-600 bg-black/50 min-h-screen hidden transition-all duration-500"
    id="login-model">
    <form id="user-form"
        class="flex flex-col gap-4 m-auto items-start p-8 py-12 w-80 sm:w-[352px] text-gray-500 rounded-lg shadow-xl border border-gray-200 bg-white relative">
        @csrf
        <p class="text-2xl font-medium m-auto">
            <span class="text-indigo-500">User</span>
            <span id="form-title">Login</span>
        </p>
        <div class="w-full" id="name-field" style="display: none;">
            <p>Name</p>
            <input id="name" name="name" type="text" placeholder="Enter Your Name"
                class="border border-gray-200 rounded w-full p-2 mt-1 outline-indigo-500" />

        </div>
        <div class="w-full">
            <p>Email</p>
            <input id="email" name="email" type="email" placeholder="Enter Your Email Id"
                class="border border-gray-200 rounded w-full p-2 mt-1 outline-indigo-500" />

        </div>

        <div class="w-full" id="mobile-field" style="display: none;">
            <p>Mobile No.</p>
            <input id="mobile" name="mobile" type="number" placeholder="Enter Your Mobile"
                class="border border-gray-200 rounded w-full p-2 mt-1 outline-indigo-500" />
        </div>

        <div class="w-full">
            <p>Password</p>
            <input id="password" name="password" type="password" placeholder="Enter Your Password"
                class="border border-gray-200 rounded w-full p-2 mt-1 outline-indigo-500" />

        </div>
        <p>
            <span id="toggle-text">Create an account?</span>
            <span id="toggle-link" class="text-indigo-500 cursor-pointer">click here</span>
        </p>
        <button id="submit-button"
            class="bg-indigo-500 hover:bg-indigo-600 transition-all text-white w-full py-2 rounded-md cursor-pointer">
            Login
        </button>

        <button type="button" class="absolute top-4 right-4 cursor-pointer" id="close-btn">X</button>
    </form>

</div>
