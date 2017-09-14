// Initialize Firebase
'use strict';
var config = {
    apiKey: "AIzaSyByMgFCXAR8vfBxO9Y2IymaagbPzd7ETLk",
    authDomain: "yeu-cong-nghe.firebaseapp.com",
    databaseURL: "https://yeu-cong-nghe.firebaseio.com",
    projectId: "yeu-cong-nghe",
    storageBucket: "",
    messagingSenderId: "569595732640"
};
firebase.initializeApp(config);
const messaging = firebase.messaging();
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('service-worker.js').then(function(registration){
        messaging.useServiceWorker(registration);
        messaging.requestPermission()
            .then(function() {
                console.log('Notification permission granted.');
                // TODO(developer): Retrieve an Instance ID token for use with FCM.
                // ...
                messaging.getToken().then(function(data) {
                    sendSubscriptionToServer(data);
                });
            })
            .catch(function(err) {
                console.log('Unable to get permission to notify.', err);
            });
    }, function(err) {
        // registration failed :(
        console.log('ServiceWorker registration failed: ', err);
    });
}
else {
    console.log('This browser does not support service worker');
}


// messaging.onTokenRefresh(function() {
//     messaging.getToken()
//         .then(function(refreshedToken) {
//             console.log('Token refreshed.');
//             console.log(refreshedToken);
//             // Indicate that the new Instance ID token has not yet been sent to the
//             // app server.
//             // setTokenSentToServer(false);
//             // Send Instance ID token to app server.
//             // sendTokenToServer(refreshedToken);
//             // [START_EXCLUDE]
//             // Display new Instance ID token and clear UI of all previous messages.
//             // resetUI();
//             // [END_EXCLUDE]
//         })
//         .catch(function(err) {
//             console.log('Unable to retrieve refreshed token ', err);
//         });
// });

function sendSubscriptionToServer(clientId) {

    var url = window.location.href;
    $.ajax({
        type: "POST",
        data: {
            'clientId': clientId,
            'websiteUrl': url
        },
        url: 'pages/subscribeClientId.json',
        success: function(data) {
            // console.log(data)
        }
    });
}