<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VOTE</title>
</head>
<body>
<p> Hello, {{$firstname}}</p>
<p>
    You are ready to vote for <strong> {{$vote_item}}</strong>
</p>
<p><span>Please follow this URL to sign up as a voter to vote.</span></p>
<p>
    <span>http://127.0.0.1:8000/vote/home?code={{$codeid}}</span>
</p>
<p>OR</p>
<p>
    <span>
            press
            <a href="http://127.0.0.1:8000/vote/home?code={{$codeid}}">
                HERE
            </a>
        </span>
</p>
<p>Best,</p>
<p>Blockvotes Team</p>

</body>
</html>
