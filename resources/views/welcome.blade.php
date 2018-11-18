<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Books</title>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 80px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

                <div class="top-right links">
                        <a href="/">На главную</a>
                        <a href="/">Войти</a>
                        <a href="/">Зарегистрироваться</a>
                </div>

            <div class="content">
                <div class="title m-b-md">
                    Книжный сайт
                </div>

                <div class="links">
                    <a href="/users/userList">Пользователи</a>
                    <a href="/books/booksList">Список книг</a>
                    <a href="/news/newsList">Новости</a>
                    <a href="/roles/rolesList">Роли</a>
                </div>
            </div>
        </div>
    </body>
</html>
