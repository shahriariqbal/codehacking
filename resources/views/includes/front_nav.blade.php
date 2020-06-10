
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
   
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">  <i style="font-size: 37px ; color: white ; margin: 60px "> <b>CodeHacking </b> </i>   </a>
        </div>
    
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())

                <li>
                    <a href="{{url('/login') }}">   <b style="font-size: 22px ; color: white ;  ">  Login </b> </a>
                </li>
                <li>
                    <a href="{{url('/register') }}">    <b style="font-size: 22px ; color: white ;  "> Register </b>  </a>
                </li>
                    
                @elseif ( Auth::user()->isAdmin() )

                <li>
                    <a href="/admin">   <b style="font-size: 22px ; color: white ;  "> Dashboard </b> </a>
                </li>
                <li>
                    <a href="/logout">  <b style="font-size: 22px ; color: white ;  "> Logout </b> </a>
                </li>

                @else

                <li>
                    <a href=" {{ route('admin.posts.create') }} ">   <b style="font-size: 27px ; color: white ;  ">Create Posts  </b> </a>
                </li>
                <li>
                    <a href="/logout">   <b style="font-size: 22px ; color: white ;  "> Logout </b> </a>
                </li>

                
                    
                @endif


            </ul>
        </div>

    </div>

</nav>



<div class="container">

