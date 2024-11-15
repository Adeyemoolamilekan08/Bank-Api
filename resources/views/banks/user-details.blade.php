<!-- resources/views/user-details.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h1>User Details</h1>

    @if(isset($userData))
    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Account Name</td>
            <td>
                @if(isset($userData['data']['account_name']) && $userData['data']['account_name'] !== null)
                    {{ $userData['data']['account_name'] }}
                @else
                    N/A
                @endif
            </td>
        </tr>
    </table>
@elseif(isset($error))
    <p>Error: {{ $error }}</p>
@else
    <p>No user details available.</p>
@endif






</body>
</html>
