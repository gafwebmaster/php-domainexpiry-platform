<?php

class Emails extends Controller {

    public function __construct() {
        $this->emailexpModel = $this->model('Emailexp');
    }

    //Send email to remamber the expirity date
    public function sendReinder() {
        $theDomains = $this->emailexpModel->getList();
        //Load the content for $theContent
        require_once '../app/views/emails/expirityRemainder.php';

        $data = [
            'recipient' => 'gafwebmaster@yahoo.com',
            'subject' => 'Domain expirity remainder',
            'htmlBody' => $htmlBody,
            'nonHtmlBody' => $nonHtmlBody,
            'sentMessage' => 'Message has been sent',
            'theDomains' => $theDomains
        ];

        $email = new Email();
        foreach ($data['theDomains'] as $value) {
            $now = time();
            $expiryDate = strtotime($value->domainExpiry);
            $datediff = $expiryDate - $now;
            $daysBeforeExpire = round($datediff / (60 * 60 * 24));
            if ($daysBeforeExpire < 110) {
                $email->sendMail($data, $value->Domain, $daysBeforeExpire);
            }
        }
    }

    public function passwordResset($ressetEmail) {
        if (MASTER_EMAIL == $ressetEmail) {
            
        } else {
            $this->view('header_404');
        }

        $email = new Email();
        $email->sendMail($data);
    }

}
