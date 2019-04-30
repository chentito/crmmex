<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>

        <style>
        @font-face {
          font-family: 'roboto_condensedregular';
          src: url('robotocondensed-regular-webfont.woff2') format('woff2'),
               url('robotocondensed-regular-webfont.woff') format('woff'),
               url('RobotoCondensed-Regular.ttf') format('truetype');
          font-weight: normal;
          font-style: normal;
      }
        body{
          font-family: 'roboto_condensedregular';
        }
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        font-size: 20px;
        }
        #primero{
        background-color: #ccc;
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }
    </style>
    </head>
    <body>
        <h1>{{$nombre}}</h1>
        <h4>{{$fecha}}</h4>
        <hr>
        <div class="contenido">
            <p id="primero">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore nihil illo odit aperiam alias rem voluptatem odio maiores doloribus facere recusandae suscipit animi quod voluptatibus, laudantium obcaecati quisquam minus modi.</p>
            <p id="segundo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore nihil illo odit aperiam alias rem voluptatem odio maiores doloribus facere recusandae suscipit animi quod voluptatibus, laudantium obcaecati quisquam minus modi.</p>
            <p id="tercero">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore nihil illo odit aperiam alias rem voluptatem odio maiores doloribus facere recusandae suscipit animi quod voluptatibus, laudantium obcaecati quisquam minus modi.</p>
        </div>
    </body>
</html>
