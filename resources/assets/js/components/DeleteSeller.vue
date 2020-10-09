<template>
    <div class="container">
        
      <a href="#" v-on:click="confirm()" >Delete User</a>
   
    </div>
</template>
 

<script>

import Vue from 'vue'
import VueSwal from 'vue-swal'    

    export default {
     props:['id'],
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
        deleteSeller()
        {

           //alert('hi');
                axios.post('/admin/seller/delete',{
                id:this.id,
              }).then(response=>{
                  this.success=response.data.messages;
                  
              }).catch(error=>{
                  this.errors=error.response.data.errors;
              });

           
            
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
                    
                   this.deleteSeller();
                    
                  swal("user delete successfully!", {
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
