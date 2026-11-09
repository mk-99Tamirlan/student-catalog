<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Каталог студентов')</title>
    <style>
        :root { color-scheme: light; }
        * { box-sizing: border-box; }
        body { margin: 0; font: 16px/1.5 system-ui, sans-serif; background: #f3f6fb; color: #172033; }
        .container { max-width: 960px; margin: 42px auto; padding: 0 18px; }
        .card { background: white; border-radius: 14px; padding: 28px; box-shadow: 0 4px 24px #17203311; }
        .head { display: flex; justify-content: space-between; align-items: center; gap: 18px; flex-wrap: wrap; margin-bottom: 20px; }
        h1 { margin: 0; font-size: 28px; }
        .btn { display: inline-block; background: #245de5; border: 0; color: white; text-decoration: none; border-radius: 9px; padding: 11px 16px; font: inherit; cursor: pointer; }
        .btn:hover { background: #184bc1; }
        .back { color: #245de5; }
        .notice { padding: 12px 15px; border-radius: 9px; background: #e1f7e8; color: #155c32; margin: 12px 0 18px; }
        .table-scroll { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; min-width: 530px; }
        th, td { padding: 13px 11px; text-align: left; border-bottom: 1px solid #e7eaf0; }
        th { color: #48546a; background: #f7f9fd; }
        .empty { padding: 18px; color: #59657b; }
        label { display: block; font-weight: 600; margin: 16px 0 6px; }
        input { width: 100%; border: 1px solid #b7bfcc; border-radius: 8px; padding: 11px 12px; font: inherit; }
        input:focus-visible, .btn:focus-visible, a:focus-visible { outline: 3px solid #94baff; outline-offset: 2px; }
        input[aria-invalid="true"] { border-color: #c4263c; }
        .error { color: #b42337; font-size: 14px; margin: 5px 0 0; }
        .actions { display: flex; align-items: center; gap: 20px; margin-top: 22px; }
        @media(max-width:600px){ .container { margin: 18px auto; }.card { padding: 18px; }h1 { font-size: 23px; } }
    </style>
</head>
<body>
<main class="container"><div class="card">@yield('content')</div></main>
</body>
</html>
