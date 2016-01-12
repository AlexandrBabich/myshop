<div class="messages">
    @if (! $messages->isEmpty())
        @foreach($messages as $message)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span>{!!$message->name!!}</span>
                        <span class="pull-right label label-info">
                        {{ $message->created_at }}
                        </span>

                    </h3>
                </div>

                <div class="panel-body">
                    {!! $message->message !!}
                    <hr/>
                    <div class="pull-right">
                        <a class="btn btn-info" href="#">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <button class="btn btn-danger">
                            <i class="glyphicon glyphicon-tasks"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="text-center">
            {!! $messages->render() !!}
        </div>
    @endif
</div>