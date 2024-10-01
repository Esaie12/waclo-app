<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Agrandir+Black">
</head>
<body>
    <style>
        body{
            font-family: 'Agrandir Black', sans-serif;
            font-weight: 500;
            font-size: 16px;
            color: #5d5a77;
            font-style: normal
        }
        h4{
            color:#00BF63;
            text-align: center;
            /*#01BAE2*/
        }
        .info{
           text-align: center;
           margin-top: 25px;
           margin-bottom: 15px;
        }
    </style>

    <div class="header">
        <img src="{{asset('assets/img/logo-c.png')}}" alt="" style="width: 150px" >

    </div>

    <div class="corps">
        <h4>Accusé de réception de votre demande de devis</h4>

        <p>Bonjour <strong>{{ $info['user_name']}},</strong></p>

        <p>Nous avons bien reçu votre demande de devis. Notre équipe étudiera votre demande avec attention et vous fournira une réponse dans un délai maximum de 48 heures.</p>

        <p>Merci de votre confiance.</p>

        <p>Cordialement,</p>
        <p>L'équipe de Waclo</p>
        
    </div>

    <div class="info">
        Date du devis = {{date('Y-m-d')}}
    </div>


</body>
</html>
