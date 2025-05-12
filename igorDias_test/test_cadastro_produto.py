from selenium import webdriver
from selenium.webdriver.common.by import By
import time

driver = webdriver.Chrome()


driver.get("C:/Users/igor_s_dias/Documents/GitHub/IgorDias_Desen_Sistemas_Tarde/igorDias_test/produto.html")

time.sleep(1)

code_input = driver.find_element(By.ID, "code_product")
code_input.send_keys("21789")
time.sleep(1)

desc_input = driver.find_element(By.ID,"desc")
desc_input.send_keys("Estabilizador NoBreak 180-220V")
time.sleep(1)

brand_input = driver.find_element(By.ID, "brand")
brand_input.send_keys("Yamaha")
time.sleep(1)

price_input = driver.find_element(By.ID, "price")
price_input.send_keys("749,99")
time.sleep(1)

qtde_input = driver.find_element(By.ID, "qtde")
qtde_input.send_keys(150)

submit_button = driver.find_element(By.CSS_SELECTOR, "button[type='submit']")
submit_button.click()



time.sleep(100)


driver.quit()
