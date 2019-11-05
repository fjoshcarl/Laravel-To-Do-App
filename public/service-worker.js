importScripts(
	'https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js'
);

workbox.precaching.precacheAndRoute([
	'/',
	'/about',
	'/test',
	'/todos',
  {
    "url": "css/app.css",
    "revision": "55972315e7b86f585b78d3e71bd5be42"
  },
  {
    "url": "images/icon-512x512.png",
    "revision": "a65114ff8d786c93a05327d02d2ab31f"
  },
  {
    "url": "js/app.js",
    "revision": "eddb6ef92b9e731c51e8b385734984d4"
  },
  {
    "url": "sw-base.js",
    "revision": "2480c0953ffd678dce14affdda4ea255"
  },
  {
    "url": "offline.html",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  }
]);
