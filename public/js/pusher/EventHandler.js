Pusher.logToConsole = false;

var pusher = new Pusher('aea91d9a9d560d8b4f1a', {
    encrypted: true,
    cluster: 'eu',
    forceTLS: true
});

var channel = pusher.subscribe('main-channel');

channel.bind('main-event', function(data) {
    $(".dropdown-menu").append(newNot(data["message"], data["title"]))
});


pusher.connection.bind('connected', function () {
    $("#connection_status").attr('class', 'badge badge-success')
    $("#connection_status").html("Connected");
})

pusher.connection.bind('failed', function () {
    $("#connection_status").attr('class', 'badge badge-danger')
    $("#connection_status").html("Failed to connect");
})

pusher.connection.bind('disconnected', function () {
    $("#connection_status").attr('class', 'badge badge-warning')
    $("#connection_status").html('Disconnected')
})
function newNot(message, title){
    return `
    <a class="dropdown-item media" href="#">
        <div class="message media-body">
            <span class="name float-left">${message}</span>
            <span class="time float-right">Just now</span>
            <p>Hello, this is an example msg</p>
        </div>
    </a>
    `;
}