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
            /* Needed for absolute positioning of children */
        }

        body {
            background: #0c0b10 url("/images/stars2.jpg") no-repeat center center fixed;
            background-size: cover;
            color: white;
            /* Default text color */
            display: flex;
            flex-direction: column;
            /* Arrange items vertically */
            align-items: center;
            /* Center items horizontally */
            justify-content: space-between;
            /* Distribute space between items */
            padding: 20px 0;
            /* Add some padding at the top and bottom */
            text-align: center;
            /* Center inline content */
            margin: 0;
            /* Remove default body margin */
        }

        .floating-user-table {
            background-color: rgba(255, 255, 255, 0.9);
            /* Slightly less transparent */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* More prominent shadow */
            z-index: 10;
            width: 80%;
            /* Adjust width as needed */
            max-width: 600px;
            /* Set a maximum width */
            margin-bottom: 30px;
            /* Space below the table */
            text-align: left;
            /* Align text within the table to the left */
        }

        .floating-user-table h2 {
            margin-top: 0;
            margin-bottom: 15px;
            color: #333;
            text-align: center;
            /* Center the table title */
        }

        .floating-user-table table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 5px;
            overflow: hidden;
            background-color: white;
            color: #333;
        }

        .floating-user-table th,
        .floating-user-table td {
            padding: 10px 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .floating-user-table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .floating-user-table tr:last-child td {
            border-bottom: none;
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
            margin-bottom: 30px;
            border-radius: 50%;
            background: #B5BCC6;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            position: relative;
            /* Needed for pseudo-element positioning */
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
            /* Corrected animation name */
        }

        .moon:after {
            background: #B5BCC6;
            box-shadow: inset -10px 0 7px 0px #B5BCC6;
            animation: after-fullmoon 5s linear infinite;
            /* Corrected animation name */
        }

        /* Updated Animations */
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
    </style>
</head>

<body>
    <div class="moon"></div>

    @if (Route::has('users.list'))
        <div class="floating-user-table">
            <h2>Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="actions">
                                <a href="{{ route('users.edit', $user) }}">Edit</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="empty-row">
                            <td colspan="4">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endif

    <div class="logout-container">
        <form action="/logout" method="POST" style="display: inline;">
            @csrf
            @method('POST')
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>
</body>

</html>