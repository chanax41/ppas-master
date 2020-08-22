// index.js

var express = require("express");
var cors = require("cors");
var mongoose = require("mongoose");
var bodyParser = require("body-parser");
var t, h
const path = require('path');
var mongo_uri = "mongodb+srv://adminx:UlGdHV4P5g4DEMOY@cluster-test-vgzl8.gcp.mongodb.net/Mongo-Test?retryWrites=true&w=majority";
var Sensor = require("./sensor_router");

mongoose.Promise = global.Promise;
mongoose.connect(mongo_uri, { useNewUrlParser: true, useUnifiedTopology: true }).then(
    () => {
        console.log("[success] task 2 : connected to the database ");
    },
    error => {
        console.log("[failed] task 2 " + error);
        process.exit();
    }
);

var app = express();

app.use(cors());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

//ตั้งค่าให้ข้อมูลPublic
app.use('/static', express.static('public'))

var port = process.env.PORT || 4000;

app.listen(port, () => {
    console.log("[success] task 1 : listening on port " + port);
});

app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');

/* GET home page. */
app.get('/', function(req, res, next) {
    res.locals.pageData = {
        title: 'Home Page'
    }
    res.render('layout')
})

// path สำหรับ MongoDB ของเรา
app.use("/api/sensor", Sensor);

app.use((req, res, next) => {
    var err = new Error("ไม่พบ path ที่คุณต้องการ");
    err.status = 404;
    next(err);
});