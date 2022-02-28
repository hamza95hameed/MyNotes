{{-- <!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>


<h1>Fetch Gmail</h1>

<script src="https://apis.google.com/js/api.js"></script>
<script>
  /**
   * Sample JavaScript code for gmail.users.messages.attachments.get
   * See instructions for running APIs Explorer code samples locally:
   * https://developers.google.com/explorer-help/guides/code_samples#javascript
   */

  function authenticate() {
    return gapi.auth2.getAuthInstance()
        .signIn({scope: "https://mail.google.com/ https://www.googleapis.com/auth/gmail.addons.current.message.action https://www.googleapis.com/auth/gmail.addons.current.message.readonly https://www.googleapis.com/auth/gmail.modify https://www.googleapis.com/auth/gmail.readonly"})
        .then(function() { console.log("Sign-in successful"); },
              function(err) { console.error("Error signing in", err); });
  }
  function loadClient() {
    gapi.client.setApiKey("YOUR_API_KEY");
    return gapi.client.load("https://gmail.googleapis.com/$discovery/rest?version=v1")
        .then(function() { console.log("GAPI client loaded for API"); },
              function(err) { console.error("Error loading GAPI client for API", err); });
  }
  // Make sure the client is loaded and sign-in is complete before calling this method.
  function execute() {
    return gapi.client.gmail.users.messages.attachments.get({
      //"userId": "hamza95sixlogics@gmail.com",
      "userId": "me",
      "messageId": "1642571189000",
      "id": "ANGjdJ_jha4QBHbNQY_qZjOZXlCVd86Ib_mvQn3okfWQLVy2b4X1pAcmLUcjU3jPgxFrgekiyMHdm7S-w6p7Wb0b44JB9kZYnITTXICjTkHg4raGCGNzOvMPZBWLfw1_-VEeTEwFg-bAsUDMu1uyUgXQ4bdOnWnASaC4jxypEkDmnsPD6lGYbjm8ePvy0o_YvS6Up7acDhRfq1a6JDx1MK77EAbvUVKPq35dRczk7VMhe04U6vnWsmZLmGocgblJ5DWhMvsvqL-6lkGG1DqS7VVE8DGxf5PhCbijCCtGkEORCkA68AkiQ4Xv4OKXKFkX85q2p_IOrjFmkoS-8S6EVZGieuvR1zZGmC8lUoE4CZofeWlbCTpYMHJ0Kvp7wM0Tj3okqi3wOYBV--cUF9Ql"
    })
        .then(function(response) {
                // Handle the results here (response.result has the parsed body).
                var mybase64 = response.result.data;
                console.log(response.result.data);
                console.log("Response", response);

            $.ajax({
            type: "POST",
            url: "{{route('makepdf')}}",
            data: {_token: "{{csrf_token()}}", mybase64: mybase64}, 
            async: false,
            success: function (response) {
                resp = response;
            }
            });
	
					
              },
              function(err) { console.error("Execute error", err); });
  }
  gapi.load("client:auth2", function() {
    gapi.auth2.init({client_id: "1069694649043-f2rdch1r09rm3sshstteukfupvg18mcn.apps.googleusercontent.com"});
  });
</script>
<button onclick="authenticate().then(loadClient)">authorize and load</button>
<button onclick="execute()">execute</button>

</body>
</html> --}}



