# Tezus_UnicTaxvat

## Funcionalidades

- Módulo para para validação de taxvat existente ao criar conta de cliente em Magento 2.
- Possibildiade de validação via API para melhor experiencia de usuário no frontend.

## Compatibilidade

- [x] Magento 2.4.x

## Instalação

### Zip file

- Clone o repositório a partir do seguinte [Link](https://github.com/tezusecommerce/Tezus_UnicTaxvat.git)
- Na raiz do magento, dentro da pasta App > Code > Crie a pasta Tezus. Ficará da seguinte maneira `app/code/Tezus`.
- Habilite o módulo executando `php bin/magento module:enable Tezus_UnicTaxvat`
- Aplique as atualizações do banco de dados: `php bin/magento setup:upgrade`
- Limpe o Cache `php bin/magento cache:clean`

## Endpoints

- Validação de taxvat:<br>
    - Method: `POST`;
    - URL: `rest/V1/unictaxvat/validation/taxvat`;
    - Header: `Content-Type: application/json`;
    - Body:
      ```JSON
      {
          "taxvat": "{TAXVAT}"
      }
      ```
      (Vale lembrar que como o campo de Taxvat não é exclusivo para CPF ou CNPJ, o valor enviado para validação deve ser
      exatamente o mesmo e com o mesmo formato do que foi cadastrado na base de dados. <br>Ex: `"taxvat": "000.000.000-00"` ou `"taxvat": "00000000000"`)
    - Retorno:  
      <br> `true` (Taxvat válido)
      <br> `false` (Taxvat inválido)
