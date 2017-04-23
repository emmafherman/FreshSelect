package FreshSelectWebDriver;

import javax.swing.*;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.WebDriverWait;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.JavascriptExecutor;
import org.openqa.selenium.chrome.ChromeDriver;
import javax.swing.JOptionPane;
import org.openqa.selenium.By;
import org.openqa.selenium.WebElement; //used to find elements

public class WebsiteTests {

    public static final String ENVIRONMENT = "freshselect.000webhostapp.com/";
    //static WebDriver driver = new ChromeDriver();
    static String login = "test.test"; //test user
    static String first, last = "test";      //first
    static String pass, user;

    public static void main(String args[]) {

        //tests login, registration, house info, and final sorted web pages.
        login();
        //registerUser();
        //submit();
        //houseSelection();
    }

    public static void login() {
        pass = getPassword();
        String URL = "http://" + ENVIRONMENT + "login.php";//goes to log-in page
        driver.get(URL);

        // logs in with pre-established user name and password
        WebDriverWait wait = new WebDriverWait(driver, 4000);
        wait.until(ExpectedConditions.visibilityOfElementLocated((By.id
                ("login"))));
        driver.findElement(By.name("login")).sendKeys(testUser);
        //driver.findElement(By.id("password")).sendKeys(getPassword());
        driver.findElement(By.name("password")).sendKeys(testPass);

        WebElement element = driver.findElement(By.name("submit"));
        JavascriptExecutor executor = (JavascriptExecutor) driver;
        executor.executeScript("arguments[0].click();", element);
    }

    public static void registerUser() {
        String URL = "http://" + ENVIRONMENT + "registerationPage.php";
        driver.get(URL);

        //tests boundries of usernames (should only be Prin ID)
        WebDriverWait wait = new WebDriverWait(driver, 4000);
        wait.until(ExpectedConditions.visibilityOfElementLocated((By.id
                ("prinId"))));
        driver.findElement(By.id("prinId")).sendKeys(badUser1); //fails
        submit();
        driver.findElement(By.id("prinId")).sendKeys(badUser2); //fails
        submit();
        driver.findElement(By.id("prinId")).sendKeys(badUser3); //fails
        submit();
        driver.findElement(By.id("prinId")).sendKeys(testUser); //works
        submit();

        //tests first name - can't be empty
        WebDriverWait wait = new WebDriverWait(driver, 4000);
        wait.until(ExpectedConditions.visibilityOfElementLocated((By.id
                ("firstName"))));
        driver.findElement(By.id("firstName")).sendKeys("Emma"); //works

        //tests last name - can't be empty
        WebDriverWait wait = new WebDriverWait(driver, 4000);
        wait.until(ExpectedConditions.visibilityOfElementLocated((By.id
                ("lastName"))));
        driver.findElement(By.id("lastName")).sendKeys(); //fails
        submit();
        selenium.click("Back");    //go back registration to page
        driver.findElement(By.id("lastName")).sendKeys("Herman"); //works

        //gender "M" or "F" required
        wait.until(ExpectedConditions.visibilityOfElementLocated((By.id
                ("gender"))));
        driver.findElement(By.id("gender")).sendKeys("J"); //fails
        submit();
        selenium.click("Back");
        driver.findElement(By.id("gender")).sendKeys("F"); //works

        //enter new password and confirm
        driver.findElement(By.id("newPwd")).sendKeys(getPassword());
        driver.findElement(By.id("ConfirmPwd")).sendKeys(); //wrong - mismatch
        submit();
        selenium.click("Back");
        driver.findElement(By.id("newPwd")).sendKeys(getPassword());
        driver.findElement(By.id("ConfirmPwd")).sendKeys(getPassword());
        submit(); //works

        //confirm registration
        reportNewUser(user, "New user is registered.");
    }

    public static void submit() {
        WebElement element = driver.findElement(By.id("submit"));
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

    public static void houseSelection(){
        String URL = "https://freshselect.000webhostapp.com/HouseSelection";
        driver.get(URL);
        submit(); //fails because nothing has been selected

        //tests house selection boundaries
        WebDriverWait wait = new WebDriverWait(driver, 4000);
        wait.until(ExpectedConditions.visibilityOfElementLocated((By.id
                ("houseChoice1"))));
        driver.findElement(By.id("houseChoice1")).sendKeys("Howard");  //works
        wait.until(ExpectedConditions.visibilityOfElementLocated((By.id
                ("houseChoice2"))));
        submit();    //fails because not all choices have been filled
        driver.findElement(By.id("houseChoice2")).sendKeys("Joeee");   //fails
        submit();    //fails because "Joeee" is an invalid house

        wait.until(ExpectedConditions.visibilityOfElementLocated((By.id
                ("houseChoice3"))));
        driver.findElement(By.id("houseChoice3")).sendKeys("Ferg");
        submit();    //fails because the house is not a female house option

        wait.until(ExpectedConditions.visibilityOfElementLocated((By.id
                ("houseChoice5"))));
        driver.findElement(By.id("houseChoice5")).sendKeys("Any");
        submit();     //works because "Any" trumps all other selections
    }
}