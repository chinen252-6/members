<x-app-layout>
    <x-slot name="header">
        <h2 class="font-KanjukuGothic text-xl text-gray-800 leading-tight">
            お問い合わせ詳細
        </h2>
        <x-validation-errors class="mb-4" :errors="$errors" />
        <x-message :message="session('message')" />
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <div class="mt-4">
                <div class="bg-white w-full rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <div class="w-full">
                        <h1 class="text-lg text-gray-700 font-semibold">{{ $contact->title }}</h1>
                        <hr class="w-full mt-2 mb-4">
                        <p><strong>メールアドレス:</strong> {{ $contact->email }}</p>
                        <p><strong>内容:</strong> {{ $contact->body }}</p>
                        <p class="text-sm text-gray-500">送信日: {{ $contact->created_at->format('Y年m月d日 H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex" >
        <div class="mx-4 sm:p-8">
            <a href="{{ route('contacts.index') }}" class="bg-gradient-to-r from-gray-700 to-gray-900 hover:from-gray-600 hover:to-gray-700 text-white font-medium py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-102 hover:shadow-xl">戻る</a>
        </div>
        <div class="mx-4 sm:p-8">
            <a href="{{ route('contacts.edit', ['id' => $contact->id]) }}" class="bg-gradient-to-r from-red-700 to-red-900 hover:from-red-600 hover:to-red-700 text-white font-medium py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-102 hover:shadow-xl">編集</a>
        </div>
        </div>
    </div>
</x-app-layout>
