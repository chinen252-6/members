<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            HOME
        </h2>

        <x-message :message="session('message')" />

    </x-slot>

    {{-- 投稿一覧表示用のコード --}}
    
    <div class="heading">
      <div class="heading__container">
        <h4 class="heading__container__subtext"><span>みんなでつくる</span>沖縄せんべろサイト</h4>
        <h2 class="heading__container__maintext">せんべろ探検隊</h2>
      </div>
    </div>

    <div class="top-wrapper">
      <h4 class="areas-search">エリアから探す</h4>
      <div class="top-wrapper__areas">

        <div class="top-wrapper__areas__area">
          <div class="area-icon naha">

            <img src="https://098free.com/wp-content/uploads/2022/06/038T0A1052-i.jpg" width="150" height="75">
            <p class ="p-naha">那覇</p>
            <div class="naha-detail-area">
              <a href="{{ route('store.index', ['region_id' => 1]) }}">久茂地</a> <br>
              <a href="{{ route('store.index', ['region_id' => 2]) }}">栄町</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 3]) }}">松尾</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 4]) }}">壺屋</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 5]) }}">牧志</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 6]) }}">安里</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 7]) }}">泉崎</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 8]) }}">その他</a>
            </div>
          </div>
        </div>

        <div class="top-wrapper__areas__area">
          <div class="area-icon nanbu">
          <img src="https://098free.com/wp-content/uploads/2017/06/01IMG_2054.jpg" width="150" height="75">
          <p class="p-nanbu">南部</p>
            <div class="nanbu-detail-area">
              <a href="{{ route('store.index', ['region_id' => 8]) }}">糸満市</a> <br>
              <a href="{{ route('store.index', ['region_id' => 9]) }}">豊見城市</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 10]) }}">南風原町</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 11]) }}">与那原町</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 12]) }}">八重瀬町</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 13]) }}">南城市</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 14]) }}">その他</a>  <br>
            </div>
          </div>
        </div>

        <div class="top-wrapper__areas__area">
          <div class="area-icon tyubu">
            <img src="https://098free.com/wp-content/uploads/2018/09/038G8A3457_i.jpg" width="150" height="75">
            <p class="p-tyubu">中部</p>
            <div class="tyubu-detail-area">
              <a href="{{ route('store.index', ['region_id' => 15]) }}">沖縄市</a> <br>
              <a href="{{ route('store.index', ['region_id' => 16]) }}">北谷町</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 17]) }}">宜野湾市</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 18]) }}">浦添市</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 19]) }}">嘉手納町</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 20]) }}">うるま市</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 21]) }}">その他</a>  <br>
            </div>
          </div>
        </div>

        <div class="top-wrapper__areas__area">
          <div class="area-icon hokubu">
            <img src="https://098free.com/wp-content/uploads/2018/04/03IMG1681_i.jpg" width="160" height="90">
            <p class="p-hokubu">北部</p>
            <div class="hokubu-detail-area">
              <a href="{{ route('store.index', ['region_id' => 22]) }}">名護市</a> <br>
              <a href="{{ route('store.index', ['region_id' => 23]) }}">金武町</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 24]) }}">宜野座村</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 25]) }}">本部町</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 26]) }}">今帰仁村</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 27]) }}">国頭村</a>  <br>
              <a href="{{ route('store.index', ['region_id' => 28]) }}">その他</a>  <br>
            </div>
          </div>
        </div>

      </div>

    </div>


    <div class="favorite mx-auto">
      <h2 class="text-2xl font-bold mb-4">おすすめ</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        @foreach($recommendedStores as $recommendedStore)
          <a href="{{ route('store.show', ['store' => $recommendedStore->store_id]) }}" class="block bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
              @if ($recommendedStore->image)
                <img src="{{ asset('storage/images/' . $recommendedStore->image) }}" class="w-full h-48 object-cover" alt="{{ $recommendedStore->name }}">
              @else
                <div class="flex items-center justify-center h-48 bg-gray-200">
                    <p class="text-gray-500">画像未登録</p>
                </div>
              @endif
                <div class="p-4">
                    <p class="text-xl font-semibold mb-2">{{ $recommendedStore->store_name }}</h5>
                    <p class="text-gray-700">{{ $recommendedStore->subject }}</p>
                </div>
            </div>
          </a>
        @endforeach
      </div>
    </div>



    <!-- script読み込み -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // DOMの読み込みが完了した後に実行
    $(document).ready(function(){
      // クリックイベントを設定
      $('.p-naha').click(function(event){
        event.stopPropagation(); // イベントのバブリングを停止
        $('.naha-detail-area').slideDown();
      });

      // document全体をクリックしたときの処理
      $(document).click(function(event){
        // クリックした要素が .naha-detail-area ではない場合
        if(!$(event.target).closest('.naha-detail-area').length) {
          $('.naha-detail-area').slideUp();
        }
      });
    });


    $(document).ready(function(){
    $('.p-nanbu').click(function(event){
        event.stopPropagation(); // イベントのバブリングを停止
        $('.nanbu-detail-area').slideDown();
      });

      // document全体をクリックしたときの処理
      $(document).click(function(event){
        // クリックした要素が .naha-detail-area ではない場合
        if(!$(event.target).closest('.nanbu-detail-area').length) {
          $('.nanbu-detail-area').slideUp();
        }
      });
    });


    $(document).ready(function(){
    $('.p-tyubu').click(function(event){
        event.stopPropagation(); // イベントのバブリングを停止
        $('.tyubu-detail-area').slideDown();
      });

      // document全体をクリックしたときの処理
      $(document).click(function(event){
        // クリックした要素が .naha-detail-area ではない場合
        if(!$(event.target).closest('.tyubu-detail-area').length) {
          $('.tyubu-detail-area').slideUp();
        }
      });
    });



    $(document).ready(function(){
    $('.p-hokubu').click(function(event){
        event.stopPropagation(); // イベントのバブリングを停止
        $('.hokubu-detail-area').slideDown();
      });

      // document全体をクリックしたときの処理
      $(document).click(function(event){
        // クリックした要素が .naha-detail-area ではない場合
        if(!$(event.target).closest('.hokubu-detail-area').length) {
          $('.hokubu-detail-area').slideUp();
        }
      });
    });
  </script>
    
</x-app-layout>