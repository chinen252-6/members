<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        お問い合わせ
        </h2>
        <x-validation-errors class="mb-4" :errors="$errors" />
        
        <x-message :message="session('message')" />

        
        
    </x-slot>



    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <form method="post" action="{{route('contact.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                        <label for="title" class="font-semibold leading-none mt-4">件名</label>
                        <input type="text" name="title" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" value="{{old('title')}}" placeholder="件名を入力してください">
                    </div>
                </div>

                <div class="w-full flex flex-col">
                    <label for="body" class="font-semibold leading-none mt-4">本文</label>
                    <textarea name="body" class="w-auto py-2 border border-gray-300 rounded-md placeholder-gray-300" id="body" cols="30" rows="10" placeholder="本文を入力してください">{{old('body')}}</textarea>
                </div>

                <div class="md:flex items-center">
                    <div class="w-full flex flex-col">
                        <label for="email" class="font-semibold leading-none mt-4">メールアドレス</label>
                        <input type="text" name="email" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="email" value="{{old('email')}}" placeholder="メールアドレスを入力してください">
                    </div>
                </div>
                <x-primary-button class="mt-4">
                    送信する
                </x-primary-button>
                
            </form>
        </div>
    </div>
</x-app-layout>


