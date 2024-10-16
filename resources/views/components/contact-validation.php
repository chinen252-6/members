@props(['errors', 'requiredFields' => []])

@if ($err->any())
    <div {{ $attributes }}>
        @if (!empty($requiredFields))
            <div class="font-medium text-red-600">
                {{ implode('、', $requiredFields) }}は必須項目です。
            </div>
        @endif

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($err->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            @if(empty($err->first('image')))
                <li>ファイルがあれば、再度、選択してください。</li>
            @endif
        </ul>
    </div>
@endif
