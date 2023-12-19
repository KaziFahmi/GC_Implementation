from selenium import webdriver
from selenium.webdriver.common.by import By
# Open a Chrome browser
driver = webdriver.Chrome()
import time
# Navigate to your website
driver.get("http://localhost/GC_Implementation/Users/index.php")


donor_button = driver.find_element(By.XPATH, "/html/body/div/div/a[1]")
donor_button.click()

for i in range(100):
    username_field = driver.find_element(By.XPATH, "/html/body/form/input[1]")
    username_field.send_keys("SYHaque")

    password=driver.find_element(By.XPATH, "/html/body/form/input[2]")
    password.send_keys("1234")


    login=driver.find_element(By.XPATH, "/html/body/form/input[3]")
    login.click()

    pay_through_us=driver.find_element(By.XPATH, "/html/body/a[4]")
    pay_through_us.click()

    payment=driver.find_element(By.XPATH, "/html/body/form/input[1]")
    payment.send_keys("123")

    donate_button=driver.find_element(By.XPATH, "/html/body/form/input[2]")
    donate_button.click()
    logout=driver.find_element(By.XPATH,"/html/body/a[1]/button");
    logout.click()


time.sleep(3)


# Find an element by ID

driver.quit()
