    <div id="forgot-modal"
        class="fixed inset-0 z-100 flex items-center justify-center bg-black/50 hidden transition-opacity duration-300">
        <form action="{{ route('forgotPassword') }}" method="POST"
            class="relative bg-white p-8 w-80 sm:w-[352px] text-gray-500 rounded-lg shadow-xl border border-gray-200 flex flex-col gap-4">
            @csrf
            <p class="text-2xl font-medium text-center">
                <span class="text-indigo-500">Forgot</span> Password
            </p>
            <div class="w-full">
                <p>Email</p>
                <input name="email" type="email" required placeholder="Enter Your Email"
                    class="border border-gray-200 rounded w-full p-2 mt-1 outline-indigo-500" />
            </div>
            <button type="submit"
                class="bg-indigo-500 hover:bg-indigo-600 text-white w-full py-2 rounded-md transition-all cursor-pointer">
                Reset Password
            </button>
            <button type="button" id="close-forgot"
                class="absolute top-4 right-4 text-gray-700 font-bold cursor-pointer">X</button>
        </form>
    </div>
