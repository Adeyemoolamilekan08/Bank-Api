<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank API</title>
</head>
<body>
    <div class="container">
        <form action="{{ route('getUserDetails') }}" method="post">
            @csrf
            <label for="bankSelect">Select a Nigerian Bank:</label>
            <select id="bankSelect" name="bank_code">
                <option value="0" selected disabled>Select a bank</option>
                @foreach($banks as $bank)
                     <option value="{{ $bank['code'] }}">{{ $bank['name'] }}</option>                 
                @endforeach
                <!-- Add more Nigerian banks as needed -->
            </select>
            <label for="">Account Number</label>
            <input type="text" name="account_number" id="bankCode">
            <button type="submit">Get User Details</button>
        </form>
    </div>
</body>
</html>