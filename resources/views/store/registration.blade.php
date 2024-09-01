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
                    <textarea name="introduction" class="w-auto py-2 border border-gray-300 rounded-md" id="introduction" cols="30" rows="10">{{old('introduction')}}</textarea>
                </div>
                
                <div class="md:flex items-center mt-8">
                    <div class="w-1/2 flex flex-col">
                        <label for="tel" class="font-semibold leading-none mt-4">電話番号</label>
                        <input type="text" name="tel" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="tel" value="{{old('tel')}}" placeholder="090-0000-0000">
                    </div>
                </div>
                    
                <div class="md:flex items-center mt-8">
                    <!-- 親地域の選択 -->
                    <div class="w-1/3 flex flex-col">
                        <label for="parent-region" class="font-semibold leading-none mt-4">地域</label>
                        <!-- IDをクラスに変更 -->
                        <select class="parent-region w-auto py-2 border border-gray-300 rounded-md">
                            <option value="">選択してください</option>
                            <option value="naha">那覇市</option>
                            <option value="nanbu">南部</option>
                            <option value="chubu">中部</option>
                            <option value="hokubu">北部</option>
                        </select>
                    </div>

                    <!-- 小地域の選択 -->
                    <div class="w-1/3 flex flex-col mt-4 md:mt-0">
                        <label for="sub-region" class="font-semibold leading-none mt-4">小地域</label>
                        <!-- IDをクラスに変更 -->
                        <select class="sub-region w-auto py-2 border border-gray-300 rounded-md" name="region_id">
                            <option value="">まず地域を選択してください</option>
                        </select>
                    </div>

                    <!-- 住所詳細の入力 -->
                    <div class="w-1/3 flex flex-col">
                        <label for="address" class="font-semibold leading-none mt-4">住所</label>
                        <input type="text" name="address" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="address" value="{{old('address')}}" placeholder="那覇市〇〇">
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const parentRegionSelect = document.querySelector('.parent-region');
                        const subRegionSelect = document.querySelector('.sub-region');

                        const regions = {
                            'naha': [
                                { id: 1, name: '久茂地' },
                                { id: 2, name: '栄町' },
                                { id: 3, name: '松尾' },
                                { id: 4, name: '壺屋' },
                                { id: 5, name: '牧志' },
                                { id: 6, name: '泉崎' },
                                { id: 7, name: 'その他（那覇）' }
                            ],
                            'nanbu': [
                                { id: 8, name: '糸満市' },
                                { id: 9, name: '豊見城市' },
                                { id: 10, name: '南風原町' },
                                { id: 11, name: '与那原町' },
                                { id: 12, name: '八重瀬町' },
                                { id: 13, name: '南城市' },
                                { id: 14, name: 'その他（南部）' }
                            ],
                            'chubu': [
                                { id: 15, name: '沖縄市' },
                                { id: 16, name: '北谷町' },
                                { id: 17, name: '宜野湾市' },
                                { id: 18, name: '浦添市' },
                                { id: 19, name: '嘉手納町' },
                                { id: 20, name: 'うるま市' },
                                { id: 21, name: 'その他（中部）' }
                            ],
                            'hokubu': [
                                { id: 22, name: '名護市' },
                                { id: 23, name: '金武町' },
                                { id: 24, name: '宜野座村' },
                                { id: 25, name: '本部町' },
                                { id: 26, name: '今帰仁村' },
                                { id: 27, name: '国頭村' },
                                { id: 28, name: 'その他（北部）' }
                            ]
                        };

                        parentRegionSelect.addEventListener('change', function() {
                            const selectedRegion = this.value;
                            subRegionSelect.innerHTML = '<option value="">選択してください</option>';

                            if (regions[selectedRegion]) {
                                regions[selectedRegion].forEach(function(subRegion) {
                                    const option = document.createElement('option');
                                    option.value = subRegion.id;
                                    option.textContent = subRegion.name;
                                    subRegionSelect.appendChild(option);
                                });
                            }
                        });
                    });
                </script>

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
