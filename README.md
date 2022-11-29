
## Sobre el proyecto

> -Está construido sobre laravel sail para agilizar el proceso de dockerización. <br>
> 
> Lo que quiere decir esto es que para levantar los contenedores debemos llamar dentro de la ruta ./vendor/bin/sail up,
> la propia documentación de laravel aconseja hacer rapidamente un pequeño alias dentro de nuestro /.bashrc o ~/.zshrc de la siguiente forma:
>> *alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'*
>
> Para que cada vez que se necesite ejecutar un comando de artisan por ejemplo, no se repetia siempre ./vendor/bin/sail delante.
>
> Lo bueno de laravel sail es que que se puede especificar los contenedores a usar en la aplicación desde el principio, en este caso se utillizo mysql.
>
> Una vez explicado sobre que esta construido el proyecto, ahora toca explicar los aspectos relacionados con la definición a la hora de resolver el problema:
>
> En este ejercicio se debe crear una api sencilla que permita realizar las opciones CRUD (siendo esto, Create, Read, Update, & Delete) sobre una entidad producto concreta.
>
> En el ejercicio no se especifica exactamente alguna caracteristica, (por lo menos a nivel backend) asi que se han tomado libertades a la hora moldear la entidad.
>
>
>> Representación en Json:
>> {<br>
>>     "id" : "string",<br>
>>     "name" : "string",<br>
>>     "price" : "float",<br>
>>     "availability" : boolean,<br>
>>     "type" : "string"<br>
>> }
>>
>>- Pensando en las características principales de un producto, se llegó a la conclusión de que, principalmente, es necesario como no un uuid o id para identificarlos en bd,
>>- un nombre que defina el producto, un precio asociado a este, la disponibilidad de dicho producto, que se definió como un booleano par simplificar más este concepto, puesto que no es estrictamente implícito del producto, pero a efectos practicos resulta interesante agregarlo.
>>
>>- Y un tipo que es un campo el cual nos define que es exactamente el producto, bien puede ser una bebida, fruta, cereal… y un largo, etc.
> 
> Una posible integración más a este modelo podría ser las imágenes, pero como es una pequeña api, se decidió no utilizar imágenes para que el objeto resultante de la respuesta sean lo más simple y limpio posible.
>
> Habiendo definido los motivos por los cuales se ha moldeado la clase producto de esta forma, es hora de puntualizar los endpoints disponibles.
>
> Existen 5 endpoints:
> 
>> Method GET Index:<br>
>>http://127.0.0.1:8000/api/v1/product <br>
>>Lista todos los productos.<br>
>> <br>
>>Method GET Show: <br>
>>http://127.0.0.1:8000/api/v1/product/{{id}} <br>
>> Lista el producto concreto con su id. <br>
>> <br>
>>Method POST Store:<br>
>>http://127.0.0.1:8000/api/v1/product <br>
>>Crea un producto. <br>
>> <br>
>>Method PUT Update:<br>
>>http://127.0.0.1:8000/api/v1/product/{{id}} <br>
>>Actualiza un prodcuto atraves de su id. <br>
>> <br>
>>Method DELETE Destroy:<br>
>>http://127.0.0.1:8000/api/v1/product/{{id}} <br>
>>elimina un producto por su id. <br>
>> <br>
>
>A estos endpoints se les puede llamar desde el cliente de preferencia como por ejemplo postman.
><br>
><br>
> Cabe recalcar también el uso de las variables de entorno concretas del .env en este caso se utilizan las siguientes specificaciónes para la conexión con la db:<br>
>>DB_CONNECTION=mysql<br>
>>DB_HOST=127.0.0.1<br>
>>DB_PORT=3306<br>
>>DB_DATABASE=product_api<br>
>>DB_USERNAME=sail<br>
>>DB_PASSWORD=password<br>
>><br>
><br>
> 
>También hay unos simples y sencillos tests para cada caso de uso, están almacenados en la ruta "\tests\feature\"
> 
> Y poco más me queda por explicar, muchas gracias por la revisión.
