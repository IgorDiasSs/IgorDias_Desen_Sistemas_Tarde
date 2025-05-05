from selenium import webdriver
from selenium.webdriver.common.by import By
import time

# Configuração do WebDriver (nesse exemplo,estamos usando o Chrome)
driver = webdriver.Chrome()


#Acessa a página de cadastro usando o caminho absoluto com o protocolo file://
# Certifique-se de que o caminho esta apontando para um arquivo HTML especifico

driver.get("file:///C:/Users/igor_s_dias/Documents/GitHub/IgorDias_Desen_Sistemas_Tarde/igorDias_test/index.html")


#Preenche o campo Nome

nome_input = driver.find_element(By.ID, "name")
nome_input.send_keys("Igor Dias")

#Preenche o campo CPF
cpf_input = driver.find_element(By.ID, "cpf")
cpf_input.send_keys("12345678912")


#Preenche o campo Endereço
address_input = driver.find_element(By.ID, "address")
address_input.send_keys("Rua das Flores, 123")

#Preenche o campo Telefone
phone_input = driver.find_element(By.ID, "phone")
phone_input.send_keys("11987654321")

#Clica no botão de Cadastrar 
submit_button = driver.find_element(By.CSS_SELECTOR, "button[type='submit']")
submit_button.click()


# Aguarda um momento para visualaizar o resultado (em uma aplicação real, você verificaria a resposta)

time.sleep(100)

# Fecha o Navegador

driver.quit()






#udon de camarão