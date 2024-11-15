<!-- resources/views/get-user-details.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get User Details by Account Number</title>
</head>
<body>

    <h1>Get User Details by Account Number</h1>

    <form action="{{ route('getUserDetailsByAccountNumber') }}" method="post">
        @csrf
        <label for="account_number">Account Number:</label>
        <input type="text" name="account_number" required>

        <label for="bank_code">Bank Code:</label>
        <input type="text" name="bank_code" required>

        <button type="submit">Get User Details</button>
    </form>

</body>
</html>
