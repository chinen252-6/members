@props(['errors', 'requiredFields' => []])

@if ($errors->any())
    <div {{ $attributes }}>
        @if (!empty($requiredFields))
            <div class="font-medium text-red-600">
                {{ implode('、', $requiredFields) }}は必須項目です。
            </div>
        @endif

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            @if(empty($errors->first('image')))
                <li>画像ファイルがあれば、再度、選択してください。</li>
            @endif
        </ul>
    </div>
@endif
