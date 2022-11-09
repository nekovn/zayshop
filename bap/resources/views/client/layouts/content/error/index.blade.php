# 例外が投げられた場合は、例外エラーを表示。
@if ($errors->has('exception'))
    <div class="notification is-danger">
        <strong>{{ $errors->first('exception') }}</strong>
    </div>
@endif
