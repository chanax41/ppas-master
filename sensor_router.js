// Sensor_router.js

var express = require("express");
var router = express.Router();
var Sensor = require("./sensor_model");
var a, t, h, gh, Address, Qdate;

// GET all
router.get("/", (req, res) => {
    Sensor.find().exec((err, data) => {
        if (err) return res.status(400).send(err);
        res.status(200).send(data);
    });
});

// GET BY id
router.get("/:_id", (req, res) => {
    Sensor.findById(req.params._id).exec((err, data) => {
        if (err) return res.status(400).send(err);
        res.status(200).send(data);
    });
});
// GET BY ADDRESS
router.get('/name/:Address', (req, res) => {
    Sensor.find({ "Address": req.params.Address }).exec((err, data) => {
        if (err) return res.status(400).send(err);
        res.status(200).send(data);
    });
});

// GET BY DATE
router.get('/date/:Qdate', (req, res) => {
    Sensor.find({ "Date": req.params.Qdate }).exec((err, data) => {
        if (err) return res.status(400).send(err);
        res.status(200).send(data);
    });
});
// GET BY ADDRESS&DATE
router.get('/query/:Address/:Qdate', (req, res) => {
    Sensor.find({ "Address": req.params.Address, "Date": req.params.Qdate }).exec((err, data) => {
        if (err) return res.status(400).send(err);
        res.status(200).send(data);
    });
});

// POST (create new data)
router.post("/:a/:t/:h/:gh", (req, res) => {
    var strParseWriteReq = JSON.stringify(req.params)
    var strWriteReq = JSON.parse(strParseWriteReq)
    a = strWriteReq.a
    t = Number(strWriteReq.t)
    h = Number(strWriteReq.h)
    gh = Number(strWriteReq.gh)

    var date_ob = new Date();
    console.log(date_ob);
    var date = ("0" + date_ob.getDate()).slice(-2);
    // current month
    var month = ("0" + (date_ob.getMonth() + 1)).slice(-2);
    // current year
    var year = date_ob.getFullYear();
    // current hours
    var hours = date_ob.getHours();
    // current minutes
    var minutes = date_ob.getMinutes();
    // current seconds
    var seconds = date_ob.getSeconds();
    // prints date & time in YYYY-MM-DD HH:MM:SS format
    // Will display time in 10:30:23 format
    var formattedTime = hours + ":" + minutes + ":" + seconds;
    var formattedDate = date + "-" + month + "-" + year;

    var obj = new Sensor({
        "Address": a,
        "Temperature": t,
        "AirHumidity": h,
        "GHumidity": gh,
        "Date": formattedDate,
        "Time": formattedTime,
        "Timestamp": date_ob
    });
    console.log(obj);
    obj.save((err, data) => {
        if (err) return res.status(400).send(err);
        res.status(200).send("เพิ่มข้อมูลเรียบร้อย");
    });
});

// PUT (update current data)
router.put("/:_id", (req, res) => {
    Sensor.findByIdAndUpdate(req.params._id, req.body, (err, data) => {
        if (err) return res.status(400).send(err);
        res.status(200).send("อัพเดทข้อมูลเรียบร้อย");
    });
});

// DELETE (delete 1 data)
router.delete("/:_id", (req, res) => {
    Sensor.findByIdAndDelete(req.params._id, (err, data) => {
        if (err) return res.status(400).send(err);
        res.status(200).send("ลบข้อมูลเรียบร้อย");
    });
});

module.exports = router;