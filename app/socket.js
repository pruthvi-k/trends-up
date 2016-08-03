var socket = require('socket.io');
var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = socket.listen(server);
var port = process.env.PORT || 8899;

server.listen(port, function () {
    console.log('Server listening at port %d', port);
});


io.on('connection', function (socket) {

    socket.on('new_count_message', function (data) {
        io.sockets.emit('new_count_message', {
            new_count_message: data.new_count_message

        });
    });

    socket.on('update_count_message', function (data) {
        io.sockets.emit('update_count_message', {
            update_count_message: data.update_count_message
        });
    });

    socket.on('new_message', function (data) {
        console.log('server data', data);
        io.sockets.emit('new_message', data);
    });


});

/*
 redisClient.subscribe('message');

 redisClient.psubscribe('*', function (socket) {
 console.log("in socket", socket);
 });

 redisClient.on('pmessage', function (subscribed, channel, message) {
 console.log("in", subscribed);
 message = JSON.parse(message);
 socket.emit(channel + ':' + message.event, message.data);
 });

 redisClient.on("message", function (channel, data) {
 console.log('channel', channel);
 console.log('data', data);
 console.log("mew message add in queue " + data['message'] + " channel");
 //socket.emit(channel, data);
 //socket.emit("message_" + data['user'], data);
 socket.broadcast.to("message_" + data['user']).emit('conversation private post', {
 message: data.message
 });
 });

 socket.on('conversation private post', function (data) {
 console.log('message', data);
 //display data.message
 });

 socket.on('disconnect', function () {
 redisClient.quit();
 });
 */