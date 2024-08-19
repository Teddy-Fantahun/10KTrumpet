<?php
 
namespace App\Http\Controllers;

use App\Jobs\SendBulkEmail;
use App\Models\Client;
 
class BulkEmailController extends Controller
{
    public function sendBulkEmail()
    {
        // Get all clients

        $clients = Client::all();

        if($clients != null)
        {
            foreach ($clients as $recipient) {
                SendBulkEmail::dispatch($recipient);
            }
        }

        return response()->json([
            'message' => 'Emails queued Successfully!',
        ]);
    }
}