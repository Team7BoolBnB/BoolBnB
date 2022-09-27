<template >
  <div>
    <v-braintree
      :authorization="authorization"
      locale="it_IT"
      @success="onSuccess"
      @error="onError"
      @loaad="onLoad"
    ></v-braintree>
  </div>
</template>

<script>
export default {
  props: {authorization:{type:String} },
 
  methods: {
    onSuccess(payload) {
      let nonce = payload.nonce;
     this.$emit("onSuccess", nonce)
    },
    onError(error) {
      let message = error.message;
      // Whoops, an error has occured while trying to get the nonce
    },
    /* onLoad(){
        alert('loading')
    } */
  },
};
</script>