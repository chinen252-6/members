<form action="{{ route('admin.login.submit') }}" method="POST">
    @csrf
    <div>
        <label for="username">ユーザー名</label>
        <input type="text" name="username" id="username" required>
    </div>
    <div>
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password" required>
    </div>
    <button type="submit">ログイン</button>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</form>
