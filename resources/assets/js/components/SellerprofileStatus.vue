<template>
    <div class="">
        <div v-if="this.success!=null" class="font-muller alert alert-success" id="success-alert">{{this.success}}</div>
        
      <a href="#" v-if="sellerProfile.status=='approved'" v-on:click="confirm(0)" class="bg_red text-white text-xs px-2 py-1 rounded mx-1">Deactivate</a>
      <a href="#" v-if="sellerProfile.status=='not_approved'" v-on:click="confirm(1)" class="bg_green text-white text-xs px-2 py-1 rounded mx-1">Activate</a>
    </div>
</template>

<script>

import Vue from 'vue'
import VueSwal from 'vue-swal'    

    export default {
      props:['id'],
        data(){
            return {

                 sellerProfile:[],
                 success:null,
                 errors:[],
                 status:'',
            }
        },
        created() {
          //this.confirm();  
 
          this.getSellerProfile();   
          this.statusUpdate();   
        },
      methods:{
        getSellerProfile(){
                  axios.get('/admin/seller/'+this.id+'/getsellerprofile').then(response=>{
                    this.sellerProfile=response.data;

                    console.log(this.sellerProfile);
                  });
                },
        confirm(status)
        {
          this.status=status;
          
     swal({
      title: "Are you sure?",
      
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willUpdate) => {
      if (willUpdate) {
          
          this.statusUpdate();
          
        swal("Status!", {
          icon: "success",
        }).then((afterSuccess) => {
            if(afterSuccess)
            {
             // alert();
              window.location.href="";

            }
    });



      } else {
        swal("Status update is cancel!");
      }
    });
        },
        statusUpdate(){
          this.success=null;
          this.errors=[];
          axios.post('/admin/seller/'+this.id+'/update',{
            status:this.status,
          }).then(response=>{
              this.success=response.data.messages;
              this.getSellerProfile();
          }).catch(error=>{
              this.errors=error.response.data.errors;
          });

        }
      },
    }
</script>
