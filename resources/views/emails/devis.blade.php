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
        <h4 >Une Nouvelle demande de Devis vient d'etre émisse à travers le site:</h4>

        <table>
            <tr>
                <td>De quel type d'espace s'agit -il ?</td>
                <td>{{ $details['espace'] }}</td>
            </tr>
            <tr>
                <td>A quelle fréquence faut-il intervenir ?</td>
                <td>{{  $details['frequence'] }}</td>
            </tr>
            <tr>
                <td>Quelle est la surface de l'espace à nettoyer ?</td>
                <td>{{  $details['surface'] }}</td>
            </tr>
            <tr>
                <td>Démarrage approximatif du projet</td>
                <td>{{ $details['demarrage'] }}</td>
            </tr>

            <tr>
                <td>Nom & Prénoms</td>
                <td>{{  $details['your_name'] }}</td>
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
                <td>Nom de la société</td>
                <td>{{ $details['name_society']  }}</td>
            </tr>
            <tr>
                <td>Nombre de collaborateur</td>
                <td>{{ $details['collabo_society'] }}</td>
            </tr>

            <tr>
                <td>Informations supplémentaires</td>
                <td>{{  $details['others'] }}</td>
            </tr>
            <tr>
                <td>Les besoins que nous voulons</td>
                <td>

                    @php
                    $tab= json_decode( $details['services'], true );
                    @endphp

                    <ul>
                    @foreach ($tab as $item)
                        <li>{{$item}}</li>
                    @endforeach
                    </ul>
                </td>
            </tr>
        </table>
    </div>

    <div class="info">
        Date du devis = {{date('Y-m-d')}}
    </div>


</body>
</html>
