<template>
  <div>
    <div class="container-fluid">
        <div class="row">
            <div class="pageHeader d-flex align-items-center">
                <div class="container text-white">
                    <h2>Messages</h2>
                </div>
            </div>



            <div class="col-3 p-0 details-view bg-white">
                <h5 class="p-4 border border-bottom-1 m-0">Accommodations</h5>
                <div class="col side-bar-message border border-col p-0 vh-100 overflow-auto">

                    <div class="row flex-column row-sidebar">
                        <div class="spacing-column">
                           
                                <div v-for="accommodation, i in accommodations" :key="accommodation.id" class="accommodationDiv d-flex gap-3 my-2" 
                                @click="fetchOnclick(accommodation.id, i)" :class="activePosition[i] ? 'selected-accommodation' : ''">
                                    <div class="py-2">
                                        <svg width="40px" height="40px" viewBox="0 0 512 512"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <linearGradient id="a" gradientTransform="matrix(1 0 0 -1 0 -10886)"
                                                gradientUnits="userSpaceOnUse" x1="0" x2="512" y1="-11142"
                                                y2="-11142">
                                                <stop offset="0" stop-color="#71717138" />
                                                <stop offset=".231" stop-color="#71717138" />
                                                <stop offset=".5138" stop-color="#71717138" />
                                                <stop offset=".7773" stop-color="#71717149" />
                                                <stop offset="1" stop-color="#71717357" />
                                            </linearGradient>
                                            <path
                                                d="m512 256c0 141.386719-114.613281 256-256 256s-256-114.613281-256-256 114.613281-256 256-256 256 114.613281 256 256zm0 0"
                                                fill="url(#a)" />
                                            <path
                                                d="m444.558594 222.78125-157.101563-158.136719c-.199219-.203125-.40625-.398437-.621093-.589843-17.125-15.375-43.003907-15.433594-60.191407-.125-.214843.1875-.421875.382812-.621093.585937l-158.535157 158.21875c-5.863281 5.851563-5.875 15.351563-.019531 21.214844 5.851562 5.863281 15.347656 5.871093 21.210938.019531l12.097656-12.074219v130.371094c0 33.210937 27.023437 60.230469 60.234375 60.230469h54.277343c8.285157 0 15-6.714844 15-15v-122.957032h52.929688v122.957032c0 8.285156 6.714844 15 15 15h52.769531c33.210938 0 60.234375-27.019532 60.234375-60.230469 0-8.285156-6.71875-15-15-15-8.285156 0-15 6.714844-15 15 0 16.667969-13.566406 30.230469-30.234375 30.230469h-37.769531v-122.957032c0-8.285156-6.714844-15-15-15h-82.929688c-8.28125 0-15 6.714844-15 15v122.957032h-39.277343c-16.671875 0-30.234375-13.5625-30.234375-30.230469v-159.824219c0-.15625-.015625-.308594-.019532-.464844l116.101563-115.875c5.675781-4.824218 14.007813-4.804687 19.667969.042969l114.695312 115.449219v85.285156c0 8.285156 6.714844 15 15 15 8.28125 0 15-6.714844 15-15v-55.085937l12.050782 12.132812c2.933593 2.949219 6.785156 4.425781 10.640624 4.425781 3.824219 0 7.648438-1.449218 10.574219-4.355468 5.875-5.839844 5.90625-15.339844.070313-21.214844zm0 0"
                                                fill="#fff" />
                                        </svg>
                                    </div>
                                    <div class="py-2">
                                        <h6>{{ accommodation.title }}</h6>
                                        <p class="mb-0 text-secondary">{{ accommodation.address }}</p>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>

     

            <div class="col p-0 details-view bg-white">
                <h5 class="p-4 border border-bottom-1 m-0">Messages</h5>
                <div class="col  full-height-message-container border border-col p-0 overflow-auto">
                    <div class="flex-column messages-section h-100">
                        <div class="container px-5 py-0">
                            <div class="row flex-column">
                                <div class="spacing-column">
                                    
                                    <div v-if="messages.length == 0">
                                        <h2>
                                           Non hai ancora ricevuto messaggi associati a questa accommodation.  
                                        </h2>
                                       
                                    </div>    
                                            <div v-for="message in messages" :key="message.id" class="card my-4">
                                                <div class="card-header">
                                                    {{message.created_at}}
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">{{message.name}}</h5>
                                                    <p class="card-text">{{message.email}}</p>
                                                    <p class="card-text">{{message.content}}</p>
                                                    <a :href='"mailto:" + message.email' class="basicBtn primaryBtn smallBtn">Answer</a>
                                                </div>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


       

         
    </div>
    <div class="row details-no flex-column">

       

        <div class="col p-0 bg-white">
            <h5 class="p-4 border border-bottom-1 m-0">Accommodations</h5>
            <div class="col side-bar-message  full-height-message-container border border-col p-0 overflow-auto">

                <div class="row flex-column row-sidebar">
                    <div class="spacing-column">
                        
                            <div v-for="accommodation in accommodations" :key="accommodation.id" class="accommodationDiv d-flex gap-3 my-2"
                            @click="fetchOnclick(accommodation.id , i)">
                                <div class="py-2 svg-none">
                                    <svg width="40px" height="40px" viewBox="0 0 512 512"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <linearGradient id="a" gradientTransform="matrix(1 0 0 -1 0 -10886)"
                                            gradientUnits="userSpaceOnUse" x1="0" x2="512" y1="-11142"
                                            y2="-11142">
                                            <stop offset="0" stop-color="#71717138" />
                                            <stop offset=".231" stop-color="#71717138" />
                                            <stop offset=".5138" stop-color="#71717138" />
                                            <stop offset=".7773" stop-color="#71717149" />
                                            <stop offset="1" stop-color="#71717357" />
                                        </linearGradient>
                                        <path
                                            d="m512 256c0 141.386719-114.613281 256-256 256s-256-114.613281-256-256 114.613281-256 256-256 256 114.613281 256 256zm0 0"
                                            fill="url(#a)" />
                                        <path
                                            d="m444.558594 222.78125-157.101563-158.136719c-.199219-.203125-.40625-.398437-.621093-.589843-17.125-15.375-43.003907-15.433594-60.191407-.125-.214843.1875-.421875.382812-.621093.585937l-158.535157 158.21875c-5.863281 5.851563-5.875 15.351563-.019531 21.214844 5.851562 5.863281 15.347656 5.871093 21.210938.019531l12.097656-12.074219v130.371094c0 33.210937 27.023437 60.230469 60.234375 60.230469h54.277343c8.285157 0 15-6.714844 15-15v-122.957032h52.929688v122.957032c0 8.285156 6.714844 15 15 15h52.769531c33.210938 0 60.234375-27.019532 60.234375-60.230469 0-8.285156-6.71875-15-15-15-8.285156 0-15 6.714844-15 15 0 16.667969-13.566406 30.230469-30.234375 30.230469h-37.769531v-122.957032c0-8.285156-6.714844-15-15-15h-82.929688c-8.28125 0-15 6.714844-15 15v122.957032h-39.277343c-16.671875 0-30.234375-13.5625-30.234375-30.230469v-159.824219c0-.15625-.015625-.308594-.019532-.464844l116.101563-115.875c5.675781-4.824218 14.007813-4.804687 19.667969.042969l114.695312 115.449219v85.285156c0 8.285156 6.714844 15 15 15 8.28125 0 15-6.714844 15-15v-55.085937l12.050782 12.132812c2.933593 2.949219 6.785156 4.425781 10.640624 4.425781 3.824219 0 7.648438-1.449218 10.574219-4.355468 5.875-5.839844 5.90625-15.339844.070313-21.214844zm0 0"
                                            fill="#fff" />
                                    </svg>
                                </div>
                                <div class="py-2">
                                    <h6><a class="text-dark" href="#message">{{ accommodation.title }}</a></h6>
                                    <p class="mb-0 text-secondary">{{ accommodation.address }}</p>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>

      

        <div class="col p-0 bg-white">
            <h5 class="p-4 border border-bottom-1 m-0" id="message">messages</h5>
            <div class="col  full-height-message-container border border-col p-0 overflow-auto">
                <div class="flex-column messages-section h-100">
                    <div class="container px-5 py-0">
                        <div class="row flex-column">
                            <div class="spacing-column">
                                
                                        <div v-for="message in messages" :key="message.id" class="card my-4">
                                            <div class="card-header">
                                                {{message.created_at}}
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{message.name}}</h5>
                                                <p class="card-text">{{message.email}}</p>
                                                <p class="card-text text-message">{{message.content}}</p>
                                                <a :href='"mailto:" + message.email'  class="basicBtn primaryBtn smallBtn">Answer</a>
                                            </div>
                                        </div>
                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    </div> 
  </div>
