import time
import random

class EngineHealthMonitor:
    def __init__(self, vehicle_id):
        self.vehicle_id = vehicle_id
        self.engine_temperature = 0
        self.rpm = 0

    def simulate_sensor_data(self):
        # Simulate engine temperature and RPM data
        self.engine_temperature = random.uniform(80, 110)
        self.rpm = random.randint(800, 3000)

    def get_engine_health(self):
        # Simulate engine health analysis based on sensor data
        if self.engine_temperature > 100:
            return "Overheating detected"
        elif self.rpm < 1000:
            return "Low RPM detected"
        else:
            return "Engine health is good"

# Simulating vehicle and IoT integration
vehicle_id = "vehicle123"
engine_monitor = EngineHealthMonitor(vehicle_id)

while True:
    engine_monitor.simulate_sensor_data()
    engine_health = engine_monitor.get_engine_health()

    # Simulate sending alerts to the user
    if "detected" in engine_health:
        print("ALERT:", engine_health)
        print("Recommendation: Schedule maintenance.")
    else:
        print("No issues detected. Vehicle is in good condition.")

    # Simulate data collection interval
    time.sleep(5)  # Simulate a 5-second interval
