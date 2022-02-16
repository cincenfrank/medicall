<template>

    <!-- <div class="list-group">
   
    <a href="#"  v-for="conversation in conversations" :key="conversation.id" class="list-group-item list-group-item-action">{{loggedUserId}}</a>
    
</div>
<ul>
    <li v-for="conversation in conversations" :key="conversation.id">
       {{conversation.patient_name + " " + conversation.content.substring(0, 50) }}
    </li>
</ul> -->


    <div class="list-group">
          <a :href="`/dashboard/conversations/${conversation.id}`"  v-for="conversation in conversations" :key="conversation.id" class="list-group-item list-group-item-action ">
        <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">{{conversation.patient_name}}</h5>
      <small class="text-muted">{{conversation.created_at}}</small>
    </div>
    <p class="mb-1"> {{conversation.content.substring(0, 200)}}</p>
    <small class="text-muted">{{conversation.patient_email}}</small>
  </a>
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

