import java.io.*;
import java.util.Random;
import java.util.Scanner;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.WebDriverWait;
import org.openqa.selenium.support.ui.Select;
import org.openqa.selenium.JavascriptExecutor;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.By;
import org.openqa.selenium.WebElement; //used to find elements

public class SortingTest {
	static String login = "test.test"; //test user
	static String first, last = "test";//first
	static String id, pass, user;


	public static void main(String args[]) throws FileNotFoundException {
//set up driver
		WebDriver driver = new ChromeDriver();
		WebDriverWait wait = new WebDriverWait(driver, 4000);
		//Scanner in = new Scanner(new FileReader("IDs"));
		registerAndSelect(driver);
	}

	public static void registerAndSelect(WebDriver chrome) {
		String user;
		user = "user";
		int i = 0;
		int ranNum;
		Random rand = new Random();

//Read
		String line = null;

		try {
			Scanner in = new Scanner(new FileReader("IDs"));
			//BufferedReader bufferedReader = new BufferedReader(fileReader);

//read in ID's
			while (in.hasNextLine()){
				id = in.nextLine();

				chrome.get("https://freshselect.000webhostapp.com/registrationPage.php");
				chrome.findElement(By.name("prinId")).sendKeys(id);                  //inputs test id
				chrome.findElement(By.name("firstName")).sendKeys("first");          //first
				chrome.findElement(By.name("lastName")).sendKeys("last");            //last
				Select dropdown = new Select(chrome.findElement(By.name("gender"))); //male
				dropdown.selectByIndex(1);
				dropdown = new Select(chrome.findElement(By.name("freshHouse")));    //anderson
				dropdown.selectByIndex(1);

//new username
				user = user + Integer.toString(i);
				chrome.findElement(By.name("newUser")).sendKeys(user);             //user
				chrome.findElement(By.name("newPwd")).sendKeys("unicornpoop");     //password
				chrome.findElement(By.name("confirmPwd")).sendKeys("unicornpoop"); //confirm password
				submit(chrome);

//login

				chrome.get("https://freshselect.000webhostapp.com/login.php");
				chrome.findElement(By.name("login")).sendKeys(user);
				chrome.findElement(By.name("password")).sendKeys("unicornpoop");
				submit(chrome);

//select houses
				chrome.get("https://freshselect.000webhostapp.com/houseSelectionPage.php");
				chrome.findElement(By.name("prinId")).sendKeys(id);
				dropdown = new Select(chrome.findElement(By.name("choice1")));  //choice 1
				dropdown.selectByIndex(rand.nextInt(8) + 1);
				dropdown = new Select(chrome.findElement(By.name("choice2")));  //choice 2
				dropdown.selectByIndex(rand.nextInt(8) + 1);
				dropdown = new Select(chrome.findElement(By.name("choice3")));  //choice 3
				dropdown.selectByIndex(rand.nextInt(8) + 1);
				dropdown = new Select(chrome.findElement(By.name("choice4")));  //choice 4
				dropdown.selectByIndex(rand.nextInt(8) + 1);
				dropdown = new Select(chrome.findElement(By.name("choiceAny"))); //choice any - no
				dropdown.selectByIndex(1);
				submit(chrome);

				i++; //next user

			}
		}
		catch(IOException e) {
		} finally {
		}
		//login as admin
		chrome.get("https://freshselect.000webhostapp.com/login.php");
		chrome.findElement(By.name("login")).sendKeys("emma.herman");
		chrome.findElement(By.name("password")).sendKeys("cutie911");
		submit(chrome);
		//see final house sorted
		chrome.get("https://freshselect.000webhostapp.com/finalHouseSortedPage.php");
	}

	public static void submit(WebDriver chrome){
		WebElement element = chrome.findElement(By.name("submit"));
		JavascriptExecutor executor = (JavascriptExecutor) chrome;
		executor.executeScript("arguments[0].click();", element);
	}
}
