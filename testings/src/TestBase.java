import org.junit.jupiter.api.BeforeAll;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class TestBase {
    protected static WebDriver driver;
    private static String baseUrl;

    public static void main(String[] args) throws InterruptedException {
        setUp();
        RegistrationTest();
        // LoginTest();
        // AddNewEntry();
        // DeleteDictionary();
        // EditUserInfo();
        tearDown();
    }

    @BeforeAll
    public static void setUp() {
        driver = new ChromeDriver();
        baseUrl = "http://localhost:5500/frontend/index.html";
        driver.get(baseUrl);
    }

    public static void tearDown() {
        driver.quit();
    }

    public static void RegistrationTest() throws InterruptedException {
        driver.manage().window().maximize();
        driver.get(baseUrl);
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[1]/nav/div/a")).click();
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div/form/div[1]/input")).sendKeys("Fatima");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div/form/div[2]/input")).sendKeys("Ademovic");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div/form/div[3]/input"))
                .sendKeys("fatima.edna@stu.ibu.edu.ba");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div/form/div[4]/input"))
                .sendKeys("Fatima123?");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div/form/div[5]/button")).click();
        Thread.sleep(2000);
    }

    public static void LoginTest() throws InterruptedException {
        driver.manage().window().maximize();
        driver.get(baseUrl);
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[1]/nav/div/a")).click();
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[1]/a")).click();
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div[2]/form/div[1]/input"))
                .sendKeys("fatima.edna@stu.ibu.edu.ba");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div[2]/form/div[2]/input"))
                .sendKeys("Fatima123?");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div[2]/form/div[3]/button")).click();
        Thread.sleep(2000);
    }

    public static void AddNewEntry() throws InterruptedException {
        driver.manage().window().maximize();
        driver.get(baseUrl);
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[1]/nav/div/a")).click();
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[1]/a")).click();
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div[2]/form/div[1]/input"))
                .sendKeys("fatima.edna@stu.ibu.edu.ba");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div[2]/form/div[2]/input"))
                .sendKeys("Fatima123?");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div[2]/form/div[3]/button")).click();
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/button")).click();
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div[1]/div/div/div[2]/form/div[1]/input")).sendKeys("Test");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div[1]/div/div/div[2]/form/div[2]/input")).sendKeys("Test");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div[1]/div/div/div[2]/form/div[3]/input")).sendKeys("Test");
        Thread.sleep(1000);
        String imagePath = "/Users/fatimaedna/Downloads/7.gif"; // The imagePath is the path where the image is located
        driver.findElement(By.xpath("/html/body/div[2]/div[1]/div/div/div[2]/form/div[4]/input")).sendKeys(imagePath);
        Thread.sleep(1000);
        driver.findElement(By.xpath(("/html/body/div[2]/div[1]/div/div/div[3]/button[2]"))).click();
        Thread.sleep(2500);
    }

    public static void DeleteDictionary() throws InterruptedException {
        driver.manage().window().maximize();
        driver.get(baseUrl);
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[1]/nav/div/a")).click();
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[1]/a")).click();
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div[2]/form/div[1]/input"))
                .sendKeys("fatima.edna@stu.ibu.edu.ba");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div[2]/form/div[2]/input"))
                .sendKeys("Fatima123?");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div[2]/form/div[3]/button")).click();
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div[2]/div/div/div/button[2]")).click();
        Thread.sleep(2500);
    }

    public static void EditUserInfo() throws InterruptedException {
        driver.manage().window().maximize();
        driver.get(baseUrl);
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[1]/nav/div/a")).click();
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[1]/a")).click();
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div[2]/form/div[1]/input"))
                .sendKeys("fatima.edna@stu.ibu.edu.ba");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div[2]/form/div[2]/input"))
                .sendKeys("Fatima123?");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[2]/div/div/div[2]/div/div[2]/form/div[3]/button")).click();
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[1]/nav/div/div[2]/a")).click();
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[3]/div/div/form/div[1]/input")).clear();
        driver.findElement(By.xpath("/html/body/div[3]/div/div/form/div[1]/input")).sendKeys("Ime");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[3]/div/div/form/div[2]/input")).clear();
        driver.findElement(By.xpath("/html/body/div[3]/div/div/form/div[2]/input")).sendKeys("Prezime");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[3]/div/div/form/div[3]/input")).clear();
        driver.findElement(By.xpath("/html/body/div[3]/div/div/form/div[3]/input")).sendKeys("noviemail@hotmail.com");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[3]/div/div/form/div[4]/input")).clear();
        driver.findElement(By.xpath("/html/body/div[3]/div/div/form/div[4]/input")).sendKeys("Fatima123!?");
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[3]/div/div/form/button[1]")).click();
        Thread.sleep(1000);
        driver.findElement(By.xpath("/html/body/div[1]/nav/div/div[2]/a")).click();
        Thread.sleep(2500);
    }
}
