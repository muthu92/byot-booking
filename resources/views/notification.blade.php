<!DOCTYPE html>
<head>
  <title>Laravel 8 Pusher Notification Example Tutorial - XpertPhp</title>
  <h1>Laravel 8 Pusher Notification Example Tutorial</h1>
  <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
  <script>

   var pusher = new Pusher('{{env("MIX_PUSHER_APP_KEY")}}', {
      cluster: '{{env("PUSHER_APP_CLUSTER")}}',
      encrypted: true
    });

    var channel = pusher.subscribe('notification');
    channel.bind('App\\Events\\TestEvent', function(data) {
      alert(data.message);
    });
  </script>
</head>