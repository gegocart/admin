<template>
    <div class="container">
        
       
    <a v-on:click="showPopup()" href="#">
  <svg class="fill-current w-4 h-4 mx-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 383.947 383.947" style="enable-background:new 0 0 383.947 383.947;" xml:space="preserve" width="512px" height="512px"><g><g>
  <g>
    <g>
      <polygon points="0,303.947 0,383.947 80,383.947 316.053,147.893 236.053,67.893    " data-original="#000000" class="active-path" fill=""/>
      <path d="M377.707,56.053L327.893,6.24c-8.32-8.32-21.867-8.32-30.187,0l-39.04,39.04l80,80l39.04-39.04     C386.027,77.92,386.027,64.373,377.707,56.053z" data-original="#000000" class="active-path" fill=""/>
    </g>
  </g>
</g></g> </svg></a>




  <div v-bind:class="[this.popup==1?'block':'hidden']">   
 <div class="modal-mask">
   <div class="modal-wrapper px-4">
     <div class="modal-container w-full  max-w-md  mx-auto">
       <div class="modal-body">
        
             
            <div class="modal-header flex justify-between items-center border-b px-4 py-1">

                 <h2 class="text-sm font-semibold">Status Update</h2>
             <button class="modal-default-button text-2xl py-1"  id="close_modal" v-on:click="closePopup()">
                &times;
            </button>
                       
          </div>    
           
               <div class="py-6 px-4">
              <label class="form-group block my-1 custom-label text-sm">Select Status</label>
          <select v-model="selectStatus" v-on:change="confirm()" class="border text-sm px-2 py-1 w-full mb-2">
            
               <option v-for="(status,index) in statusList" :value="index" >{{status}}</option>
               
          </select>
          </div>
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
      props:['id'],
        data(){
            return {

                 user:[],
                 statusList:['Not Approve','Approve'],
                 selectStatus:'',
                 popup:0,
                 status:'',
                 errors:[],
                 success:null, 

            }
        },
        created() {

          this.getData();
          
        },
      methods:{

        getData()
        {
          axios.get('/admin/seller/getproduct/'+this.id).then(response=>{
            this.status=response.data;
            
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
    .then((willUpdate) => {
      if (willUpdate) {
          
          this.statusUpdate();
           // window.location.href = '';
          
        swal("Status!", {
          icon: "success",
        }).then((afterSuccess) => {
            if(afterSuccess)
            {
              window.location.href="";
            }
    });
      } else {
        swal("Status update is cancel!");
      }
    });


        },
        
    closePopup()
      {
         this.popup=0;
         this.selectStatus='';
         this.id='';
      },

      showPopup()
      {
              
         this.popup=1;
         this.selectStatus=this.status;
       
      },
        statusUpdate(){
          this.success=null;
          this.errors=[];
          axios.post('/admin/seller/product/'+this.id+'/statusupdate',{
            status:this.selectStatus,
            
          }).then(response=>{
              this.success=response.data.messages;
                console.log(success);
              this.getOrder();
          }).catch(error=>{
              this.errors=error.response.data.errors;
          });

        }
      },
    }
</script>

<style scoped>

.disp-none {
  display:none;
}
​
​
@media(max-width:640px){
  .modal-wrapper {
    width: 100% !important;
    left: 0 !important;
  }
}

.modal-container {
  margin: 0px auto;
 /* padding: 15px 15px;*/
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
}
​
.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}
​
.modal-body {
  margin: 20px 0;
}
​
.modal-default-button {
  float: right;
}
​
/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */
​
.modal-enter {
  opacity: 0;
}
​
.modal-leave-active {
  opacity: 0;
}
​
.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
.darktheme .modal-container {
    background: #1c1c1c;
    border: 1px solid #fff;
}
.darktheme .modal-wrapper {
    color: #fff;
}
.lighttheme .modal-wrapper{
    color: #000;
}
@media(max-width: 850px){
  .modal-body .flex.flex-m {
    flex-direction: column;
  }
  .modal-body .flex-m {
    align-items: normal;
  }
  .modal-header h2 {
    font-size: 20px;
  }
}
.trn-trade {
     color: #0275d8 !important;
    cursor: pointer;
    text-decoration: underline !important;
}
.trn-trade:hover {
  color: #0275d8 !important;
  text-decoration: underline !important;
}

.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  transition: opacity 0.3s ease;
}
.modal-wrapper {
  vertical-align: middle;
  width: 34%;   
    left: 34%;
    position: absolute;
    right: 0;
    top: 25%;
    bottom: 0;
}
.alert-success {
/*  background-color: #7dc855;*/
  color: #7dc855;
}
/*psk-end*/
</style>