int forceAnalog = A0;

void setup() {
  // Start serial at 9600 baud
  Serial.begin(9600);
}

void loop() {
  int sensorValue = analogRead(forceAnalog);
  
  // Convert the analog reading (which goes from 0 - 1023) to a voltage (0 - 5V):
  float voltage = sensorValue * (12.0 / 1023.0);

  // Print out the value you read:
  Serial.println(voltage);

  // Wait 100 milliseconds
  delay(100);
}
