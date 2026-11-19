
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Sweet Journal')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --pink: #E9A9C1;
            --pink-dark: #C66F94;
            --pink-light: #FCEAF1;
            --yellow: #F5D98B;
            --yellow-light: #FFF5D9;
            --cream: #FFFCF8;
            --white: #FFFFFF;
            --text: #55434E;
            --muted: #9A8991;
            --border: #F2E4E9;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: var(--cream);
            color: var(--text);
            line-height: 1.7;
        }

        .container {
            width: min(1100px, 92%);
            margin: auto;
        }

        /* NAVBAR */
        .nav {
            background: var(--white);
            padding: 16px 4%;
            display: flex;
            align-items: center;
            gap: 25px;
            flex-wrap: wrap;
            border-bottom: 1px solid var(--border);
        }

        .brand {
            font-size: 21px;
            font-weight: 800;
            color: var(--pink-dark);
            text-decoration: none;
        }

        .nav a {
            color: var(--text);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: .2s;
        }

        .nav a:hover,
        .nav a.active {
            color: var(--pink-dark);
        }

        .nav .right {
            margin-left: auto;
            display: flex;
            gap: 15px;
            align-items: center;
        }

        /* CARD */
        .card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(190, 130, 155, .06);
        }

        .row {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }

        h1, h2, h3, h4 {
            color: #795467;
            line-height: 1.4;
        }

        h2 {
            font-size: 25px;
        }

        a {
            color: var(--pink-dark);
        }

        .muted {
            color: var(--muted);
            font-size: 13px;
        }

        /* BUTTON */
        button, .btn {
            display: inline-block;
            border: none;
            border-radius: 10px;
            padding: 11px 19px;
            background: var(--pink);
            color: #674354;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: .2s;
        }

        button:hover, .btn:hover {
            background: var(--pink-dark);
            color: white;
        }

        .btn-yellow {
            background: var(--yellow);
            color: #735C2C;
        }

        .btn-danger {
            background: #F5C5C5;
            color: #913E49;
        }

        /* ARTICLE */
        .article-card {
            overflow: hidden;
            padding: 0;
            transition: .2s;
        }

        .article-card:hover {
            transform: translateY(-3px);
        }

        .article-card img {
            width: 100%;
            height: 190px;
            object-fit: cover;
            border-radius: 17px 17px 0 0;
        }

        .article-content {
            padding: 20px;
        }

        /* FORM */
        form label {
            display: block;
            margin: 15px 0 7px;
            font-weight: 600;
            font-size: 13px;
        }

        input[type=text],
        input[type=url],
        input[type=email],
        input[type=password],
        textarea {
            display: block;
            width: 100%;
            padding: 13px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: #FFFCFD;
            color: var(--text);
            font-family: inherit;
            font-size: 13px;
            outline: none;
        }

        input:focus, textarea:focus {
            border-color: var(--pink);
            box-shadow: 0 0 0 3px var(--pink-light);
        }

        textarea {
            resize: vertical;
        }

        /* NOTIFICATION */
        .flash {
            background: #F0F8E8;
            border: 1px solid #D4E9C6;
            color: #547343;
            padding: 13px;
            border-radius: 10px;
            margin: 15px 0;
        }

        .error {
            background: #FFF0F0;
            border: 1px solid #F3CCCC;
            color: #A34C55;
            padding: 13px;
            border-radius: 10px;
            margin: 15px 0;
        }

        .inline {
            display: inline;
        }

        /* LIST */
        ul {
            padding-left: 22px;
        }

        /* PAGINATION */
        .pagination {
            display: flex;
            gap: 7px;
            list-style: none;
            padding: 0;
            flex-wrap: wrap;
        }

        .pagination a,
        .pagination span {
            display: block;
            padding: 7px 13px;
            border: 1px solid var(--border);
            border-radius: 8px;
            text-decoration: none;
        }

        .pagination li.active span {
            background: var(--pink);
            color: white;
        }

        /* FOOTER */
        footer {
            text-align: center;
            padding: 30px 10px;
            color: var(--muted);
            font-size: 12px;
        }

        @media(max-width: 650px) {
            .nav {
                gap: 12px;
            }

            .nav .right {
                margin-left: 0;
                width: 100%;
                flex-wrap: wrap;
            }

            .card {
                padding: 17px;
            }

            h2 {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

    @include('partials.nav')

    <main class="container" style="padding-top: 30px;">
        @yield('content')
    </main>

    <footer>
        <p>♡ Sweet Journal — Your Little Space to Share Stories ♡</p>
        <p>© {{ date('Y') }} Sweet Journal. All Rights Reserved.</p>
    </footer>

</body>
</html>
