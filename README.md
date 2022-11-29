
## Sobre el proyecto

> -Está construido sobre laravel sail para agilizar el proceso de dockerización. <br>
> 
> Lo que quiere decir esto es que para levantar los contenedores debemos llamar dentro de la ruta ./vendor/bin/sail up,
> la propia documentación de laravel aconseja hacer rapidamente un pequeño alias dentro de nuestro /.bashrc o ~/.zshrc de la siguiente forma:
>> *alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'*
>
> Para que cada vez que necesitamos ejecutar un comando de artisan por ejemplo, no debamos repetir siempre ./vendor/bin/sail delante.
>
> Lo bueno de laravel sail es que podemos especificar los contenedores a usar en nuestra aplicación desde el principio, en este caso e utillizado mysql por comodidad.
>
> Una vez esplicado sobre que esta construido el proyecto, voy a explicar los aspectos relacionados con definición a la hora de resolver el problema:
>
> En este ejercicio debo crear una api sencilla que me permita realizar las opciones CRUD (siendo esto, Create, Read, Update, & Delete) sobre una la entidad producto.
>
> En el ejercicio no especificais exactamente alguna caracteristica, (por lo menos a nivel backend) asi que me e tomado la libertad de moldear la entidad por mi cuenta.
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
>
>Estuve pensando en las características principales de un producto, y, llegue a la conclusión de que, principalmente, necesitamos como no un uuid o id para identificarlos en bd
>un nombre que defina el producto, un precio asociado a este, la disponibilidad de dicho producto, que la he definido como un booleano par simplificar más este concepto, puesto que no es implícito del producto, pero me pareció interesante agregarlo.
>Y un tipo que es un campo el cual nos define que es exactamente el producto, bien puede ser una bebida, fruta, cereal… y un largo, etc.
> 
> Una posible integración más a este modelo podría ser las imágenes, pero como es una pequeña api.
>
> Decidí no utilizar imágenes para que el objeto resultante de la respuesta sean lo más simple y limpio posible.
>
> Habiendo definido los motivos por los cuales se ha moldeado la clase producto de esta forma, doy paso a puntualizar los endpoints disponibles.
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
>A estos endpoints se les puede llamar desde el cliente de preferencia que cada uno pueda tener, yo en mi caso he utilizado postman porque estoy bastante familiarizado con él.
><br>
><br>
> Cabe recalcar también el uso del .env yo en mi caso he utilizado las siguientes specificaciónes para la conexión con la db:<br>
>>DB_CONNECTION=mysql<br>
>>DB_HOST=127.0.0.1<br>
>>DB_PORT=3306<br>
>>DB_DATABASE=product_api<br>
>>DB_USERNAME=sail<br>
>>DB_PASSWORD=password<br>
>><br>
><br>
> 
>También he creado un simple y sencillo test para cada caso de uso, están almacenados en la ruta "\tests\feature\"
> 
> Y poco más me queda por explicar, muchas gracias por la revisión.
