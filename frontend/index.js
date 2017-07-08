var http = require("http");
var fs = require("fs");
var express = require("express");
var bodyparser = require("body-parser");
var yotisdk = require("yoti-node-sdk");
const request = require('request');

var app = express()



// yoti config
var sdkid = process.env.YOTI_CLIENT_SDK_ID;
var appid = process.env.APPLICATION_ID;
var globalWishlist;
// App config
app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');
app.set(bodyparser.urlencoded({ extended: true }));
app.set(bodyparser.json());
app.use(express.static(__dirname + '/views/theme'))
const userName = 'User name'


app.get('/', function(req, res){
  res.render('index', {
    userName : userName   
  })
})
// APP ROUTES


app.get("/send", function(req, res){
  res.render('send')
})



app.get("/userlist", function(req, res){
      request({
      uri: 'http://kkmonlee.com/africa/get_user_lists.php?american=447767797808',
    }).on('response', function(response) {
    console.log(response) // 200
    // console.log(response.headers['content-type']) // 'image/png'
  })
})



app.get('/login', function(req, res) {
  res.render('login')
})

app.get('/recieve', function(req, res){
  res.render('recieve')
})

app.get('/view', function(req, res) {
    request({
      uri: 'http://kkmonlee.com/africa/get_all_lists.php',
    }, function(error, response, body){
      // console.log("data :", body)

      res.render('view',{
        wishlist :JSON.parse(body)
      });
    });
});

app.get("/profile", function(req, res) {
  var token = req.query.token;
  if (!token) {
    return res.status(400).json({
      success: false,
      message: 'No token provided!'
    })
  }


 yotiClient.getActivityDetails(token)
    .then(function(profile) {
      if (!profile.getOutcome()) {
        res.status(500).json({
          success: false,
          message: 'Got false from getOutcome'
        })
      } else {
        var userInfo = profile.getUserProfile()
        var selfie = userInfo.selfie
        var nationality = userInfo.nationality
        res.render('profile', {
            userInfo : userInfo,
            selfie: selfie,
            nationality: nationality

       })
      }

   })
    .catch(function(error) {
      var prettyError = new Error(error).toString()
      res.status(500).json({
        success: false,
        message: 'Unable to decrypt token :(',
        error: prettyError
      })
    })
})

// SERVER SETUP


var server = http.createServer(app);
server.listen(3005, function() {
  console.log('The app is now running on port 3005');
})

// app.get('/wishlist', function(req, res){
//   // var wishlist = globalWishlist
//   // globalWishlist = null
//   res.render('wishlist')
// })

app.get('/getuserwishlist/number/:number', function(req, res){
  console.log("pre redirect")
  console.log('in getuserlist', req.params)
  request({
      uri: 'http://kkmonlee.com/africa/get_user_lists.php?american='+ req.params.number 
    }, function(error, response, body){
       console.log("body :", JSON.parse(body))
      // res.render('view',{
      //   wishlist :JSON.parse(body)
      // });
      // globalWishlist = body
      // res.redirect('wishlist')
    })
})