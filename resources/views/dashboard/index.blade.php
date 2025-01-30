<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="icon" type="image/x-icon" href="/images/starlogo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    html, body {
        height: 100%;
        width: 100%;
        overflow: hidden;
    }

    body {
        position: absolute;
        text-align: center;
        margin: auto;
        background: #0c0b10;
        scroll: none;
        background-image: url("/images/stars2.jpg");
        background-size: cover;
    }

    .moon {
        height: 100px;
        width: 100px;
        margin: 0 auto;
        position: absolute;
        top: calc(50% - 50px);
        left: calc(50% - 50px);
        -webkit-clip-path: circle(50px at center);
        clip-path: circle(50px, 50px, 50px);
        clip-path: circle(50px at center);
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        background: #B5BCC6;
        overflow: hidden;
    }
    .moon:before, .moon:after {
        border-radius: 50%;
        content: "";
        position: absolute;
        top: -4%;
        left: -4%;
        height: 108%;
        width: 108%;
    }
    .moon:before {
        background: #0c0b10;
        -moz-box-shadow: inset -10px 0 7px 0px #B5BCC6;
        -webkit-box-shadow: inset -10px 0 7px 0px #B5BCC6;
        box-shadow: inset -10px 0 7px 0px #B5BCC6;
    }
    .moon:after {
        background: #B5BCC6;
        -moz-box-shadow: inset -10px 0 7px 0px #B5BCC6;
        -webkit-box-shadow: inset -10px 0 7px 0px #B5BCC6;
        box-shadow: inset -10px 0 7px 0px #B5BCC6;
    }

    /* Animation */
    @keyframes before-fullmoon {
        0%, 50% {
            opacity: 1;
        }
        50.01%, 100% {
            opacity: 0;
        }
        0%, 24.99% {
            background: #0c0b10;
        }
        25%, 100% {
            background: #B5BCC6;
        }
        0% {
            -moz-box-shadow: inset 0px 0 7px 0px #B5BCC6;
            -webkit-box-shadow: inset 0px 0 7px 0px #B5BCC6;
            box-shadow: inset 0px 0 7px 0px #B5BCC6;
        }
        24.99% {
            -moz-box-shadow: inset 55px 0 7px 0px #B5BCC6;
            -webkit-box-shadow: inset 55px 0 7px 0px #B5BCC6;
            box-shadow: inset 55px 0 7px 0px #B5BCC6;
        }
        25% {
            -moz-box-shadow: inset 55px 0 7px 0px #0c0b10;
            -webkit-box-shadow: inset 55px 0 7px 0px #0c0b10;
            box-shadow: inset 55px 0 7px 0px #0c0b10;
        }
        50%, 100% {
            -moz-box-shadow: inset 0 0 7px 0px #0c0b10;
            -webkit-box-shadow: inset 0 0 7px 0px #0c0b10;
            box-shadow: inset 0 0 7px 0px #0c0b10;
        }
        0%, 50%, 100% {
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
        20%, 30% {
            -moz-border-radius: 10% 10% 10% 10%/50% 50% 50% 50%;
            -webkit-border-radius: 10%;
            border-radius: 10% 10% 10% 10%/50% 50% 50% 50%;
        }
        25% {
            -moz-border-radius: 0;
            -webkit-border-radius: 0;
            border-radius: 0;
        }
        0%, 24.99% {
            -moz-transform: rotate(0);
            -ms-transform: rotate(0);
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        25%, 50%, 100% {
            -moz-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg);
        }
    }
    @keyframes after-fullmoon {
        0%, 50% {
            opacity: 0;
        }
        50.01%, 100% {
            opacity: 1;
        }
        0%, 50%, 74.99% {
            background: #B5BCC6;
        }
        75%, 100% {
            background: #0c0b10;
        }
        0%, 50% {
            -moz-box-shadow: inset 0px 0 7px 0px #0c0b10;
            -webkit-box-shadow: inset 0px 0 7px 0px #0c0b10;
            box-shadow: inset 0px 0 7px 0px #0c0b10;
        }
        74.99% {
            -moz-box-shadow: inset 55px 0 7px 0px #0c0b10;
            -webkit-box-shadow: inset 55px 0 7px 0px #0c0b10;
            box-shadow: inset 55px 0 7px 0px #0c0b10;
        }
        75% {
            -moz-box-shadow: inset 55px 0 7px 0px #B5BCC6;
            -webkit-box-shadow: inset 55px 0 7px 0px #B5BCC6;
            box-shadow: inset 55px 0 7px 0px #B5BCC6;
        }
        100% {
            -moz-box-shadow: inset 0 0 7px 0px #B5BCC6;
            -webkit-box-shadow: inset 0 0 7px 0px #B5BCC6;
            box-shadow: inset 0 0 7px 0px #B5BCC6;
        }
        0%, 50%, 100% {
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }
        70%, 80% {
            -moz-border-radius: 10% 10% 10% 10%/50% 50% 50% 50%;
            -webkit-border-radius: 10%;
            border-radius: 10% 10% 10% 10%/50% 50% 50% 50%;
        }
        75% {
            -moz-border-radius: 0;
            -webkit-border-radius: 0;
            border-radius: 0;
        }
        0%, 50%, 74.99% {
            -moz-transform: rotate(0);
            -ms-transform: rotate(0);
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        75%, 100% {
            -moz-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg);
        }
    }
    .moon:before {
        -moz-animation: before-fullmoon linear 5s infinite;
        -webkit-animation: before-fullmoon linear 5s infinite;
        animation: before-fullmoon linear 5s infinite;
    }
    .moon:after {
        -moz-animation: after-fullmoon linear 5s infinite;
        -webkit-animation: after-fullmoon linear 5s infinite;
        animation: after-fullmoon linear 5s infinite;
    }
    button{
        width: 60%;
        height: 40px;
        margin: 10px auto;
        justify-content: center;
        display: block;
        color: #fff;
        background: #573b8a;
        font-size: 1em;
        font-weight: bold;
        margin-top: 30px;
        outline: none;
        border: none;
        border-radius: 5px;
        transition: .2s ease-in;
        cursor: pointer;
    }
    button:hover{
        background: #6d44b8;
    }

  </style>
</head>
<body>
    <div class="moon"></div>
    <div>
        <form action="/logout" method="POST">
            @csrf
            @method('POST')
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>