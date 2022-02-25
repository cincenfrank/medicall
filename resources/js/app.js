/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
import Aos from "aos"
import "aos/dist/aos.css"
document.addEventListener('DOMContentLoaded',function(){
    const button = document.querySelector('.my-btn-show-bio');
    if(button){
    button.addEventListener("click" , function(){
        const textBox = button.parentElement.querySelector('.content-bio');
        console.log(textBox);
        textBox.classList.toggle('hide-content-bio');
        if(textBox.classList.contains('hide-content-bio')){
            button.textContent = "Mostra tutto";
        }else{
            button.textContent = "Riduci"
        }
    })
}
})
window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Con questo blocco di codice risparmiamo di richiamare ogni componente manualmente
const files = require.context("./", true, /\.vue$/i);
files
    .keys()
    .map((key) =>
        Vue.component(key.split("/").pop().split(".")[0], files(key).default)
    );

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    mounted() {
        Aos.init()
    }
});
