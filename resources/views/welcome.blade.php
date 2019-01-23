<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>Nova CRM 演示</title>
</head>
<body>
    <div>
        <form action="/form-submit" method="POST">
            <h1>注册我们的Nova程序</h1>
            {{ csrf_field() }}
                <div>
                    <label>姓名：</label>
                    <input id="name" name="name" type="text" placeholder="Lei">
                </div>
                <div>
                    <label>邮箱：</label>
                    <input id="email" name="email" type="email" placeholder="lei@example.com">
                </div>
                <button type="submit">提交</button>
        </form>
        @if (session('form-success'))
            <div>
                <p>{{ session('form-success') }}</p>
            </div>
        @endif
    </div>
</body>
</html>
