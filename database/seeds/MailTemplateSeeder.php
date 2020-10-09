<?php

use Illuminate\Database\Seeder;

class MailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mail_templates')->insert([
            'name' =>'change_password',
            'subject' => 'Change Password',
            'mail_content' => 'Hi :name <br> 
                                Your Password is changed successfully. <br> 
                                Thanks & Regards <br> 
                                <p>Administration Team <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"), 
        ]);


        DB::table('mail_templates')->insert([
            'name' =>'new_message',
            'subject' => 'Message',
            'mail_content' => 'Hi <br> 
                                <p>:message</p><br>
                                Thanks & Regards <br> 
                                :username <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),  
        ]);



        DB::table('mail_templates')->insert([
            'name' =>'register_new_user',
            'subject' => 'Register New User',
            'mail_content' => 'Hi :name <br> 
                                Your account was successfully created. <br>
                                Thanks & Regards <br> 
                                Administration Team <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);


        DB::table('mail_templates')->insert([
            'name' =>'paytm_failure',
            'subject' => 'PayTM Transaction Failure',
            'mail_content' => 'Hi :name <br> 
                                Your PayTM transaction is failure. <br>
                                Thanks & Regards <br> 
                                Administration Team <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);



            DB::table('mail_templates')->insert([
            'name' =>'new_order',
            'subject' => 'New Order',
            'mail_content' => 'Hi :name <br> 
                                Your ordered was successfully created. <br>
                                :order <br>
                                Thanks & Regards <br> 
                                Administration Team <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
              DB::table('mail_templates')->insert([
            'name' =>'order_shipment',
            'subject' => 'Order Shipment',
            'mail_content' => 'Hi :name <br> 
                                Your ordered was successfully Shipped. <br>
                               ORDER NUMNER--> :orderno <br>
                                Thanks & Regards <br> 
                                Administration Team <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
              DB::table('mail_templates')->insert([
            'name' =>'seller_new_order',
            'subject' => 'Seller New Order',
            'mail_content' => 'New Order Received <br>
                               BUYER NAME --> :name <br>
                               ADDRESS <br>
                               :address1 <br>
                               :address2 <br>
                               Thanks & Regards <br> 
                               Administration Team <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('mail_templates')->insert([
            'name' =>'invoice',
            'subject' => 'Invoice',
            'mail_content' => 'Hi :name <br> 
                                Your Invoice is: <br>
                                :invoice <br>
                                Thanks & Regards <br> 
                                Administration Team <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

          DB::table('mail_templates')->insert([
            'name' =>'reset_passsword',
            'subject' => 'Reset Password',
            'mail_content' => 'Hi :username <br> 
                                Your Password is :newpassword. <br> 
                                Thanks & Regards <br> 
                                <p>Administration Team <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"), 

            ]);
            DB::table('mail_templates')->insert([
            'name' =>'send_message',
            'subject' => 'Admin Message',
            'mail_content' => 'Hi :username<br> 
                                <p>:message</p><br>
                                Thanks & Regards <br> 
                                 Administration Team ',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),  
            ]);


           DB::table('mail_templates')->insert([
            'name' =>'admin_register_new_user',
            'subject' => 'Admin Register New User',
            'mail_content' => 'Hi :name ,<br><br>
                                Your account was successfully created. <br><br>
                                account details:-<br>
                                Username : :name<br>
                                Email : :email<br>
                                Password : :password<br><br>
                                Thanks & Regards <br>
                                Administration Team <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

         DB::table('mail_templates')->insert([
            'name' =>'gift_order',
            'subject' => 'Gift Order',
            'mail_content' => ' <div class="flex ">
                       <div class="w-full lg:w-1/3">
                         <div class="border">
                           <img  src="src="http://admin-app.test/uploads/uploads/images/1EgAwhhaIucS1Ye1Wcot45PuP2K9lR7ZPKt5VgJ8.jpeg" class="w-full px-1 py-1">
                           <div class="flex items-center px-2 py-3">
                             <div class="w-1/2 border-r"><img src="/images/gift.png" class=""></div>
                             <div class="w-1/2 px-5"><h1 class="text-grey-darker font-medium"> :amount</h1></div>
                             
                           </div>
                           <div class=" py-4  border-t">
                             <p class="text-base px-4 text-grey-darker">Your Gift Card</p>
                           </div>
                         </div>
                       </div></div>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
          DB::table('mail_templates')->insert([
            'name' =>'giftvoucher_status',
            'subject' => 'Gift voucher Status',
            'mail_content' => 'Hi :name <br> 
                                Your gift voucher is used. <br>
                                :message <br>
                                Thanks & Regards <br> 
                                Administration Team <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
  DB::table('mail_templates')->insert([
            'name' =>'question_mail',
            'subject' => 'Question Mail',
            'mail_content' => 'Hi :name <br> 
                                  :productname <br>
                                  :question <br>
                                Thanks & Regards <br> 
                                Administration Team <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
         DB::table('mail_templates')->insert([
            'name' =>'answer_mail',
            'subject' => 'Answer Mail',
            'mail_content' => 'Hi :name <br> 
                                  :productname <br>
                                  Question<br>
                                  :question <br>
                                  Answer<br>
                                  :answer <br>
                                Thanks & Regards <br> 
                                Administration Team <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);


          DB::table('mail_templates')->insert([
            'name' =>'cancel_item_seller',
            'subject' => 'Cancel Order Item',
            'mail_content' => 'Hi :name <br> 
                                Your order item of :productname is canceled. <br> 
                                Thanks & Regards <br> 
                                <p>Administration Team <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"), 
        ]);

            DB::table('mail_templates')->insert([
            'name' =>'cancel_item_buyer',
            'subject' => 'Cancel Order Item',
            'mail_content' => 'Hi :name <br> 
                                Your order item of :productname is canceled. <br> 
                                Thanks & Regards <br> 
                                <p>Administration Team <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"), 
        ]);


             DB::table('mail_templates')->insert([
            'name' =>'hold_item_buyer',
            'subject' => 'Cancel Order Item',
            'mail_content' => 'Hi :name <br> 
                                Your order id :orderid in order item of :productname is Hold. <br> 
                                Thanks & Regards <br> 
                                <p>Administration Team <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"), 
        ]);

            DB::table('mail_templates')->insert([
            'name' =>'hold_item_Seller',
            'subject' => 'Cancel Order Item',
            'mail_content' => 'Hi :name <br> 
                                Your order id :orderid in order item of :productname is Hold. <br> 
                                Thanks & Regards <br> 
                                <p>Administration Team <br>',
            'status' => 'active',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"), 
        ]);
    }
}
