var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');

server.listen(8899);
io.on('connection', function (socket) {

    var redisClient = redis.createClient();
    var users = [];
    redisClient.subscribe('test-channel', function (err, count) {
        console.log('subscribe');
    });

    // when the client emits 'add user', this listens and executes
    socket.on('add user', function (username, key) {
        users[username] = socket.id;
        socket.join(username);
    });

    redisClient.on("message", function (channel, data) {
            console.log('socket', socket.id);
            console.log('channel', channel);
            data = JSON.parse(data);
            console.log('data', users[data.data.user]);
            if (socket.id == users[data.data.to]) {
                data.data.self = true;
                socket.to(data.data.user).emit(channel + ':' + data.event, data.data);
            }
            if (socket.id == users[data.data.user]) {
                socket.to(data.data.to).emit(channel + ':' + data.event, data.data);
            }
            //var users = [data.data.to, data.data.user]
            //io.emit(channel + ':' + data.event, data.data.message);
            //socket.to(data.data.to).emit(channel + ':' + data.event, data.data);
            //socket.emit(channel, data);
            //socket.emit("message_" + data['user'], data);
            //socket.broadcast.to("message_" + data['user']).emit('conversation private post', {
            //    message: data.message
            //});
        }
    )
    ;

    socket.on('disconnect', function () {
        redisClient.quit();
    });

});