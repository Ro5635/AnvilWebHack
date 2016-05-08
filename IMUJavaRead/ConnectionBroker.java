import jssc.SerialPort;
import jssc.SerialPortList;

public class ConnectionBroker{
//This class is responsible for the connection to the IMU

	public SerialPort serialDataPort; 
	public SerialPortList portScanner;
	String[] activePorts;
	String currentString;
	
	public ConnectionBroker(int baudRate){

		//No COM port has been specified so just use the first one found on this device.
		activePorts = portScanner.getPortNames();

		System.out.println("Attempting to connect to: " + activePorts[0]);
		serialDataPort = new SerialPort(activePorts[0]);

		try{
			serialDataPort.openPort();
			//If the start and stop bits are changed alter them bellow:
			serialDataPort.setParams(baudRate,8,1,0);

		}catch(Exception e){
			System.out.println("The settings where not correct!! \r Exception: " + e);
		}

	}

	public static String[] getPortName(){
		SerialPortList staticPortScanner = new SerialPortList() ;
		return staticPortScanner.getPortNames();

	}

	public ConnectionBroker(String selectedComPortName, int baudRate){

		System.out.println("Attempting to connect to: " + selectedComPortName);
		serialDataPort = new SerialPort(selectedComPortName);

		try{
			serialDataPort.openPort();
			//If the start and stop bits are changed alter them bellow:
			serialDataPort.setParams(baudRate,8,1,0);

		}catch(Exception e){
			System.out.println("The settings where not correct!! Could not connect to " + selectedComPortName + " \r\n Exception: " + e);
		}

	}

	public String getSerialDataIn(){
		
		try{

			if(serialDataPort.getInputBufferBytesCount() > 0){
				return  serialDataPort.readString();
				
			}
		}catch(Exception e){
			System.out.println("Failed to read from the Serial Port, Exception: " + e);
		}
		return null ;
	}


	public void sendSerialData(String payload){
		//This method transmits the data on the open serial line

		try{
			serialDataPort.writeString(payload);
		}catch(Exception e){
			System.out.println("Unable to transmit string, unknown failure.");
		}

	}


}