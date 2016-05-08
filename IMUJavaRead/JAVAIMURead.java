/**
*	Reads the data stream from the IMU, sends then to to the web 'game'.
*
*/
import java.net.*;

public class JAVAIMURead {

	public static void main(String[] args) {
		ConnectionBroker cb = new ConnectionBroker(57600);

		String tests ;
		while(true){
			tests = cb.getSerialDataIn();
		

			if(tests != null){
				//send to weserver after split
				//System.out.println(tests);
				try{
					Thread.sleep(50);
					String[] parts = tests.split(",");
					String part1 = parts[0]; //yaw

					parts = part1.split("=");
					String Yawvalue = parts[1]; //yaw
					System.out.println(Yawvalue);

					try {
					    // URL myURL = new URL("http://anvilhack.zapto.org/ajax/setzvalue/?zvalue=" + Yawvalue);
					    // URLConnection myURLConnection = myURL.openConnection();
					    // myURLConnection.connect();

					    CrunchifyCallUrlAndGetResponse CrunchyLib = new CrunchifyCallUrlAndGetResponse();
					    CrunchyLib.callURL("http://anvilhack.zapto.org/ajax/setzvalue/?zvalue=" + Yawvalue);
					} 
					catch (Exception e) { 
					    // new URL() failed
					    System.out.println("Web Request Failed!");
					} 


				}catch (Exception e) {
					//bad handaling...
				}
			}
		}

	}


}