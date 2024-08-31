<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if($region_name)
                {{ $region_name }}の店舗一覧
            @else
                地域ごとの店舗一覧
            @endif
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($stores->isEmpty())
        <div class="mx-4 sm:p-8">
            <div class="mt-4">
                <div class="bg-white w-full rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <div class="mt-4">
                        <p class="mt-4 text-gray-600 py-4">この地域はまだ店舗が登録されていません</p>
                    </div>
                </div>
            </div>
        </div>
        @else
        @foreach ($stores as $store)
            <a href="{{ route('store.show', ['store' => $store->store_id]) }}">
            <div class="mx-4 sm:p-8">
                <div class="mt-4">
                    <div class="bg-white w-full rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500 flex">
                        <div class="w-1/4">
                            @if ($store->image)
                                <img src="{{ asset('storage/images/'.$store->image)}}" class="object-cover w-full h-full rounded-lg">
                            @else
                                <p class="text-center py-8 text-gray-500">画像は登録されていません</p>
                            @endif
                        </div>
                        <div class="w-3/4 pl-8">
                            <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer">{{ $store->store_name }}</h1>
                            <hr class="w-full mt-2 mb-4">
                            <p class="text-gray-600">{{ $store->subject }}</p>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        @endforeach
        @endif
    </div>
</x-app-layout>
