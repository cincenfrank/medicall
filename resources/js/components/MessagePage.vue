<template>
 <div>
     {{message.content}}
 </div>
</template>

<script>
export default {
    name:"MessagePage",
    props:{
        doctorId:String
    }, 
    data(){
        return{message:{}}
    }, 
    methods:{
       
        getSingleMessage(){
            // creato una costante che ci da l´URL della pagina
            const url=window.location.href
            // abbiamo splittato in array ogni parametro dopo lo slash e abbiamo presp l´ultimo elemnto (pop)
            const messageId=url.split("/").pop()

            // abbiamo fatto la chiamata AXIOS all´url che abbiamo creato in api.php
            // 
            window.axios.get(`/api/message/${messageId}/doctor/${this.doctorId}`).then(resp=>{
               this.message=resp.data[0]
             })
        }
    }, 

    mounted(){
        this.getSingleMessage();
    }

}
</script>

<style lang="scss" scoped>

</style>

