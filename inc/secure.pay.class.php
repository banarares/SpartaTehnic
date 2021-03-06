                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <?php
class payment
{
  public function __construct(){
    global $db_construct, $smarty;
  }

  private function checkCredentials(){
    global $smarty, $Sanitation;
    $card_number = $Sanitation->remove_html($_REQUEST['x_card_num']);
    $card_exp_date = $Sanitation->remove_html($_REQUEST['x_exp_date']);
    $card_code = $Sanitation->remove_html($_REQUEST['x_card_code']);
    $credentials_array  = array($card_number, $card_exp_date, $card_code);
    return $credentials_array;
  }

  public function chargeCreditCard($amount){
      global $smarty;

      //GET CREDNTIALS
      $credentials_array = $this->checkCredentials();

      foreach($credentials_array as $cred){
        if(empty($cred)){
          $errors = "Value can't be empty";
        }
      }

      $card_number = $credentials_array[0];
      $card_exp_date = $credentials_array[1];
      $card_code = $credentials_array[2];

      // Common setup for API credentials -> SampleCode is a namespace for the constant class
      $merchantAuthentication = new net\authorize\api\contract\v1\MerchantAuthenticationType();
      $merchantAuthentication->setName(\SampleCode\Constants::MERCHANT_LOGIN_ID);
      $merchantAuthentication->setTransactionKey(\SampleCode\Constants::MERCHANT_TRANSACTION_KEY);
      $refId = 'ref' . time();

      // Create the payment data for a credit card
      $creditCard = new net\authorize\api\contract\v1\CreditCardType();
      $creditCard->setCardNumber($card_number);
      $creditCard->setExpirationDate($card_exp_date);
      $creditCard->setCardCode($card_code);
      $paymentOne = new net\authorize\api\contract\v1\PaymentType();
      $paymentOne->setCreditCard($creditCard);

      //create a transaction
      $transactionRequestType = new net\authorize\api\contract\v1\TransactionRequestType();
      $transactionRequestType->setTransactionType( "authCaptureTransaction");
      $transactionRequestType->setAmount($amount);
      $transactionRequestType->setPayment($paymentOne);

      $request = new net\authorize\api\contract\v1\CreateTransactionRequest();
      $request->setMerchantAuthentication($merchantAuthentication);
      $request->setRefId( $refId);
      $request->setTransactionRequest( $transactionRequestType);
      $controller = new net\authorize\api\controller\CreateTransactionController($request);
      $response = $controller->executeWithApiResponse( \net\authorize\api\constants\ANetEnvironment::SANDBOX);


	     if ($response != null){
          $tresponse = $response->getTransactionResponse();

          # CCV RESPONSE CODES
          # M	Successful Match
          #	N	Does NOT Match
          #	P	Is NOT Processed
          #	S	Should be on card, but is not indicated
          #	U	Issuer is not certified or has not provided encryption key
          $ccv_result_code = $tresponse->getcvvResultCode();
          switch($ccv_result_code){
            case "M":
            case "N": $errors = 'CCV Does NOT Match';
            case "P": #$errors = 'Is NOT Processed';
            case "S": $errors = 'Should be on card, but is not indicated';
            case "U": $errors = 'Issuer is not certified or has not provided encryption key';
            break;
          }

          if (($tresponse != null) && ($tresponse->getResponseCode()== \SampleCode\Constants::RESPONSE_OK) && empty($errors))
          {
            $output = "Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() . "<br />";
            $output .= "Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "<br />";
            #$output .= "Charge Credit Card TRANS ID  : " . $tresponse->getCardNumber() . "\n";
          }
          else
          {
            $errors =  "Charge Credit Card ERROR :  Invalid response\n";
          }

      }else{
        $errors =  "Charge Credit card Null response returned";
      }

      $smarty->assign('errors', $errors);
      $smarty->assign('output', $output);
      return $response;
  }

}
