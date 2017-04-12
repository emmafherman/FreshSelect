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
    static WebDriver driver = new ChromeDriver();
    static String testUser = "P01093807";
    static String badUser1 = "000000000";   //no "P01..."
    static String badUser2 = "P01";         //too short
    static String badUser3 = "P0102388*";   //no special characters
    static String pass, user;

    public static void main(String args[]) {

        //tests login, registration, house info, and final sorted web pages.
        login();
        registerUser();
        submit();
        houseSelection();
    }

    public static void login() {
        pass = getPassword();
        String URL = "http://" + ENVIRONMENT;     //goes to log-in page
        driver.get(URL);

        // logs in with pre-established user name and password
        WebDriverWait wait = new WebDriverWait(driver, 4000);
        wait.until(ExpectedConditions.visibilityOfElementLocated((By.id
                ("username"))));
        driver.findElement(By.id("username")).sendKeys(testUser);
        driver.findElement(By.id("password")).sendKeys(getPassword());

        WebElement element = driver.findElement(By.className("signinbutton"));
        JavascriptExecutor executor = (JavascriptExecutor) driver;
        executor.executeScript("arguments[0].click();", element);
    }

    public static void registerUser() {
        String URL = "https://freshselect.000webhostapp.com/Registeration";
        driver.get(URL);

        //tests boundries of usernames (should only be Prin ID)
        WebDriverWait wait = new WebDriverWait(driver, 4000);
        wait.until(ExpectedConditions.visibilityOfElementLocated((By.id
                ("newUser"))));
        driver.findElement(By.id("newUser")).sendKeys(badUser1); //fails
        driver.findElement(By.id("newUser")).sendKeys(badUser2); //fails
        driver.findElement(By.id("newUser")).sendKeys(badUser3); //fails
        driver.findElement(By.id("newUser")).sendKeys(testUser); //works

        //gender "M" or "F" required
        wait.until(ExpectedConditions.visibilityOfElementLocated((By.id
                ("gender"))));
        driver.findElement(By.id("gender")).sendKeys("J"); //fails
        driver.findElement(By.id("gender")).sendKeys("F"); //works

        //enter new password and confirm
        driver.findElement(By.id("newPwd")).sendKeys(getPassword());
        driver.findElement(By.id("ConfirmPwd")).sendKeys(getPassword());
        submit();

        //confirm registration
        reportNewUser(user, "New user is registered.");
    }

    public static void submit() {
        WebElement element = driver.findElement(By.id("btnSave"));
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
    } //GetPassword

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