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

    <div class="corps">
        <h4 >Un message:</h4>

        <div class="contenu">
            <div class="un">
                Bonjour <b class="nom" >wàcló</b>, Je m'appelle <b class="result">{{$details['first_name']}}</b> .
            </div>
            <div class="deux">
                Mon contact est <b class="result" >{{ $details['email'] }}</b> et le <b class="result">{{$details['phone'] }}</b>. <br>
                Mon message est  : <br>
            </div>
           <div class="trois">

                <b class="result" >{{$details['message']}} </b>
           </div>
        </div>
    </div>


</body>
</html>
