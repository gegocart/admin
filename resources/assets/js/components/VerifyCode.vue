<template>
    <div class="container">
        
      <a href="#" v-on:click="confirm()" >Send Verification Code</a>
   
    </div>
</template>

<script>

import Vue from 'vue'
import VueSwal from 'vue-swal'    

    export default {
     props:['id','usergroup'],
        data(){
            return {

                 user:[],
                 success:null,
                 errors:[],
                 status:'',
            }
        },
        created() {
          
        },
      methods:{
        verifyCode()
        {

           if(this.usergroup==4)
           {
                axios.post('/admin/buyer/verify',{
                id:this.id,
              }).then(response=>{
                  this.success=response.data.messages;
                  
              }).catch(error=>{
                  this.errors=error.response.data.errors;
              });

           }
           else if(this.usergroup==3)
           {
              axios.post('/admin/seller/verify',{
                id:this.id,
              }).then(response=>{
                  this.success=response.data.messages;
                  
              }).catch(error=>{
                  this.errors=error.response.data.errors;
              });
           }
            
        },

        confirm()
        {
          
          
     swal({
      title: "Are you sure?",
      
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
        .then((willDelete) => {
                if (willDelete) {
                    
                   this.verifyCode();
                    
                  swal("Verification code sent successfully!", {
                    icon: "success",
                  });
                } else {
                  swal("Your action is cancel!");
                }
      });
   },

   },
  }
</script>
