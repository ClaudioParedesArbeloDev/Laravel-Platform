<div>
    <h3>Lista de mensajes</h3>
    @foreach ($messages as $message)
        <li>{{$message['user']}}: {{$message['message']}}</li>
        
    @endforeach

    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('dfa13beaa116d2d72061', {
          cluster: 'sa1'
        });
    
        var channel = pusher.subscribe('my-channel');

        channel.bind('my-event', function(data){
          $post('{{route('chat.receive')}}', {
            _token: '{{csrf_token()}}',
            message: data.message,
          })
          .done(function(res){
            $(".messages > .message").last().after(res);
            $(document).scrollTop($(document).height());
          })
          
        });

        $("form").submit(function(e){
            e.preventDefault();

            $.ajax({
                url: "chat.broadcast",
                method: "POST",
                headers: {
                  'X-Socket-Id': pusher.connection.socket_id,
                },
                data: {
                    _token: '{{csrf_token()}}',
                    message: $("form #message").val()
                }
              })
              .done(function(res){
                $(".messages > .message").last().after(res);
                $("form #message").val("");
                $(document).scrollTop($(document).height());
              })
      </script>
</div>
