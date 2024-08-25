<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            せんべろ店登録
        </h2>
        <x-validation-errors class="mb-4" :errors="$errors" />
        <x-message :message="session('message')" />

        
        
    </x-slot>



<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-4 sm:p-8">
            <form method="post" action="{{route('store.store')}}" enctype="multipart/form-data">
            @csrf                    
                    <div class="md:flex items-center mt-8">
                        <div class="w-full flex flex-col">
                        <label for="store_name" class="font-semibold leading-none mt-4">店名</label>
                        <input type="text" name="store_name" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="store_name" value="{{old('store_name')}}" placeholder="20文字以内で入力してください">
                        </div>
                    </div>

                    <div class="md:flex items-center mt-8">
                        <div class="w-full flex flex-col">
                        <label for="subject" class="font-semibold leading-none mt-4">どんな店</label>
                        <input type="text" name="subject" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="subject" value="{{old('subject')}}" placeholder="50文字以内で入力してください">
                        </div>
                    </div>
    
                    <div class="w-full flex flex-col">
                        <label for="introduction" class="font-semibold leading-none mt-4">詳しく紹介</label>
                        <textarea name="introduction" class="w-auto py-2 border border-gray-300 rounded-md" id="introduction" cols="30" rows="10" >{{old('introduction')}} </textarea>
                    </div>
                    <div class="md:flex items-center mt-8">
                        <div class="w-1/2 flex flex-col">
                        <label for="tel" class="font-semibold leading-none mt-4">電話番号</label>
                        <input type="text" name="tel" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="tel" value="{{old('tel')}}" placeholder="090-0000-0000">
                        </div>
                    </div>
                    <div class="md:flex items-center mt-8">
                        <div class="w-1/2 flex flex-col">
                        <label for="address" class="font-semibold leading-none mt-4">住所</label>
                        <input type="text" name="address" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="address" value="{{old('address')}}" placeholder="那覇市〇〇">
                        </div>
                    </div>
    
                <div class="w-full flex flex-col">
                    <label for="image" class="font-semibold leading-none mt-4">画像 （1MBまで）</label>
                    <div>
                    <input id="image" type="file" name="image">
                    </div>
                </div>

                    <x-primary-button class="mt-4">
                        送信する
                    </x-primary-button>
                    
                </form>
            </div>
        </div>



</x-app-layout>