$(function(){
$('#username').bind('input propertychange', function() {
    $('#result').html($(this).val().length + " <script> characters </script>");  
});  
  
}) 
    // function senddata(input)
    // {
        
        //alert(inputobj.value);
        // var content = input.value;
        // var xss = document.getElementById('xss');
        // xss.innerHTML = '<script>' .content;
            // $('#test').bind('input propertychange', function()
            //     {
            //         $('#xss').html($(this).val().'123');
            //     });
    // }
