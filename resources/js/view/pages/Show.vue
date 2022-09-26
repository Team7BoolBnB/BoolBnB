<template >
    <div>
        {{data}}
    </div>
</template>


<script>
import Axios from 'axios';
export default {

    data() {
        return {
            data: null,
        };
    },
    methods: {

        fetch(){
            Axios.get("/api/accommodations/" + this.$route.params.slug).then((resp)=>{
                this.data=resp.data
            })
        }

    },
    mounted() {
        this.fetch()
    },
    
}
</script>