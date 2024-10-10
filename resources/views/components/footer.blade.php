<footer class="bg-gray-800 text-white py-13">
    <div class="container mx-auto flex  items-center">
        <!-- ロゴ部分 -->
        <div class="flex items-center pt-6 " >
            <img src="{{asset('logo/logo2.svg')}}" style="max-height:150px;" alt="せんべろロゴ" > 
        </div>

        <!-- プライバシーポリシーと利用規約 -->
        <div class="ml-auto mr-0 pr-5">
            <div class="mt-4  flex flex-col ml-auto mr-0">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-white mx-2 pb-1">HOME</a>
                <a href="{{ route('store.create') }}"  class="text-gray-400 hover:text-white mx-2 pb-1">お店登録</a>
                <a href="{{ route('contact.create') }}" class="text-gray-400 hover:text-white mx-2 pb-1">お問い合わせ</a>
                @auth
                <a href="{{ route('contacts.index') }}" class="text-gray-400 hover:text-white mx-2 pb-1">問い合わせ一覧</a>
                @endauth
            </div>
        </div>

        
    </div>
    <p class="text-xs text-center pb-5">&copy; {{ date('Y') }} せんべろ探検隊</p>

</footer>
