var cacheName = 'v1';
var dataCacheName = 'AM-v1';

var cacheFiles = [  
    './',
    './index.php',
    './manifest.json',
    // './getTipe.php',
    // './getEvents.php',
    './codebase/dhtmlx.js',
    './codebase/dhtmlxscheduler.js',
    './codebase/ext/dhtmlxscheduler_container_autoresize.js',
    './codebase/ext/dhtmlxscheduler_quick_info.js',
    './codebase/ext/dhtmlxscheduler_readonly.js',
    './codebase/ext/dhtmlxscheduler_responsive.js',
    './codebase/ext/dhtmlxscheduler_minical.js',
    './codebase/dhtmlx.css',
    './codebase/dhtmlxscheduler.css',
    './codebase/dhtmlxscheduler_responsive.css',
    './indexedDB.js',
    './idb.js',
    './jquery-3.2.1.min.js',
    './codebase/imgs_dhx_terrace/resizing.png',
    './codebase/imgs/controls.gif'
    // './css/style.css',
    // './login.php',
    // './signout.php'
];

// Precache the files
// toolbox.precache(precacheFiles)

// self.addEventListener('install', function(event) {
//     event.waitUntil(
//         caches.open(cacheName).then(function(cache) {
//             // The cache will fail if any of these resources can't be saved.
//             return cache.addAll(precacheFiles)
//             .then(function() {
//                 console.log('Success! App is available offline!');
//                 return self.skipWaiting();
//             })
//         })
//     );
// });

self.addEventListener('install', function(e) {
  console.log('[ServiceWorker] Install');
  e.waitUntil(
    caches.open(cacheName).then(function(cache) {
      console.log('[ServiceWorker] Caching app shell');
      return cache.addAll(cacheFiles);
    })
  );
});

// self.addEventListener('install', function(e) {

//  console.log('[ServiceWorker] Install');

//   e.waitUntil(

//         Promise.all([caches.open(cacheName) ,self.skipWaiting()]).then(function(storage){

//             var static_cache = storage[0];

//             return Promise.all([static_cache.addAll(cacheFiles)]);

//         })

//     );

// });

// self.addEventListener('install', (event) => event.waitUntil(self.skipWaiting()));
// self.addEventListener('activate', (event) => event.waitUntil(self.clients.claim()));

self.addEventListener('activate', function(e) {
  console.log('[ServiceWorker] Activate');
  e.waitUntil(
    caches.keys().then(function(keyList) {
      return Promise.all(keyList.map(function(key) {
        if (key !== cacheName && key!= dataCacheName) {
          console.log('[ServiceWorker] Removing old cache', key);
          return caches.delete(key);
        }
      }));
    })
  );
  return self.clients.claim();
});

// Fetch events
self.addEventListener('fetch', (event) => {
    if(!navigator.onLine) {
      event.respondWith(
          caches.match(event.request,{ignoreSearch:true}).then((response) => response || fetch(event.request))
      );
    }else{
      event.respondWith(
          caches.match(event.request).then((response) => response || fetch(event.request))
      );
    }
});

self.addEventListener('notificationclose', function(e) {
    var notification = e.notification;
    var primaryKey = notification.data.primaryKey;
  });

//ganti primary key
self.addEventListener('notificationclick', function(e) {
      var notification = e.notification;
      var primaryKey = notification.data.primaryKey;

      clients.openWindow('https://opensource.petra.ac.id/~m26415039/cobatepi/index.php?ev=' + primaryKey);
      notification.close();
    });
