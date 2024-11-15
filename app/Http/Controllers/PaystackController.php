<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PaystackController extends Controller
{
    //
    public function getBanks()
    {
        // Replace 'YOUR_SECRET_KEY' with your actual Paystack secret key
        $apiKey = 'sk_test_15dd52014734a3f196bd801d876a9eaf19139d23';
        $apiUrl = 'https://api.paystack.co/bank';

        $client = new Client();

        try {
            $response = $client->request('GET', $apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            // Pass data to the view
            return view('banks.index', ['banks' => $data['data']]);
        } catch (\Exception $e) {
            // Handle exceptions (e.g., connection error, authentication error)
            return view('banks.error', ['error' => $e->getMessage()]);
        }
    }
    public function getUserDetails(Request $request)
    {
        $accountNumber = $request->input('account_number');
        $bankCode = $request->input('bank_code');
        

        // Replace 'YOUR_SECRET_KEY' with your actual Paystack secret key
        $secretKey = 'sk_test_15dd52014734a3f196bd801d876a9eaf19139d23';
        $apiUrl = "https://api.paystack.co/bank/resolve?account_number=$accountNumber&bank_code=$bankCode";

        $client = new Client();

        try {
            $response = $client->request('GET', $apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $secretKey,
                    'Cache-Control' => 'no-cache',
                ],
            ]);

            $userData = json_decode($response->getBody()->getContents(), true);

            // dd($userData);

            return view('banks.user-details', ['userData' => $userData]);
        } catch (\Exception $e) {
            return view('banks.user-details', ['error' => 'Failed to fetch user details.']);
        }
    }
}
