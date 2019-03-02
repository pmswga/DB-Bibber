<?php

    require_once "core/class.project.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="css/semantic.css">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="css/semantic.js"></script>
        <title>DB Bibber | Документация</title>
    </head>
    <body>
        <div class="ui stackable menu">
            <a class="header item" href="index.php">DB Bibber</a>
            <a class="item" href="documentation.php">Документация</a>
            <div class="right menu">
                <div class="ui right aligned category search item">
                    <form class="" name="uploadProject" method="POST" enctype="multipart/form-data"> 
                        <input id="json-file" type="file" name="json-project">
                        <button name="uploadJSON" type="submit" class="ui primary button"><i class="cloud upload icon"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="ui stackable grid">
            <div class="row">
                <div class="four wide column"></div>
                <div class="eight wide column">
                    
                    <h2>Руководство по созданию JSON</h2>
                    <hr>

                    <p>Данное руководство позволит вам быстро научиться создавать JSON-файл вашей базы данных. После того, как вы овладете этим мастерством, вы напрочь забудете SQL и все присущие с ним муки</p>

                    <h2>Описание записей</h2>
                    <hr>

                    <fieldset class="ui segment">
                        <legend><h3>Мета-часть</h3></legend>
                        <p>Включает в себя основные сведения о базе данных, а также данные для подключения к серверу, где будет развёрнута база данных<p>
                        <table class="ui celled table">
                            <col width="25%">
                            <thead>
                                <tr>
                                    <th>Запись</th>
                                    <th>Описание</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>type</td>
                                    <td>
                                        Какая база данных будет использоваться. На данный момент поддерживаеются: 
                                        <ul>
                                            <li>mysql</li>
                                            <li>mssql</li>
                                            <li>postgresql</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>host</td>
                                    <td>Хост</td>
                                </tr>
                                <tr>
                                    <td>user</td>
                                    <td>Пользователь базы данных</td>
                                </tr>
                                <tr>
                                    <td>pass</td>
                                    <td>Пароль</td>
                                </tr>
                                <tr>
                                    <td>name</td>
                                    <td>Имя базы данных</td>
                                </tr>
                                <tr>
                                    <td>charset</td>
                                    <td>Указывается кодировка базы данных</td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <fieldset class="ui segment">
                        <legend><h3>Секции</h3></legend>
                        <p>Включает в себя объекты базы данных. На данный момент доступны таблицы и связи<p>
                        <table class="ui celled table">
                            <col width="25%">
                            <thead>
                                <tr>
                                    <th>Запись</th>
                                    <th>Описание</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>"tables" { ... }</td>
                                    <td>
                                        В данной секции описываются таблицы (<a href="#example-1">см. пример 1</a>)
                                    </td>
                                </tr>
                                <tr>
                                    <td>"relations" { ... }</td>
                                    <td>
                                        В данной секции описываются связи между таблицами (<a href="#example-2">см. пример 2</a>)
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    
                    <fieldset class="ui segment">
                        <legend><h3>Секция. Таблицы</h3></legend>
                        <p>Включает в себя объекты базы данных. На данный момент доступны таблицы и связи</p>
                        <table class="ui celled table">
                            <col width="25%">
                            <thead>
                                <tr>
                                    <th>Типы данных</th>
                                    <th>Описание</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>type(size)</td>
                                    <td>
                                        Указывается как и в БД, например varchar(255)
                                    </td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>Индексы</th>
                                    <th>Описание</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>primary</td>
                                    <td>
                                        primary key
                                    </td>
                                </tr>
                                <tr>
                                    <td>un</td>
                                    <td>
                                        unique
                                    </td>
                                </tr>
                                <tr>
                                    <td>++</td>
                                    <td>
                                        auto increment
                                    </td>
                                </tr>
                                <tr>
                                    <td>nn</td>
                                    <td>
                                        Not null
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    
                    <fieldset class="ui segment">
                        <legend><h3>Секция. Связи</h3></legend>
                        <p>В данной секции описываются связи между таблицами</p>
                        <table class="ui celled table">
                            <col width="25%">
                            <thead>
                                <tr>
                                    <th>Запись</th>
                                    <th>Описание</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>fst</td>
                                    <td>
                                        Исходная таблица, в которой будет выбираться внешний ключ 
                                    </td>
                                </tr>
                                <tr>
                                    <td>pk</td>
                                    <td>
                                        primary key исходной таблицы
                                    </td>
                                </tr>
                                <tr>
                                    <td>snd</td>
                                    <td>
                                        Внешняя таблица
                                    </td>
                                </tr>
                                <tr>
                                    <td>fk</td>
                                    <td>
                                        foreign key внешней таблицы
                                    </td>
                                </tr>
                                <tr>
                                    <td>type</td>
                                    <td>
                                        Действия, выполняемые над внешним ключом (острожнее с этой записью)
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>

                    <h2>Примеры</h2>
                    <hr>
                    <fieldset class="ui segment">
                        <legend><h3 id="example-1">Пример #1. Объявление таблиц</h3></legend>
                        <p><p>
                        <pre>
"tables:" {
    "users": {
        "id_user": "int, primary, ++",
        "name": "varchar(255), nn",
        "email": "varchar(255), nn, un",
        "pass": "varchar(32), nn",
        "id_type_user": "int, nn"
    },
    "usersType": {
        "id_user_type": "int, primary, ++",
        "caption": "varchar(255), nn, un"
    }
}
                        </pre>
                    </fieldset>
                    <fieldset class="ui segment">
                        <legend><h3 id="example-2">Пример #2. Связывание таблиц</h3></legend>
                        <p><p>
                        <pre>
"relations:" {
    "R1": {
        "fst": "users",
        "pk": "id_type_user",
        "snd": "usersType",
        "fk": "id_type_user",
        "type": "on update cascade on delete cascade"
    }
}
                        </pre>
                    </fieldset>
                    <fieldset class="ui segment">
                        <legend><h3 id="example-3">Пример #3. База данных</h3></legend>
                        <p><p>
                        <pre>
{
    "type": "mysql",
    "host": "localhost",
    "user": "root",
    "pass": "",
    "name": "edukit-1",
    "charset": "utf8",
    "tables": {
        "users": {
           "id_user": "int, primary, ++",
           "first_name": "varchar(255), nn",
           "second_name": "varchar(255), nn",
           "patronymic": "varchar(255), nn",
           "email": "varchar(255), nn, un",
           "password": "varchar(32)",
           "id_type": "int, nn"
       },
       "usersType": {
           "id_user_type": "int, primary, ++",
           "caption": "varchar(32), nn, un"
       },
       "students": {
            "id_student": "int, primary, ++",
            "id_group": "int, nn",
            "telephone": "varchar(255), nn"
       }
    },
    "relations": {
        "R1": {
            "fst": "users",
            "pk": "id_type",
            "snd": "usersType",
            "fk": "id_user_type",
            "type": "on update cascade on delete cascade"
        },
        "R2": {
            "fst": "students",
            "pk": "id_student",
            "snd": "users",
            "fk": "id_user",
            "type": "on update cascade on delete cascade"
        }
    }
}
                        </pre>
                    </fieldset>


                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            $(document).ready(function() {

                $('form input').change(function () {
                    $('form p').text("Отлично, можем начинать!");
                });

                $('form').on('submit', function () {
                    if ( $('#json-file').get(0).files.length == 1 ) {
                        return true;
                    } else {
                        alert("Выберете файл");
                    }

                    return false;
                })

            });

            $('.ui.dropdown').dropdown();
        </script>

    </body>
</html>