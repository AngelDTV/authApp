<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    rel="stylesheet"
  />
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
  />
  <!-- MDB -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css"
    rel="stylesheet"
  />
    <title>Home</title>
</head>
<style>
    .background{
        position: absolute;
        filter: brightness(50%);
        background-image: url('hailee.jpeg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        height: 100vh;
        width: 100vw;
        z-index: 2;
    }
    .text{
        border-radius: 25px;
        backdrop-filter: blur(2px);
        position: absolute;
        z-index: 100;
        width: 500px;
        left: 50%;
        top: 25%;
        margin-left: -250px;
        height: 500px;
        text-align: center;

    }
    .container{
        position:absolute;
    }
    h1{
        margin: 0;
        margin-top: 70px;
        color: #fff;
        font-size: 50px;
        font-family: 'Arial Rounded MT Bold';
    }
    h2{
        margin: 0;
        margin-top: 100px;
        color: #fff;
        font-size: 40px;
        font-family: 'Arial Rounded MT Bold';
    }
    body{
        margin: 0;
        padding: 0;

    }
</style>
<body>

        <div class="background">

        </div>
        <div class="text">
            <h1>Bienvenido a la aplicación!</h1>
            <h2>{{ $user->email }}</h2>
            <br>
            <form action="logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-rounded">Cerrar Sesión</button>
            </form>
        </div>

    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"
    ></script>
</body>
</html>
