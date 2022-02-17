<template>

    <div class="list-group">
   
    <a href="#" class="list-group-item list-group-item-action">{{}}</a>
    
</div>

</template>

<script>
export default {
    name:"ConversationsPage", 
    props:{
        // ti passiamo una variabile dall´esterno di tipo stringa
        loggedUserId:String
    }, 
    data(){
        return{conversations:[]}
    }, 
    methods:{
        // un avolta ricevuti i dati dall´URL,(then) i dati vengono salvati nella resp e dopo salvami i dati nella variabile conversations creata sopra 
        getDoctorMessages(){
            window.axios.get("/api/messages/doctor/" + this.loggedUserId).then(resp=>{
                this.conversations=resp.data
            })
        }
    }, 

    mounted(){
        this.getDoctorMessages();
    }
}
</script>

<style lang="scss" scoped>

</style>

