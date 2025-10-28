<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Descarga BD</title>
</head>
<body>
    
  <table>
   <thead>
     <tr>
       <th scope="col">#</th>
       <th scope="col">Nombre</th>
       <th scope="col">Descripcion</th>
       <th scope="col">Estado</th>
     </tr>
   </thead>
   <tbody>
       @foreach($etiquetas as $key => $etiqueta)
           <tr>
               <td>{{$etiqueta->id}}</td>
               <td>{{$etiqueta->nombre}}</td>
               <td>{{$etiqueta->descripcion}}</td>
               <td>{{$etiqueta->estado_etiqueta}}</td> 
           </tr>
       @endforeach
   </tbody>
 </table>
</body>
</html>