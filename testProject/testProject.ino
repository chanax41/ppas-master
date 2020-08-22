#include <ESP8266WiFi.h>
#include "DHT.h"
#include <WiFiClientSecureAxTLS.h>

const char *ssid = "Redmi"; //เปลี่ยนเป็นชื่อ wifi
const char *password = "#asd1234"; //เปลี่ยนเป็นรหัส wifi

#define host "192.168.43.39" //เปลี่ยนเป็น Ip address
#define port 4000
#define DHTPIN D4
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);

String Address = "A007"; //ที่อยู่ของ Sensor
String response;
float value;
String _str, _res, _a, _t, _h, _Gh;
float t, h, Gh;

//Soil Moisture Sensor
const int analogInPin = A0;//ประกาศตัวแปร ให้ analogPin แทนขา analog ขาที่0
int sensorValue = 0; 


void setup() {
  Serial.begin(115200);
  delay(10);
  // We start by connecting to a WiFi network
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.println("Project Started!");
  dht.begin();
}

void loop() {
  delay(10000);
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  float f = dht.readTemperature(true);

  if (isnan(h) || isnan(t) || isnan(f)) {
    Serial.println("Failed to read from DHT sensor!");
    return;
  }
  float hif = dht.computeHeatIndex(f, h);
  float hic = dht.computeHeatIndex(t, h, false);
  Serial.print("Humidity: ");
  Serial.print(h);
  Serial.println(" %\t");
  Serial.print("Temperature: ");
  Serial.print(t);
  Serial.println(" *C ");
  //EndDHT11
  
  //Soil Moisture Sensor
  Gh = analogRead(analogInPin);  //อ่านค่าสัญญาณ analog ขา0 ที่ต่อกับ Soil Moisture Sensor Module v1
  if (isnan(Gh)) {
    Serial.println("Failed to read from Soil Moisture sensor!");
    return;
  }
  Serial.print("GHumidity is = "); // พิมพ์ข้อมความส่งเข้าคอมพิวเตอร์ "GHumidity is = "
  Serial.println(Gh); // พิมพ์ค่าของตัวแปร Gh
  Serial.println("----------------------------------------");
    
  if (isnan(h) || isnan(t) || isnan(f) || isnan(Gh)) {
    Serial.println("ERROR : Can't Add Data to MongoDB.");
    return;
  }else{
    WriteData(Address, t, h, Gh);
    delay(40000);
  }
  Serial.print("connecting to ");
  Serial.println(host);

  // Use WiFiClient class to create TCP connections
  WiFiClient client;
  if (!client.connect(host, port)) {
    Serial.println("connection failed");
    return;
  }

}

String WriteData (String A, float t, float h, float Gh) {
  _a = String(A);
  _t = String(t);
  _h = String(h);
  _Gh = String(Gh);

  WiFiClient client;
  if (client.connect(host, port)) {
  
    _str = "POST /api/sensor/"; 
    _str += _a;
    _str += "/";    
    _str += _t;
    _str += "/";
    _str += _h;
    _str += "/";
    _str += _Gh;
    _str += " HTTP/1.1\r\n";
    _str += "Host: ";
    _str += host;
    _str += ":";
    _str += port;
    _str += "\r\n";
    _str += "Connection: keep-alive\r\n\r\n";

    client.print(_str);

    delay(1000);
    Serial.println("Add Data to MongoDB Success");
    Serial.println("----------------------------------------");
    while (client.available()) {
      _res = client.readStringUntil('\r');
    }
    return _res;
  } else {
    Serial.println("ERROR : Can't Add Data to MongoDB.");
    Serial.println("----------------------------------------");
  }
}
