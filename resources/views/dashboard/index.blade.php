<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="/images/starlogo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        body {
            background: #0c0b10 url("/images/stars2.jpg") no-repeat center center fixed;
            background-size: cover;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            padding: 20px 0;
            text-align: center;
            margin: 0;
        }

        .floating-user-table {
            background-color: rgba(233, 243, 147, 0.7);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 10;
            width: 90%;
            max-width: 800px;
            /* Adjusted max-width */
            margin-bottom: 30px;
            text-align: left;
        }

        .floating-user-table h2 {
            margin-top: 0;
            margin-bottom: 15px;
            color: #333;
            text-align: center;
        }

        .floating-user-table table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 5px;
            overflow: hidden;
            background-color: rgba(121, 122, 112, 0.7);
            color: #333;
        }

        .floating-user-table th,
        .floating-user-table td {
            padding: 10px 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .floating-user-table th {
            background-color: rgba(14, 30, 120, 0.7);
            font-weight: bold;
        }

        .floating-user-table tr:last-child td {
            border-bottom: none;
        }

        .floating-user-table .actions {
            display: flex;
            /* Use flexbox to arrange items horizontally */
            align-items: center;
            /* Vertically align items in the center */
        }

        .floating-user-table .actions a,
        .floating-user-table .actions button {
            display: inline-block;
            padding: 8px 12px;
            margin-right: 5px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9em;
            cursor: pointer;
            margin-right: 5px;
            /* Add some spacing between the buttons */
        }

        .floating-user-table .actions a {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }

        .floating-user-table .actions button {
            background-color: #dc3545;
            color: white;
            border: 1px solid #dc3545;
            margin-left: 5px;
            /* Add some spacing between the buttons */
        }

        .floating-user-table .actions a:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .floating-user-table .actions button:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        .floating-user-table .empty-row td {
            text-align: center;
            font-style: italic;
            color: #777;
        }

        .logout-container {
            margin-top: auto;
            width: 100%;
            text-align: center;
            padding: 40px 0;
        }

        .logout-button {
            width: auto;
            padding: 10px 20px;
            display: inline-block;
            color: #fff;
            background: #573b8a;
            font-size: 1em;
            font-weight: bold;
            outline: none;
            border: none;
            border-radius: 5px;
            transition: .2s ease-in;
            cursor: pointer;
            text-decoration: none;
        }

        .logout-button:hover {
            background: #6d44b8;
        }

        .moon {
            height: 100px;
            width: 100px;
            margin-top: 30px;
            margin-bottom: 30px;
            border-radius: 50%;
            background: #B5BCC6;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        .moon:before,
        .moon:after {
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
            box-shadow: inset -10px 0 7px 0px #B5BCC6;
            animation: before-fullmoon 5s linear infinite;
        }

        .moon:after {
            background: #B5BCC6;
            box-shadow: inset -10px 0 7px 0px #B5BCC6;
            animation: after-fullmoon 5s linear infinite;
        }

        @keyframes before-fullmoon {

            0%,
            50% {
                opacity: 1;
            }

            50.01%,
            100% {
                opacity: 0;
            }

            0%,
            24.99% {
                background: #0c0b10;
            }

            25%,
            100% {
                background: #B5BCC6;
            }

            0% {
                box-shadow: inset 0px 0 7px 0px #B5BCC6;
            }

            24.99% {
                box-shadow: inset 55px 0 7px 0px #B5BCC6;
            }

            25% {
                box-shadow: inset 55px 0 7px 0px #0c0b10;
            }

            50%,
            100% {
                box-shadow: inset 0 0 7px 0px #0c0b10;
            }

            0%,
            50%,
            100% {
                border-radius: 50%;
            }

            20%,
            30% {
                border-radius: 10% 10% 10% 10% / 50% 50% 50% 50%;
            }

            25% {
                border-radius: 0;
            }

            0%,
            24.99% {
                transform: rotate(0);
            }

            25%,
            50%,
            100% {
                transform: rotate(180deg);
            }
        }

        @keyframes after-fullmoon {

            0%,
            50% {
                opacity: 0;
            }

            50.01%,
            100% {
                opacity: 1;
            }

            0%,
            50%,
            74.99% {
                background: #B5BCC6;
            }

            75%,
            100% {
                background: #0c0b10;
            }

            0%,
            50% {
                box-shadow: inset 0px 0 7px 0px #0c0b10;
            }

            74.99% {
                box-shadow: inset 55px 0 7px 0px #0c0b10;
            }

            75% {
                box-shadow: inset 55px 0 7px 0px #B5BCC6;
            }

            100% {
                box-shadow: inset 0 0 7px 0px #B5BCC6;
            }

            0%,
            50%,
            100% {
                border-radius: 50%;
            }

            70%,
            80% {
                border-radius: 10% 10% 10% 10% / 50% 50% 50% 50%;
            }

            75% {
                border-radius: 0;
            }

            0%,
            50%,
            74.99% {
                transform: rotate(0);
            }

            75%,
            100% {
                transform: rotate(180deg);
            }
        }

        .add-moon-button {
            width: auto;
            padding: 10px 20px;
            display: inline-block;
            color: #fff;
            background: #573b8a;
            font-size: 1em;
            font-weight: bold;
            outline: none;
            border: none;
            border-radius: 5px;
            transition: .2s ease-in;
            cursor: pointer;
            text-decoration: none;
            margin-bottom: 10px;
            /* Add some space between button and table */
        }

        .add-moon-button:hover {
            background: #6d44b8;
        }

        .table-container {
            overflow-y: auto;
            max-height: 400px;
        }
    </style>
</head>

<body>
    <div class="moon"></div>

    @yield('content')

    <div class="logout-container">
        <form action="/logout" method="POST" style="display: inline;">
            @csrf
            @method('POST')
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>
</body>

</html>