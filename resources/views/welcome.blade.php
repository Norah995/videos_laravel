<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <title>Document</title>

        
    </head>
    <body>

    <div class="container">
        <h1>mi taks</h1>
        <tasks list="{{ $tasks }}"></tasks>
        
    </div>
    <template id="tasks-template">
        <ul class="list-group">
            <li class="list-group-item" v-for="task in list">
                @{{ task.body }}       
            </li>          
        </ul>
    </template>

    
    

        
   
 <script type="text/javascript" src="https://unpkg.com/vue@2.1.8/dist/vue.js"></script>
    <script src="/js/main.js">
        /*

<div class="container">
        <h1>mi taks</h1>
        <tasks list="{{ $tasks }}"></tasks>
    </div>

    <template id="tasks-template">
        
        <ul class="list-group">
          
            <li class="list-group-item" v-for="task in list">
                @{{ task.body }}
                    
            </li> 
           
        </ul>
    </template>
        */


    </script>
        
    </body>

</html>
