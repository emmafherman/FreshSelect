/**
 * Created by caidiphillips on 4/22/17.
 */

import java.io.File;

import javax.swing.*;
import org.openqa.selenium.ie.InternetExplorerDriver;
import org.openqa.selenium.support.ui.WebDriverWait;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.Select;
import org.openqa.selenium.JavascriptExecutor;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import javax.swing.JOptionPane;
import org.openqa.selenium.By;
import org.openqa.selenium.WebElement; //used to find elements
import java.io.*;

public class Test {

	public static final String ENVIRONMENT = "freshselect.000webhostapp.com/";
	static WebDriver driver = new ChromeDriver();
	static String testUser = "emma.herman";  //Emma's login
	static String testPass = "cutie911";     //Emma's login
	static String badUser1 = "000000000";    //no "P01..."
	static String badUser2 = "P0";          //wrong
	static String badUser3 = "";             //too short
	static String id = "P01000000";
	static String pass, user;

	public static void main(String args[]) {
		//tests login, registration, house info, and final sorted web pages
		registerUser();
		login(); //needs to come after registration so you are logged in as an
		houseSelection();
	}


	public static void registerUser() {
		//String URL = "http://" + ENVIRONMENT + "registerationPage.php";
		driver.get("https://freshselect.000webhostapp.com/registrationPage.php");

		//tests boundries of usernames (should only be Prin ID)
		WebDriverWait wait = new WebDriverWait(driver, 4000);
		wait.until(ExpectedConditions.visibilityOfElementLocated((By.name
				("prinId"))));
		driver.findElement(By.name("prinId")).sendKeys(badUser1); //fails
		submit();
		back();
		driver.findElement(By.name("prinId")).clear();
		driver.findElement(By.name("prinId")).sendKeys(badUser2); //fails
		submit();
		back();
		driver.findElement(By.name("prinId")).clear();
		driver.findElement(By.name("prinId")).sendKeys(badUser3); //fails
		submit();
		back();
		driver.findElement(By.name("prinId")).sendKeys(id); //works
		submit();
		back();

		//CHECK FIRST NAME
		 //WebDriverWait wait = new WebDriverWait(driver, 4000);
		wait.until(ExpectedConditions.visibilityOfElementLocated((By.name
				("firstName"))));
		driver.findElement(By.name("firstName")).sendKeys("Selenium"); //works
		submit();
		back();
		//CHECK LAST NAME
		//WebDriverWait wait = new WebDriverWait(driver, 4000);
		wait.until(ExpectedConditions.visibilityOfElementLocated((By.name
				("lastName"))));
		driver.findElement(By.name("lastName")).sendKeys(); //fails - nothing
		// there
		submit();
		back();
		// selenium.click("Back");    //go back registration to page
		driver.findElement(By.name("lastName")).sendKeys("Test"); //works
		submit();
		back();
		//CHECK GENDER

		submit();
		back();
		Select dropdown = new Select(driver.findElement(By.name("gender")));
		dropdown.selectByIndex(2);  //fails - nothing selected
		submit();
		back();

		//CHECK FRESH HOUSE
		submit();
		back();
		dropdown = new Select(driver.findElement(By.name("freshHouse")));
		dropdown.selectByIndex(1);  //works - same with "Rackham"
		submit();
		back();

		//CHECK USERNAME
		wait.until(ExpectedConditions.visibilityOfElementLocated((By.name
				("newUser"))));
		driver.findElement(By.name("newUser")).sendKeys(""); //fails - empty
		submit();
		back();
		wait.until(ExpectedConditions.visibilityOfElementLocated((By.name
				("newUser"))));
		driver.findElement(By.name("newUser")).sendKeys("selenium.test");
		//works! anything goes
		submit(); //works!
		back();

		//CHECK PASSWORDS
		driver.findElement(By.name("newPwd")).sendKeys(""); //nothing
		submit();
		back();
		driver.findElement(By.name("newPwd")).sendKeys("unicorn");
		driver.findElement(By.name("confirmPwd")).sendKeys("poop"); //wrong -
		// mismatch
		submit();
		back();
		driver.findElement(By.name("newPwd")).sendKeys("unicorn");  //works
		driver.findElement(By.name("confirmPwd")).sendKeys("unicorn");
		submit(); //works

		//confirm registration
	//	reportNewUser(user, "New user is registered.");
	}

