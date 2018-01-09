<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 ">
                <div class="panel panel-default">
                    <div class="panel-heading">{{category}}</div>
                   
                    <div class="panel-body">
                        Количество постов: {{countPosts}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['category', 'countPosts'],
                    
    }
</script>
