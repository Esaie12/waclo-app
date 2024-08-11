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
        table{
            width: 100%;
        }
        table ,tr ,td{
            border-collapse: collapse;
            border: 2px solid;
        }
        table tr td {
            padding-inline: 25px;
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
        <h4 >Une Nouvelle demande de collaboration:</h4>

        <table>
            <tr>
                <td>Nom : </td>
                <td>{{ $details['your_name'] }}</td>
            </tr>
            <tr>
                <td>Sexe : </td>
                <td>{{  $details['sexe'] }}</td>
            </tr>
            <tr>
                <td>Age : </td>
                <td>{{  $details['age'] }}</td>
            </tr>
            <tr>
                <td>Adressd : </td>
                <td>{{ $details['adresse'] }}</td>
            </tr>

            <tr>
                <td>Adresse Email</td>
                <td>{{ $details['email'] }}</td>
            </tr>
            <tr>
                <td>Numméro de Téléphone</td>
                <td>{{ $details['telephone'] }}</td>
            </tr>
            <tr>
                <td>Information sur le demandeur : </td>
                <td>{{ $details['others']  }}</td>
            </tr>

        </table>
    </div>

    <div class="info">
        Date de la demande = {{date('Y-m-d')}}
    </div>


</body>
</html>
