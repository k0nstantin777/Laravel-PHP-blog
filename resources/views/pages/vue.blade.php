<div id="app">
<!--    <select v-cloak v-model="selected">
        <option v-for="category in categories" :value="category.name">@{{category.name}}</option>
    </select>-->
    
    <!--<p v-cloak >@{{selected}}</p>-->
    <div class="col-sm-12">
    
        <category :items = "categories" v-on:show="show" ></category>
        <div class="clearfix"></div>
        <example v-cloak 
            :category='category'
            :count-posts='countPosts'
            v-if = 'isClick'
            ></example>
    </div>
</div>   

