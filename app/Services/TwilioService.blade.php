
namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $sid;
    protected $token;
    protected $from;

    public function __construct()
    {
        $this->sid = config('services.twilio.sid');
        $this->token = config('services.twilio.token');
        $this->from = config('services.twilio.from');
    }

    public function sendMessage($to, $message)
    {
        $twilio = new Client($this->sid, $this->token);

        $message = $twilio->messages
            ->create($to,
                array(
                    "body" => $message,
                    "from" => $this->from
                )
            );

        return $message->sid;
    }
}
