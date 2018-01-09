
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
var example = require('./components/Example.vue');
var category = require('./components/Category.vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('list-categories', {
//    template: '<li @click="say(name)">{{name}}</li>',
//    props: ['name'],
////    data: function (){
////           
////    }
//    methods:{
//        say: function(name){
//            alert(name);
//        }
//    }
//});



var app = new Vue({
    el: '#app',
    components: {
       example: example,
       category: category,
    },
    data: {
        categories: [],
        isClick: false,
        category: '',
        selected: '',
        countPosts:''
    },
    created: function(){
        axios.post('/api/category/')
            .then(function(response){
                app.categories = response.data;
                
            })
            .catch(function(error){
                console.log(error);
            });
    },
    methods:{
        show: function(item){
            this.category = item.name;
            this.countPosts = item.postsCount;
            this.isClick = true;
            setTimeout(function(){
                app.isClick = false;
            }, 2000);  
        }
    }
    
    
    
   
});
