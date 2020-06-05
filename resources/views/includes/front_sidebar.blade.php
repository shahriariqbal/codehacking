<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>

    </div>


    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">

                    @if($categories)
                        @foreach ($categories as $category)
                            <li><a href="#"> {{ $category->name}}</a> </li>
                        @endforeach
                        
                    @endif


                </ul>
            </div>

        </div>
   
    </div>


    <div class="well">
        <h4> Notice Board </h4>
        <p>Loading ................................................. </p>
    </div>

</div>