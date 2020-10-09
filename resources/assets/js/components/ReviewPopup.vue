<template>
 <div>

 <a v-on:click="showPopup()" class="trigger_popup_fricc" href="#">
                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve" width="512px" height="512px"><g><g>
    <g>
        <g>
            <path d="M501.978,371.851l-141.999-50c-7.811-2.753-16.379,1.352-19.13,9.167c-2.752,7.814,1.353,16.379,9.167,19.13l141.999,50     c7.837,2.759,16.388-1.378,19.13-9.167C513.897,383.167,509.792,374.602,501.978,371.851z" data-original="#000000" class="active-path" fill=""/>
            <path d="M227.595,99.398c12.248-14.593,19.034-23.886,19.54-24.583c4.868-6.703,3.379-16.083-3.324-20.951     c-6.704-4.867-16.083-3.381-20.952,3.324C177.381,119.801,89.518,200.956,8.234,242.612c-0.025,0.013-0.049,0.025-0.073,0.038     c-3.444,1.765-6.01,4.752-7.277,8.277c-1.178,3.275-1.179,6.867,0,10.147c1.267,3.524,3.833,6.512,7.277,8.277     c0.025,0.013,0.049,0.025,0.073,0.038c88.138,45.166,173.306,128.696,214.626,185.424c4.844,6.67,14.217,8.214,20.952,3.324     c6.703-4.868,8.191-14.248,3.324-20.951c-0.507-0.697-7.292-9.99-19.54-24.583C251.984,368.814,260.28,306.299,260.28,256     C260.28,205.667,251.973,143.167,227.595,99.398z M206.347,388.375C160.741,338.492,105.24,290.488,46.193,256     c58.936-34.422,114.404-82.337,160.154-132.374c7.51,16.124,13.45,35.958,17.534,58.205c-36.1,5.387-63.882,36.592-63.882,74.169     s27.781,68.782,63.883,74.17C219.796,352.418,213.857,372.251,206.347,388.375z M189.998,256     c0-22.458,16.537-41.124,38.073-44.466c1.45,14.259,2.21,29.166,2.21,44.466c0,15.3-0.76,30.208-2.21,44.466     C206.535,297.124,189.998,278.458,189.998,256z" data-original="#000000" class="active-path" fill=""/>
            <path d="M359.979,190.15l141.999-50c7.814-2.751,11.919-11.317,9.167-19.13c-2.75-7.813-11.319-11.916-19.13-9.167l-141.999,50     c-7.814,2.751-11.919,11.317-9.167,19.13C343.598,188.793,352.163,192.903,359.979,190.15z" data-original="#000000" class="active-path" fill=""/>
            <path d="M354.997,271h141.999c8.284,0,15-6.716,15-15c0-8.284-6.716-15-15-15H354.997c-8.284,0-15,6.716-15,15     C339.997,264.284,346.713,271,354.997,271z" data-original="#000000" class="active-path" fill=""/>
        </g>
    </g>
</g></g> </svg>

</a>



 
 <div v-bind:class="[this.popup==1?'block':'hidden']">   
 <div class="modal-mask">
   <div class="modal-wrapper px-4">
     <div class="modal-container w-full  max-w-md  mx-auto">
       <div class="modal-body">
        
             
            <div class="modal-header flex justify-between items-center border-b px-4 py-1">

                 <h2 class="text-sm font-semibold">Product Review</h2>
             <button class="modal-default-button text-2xl py-1"  id="close_modal" v-on:click="closePopup()">
                &times;
            </button>
                       
          </div>    
           
          <div  v-for="review in reviews">
     <div class="flex px-3 py-3">
            <img v-bind:src="review.product_image" class="w-20 h-20">


<!-- rating -->
<div class="mx-4">
<p class="text-base text-gray-700 font-semibold py-1">{{review.product_name}}</p>
        <div class="flex  py-1">
            <div v-for="rating in total_rating" >
                <div v-if="rating<=review.rating" class="mx-1">
                    <img v-bind:src="url+'/images/icons_1/star_fill.svg'" class="w-3 h-3">
                </div>
                <div v-else class="mx-1">
                    <img v-bind:src="url+'/images/icons_1/star_line.svg'" class="w-3 h-3">
                </div>
            </div>
        </div>
        </div>
        </div>
<!-- discription -->
            <p class="text-sm custom_txt leading-loose py-2 px-3">{{review.description}}</p>
  
         </div>
        </div>
      </div>
    </div>
</div>

</div>


  </div>
 
</template>

<script>

  

    export default {
      props:['url','id'],
        data(){
            return {
                 popup:0,
                 reviews:[],
                 success:null,
                 errors:[],
                 total_rating:5,
                  
                  
            }
        },
        created() {
          
       

        },
      methods:{

                getData()
                {
                    axios.get('/admin/buyer/'+this.id+'/getreview').then(response=>{
                        this.reviews=response.data.data;     
                    });
                    console.log(this.url);
                    
                },
                closePopup()
                {
                   this.popup=0;
                },
                showPopup()
                {
                   this.getData();
                   this.popup=1;
                },
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
 </style>