	public static void login() {
		//pass = getPassword();
		//String URL = "http://" + ENVIRONMENT + "login.php";//goes to log-in page
		driver.get("https://freshselect.000webhostapp.com/login.php");

		// logs in with pre-established user name and password
		WebDriverWait wait = new WebDriverWait(driver, 4000);
		wait.until(ExpectedConditions.visibilityOfElementLocated((By.name
				("login"))));
		driver.findElement(By.name("login")).sendKeys("hello"); // fails
		submit();
		back();
		driver.findElement(By.name("login")).clear();
		driver.findElement(By.name("login")).sendKeys("selenium.test"); // works
		submit();
		back();

		driver.findElement(By.name("password")).sendKeys("poop"); // fails
		submit();
		back();
		driver.findElement(By.name("password")).clear();
		driver.findElement(By.name("password")).sendKeys("unicorn"); //works

		WebElement element = driver.findElement(By.name("submit"));
		JavascriptExecutor executor = (JavascriptExecutor) driver;
		executor.executeScript("arguments[0].click();", element);
	}


	public static void submit() {
		WebElement element = driver.findElement(By.name("submit"));
		JavascriptExecutor executor = (JavascriptExecutor) driver;
		executor.executeScript("arguments[0].click();", element);
	}

	public static void back() {
		WebElement element = driver.findElement(By.id
				("back"));
		JavascriptExecutor executor = (JavascriptExecutor) driver;
		executor.executeScript("arguments[0].click();", element);
	}

	public static String getPassword() {
		final JFrame parent = new JFrame();
		JButton button = new JButton();
		String password = JOptionPane.showInputDialog(parent, "What is " +
				user + "'s password?", null);
		return password;
	} //GetPassword

	public static String getNewID() {
		final JFrame parent = new JFrame();
		JButton button = new JButton();
		String password = JOptionPane.showInputDialog(parent, "Enter Prin ID",
				null);
		return testUser;
	} //getNewId

	public static void reportNewUser(String userName, String Title) {
		JOptionPane.showMessageDialog(null, userName, Title,
				JOptionPane.INFORMATION_MESSAGE);
	}

	 public static void houseSelection() {
	 String URL = "https://freshselect.000webhostapp.com/houseSelectionPage.php";
	 driver.get(URL);
	 submit(); //fails because nothing has been selected


	 driver.findElement(By.name("prinId")).sendKeys(id); //works

	 Select dropdown = new Select(driver.findElement(By.name("choice1")));
	 dropdown.selectByIndex(1);

	 dropdown = new Select(driver.findElement(By.name("choice2")));
	 dropdown.selectByIndex(7);

	 dropdown = new Select(driver.findElement(By.name("choice3")));
	 dropdown.selectByIndex(4);

	 dropdown = new Select(driver.findElement(By.name("choiceAny")));
	 dropdown.selectByIndex(1);

	 submit(); // should fail

	 driver.findElement(By.name("prinId")).sendKeys(id); //works

	 dropdown = new Select(driver.findElement(By.name("choice1")));
	 dropdown.selectByIndex(1);

	 dropdown = new Select(driver.findElement(By.name("choice2")));
	 dropdown.selectByIndex(7);

	 dropdown = new Select(driver.findElement(By.name("choice3")));
	 dropdown.selectByIndex(4);

	 dropdown = new Select(driver.findElement(By.name("choice4")));
	 dropdown.selectByIndex(6);

	 dropdown = new Select(driver.findElement(By.name("choiceAny")));
	 dropdown.selectByIndex(1);
	 submit(); // Should work


	 }
}

