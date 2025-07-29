<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
<h2>Contact from {{$name}}</h2>

<table style="width:100%;text-align: left;">
  <tr>    <th>Name</th> <td>{{$name}}</td>   </tr> 
     <tr>   <th>Email</th><td>{{$email}}</td></tr>
     
       <tr> <th>Message</th><td>{!! ($text) !!}</td> </tr>
  
    
</table>
</body>
</html>