</template>


<script>
import Axios from "axios";
export default {
  data() {
    return {
      accommodations: null,
      messages:null,
      activePosition:[]
    };
  },
  methods: {
    fetch() {
      Axios.get("/api/messages").then((resp) => {
        this.accommodations = resp.data;
        for (let index = 0; index < resp.data.length; index++) {
           if (index==0) {
            this.activePosition.push(true)
           }
            else{
                this.activePosition.push(false)
            }
        }
       this. fetchOnclick(resp.data[0].id,0)
      });
    },
    fetchOnclick(id, i){
      Axios.get("/api/messages/" + id).then((resp) => {
       this.messages=resp.data
       this.activePosition=[];
       for (let index = 0; index < this.accommodations.length; index++) {
        
           if (i==index) {
            this.activePosition.push(true)
           }
            else{
                this.activePosition.push(false)
            }
        }

      });
    }
  },
  mounted() {
    this.fetch();
  },
};
</script>

<style lang="scss">
.accommodationDiv {
  padding: 1rem;
  border-bottom: 1px solid #71717138 !important;
  border: 1px solid white;

  &:active,
  &:focus {
    background-color: #8080801a;
    border-radius: 1rem;
    border: 1px solid #8080801a;
  }
}

.row-sidebar {
  margin-right: 0 !important;
  margin-left: 0 !important;
}

.spacing-column {
  padding: 1rem;
}

/* .border-col{
    border: $tertiaryColor;
} */

.width-column-details {
  width: 19rem;
}
.selected-accommodation{
    background-color: #00000038
}

@media only screen and (max-width: 504px) {
  .svg-none {
    display: none;
  }

  .text-message {
    overflow: auto;
    max-height: 5rem;
  }
}

.details-no {
  display: none;
}
@media only screen and (max-width: 900px) {
  .details-view {
    display: none;
  }

  .details-no {
    display: flex;
  }
}

@media only screen and (max-width: 1250px) {
  .width-column-details {
    width: 16rem;
  }
}

@media only screen and (max-width: 1074px) {
  .width-column-details {
    width: 13rem;
  }
  .accommodationDiv {
    flex-direction: column;
  }
}

@media only screen and (max-width: 640px) {
  .flex-details {
    flex-direction: column;
  }
}
</style>