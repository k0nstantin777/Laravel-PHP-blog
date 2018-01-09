<div id="header-wrap">
    <header>
            <nav class="navbar navbar-static-top col-lg-12" role="navigation">
                 <div class="navbar-header">
                     <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                       <span class="sr-only">Toggle navigation</span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                     </button>
                     <div class="visible-xs pull-right" >    
                        @include('widgets.header.user_menu')
                     </div>
                   </div>
                 <div class="collapse navbar-collapse col-lg-7 col-sm-3 col-md-3 col-xs-12" id="bs-example-navbar-collapse-1">
                     @include('widgets.header.menu')
                 </div>
                 <div class="col-lg-3 col-md-4 hidden-xs hidden-sm pull-right" >    
                     @include('widgets.header.user_menu')
                 </div>
                 <div class="col-sm-5 visible-sm pull-left" >    
                     @include('widgets.header.user_menu')
                 </div>   
             </nav>
                
                
           
            <div class="row ">
                <div class="col-lg-3 col-lg-offset-1 col-sm-3 col-sm-offset-1 col-md-3 col-md-offset-1 col-xs-10 col-xs-offset-1 ">
                    @include('widgets.header.logo')
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-10 col-sm-offset-0 col-xs-offset-1">
                    @include('widgets.header.action')
                </div>
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-10 col-sm-offset-0 col-xs-offset-1">
                    @include('widgets.header.search')
                </div>
            </div>    
        
    </header>
</div>

