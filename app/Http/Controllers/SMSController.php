<?php

namespace App\Http\Controllers;

use App\Models\ReminderType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\SMS;
use PhpParser\Node\Stmt\TryCatch;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;

class SMSController extends Controller
{
    public function index()
    {
        return view('sms.index');
    }

    public function create()
    {
        $users = User::join('membership_fees','users.id','=','membership_fees.user_id')
        ->select('users.*','membership_fees.*')
        ->where('role','user')
        ->get();

        $reminders = ReminderType::all();
        return view('sms.create', compact('users','reminders'));
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'receiverNumber' => 'required',
        //     'reminderType' => 'required',
        //     'receiverName' => 'required'
        // ]);

        $receiverNumber = $request['receiverNumber'];
        $reminderMessage = $request['reminderMessage'];
        $receiverName = $request['receiverName'];

            if($reminderMessage == '' || $reminderMessage == null){
                return back()->with(['error' => "Please select reminder type or give custom message."]);
            } 

        $user = User::where('contact_number', $receiverNumber)->first();

        if (!$user) {
            return back()->with(['error' => "Reminder sent unsuccessful!"]);
        }

       
        $message = $reminderMessage. "\n\n";
        // $message .= "Date: $date\n";
        // $message .= "Time: $time\n";
        // $message .= "Location: $location\n\n";
        // $message .= "Please ensure that you have all necessary materials and requirements ready before the session begins. If you have any questions or need further information, feel free to reach out to our team.\n\n";
        // $message .= "We look forward to seeing you there and making this training a valuable experience for all participants.\n\n";
        $message .= "Best regards,\n";
        $message .= "FITSYNC Team";

        try {
            $this->sendSMS($user->contact_number, $message);
    
            // Save the SMS message in the database
            $sms = new SMS;
            $sms->user_id = $user->id;
            $sms->message = $message;
            $sms->contact_number = $receiverNumber;
            $sms->save();
    
            return back()->with(['success' => "Reminder sent successfully!"]);
        } catch (\Exception $e) {
            // Handle the error and return an error message to the user
            return back()->with(['error' => "Failed to send reminder: " . $e->getMessage()]);
        }
        // $this->sendSMS($user->contact_number, $message );

        // // Save the SMS message in the database
        // $sms = new SMS;
        // $sms->user_id = $user->id;
        // $sms->message = $message;
        // $sms->contact_number = $receiverNumber;
        // $sms->save();

        return back()->with(['success' => "Reminder sent successfully! "]);
    }
   

    public function sendSMS($receiverNumber, $message){

        try {
            $ch = curl_init();
            $parameters = array(
                'apikey' => '7174c62a440148f7af1476f904175a74', //Your API KEY
                'number' => $receiverNumber,
                'message' => $message,
                'sendername' => 'SEMAPHORE'
            );
            curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
            curl_setopt( $ch, CURLOPT_POST, 1 );

            //Send the parameters set above with the request
            curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

            // Receive response from server
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            $output = curl_exec( $ch );
            curl_close ($ch);

            //Show the server response
            echo $output;
           
        } catch (\Exception $e) {
            
            Log::error('Error sending SMS: ' . $e->getMessage());
            // Optionally, you can throw the exception to be handled by the caller
            throw $e;
        }
               
    }


    private function sendMessage($message, $recipient)
    {
        $account_sid = env("TWILIO_SID");
        $auth_token = env("TWILIO_AUTH_TOKEN");
        $twilio_number = env("TWILIO_NUMBER");

        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipient, ['from' => $twilio_number, 'body' => $message]);
    }



    public function trySMS()
    {
        return view('sms.try');
    }

}
