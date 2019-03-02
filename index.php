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
        <title>DB Bibber</title>
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
                    <div class="ui segment">
                        <h2 align="center">База данных: </h2>
                        <div class="ui statistic">
                            <div class="value">
                                0
                            </div>
                            <div class="label">
                                Таблиц
                            </div>
                        </div>
                        <div class="ui statistic">
                            <div class="value">
                                0
                            </div>
                            <div class="label">
                                Представлений
                            </div>
                        </div>
                        <div class="ui statistic">
                            <div class="value">
                                0
                            </div>
                            <div class="label">
                                Процедур
                            </div>
                        </div>
                        <div class="ui statistic">
                            <div class="value">
                                0
                            </div>
                            <div class="label">
                                Функций
                            </div>
                        </div>
                        <div class="ui statistic">
                            <div class="value">
                                0
                            </div>
                            <div class="label">
                                Пользователей
                            </div>
                        </div>
                        <div class="ui statistic">
                            <div class="value">
                                0
                            </div>
                            <div class="label">
                                Связей
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <script type="text/javascript">
        
            $('.ui.dropdown').dropdown();
        </script>

    </body>
</html>