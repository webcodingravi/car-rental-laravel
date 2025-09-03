@extends('layouts.app')
@section('content')
    <main>
        <div class="flex flex-col gap-3 items-center text-center py-20 bg-slate-100">
            <h2 class="text-3xl md:text-[40px] font-bold">Available Cars</h2>
            <p class="max-w-2xl text-sm md:text-base text-gray-500/90 px-5 md:px-0">Browse our selection of premium
                vehicles available for your next adventure</p>

            <div class="flex items-center bg-white rounded-full shadow px-4 h-12 max-w-140 w-full mt-4">
                <i class="ri-search-line text-xl px-2 text-gray-500"></i>
                <input type="text" placeholder="Search by brand, model, or location" id="search"
                    class="w-full h-full outline-none text-gray-500">
                <i class="ri-filter-line text-xl px-2 text-gray-500"></i>
            </div>

        </div>



        <div class="mb-50">
            <div class="px-6 md:px-32 mt-10">
                <p class="text-gray-500 max-w-8xl">Showing {{ $cars->total() }} Cars</p>
            </div>

            <div class="grid md:grid-cols-4 grid-cols-1 gap-8 md:px-32 p-6" id="carList">
                @include('cars.list', ['cars' => $cars])
            </div>

            <!-- Pagination links -->
            <div class="px-6 md:px-32 mt-4">
                {{ $cars->links() }}
            </div>
        </div>



    </main>
@endsection

@section('script')
    <script>
        $("body").delegate("#search", "keyup", function() {
            let query = $(this).val();
            $.ajax({
                url: "{{ route('search_car') }}",
                method: "get",
                data: {
                    'query': query
                },
                success: function(res) {
                    $("#carList").html(res)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error', textStatus, errorThrown);
                    alert('An error occurred:' + errorThrown)
                }
            })
        })
    </script>
@endsection
