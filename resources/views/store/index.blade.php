<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            地域ごとの店舗一覧
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($stores->isEmpty())
                        <p>この地域には店舗がありません。</p>
                    @else
                        <ul>
                            @foreach($stores as $store)
                                <li>{{ $store->store_name }}</li>
                                <!-- 他の店舗情報もここに表示できます -->
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
