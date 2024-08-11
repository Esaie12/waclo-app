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
        .nom{
            color: #00BF63;
        }
        .contenu{
           margin-top: 25px;
           margin-bottom: 15px;
        }
        .contenu div{
            margin-top: 15px;
            margin-bottom: 10px;
        }
        .result{
            color:#0198E2;
        }
    </style>

    <div class="header">
        <img src="{{asset('assets/img/logo-c.png')}}" alt="" style="width: 150px" >

    </div>


    @if($details['type'] == "client")
    <div class="corps">
        <div class="contenu">
            <div class="un">
                Bonjour <b class="nom" >{{$details['name']}}</b> . <br>
                Félicitation à vous, faites partir maintenant des clients de WACLO. <br>
                 Pour cela, vous avez le privilège d'avoir un compte client chez nous.
            </div>
            <div class="un">
                Pour vous connecter :
                <ul>
                    <li>Cliquer sur <a href="https://waclo.bj/login">CE LIEN (https://waclo.bj/login) </a> </li>
                    <li>Mettez votre adresse email et votre mot de passe.</li>
                    <li>Votre mot de passe est <strong class="result" >{{ $details['mdp'] }}</strong> </li>
                </ul>
            </div>
        </div>
    </div>
    @endif

    @if($details['type'] == "agent")
    <div class="corps">
        <div class="contenu">
            <div class="un">
                Bonjour <b class="nom" >{{$details['name']}}</b> . <br>
                Félicitation à vous, faites partir maintenant des agents de WACLO. <br>
                Pour cela, vous avez le privilège d'avoir un compte Agent chez nous.

            </div>
            <div class="un">
                Pour vous connecter :
                <ul>
                    <li>Cliquez sur <a href="https://agent.waclo.bj">CE LIEN (https://agent.waclo.bj) </a> </li>
                    <li>Mettez votre adresse email et votre mot de passe.</li>
                    <li>Votre mot de passe est <strong class="result" >{{ $details['mdp'] }}</strong> </li>
                </ul>
            </div>
        </div>
    </div>
    @endif

    @if($details['type'] == "admin")
    <div class="corps">
        <div class="contenu">
            <div class="un">
                Bonjour <b class="nom" >{{$details['name']}}</b> . <br>
                Félicitation à vous, faites partir maintenant des administrateurs de WACLO. <br>
                 Pour cela, vous avez le privilège d'avoir un compte Admin chez nous.
            </div>
            <div class="un">
                Pour vous connecter :
                <ul>
                    <li>Cliquez sur <a href="https://admin.waclo.bj">CE LIEN (https://admin.waclo.bj) </a> </li>
                    <li>Mettez votre adresse email et votre mot de passe.</li>
                    <li>Votre mot de passe est <strong class="result" >{{ $details['mdp'] }}</strong> </li>
                </ul>
            </div>
        </div>
    </div>
    @endif


</body>
</html>
