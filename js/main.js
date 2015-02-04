/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$( document ).ready(function() {
   $("#contactForm").submit(function( event ){
       event.preventDefault();
       $.ajax({
           url: 'process.php',
           data: $("#contactForm").serialize(),
           type: 'POST',
           beforeSend: function(){
               
               $(".loaderImg").removeClass('hidden');
           },
           success: function( data ){
               $("#msg").html('<div style="background-color: green; padding: 5px; width: 100%; border-radius: 5px; color: white; "> We have received your request. Expect a feedback shortly.</div><br />');
               
           }
       });
   });
});