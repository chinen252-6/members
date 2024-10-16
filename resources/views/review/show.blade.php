<x-app-layout>
    <x-slot name="header">
        <h2 class="font-KanjukuGothic text-xl text-gray-800 leading-tight">
          口コミ詳細
        </h2>
        <x-message :message="session('message')" />
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex justify-center">
       
        <div class="w-4/5 bg-white rounded-2xl shadow-lg overflow-hidden">

           
            @if ($review->image)
            <div class="w-full flex justify-center">
                <div class="w-3/5 h-64 md:h-80 lg:h-96 overflow-hidden">
                    <img src="{{ asset('storage/images/' . $review->image) }}" alt="{{ $review->review_title }}" class="object-cover w-full h-full">
                </div>
            </div>
            @else
            <div class="w-full h-64 md:h-80 lg:h-96 flex items-center justify-center bg-gray-100">
                <p class="text-center text-gray-500">画像は登録されていません</p>
            </div>
            @endif

            
            <div class="p-6">

                
                <div class="mb-4">
                    <h2 class="text-lg font-bold text-gray-700" style="font-size: 30px;">{{ $review->title }}</h2>
                </div>

                
                <div class="mb-4">
                    <p class="text-gray-600 whitespace-pre-line">{{ $review->body }}</p>
                </div>

                 
                <div class="mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">投稿日: {{ $review->created_at->format('Y-m-d') }}</h2>
                </div>
                

              
                <div class="mb-4">
                <span class="text-yellow-500 text-lg font-bold">
                    @for ($i = 0; $i < floor($review->rating); $i++) 
                        ★
                    @endfor
                    @if (($review->rating * 2) % 2 == 1)
                        ☆
                    @endif
                </span>
                <span class="ml-2 text-sm text-gray-500">{{ $review->rating }} / 5</span> 
                </div>
                <div class="text-center mt-6">
                    <a href="{{ url()->previous() }}" class="bg-gradient-to-r from-gray-700 to-gray-900 hover:from-gray-600 hover:to-gray-700 text-white font-medium py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-102 hover:shadow-xl">
                        店舗詳細へ戻る
                    </a>
                @auth
                <div class="mx-4 sm:p-8 ">
                    <a href="{{ route('review.edit', $review->id) }}" class="bg-gradient-to-r from-red-700 to-red-900 hover:from-red-600 hover:to-red-700 text-white font-medium py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-102 hover:shadow-xl">編集</a>
                </div>
                @endauth
                </div>
            </div>
        </div>
    </div>
           

        
</x-app-layout>
