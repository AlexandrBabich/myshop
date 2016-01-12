
<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#b-menu-3">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="b-menu-3">
            <ul class="nav navbar-nav navbar-right">
                @if (! $category->isEmpty())
                    @foreach($category as $item)
                        <li><a href="/category/{!! $item->id !!}">{!! $item->title !!}</a></li>
                    @endforeach
                @endif
            </ul>
        </div> <!-- /.nav-collapse -->
    </div> <!-- /.container -->
</div> <!-- /.navbar -->

