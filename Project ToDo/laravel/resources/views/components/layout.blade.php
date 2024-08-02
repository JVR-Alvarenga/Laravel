<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$page ?? 'ToDo Preject'}}</title>
    <link rel="stylesheet" href="/assets/css/style.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img src="/assets/images/logo.png" />
        </div>
        <div class="contente">
            <nav>
                <div id="button">
                    {{$btn ?? null}}
                </div>
            </nav>
            <main>
                {{$slot}}
            </main>
        </div>
    </div>
</body>
</html>