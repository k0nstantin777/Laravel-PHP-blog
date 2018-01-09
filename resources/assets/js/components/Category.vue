<template>
    <div class="col-sm-4 ">
        <ol>
            <li v-for="item in items" :key="item.id" @click="say(item)">{{item.name}}</li>
        </ol>
    </div>
</template>

<script>
    export default {

        props: ['items'],

        methods:{
            say: function(item){
                this.$emit('show', item);                
            }
        }          
    }
    
</script>
<style>
    ol {
        color: #888;    
    }
    
    
</style>