<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>
        //add cliente finalizado
        // fetch('http://127.0.0.1/potededocuras/app/routes/cliente.php', {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json'
        //     },
        //     body: JSON.stringify({
        //         nome: 'Agata',
        //         tel: '67993056767'
        //     })
        // });


        fetch('http://127.0.0.1/potededocuras/app/routes/cliente.php?id=1')
            .then(res => res.json())
            .then(json => console.log(json))
    </script>
</body>

</html>