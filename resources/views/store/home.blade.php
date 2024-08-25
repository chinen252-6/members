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
          <h4 class="heading__container__subtext">みんなでつくる沖縄せんべろサイト</h4>
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
                            <a href="#">久茂地</a> <br>
                            <a href="#">栄町</a>  <br>
                            <a href="#">松尾</a>  <br>
                            <a href="#">壺屋</a>  <br>
                            <a href="#">牧志</a>  <br>
                            <a href="#">安里</a>  <br>
                            <a href="#">泉崎</a>  <br>
                            <a href="#">その他</a>

                        </div>



                    </div>
                </div>

                <div class="top-wrapper__areas__area">
                    <div class="area-icon nanbu">
                        <img src="https://098free.com/wp-content/uploads/2017/06/01IMG_2054.jpg" width="150" height="75">
                        <p class="p-nanbu">南部</p>
                        <div class="nanbu-detail-area">
                            <a href="#">糸満市</a> <br>
                            <a href="#">豊見城市</a>  <br>
                            <a href="#">南風原市</a>  <br>
                            <a href="#">与那原市</a>  <br>
                            <a href="#">八重瀬市</a>  <br>
                            <a href="#">南城市</a>  <br>
                            <a href="#">その他</a>  <br>


                        </div>

                    </div>
                </div>

                <div class="top-wrapper__areas__area">
                    <div class="area-icon tyubu">
                        <img src="https://098free.com/wp-content/uploads/2018/09/038G8A3457_i.jpg" width="150" height="75">
                        <p class="p-tyubu">中部</p>
                        <div class="tyubu-detail-area">
                            <a href="#">沖縄市</a> <br>
                            <a href="#">北谷町</a>  <br>
                            <a href="#">宜野湾市</a>  <br>
                            <a href="#">浦添市</a>  <br>
                            <a href="#">嘉手納町</a>  <br>
                            <a href="#">うるま市</a>  <br>
                            <a href="#">その他</a>  <br>


                        </div>

                    </div>
                </div>

                <div class="top-wrapper__areas__area">
                    <div class="area-icon hokubu">
                        <img src="https://098free.com/wp-content/uploads/2018/04/03IMG1681_i.jpg" width="160" height="90">
                        <p class="p-hokubu">北部</p>
                        <div class="hokubu-detail-area">
                            <a href="#">名護市</a> <br>
                            <a href="#">金武町</a>  <br>
                            <a href="#">宜野座村</a>  <br>
                            <a href="#">本部町</a>  <br>
                            <a href="#">今帰仁村</a>  <br>
                            <a href="#">国頭村</a>  <br>
                            <a href="#">その他</a>  <br>


                        </div>

                    </div>
                </div>
        </div>

    </div>

    <div class ="favorite">
        <div class ="favorite__text">
            <h4>おすすめ</h4>

        </div>
        <div class ="favorite__container">
            <div class="favorite__container__list">
                <ul>
                    <li class="list-one">
                        <a href="#">
                            <div class="image-one">
                                <img src="https://098free.com/wp-content/uploads/2022/06/038T0A1052-i.jpg" width="250" height="150">
                            </div>
                            <div class="text-one">
                             <p>お通しで大量刺身でてきます。ほんとおすすめです。ほんとに。</p>
                            </div>
                        </a>
                    </li>

                    <li class="list-two">
                        <a href="#">
                            <div class="image-two">
                                <img src="https://098free.com/wp-content/uploads/2022/06/038T0A1052-i.jpg" width="250" height="150" alt="">
                            </div>
                            <div class="text-two">
                            <p>ハイボールがとにかく濃ゆい。おすすめです。ほんとに。</p>
                            </div>
                        </a>
                    </li>

                    <li class="list-three">
                        <a href="#">
                            <div class="image-three">
                                <img src="https://098free.com/wp-content/uploads/2022/06/038T0A1052-i.jpg" width="250" height="150">
                            </div>
                            <div class="text-three">
                            <p>どこでもたばこが吸えます。おすすめです。ほんとに。</p>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
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