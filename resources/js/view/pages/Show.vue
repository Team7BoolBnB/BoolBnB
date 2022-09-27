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
                accommodation: {},
                
            };
        },
        methods: {
            fetch() {
                Axios.get("/api/accommodations/" + this.$route.params.slug).then((resp) => {
                    this.accommodation = resp.data.accommodation;
                   
                })
            }
        },
        mounted() {
            this.fetch()
        },
    
    }
    </script>