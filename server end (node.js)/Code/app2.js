var express = require("express");
var app = express();
var path = require("path");
var port = 3000;


var bodyParser = require('body-parser');
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

var mongoose = require("mongoose");
mongoose.Promise = global.Promise;
mongoose.connect("mongodb://localhost:27017/demo");

var nameSchema = new mongoose.Schema({
  fname: String,
  lame: String,
  mobno: Number,  
  city: String,
  email: String,  
  psw : String
});

var users = mongoose.model("users",nameSchema);

app.get('/',function(req,res){
  res.sendFile(path.join(__dirname+'/home.html'));
  //__dirname : It will resolve to your project folder.
});

app.get('/signup',function(req,res){
  res.sendFile(path.join(__dirname+'/signup.html'));
});

app.get('/login1',function(req,res){
  res.sendFile(path.join(__dirname+'/loginl.html'));
});

app.get('/trial',function(req,res){
  res.sendFile(path.join(__dirname+'/trial.html'));
});


app.post('/addname', function(req, res){
  new users({
  fname : req.body.fname,
  lname : req.body.lname,
  mobno: req.body.mobno,
  city : req.body.city ,
  email: req.body.email,
  psw : req.body.psw 
  }).save(function(err, doc) {
	  if(err) res.json(err);
	  else
	  res.send('successfully inserted!');
	  console.log('User registered');

  });
});


app.post('/auth', function(req, res)
{
    // new code should come over here
    users.findOne({email: req.body.email, psw: req.body.psw}, function(err, user){
        if(err) {
            console.log(err);
        }
        else if(user){
			res.send('Login Successfull!!');
			console.log('Valid');
			
        }
        else {
			res.send('Invalid Username/Password :( Try Again.');
            console.log('Invalid');
        }
    });

});
  
app.listen(3000);

console.log("Running at Port 3000");



