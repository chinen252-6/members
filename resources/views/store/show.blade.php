<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $region_name }}/{{ $store->store_name }}の詳細
        </h2>
        <x-validation-errors class="mb-4" :errors="$errors" />
        <x-message :message="session('message')" />    </x-slot>

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
                 @if ($store->tel)
                <div class="mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">電話番号</h2>
                    <p class="text-gray-600">{{ $store->tel }}</p>
                </div>
                @else
                <div class="mb-4">
                    <p class="text-gray-300">電話番号が未登録です</p>
                </div>
                @endif

                <!-- Address -->
                <div class="mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">住所</h2>
                    <p class="text-gray-600">{{ $region_name }}{{ $store->address }}</p>
                </div>
                <div class="text-center mt-6">
                    <a href="{{ route('review.comment', ['store_id' => $store->store_id]) }}" class="bg-gradient-to-r from-gray-700 to-gray-900 hover:from-gray-600 hover:to-gray-700 text-white font-medium py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-102 hover:shadow-xl">
                        口コミを投稿する
                    </a>
                </div>
                
                @auth
                <a href="{{ route('store.edit', $store->store_id) }}" class="bg-gradient-to-r from-red-700 to-red-900 hover:from-red-600 hover:to-red-700 text-white font-medium py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-102 hover:shadow-xl">
                    編集</a>
                @endauth
            </div>
        </div>
    </div>
           
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <h2 class="text-2xl font-bold mb-6">口コミ一覧</h2>
        @if($reviews->isEmpty())
            <p class="text-gray-500">この店舗にはまだ口コミがありません。</p>
        @else
            <div class="grid grid-cols-1 gap-8"> <!-- カードをグリッドで配置 -->
                @foreach($reviews as $review)
                <a href="{{ route('review.show', ['review' => $review->id]) }}">

                <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6"> <!-- 口コミごとに独立したコンテナ -->
                    <div class="flex items-start space-x-4">
                        <!-- レビュー画像 -->
                        @if ($review->image)
                        <div class="w-32 h-32 rounded overflow-hidden">
                            <img src="{{ asset('storage/images/' . $review->image) }}" alt="{{ $review->review_title }}" class="object-cover w-full h-full">
                        </div>
                        @else
                        <div class="w-32 h-32 bg-gray-100 flex items-center justify-center">
                            <p class="text-center text-gray-500">画像なし</p>
                        </div>
                        @endif

                        <!-- レビューテキスト -->
                        <div class="flex-1">
                            <!-- タイトル -->
                            <h3 class="text-lg font-semibold text-gray-700">{{ $review->title }}</h3>

                            <!-- ボディ -->
                            <p class="text-gray-600 mt-2">{{ $review->body }}</p>

                            <!-- 投稿日時 -->
                            <div class="text-gray-500 text-sm mt-2">投稿日: {{ $review->created_at->format('Y-m-d') }}</div>

                            <!-- レビュー評価 -->
                            <div class="flex items-center mt-2">
                                <span class="text-yellow-500 text-lg font-bold">
                                    @for ($i = 0; $i < floor($review->rating); $i++) 
                                        ★
                                    @endfor
                                    @if (($review->rating * 2) % 2 == 1)
                                        ☆
                                    @endif
                                </span>
                                <span class="ml-2 text-sm text-gray-500">{{ $review->rating }} / 5</span> <!-- 数値評価を表示 -->
                            </div>
                        </div>
                    </div>
                </div> <!-- 各口コミを1つのコンテナとして囲む -->
                </a>
                @endforeach
            </div>
        @endif
    </div>
</div>


        
</x-app-layout>
