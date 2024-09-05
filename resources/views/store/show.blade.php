<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $region_name }}/{{ $store->store_name }}の詳細
        </h2>
        <x-message :message="session('message')" />
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex justify-center">
        <!-- メインコンテンツ -->
        <div class="w-4/5 bg-white rounded-2xl shadow-lg overflow-hidden">

            <!-- 店舗名 -->
            <h1 class="p-6 text-3xl font-bold text-gray-800">{{ $store->store_name }}</h1>
            <hr class="my-4">


            <!-- 画像部分 -->
            @if ($store->image)
            <div class="w-full flex justify-center">
            <div class="w-3/5 h-64 md:h-80 lg:h-96 overflow-hidden">
                <img src="{{ asset('storage/images/' . $store->image) }}" alt="{{ $store->store_name }}" class="object-cover w-full h-full">
            </div>
            </div>
            @else
            <div class="w-full h-64 md:h-80 lg:h-96 flex items-center justify-center bg-gray-100">
                <p class="text-center text-gray-500">画像は登録されていません</p>
            </div>
            @endif

            <!-- 詳細情報部分 -->
            <div class="p-6">
                

                <!-- Subject -->
                <div class="mb-4">
                    <h2 class="text-lg font-bold text-gray-700" style="font-size: 30px;">{{ $store->subject }}</h2>
                </div>

                <!-- Introduction -->
                <div class="mb-4">
                    <p class="text-gray-600 whitespace-pre-line">{{ $store->introduction }}</p>
                </div>

                <!-- Tel -->
                <div class="mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">電話番号</h2>
                    <p class="text-gray-600">{{ $store->tel }}</p>
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">住所</h2>
                    <p class="text-gray-600">{{ $store->address }}</p>
                </div>
                <div>
                <a href="{{ route('review.comment', ['store_id' => $store->store_id]) }}">口コミ投稿</a>
                </div>

                
            </div>
            <h2>口コミ一覧</h2>
    @if($reviews->isEmpty())
        <p>この店舗にはまだ口コミがありません。</p>
    @else
        <ul>
            @foreach($reviews as $review)
                <li>
                    <h3>{{ $review->title }}</h3>
                    <p>{{ $review->body }}</p>
                    <p>評価: {{ $review->rating }} / 5</p>
                    <p>投稿日: {{ $review->created_at->format('Y-m-d') }}</p>
                </li>
            @endforeach
        </ul>
    @endif
        </div>
    </div>
</x-app-layout>
