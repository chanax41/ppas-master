// sensor_model.js
var mongoose = require("mongoose");
const moment = require('moment-timezone');
const dateThailand = moment.tz(Date.now(), "Asia/Bangkok");
console.log(dateThailand);
var SensorSchema = mongoose.Schema({
    // กำหนด ชื่อและชนิดของ document เรา
    Address: {
        type: String,
        default: 'xxxx'
    },
    Temperature: {
        type: Number,
        default: 0
    },
    AirHumidity: {
        type: Number,
        default: 0
    },
    GHumidity: {
        type: Number,
        default: 0
    },
    Date: {
        type: String,
        default: 0
    },
    Time: {
        default: 0,
        type: String
    },
    Timestamp: {
        type: Date,
        default: dateThailand
    }
}, {
    // กำหนด collection ของ MongoDB หรือจะไม่กำหนดก็ได้
    collection: "Coconut"
});

// ถ้าไม่ได้กำหนด collection ข้างบน default จะเป็น "Sensor"
var Sensor = mongoose.model("Coconut", SensorSchema);
module.exports = Sensor;