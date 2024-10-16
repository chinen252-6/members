<x-app-layout>
    <x-slot name="header">
        <h2 class="font-KanjukuGothic text-xl text-gray-800 leading-tight">
            お問い合わせ一覧
        </h2>
        <x-validation-errors class="mb-4" :errors="$errors" />
        <x-message :message="session('message')" />
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($contacts->isEmpty())
        <div class="mx-4 sm:p-8">
            <div class="mt-4">
                <div class="bg-white w-full rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <div class="mt-4">
                        <p class="mt-4 text-gray-600 py-4">まだお問い合わせがありません。</p>
                    </div>
                </div>
            </div>
        </div>
        @else
        @foreach ($contacts as $contact)
            <a href="{{ route('contacts.show', ['id' => $contact->id]) }}">
                <div class="mx-4 sm:p-8">
                    <div class="mt-4">
                        <div class="bg-white w-full rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                            <div class="w-full">
                                <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer">{{ $contact->title }}</h1>
                                <hr class="w-full mt-2 mb-4">
                                <p class="text-gray-600">{{ $contact->email }}</p>
                                <p class="text-sm text-gray-500">送信日: {{ $contact->created_at->format('Y年m月d日 H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach




        @endif
    </div>
    <div class="mt-4 mb-4">
    {{ $contacts->links() }}
    </div>
</x-app-layout>
