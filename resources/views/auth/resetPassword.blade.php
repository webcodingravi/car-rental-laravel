@extends('layouts.app')
@section('content')
    <main class="min-h-screen flex justify-center items-center bg-slate-100">
        <form action="{{ route('resetPassword', $user->remember_token) }}" method="post"
            class="bg-white text-gray-500 max-w-[340px] w-full mx-4 md:p-6 p-4 py-8 text-left text-sm rounded-lg shadow-[0px_0px_10px_0px] shadow-black/10">
            @csrf
            <h2 class="text-2xl font-bold mb-9 text-center text-gray-800">Reset Password</h2>

            <div class="flex items-center mt-2 mb-8 border bg-indigo-500/5 border-gray-500/10 rounded gap-1 pl-2">
                <i class="ri-lock-line"></i>

                <input name="password" class="w-full outline-none bg-transparent py-2.5" type="password"
                    placeholder="New Password" required>
            </div>

            <div class="flex items-center mt-2 mb-8 border bg-indigo-500/5 border-gray-500/10 rounded gap-1 pl-2">
                <i class="ri-lock-line"></i>
                <input name="confirm_password" class="w-full outline-none bg-transparent py-2.5" type="password"
                    placeholder="Confirm Password" required>
            </div>


            <button
                class="w-full mb-3 bg-indigo-500 hover:bg-indigo-600 transition-all active:scale-95 py-2.5 rounded text-white font-medium cursor-pointer">Reset
                Password</button>

        </form>
    </main>
@endsection
