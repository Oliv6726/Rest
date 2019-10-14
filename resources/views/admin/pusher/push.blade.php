<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
<<<<<<< HEAD

=======
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('aea91d9a9d560d8b4f1a', {
        encrypted: true,
        cluster: 'eu',
        forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    
    channel.bind('my-event', function(data) {
        alert(JSON.stringify(data));
    });
  </script>
>>>>>>> b4221baafa3febc7bba11f411229ea5a1be4176c
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>