@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            [店名]、「どんな店」「詳しく紹介」「住所」は必須項目です。
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            {{-- ここから追加 --}}
            @if(empty($errors->first('image')))
                <li>画像ファイルがあれば、再度、選択してください。</li>
            @endif
         
        </ul>
    </div>
@endif

