<?php 

namespace App\Traits;

use App\Models\Transaction;
use Exception;

trait TransactionProcess 
{

    /**
     * store a buy and sell coin,exchange amount,coupon code details,ERC20TokenBuy,fund transfer amount,giftcard details,transfer amount and withdraw amount.
     * @param int $account_id 
     * @param double $amount 
     * @param string $type 
     * @param boolean $status 
     * @param string $action 
     * @param int $accounting_code 
     * @param text $comment 
     * @param text $request_json 
     * @param text $response_json 
     * @param int $entity_id 
     * @param text $entity_name 
     * @return array
     */
	
    public function createTransaction($user_id, $amount, $type, $status, $action, $accounting_code, $comment, 
        $request_json, $response_json, $entity_id, $entity_name, $balance_before, $balance_after, $array,
        $orderid) 
    {
        try
        {
         $transaction = new Transaction;
         
        if(count($array)>0)
        {
            if($array['order_id']!='NULL')
            {   
                
                 $transaction=Transaction::where('order_id','=',$array['order_id'])->first();
            }
        }
        else{
         $transaction->order_id=$orderid;
        }
        
 
        if($user_id!='NULL')
        {
           $transaction->user_id = $user_id;
        }
        $transaction->amount = $amount;
        $transaction->type = $type;
        $transaction->status = $status;
        $transaction->action = $action;
        // if($accounting_code!='NULL') //uncomment when accounting column added
        // {
        //       $transaction->accounting_code_id = $accounting_code;
        // }
    
        $transaction->comment = $comment;
        if($status!='payment_failed' && $action!='paytm'){
            $transaction->request = $request_json;
        }
        
        $transaction->response = $response_json;
        $transaction->transaction_date=now();
        $transaction->transaction_id='';
        $transaction->entity_id = $entity_id;
        $transaction->entity_name = $entity_name;           
        $transaction->balance_before = $balance_before;        
        $transaction->balance_after = $balance_after; 
        
        $transaction->save();
       
        return $transaction;
      }
      catch(Exception $e)
      {
        
      }
    }
    public function createCreditTransaction($user_id,$amount,$status,$action,$accounting_code,$comment,$request_json, $response_json, $entity_id,$entity_name,$array,$orderid)
    {
        try
        {
     
            $balance_before = Transaction::BalanceBefore($user_id)->orderby('id','desc')->first();
            if(count($balance_before)>0)
            {      
                $balance_before= $balance_before->balance_after;
            }

            else
            {
                $balance_before= 0;
            }
               $balance_after= $balance_before+$amount;
          
            $transaction = $this->createTransaction($user_id,$amount,"credit",$status,$action,$accounting_code,$comment,$request_json,$response_json,$entity_id,$entity_name,$balance_before,$balance_after
                 ,$array,$orderid);
        
        }
        catch(Exception $e)
        {
           
        }
            return $transaction;
    }

    public function createDebitTransaction($user_id,$amount,$status,$action,$accounting_code,$comment,$request_json, $response_json, $entity_id,$entity_name,$array,$orderid)
    {
        try
        {

            
             $balance_before = Transaction::BalanceBefore($user_id)->orderby('id','desc')->first();
             
                if(count($balance_before)>0)
                {      
                        $balance_before= $balance_before->balance_after;

                }
                else
                {
                        $balance_before= 0;
                }
                   $balance_after= $balance_before-$amount;

              

                 $transaction=$this->createTransaction($user_id,$amount,"debit",$status,$action,$accounting_code,$comment,$request_json,$response_json,$entity_id,$entity_name,$balance_before,$balance_after,$array,$orderid);
           }
      catch(Exception $e)
      {

     
      }
         return $transaction;
    }
}