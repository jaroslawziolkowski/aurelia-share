<!DOCTYPE html>
<html>
    <head>
        <base href="./">
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
        <script src="/jspm_packages/system.js"></script>
        {{--<script src="/js/aurelia/framework.aurelia.js"></script>--}}
        <script src="/js/config.js"></script>
        <script src="/js/aurelia/main.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
                <div id="aurelia-app" aurelia-app="main">
                    <script>
                        SystemJS.import('aurelia-bootstrapper');
                        /*SystemJS.import('aurelia-bootstrapper').then(bootstrapper => {
                            bootstrapper.bootstrap(function(aurelia) {
                            aurelia.use
                                    .standardConfiguration()
                                    .developmentLogging();

                            aurelia.start().then(() => aurelia.setRoot('app', document.getElementById('aurelia-app')));
                        });
                        });*/
                    </script>
                </div>

            </div>
        </div>
    </body>
</html>
