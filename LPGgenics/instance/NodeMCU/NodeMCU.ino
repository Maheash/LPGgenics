#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

// Update HOST URL here

#define HOST "192.168.43.26"          // Enter HOST URL without "http:// "  and "/" at the end of URL

#define WIFI_SSID "F.R.I.D.A.Y"            // WIFI SSID here                                   
#define WIFI_PASSWORD "maheashkumar"        // WIFI password here

// Declare global variables which will be uploaded to server

int sensor=A0;
int val;

String sendval, postData;


void setup() {

     
Serial.begin(115200); 
Serial.println("Communication Started \n\n");  
delay(1000);
  

pinMode(LED_BUILTIN, OUTPUT);     // initialize built in led on the board
 


WiFi.mode(WIFI_STA);           
WiFi.begin(WIFI_SSID, WIFI_PASSWORD);                                     //try to connect with wifi
Serial.print("Connecting to ");
Serial.print(WIFI_SSID);
while (WiFi.status() != WL_CONNECTED) 
{ Serial.print(".");
    delay(500); }

Serial.println();
Serial.print("Connected to ");
Serial.println(WIFI_SSID);
Serial.print("IP Address is : ");
Serial.println(WiFi.localIP());    //print local IP address

delay(30);
}



void loop() { 

HTTPClient http;    // http object of clas HTTPClient
WiFiClient wclient; // wclient object of clas HTTPClient    

  val=0;
  val=analogRead(sensor);
  if(val>0){
  Serial.print("\nGas Value : ");
  Serial.print(val);
  sendval=String(val);

  postData = "sendval=" + sendval;

// We can post values to PHP files as  example.com/dbwrite.php?name1=val1&name2=val2&name3=val3
// Hence created variable postDAta and stored our variables in it in desired format
// For more detials, refer:- https://www.tutorialspoint.com/php/php_get_post.htm

// Update Host URL here:-  
  
http.begin(wclient, "http://192.168.43.26/instance/dbwrite.php");              // Connect to host where MySQL databse is hosted
http.addHeader("Content-Type", "application/x-www-form-urlencoded");            //Specify content-type header

  
 
int httpCode = http.POST(postData);   // Send POST request to php file and store server response code in variable named httpCode

// if connection eatablished then do this
if (httpCode == 200) { Serial.println("Values uploaded successfully."); Serial.println(httpCode); 
String webpage = http.getString();    // Get html webpage output and store it in a string
Serial.println(webpage + "\n"); 
}

// if failed to connect then return and restart

else { 
  Serial.println(httpCode); 
  Serial.println("Failed to upload values. \n"); 
  http.end(); 
  return; }}

delay(300); 
digitalWrite(LED_BUILTIN, LOW);
delay(300);
digitalWrite(LED_BUILTIN, HIGH);

val=0;


}
