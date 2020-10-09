<template>
    <div class="">

        <div v-if="this.success!=null" class="font-muller alert alert-success" id="success-alert">{{this.success}}</div>
      
      <div class="flex flex-col lg:flex-row my-2">

         <div class="w-full lg:w-1/3 my-2 bg-white content_sec lg:mx-3 rounded">
        <div class="px-3 py-3">
      <div class="flex items-center justify-between">
        <h2 class="text-3xl lg:text-base custom_txt font-medium">Total Orders</h2>  
           <div>
          <select  v-model="selectOrder" v-on:change="getOrder"  id="" class="custom_select text-3xl lg:text-xs">
            <option value="0">Today</option>
            <option value="7">7 Days</option>
            <option value="30">30 Days</option>
            <option value="90">90 Days</option>
          </select>
        </div>
      </div>
      <div class="py-3 flex items-center justify-between">
        <img :src="this.url+'/images/icons_1/order.svg'" class="w-16 lg:w-12 h-16 lg:h-12">
        <div class="flex flex-col items-end">
        <h2 class="text-3xl count_txt">{{orderDetails.orders}}</h2>
        <p class="flex items-center custom_txt text-3xl lg:text-xs">
          <img v-if="orderDetails.range=='high'" :src="this.url+'/images/icons_1/high.svg'" class="w-3 h-3 mx-1">
         <img v-if="orderDetails.range=='low'" :src="this.url+'/images/icons_1/low.svg'" class="w-3 h-3 mx-1">
           <span>{{orderDetails.percentage}}%</span></p>
        </div>
      </div> 

      </div>
      </div>
   

       <div class="w-full lg:w-1/3 my-2 bg-white content_sec lg:mx-3 rounded">
      <div class="px-3 py-3">
      <div class="flex items-center justify-between">
        <h2 class="text-3xl lg:text-base custom_txt font-medium">Total Buyers</h2>
        <div>
           <select  v-model="selectBuyer" v-on:change="getBuyer"  id="" class="custom_select text-3xl lg:text-xs">
            <option value="0">Today</option>
            <option value="7">7 Days</option>
            <option value="30">30 Days</option>
            <option value="90">90 Days</option>
          </select>
        </div>
      </div>
      <div class="py-3 flex items-center justify-between">
        <img :src="this.url+'/images/icons_1/buyer.svg'" class="w-16 lg:w-12 h-16 lg:h-12">
        <div class="flex flex-col items-end">
        <h2 class="text-3xl count_txt">{{orderBuyer.buyers}}</h2>
        <p class="flex items-center custom_txt text-3xl lg:text-xs"><img v-if="orderBuyer.range=='high'" :src="this.url+'/images/icons_1/high.svg'" class="w-3 h-3 mx-1">
         <img v-if="orderBuyer.range=='low'" :src="this.url+'/images/icons_1/low.svg'" class="w-3 h-3 mx-1">
           <span>{{orderBuyer.percentage}}%</span></p>
        </div>
      </div> 
        </div>    
      </div>


      <div class="w-full lg:w-1/3 my-2 bg-white content_sec lg:mx-3 rounded">
      <div class="px-3 py-3">
      <div class="flex items-center justify-between">
        <h2 class="text-3xl lg:text-base custom_txt font-medium">Total Sellers</h2>
        <div>
           <select  v-model="selectSeller" v-on:change="getSeller"  id="" class="custom_select text-3xl lg:text-xs">
             <option value="0">Today</option>
            <option value="7">7 Days</option>
            <option value="30">30 Days</option>
            <option value="90">90 Days</option>
          </select>
        </div>
      </div>
      <div class="py-3 flex items-center justify-between">
        <img :src="this.url+'/images/icons_1/seller.svg'" class="w-16 lg:w-12 h-16 lg:h-12">
        <div class="flex flex-col items-end">
        <h2 class="text-3xl count_txt">{{orderSeller.sellers}}</h2>
        <p class="flex items-center custom_txt text-3xl lg:text-xs"><img v-if="orderSeller.range=='high'" :src="this.url+'/images/icons_1/high.svg'" class="w-3 h-3 mx-1">
         <img v-if="orderSeller.range=='low'" :src="this.url+'/images/icons_1/low.svg'" class="w-3 h-3 mx-1">
           <span>{{orderSeller.percentage}}%</span></p>
        </div>
      </div> 
      </div>
      </div>

      </div>

  </div>
</template>

<script>

import Vue from 'vue'
import VueSwal from 'vue-swal'    

    export default {
      props:['url'],
        data(){
            return {
                selectOrder:'30',
                selectBuyer:'30',
                selectSeller:'30',
                orderDetails:[],
                orderBuyer:[],
                orderSeller:[],
                 success:null,
                 errors:[],
                  
            }
        },
        created() {
            
            this.getOrder();
            this.getBuyer();
            this.getSeller();          
        },
      methods:{
        getOrder()
        {
          // alert(this.selectOrder);
              axios.get('/admin/dashboard/getorders?duration='+this.selectOrder).then(response=>{
                this.orderDetails=response.data;
              //  console.log(this.orderDetails);
            });
        },  
         getBuyer()
        {
        //alert(this.selectBuyer);
              axios.get('/admin/dashboard/getbuyer?duration='+this.selectBuyer).then(response=>{
                this.orderBuyer=response.data;
               // console.log(this.orderDetails);
            });
        }, 
         getSeller()
        {
          // alert(this.selectSeller);
              axios.get('/admin/dashboard/getseller?duration='+this.selectSeller).then(response=>{
                this.orderSeller=response.data;
               // console.log(this.orderDetails);
            });
        },       
      },
    }
</script>
