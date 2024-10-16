<x-app-layout>
    <x-slot name="header">
        <h2 class="font-KanjukuGothic text-xl text-gray-800 leading-tight">
            お問い合わせの編集
        </h2>
        <x-validation-errors class="mb-4" :errors="$errors" />
        
        <x-message :message="session('message')" />
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <form method="post" action="{{ route('contacts.update', $contact->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- PUTメソッドを指定 -->

                <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                        <label for="title" class="font-semibold leading-none mt-4">件名</label>
                        <input type="text" name="title" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" value="{{ old('title', $contact->title) }}" placeholder="件名を入力してください">
                    </div>
                </div>

                <div class="w-full flex flex-col">
                    <label for="body" class="font-semibold leading-none mt-4">本文</label>
                    <textarea name="body" class="w-auto py-2 border border-gray-300 rounded-md placeholder-gray-300" id="body" cols="30" rows="10" placeholder="本文を入力してください">{{ old('body', $contact->body) }}</textarea>
                </div>

                <div class="md:flex items-center">
                    <div class="w-full flex flex-col">
                        <label for="email" class="font-semibold leading-none mt-4">メールアドレス</label>
                        <input type="text" name="email" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="email" value="{{ old('email', $contact->email) }}" placeholder="メールアドレスを入力してください">
                    </div>
                </div>

                <button type="submit" class="mt-5 bg-gradient-to-r from-blue-700 to-blue-900 hover:from-blue-600 hover:to-blue-700 text-white font-medium py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-102 hover:shadow-xl" >更新</button>

                
            </form>
            
            <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}" style="margin-top: -50px; display:flex; justify-content:end;">
            @csrf
            @method('DELETE')
                <button type="submit" class="bg-gradient-to-r from-red-700 to-red-900 hover:from-red-600 hover:to-red-700 text-white font-medium py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-102 hover:shadow-xl" onclick="return confirm('本当に削除しますか？')">削除</button>
            </form>
            <div class="mt-10">
                <a href="{{ route('contacts.show',['id' => $contact->id]) }}" class="bg-gradient-to-r from-gray-700 to-gray-900 hover:from-gray-600 hover:to-gray-700 text-white font-medium py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-102 hover:shadow-xl">戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>








