<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Messages</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/647529e0ad80445890efca21/1h1kqn7fv';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

<body>
    
</body>
</html> -->
<!DOCTYPE html>
<html>
<head>
  <title>Chat System</title>
  <style>
    /* Styles for the chat window */
    #chat-window {
      height: 400px;
      width: 400px;
      border: 1px solid #ccc;
      padding: 10px;
      overflow-y: scroll;
    }
    
    /* Styles for the chat input */
    #chat-input {
      width: 100%;
    }
  </style>
</head>
<body>
  <div id="chat-window">
    <!-- Placeholder for displaying chat messages -->
  </div>
  
  <input type="text" id="chat-input" placeholder="Type your message...">
  
  <script>
    // JavaScript code for interacting with the chat system
    var chatWindow = document.getElementById('chat-window');
    var chatInput = document.getElementById('chat-input');
    
    // Function to add a new chat message to the window
    function addMessage(message) {
      var messageElement = document.createElement('p');
      messageElement.innerText = message;
      chatWindow.appendChild(messageElement);
    }
    
    // Event listener for sending messages when the user presses Enter
    chatInput.addEventListener('keyup', function(event) {
      if (event.key === 'Enter') {
        var message = chatInput.value;
        chatInput.value = '';
        addMessage('You: ' + message);
        
        // Send the message to the server or perform other actions
        // You'll need to implement the server-side functionality separately
      }
    });
  </script>
</body>
</html>
