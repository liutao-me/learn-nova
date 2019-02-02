<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nova CRM Demo</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <title>Nova CRM 演示</title>
</head>
<body>
    <div class="flex flex-col items-center justify-center md:h-screen md:bg-blue-lightest">
        <form class="w-full max-w-md bg-white rounded p-10 md:shadow" action="/form-submit" method="POST">
            <h1 class="text-grey-darkest mb-8 text-center">注册我们的Nova程序</h1>
            {{ csrf_field() }}
                <div class="flex flex-wrap -mx-3 mb-6">
                    <label  class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">姓名：</label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white {{ $errors->has('name') ? 'border-red mb-3' : 'border-grey-lighter' }} id="name" name="name" type="text" placeholder="Lei">
                </div>

                <div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="email">
                            邮箱
                        </label>
                        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey {{ $errors->has('email') ? 'border-red mb-3' : 'border-grey-lighter' }}" id="email" name="email" type="email" placeholder="lei@example.com">
                        @if($errors->has('email'))
                            <p class="text-red text-xs italic">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                </div>
                <button class="block bg-blue px-6 py-4 text-white rounded mx-auto hover:bg-blue-dark" type="submit">提交</button>
            </form>
            @if (session('form-success'))
                <div class="bg-green mt-8 p-6 rounded shadow">
                    <p class="text-white">{{ session('form-success') }}</p>
                </div>
            @endif
        </div>
</body>
</html>