<!DOCTYPE html>
<html>
  <head>
    <title>Gmail API Quickstart</title>
    <meta charset="utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <p>Gmail API Quickstart</p>

    <!--Add buttons to initiate auth sequence and sign out-->
    <button id="authorize_button" style="display: none;">Authorize</button>
    <button id="signout_button" style="display: none;">Sign Out</button>

    <pre id="content" style="white-space: pre-wrap;"></pre>

    <script type="text/javascript">
      // Client ID and API key from the Developer Console
      var CLIENT_ID = '1069694649043-f2rdch1r09rm3sshstteukfupvg18mcn.apps.googleusercontent.com';
      var API_KEY = 'AIzaSyCbxjk3HYktmHnJpvtXB5sSXp5JGrk1118';

      // Array of API discovery doc URLs for APIs used by the quickstart
      var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/gmail/v1/rest"];

      // Authorization scopes required by the API; multiple scopes can be
      // included, separated by spaces.
      var SCOPES = 'https://www.googleapis.com/auth/gmail.readonly';

      var authorizeButton = document.getElementById('authorize_button');
      var signoutButton = document.getElementById('signout_button');

      /**
       *  On load, called to load the auth2 library and API client library.
       */
      function handleClientLoad() {
        gapi.load('client:auth2', initClient);
      }

      /**
       *  Initializes the API client library and sets up sign-in state
       *  listeners.
       */
      function initClient() {
        gapi.client.init({
          apiKey: API_KEY,
          clientId: CLIENT_ID,
          discoveryDocs: DISCOVERY_DOCS,
          scope: SCOPES
        }).then(function () {
          // Listen for sign-in state changes.
          gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

          // Handle the initial sign-in state.
          updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
          authorizeButton.onclick = handleAuthClick;
          signoutButton.onclick = handleSignoutClick;
        }, function(error) {
          appendPre(JSON.stringify(error, null, 2));
        });
      }

      /**
       *  Called when the signed in status changes, to update the UI
       *  appropriately. After a sign-in, the API is called.
       */
      function updateSigninStatus(isSignedIn) {
        if (isSignedIn) {
          authorizeButton.style.display = 'none';
          signoutButton.style.display = 'block';
          listLabels();
        } else {
          authorizeButton.style.display = 'block';
          signoutButton.style.display = 'none';
        }
      }

      /**
       *  Sign in the user upon button click.
       */
      function handleAuthClick(event) {
        gapi.auth2.getAuthInstance().signIn();
      }

      /**
       *  Sign out the user upon button click.
       */
      function handleSignoutClick(event) {
        gapi.auth2.getAuthInstance().signOut();
      }

      /**
       * Append a pre element to the body containing the given message
       * as its text node. Used to display the results of the API call.
       *
       * @param {string} message Text to be placed in pre element.
       */
      function appendPre(message) {
        var pre = document.getElementById('content');
        var textContent = document.createTextNode(message + '\n');
        pre.appendChild(textContent);
      }

      /**
       * Print all Labels in the authorized user's inbox. If no labels
       * are found an appropriate message is printed.
       */
      var sub_array = []
      function listLabels() {
              gapi.client.gmail.users.messages.list({
              'userId': 'me',
              // 'q':'has:attachment', // for getting emails that have attachment
              'q': 'has:pdf',
              //'q':'is:unread'

              }).then(function(response) {
              var labels = response.result.messages;
              //console.log(labels);

              if (labels && labels.length > 0) {
                  for (i = 0; i < labels.length; i++) {
                  var label = labels[i];
                  //appendPre(label.id);
                  sub_array.push(label.id);
                  }
              } else {
                  appendPre('No Labels found.');
              }

                  console.log('Array of ids');
                  console.log(sub_array);
                  console.log('single request')
                  //
                  for (i = 0; i < sub_array.length; i++) {

                      gapi.client.gmail.users.messages.get({
                      'userId': 'me',
                      'id': sub_array[i]
                      }).then(function(response) {
                        
                        appendPre(response.result.snippet);
                        appendPre('_____')              
                        console.log(response);
                        var msg_id = response.result.internalDate;
                        var attachment_id = response.result.payload.parts[1].body.attachmentId;
                        console.log('=====');
                        console.log(msg_id);
                        console.log(attachment_id );
                        /////////////////////////////
                        return gapi.client.gmail.users.messages.attachments.get({
                        //"userId": "hamza95sixlogics@gmail.com",
                        "userId": "me",
                        "messageId": msg_id,
                        "id": attachment_id
                        })
                        .then(function(response) {
                        console.log('Final Call----------');  
                        // Handle the results here (response.result has the parsed body).
                        var mybase64 = response.result.data;
                        console.log(response.result.data);
                        console.log("Response", response);

                        $.ajax({
                        type: "POST",
                        url: "{{route('makepdf')}}",
                        data: {_token: "{{csrf_token()}}", mybase64: mybase64}, 
                        async: false,
                        success: function (response) {
                        resp = response;
                        }
                        });


                        },
                        function(err) { console.error("Execute error", err); });





                        ////////////////////////////
                        
                      
                      });

                  }
                  //

          });
      }


    

    </script>








    <script async defer src="https://apis.google.com/js/api.js"
      onload="this.onload=function(){};handleClientLoad()"
      onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>
  </body>
</html>