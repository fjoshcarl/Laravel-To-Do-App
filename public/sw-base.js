importScripts(
	'https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js'
);

workbox.routing.registerRoute(
	new RegExp('/photos/'),
	new workbox.strategies.StaleWhileRevalidate({
		cacheName: 'photos',
		plugins: [
			new workbox.expiration.Plugin({
				maxEntries: 15
			}),
			new workbox.cacheableResponse.Plugin({
				statuses: [200]
			})
		]
	})
);

// cache google fonts
workbox.routing.registerRoute(
        new RegExp('https://fonts.(?:googleapis|gstatic).com/(.*)'),
        new workbox.strategies.CacheFirst({
            cacheName: 'google-fonts',
            plugins: [
                new workbox.cacheableResponse.Plugin({
                    statuses: [0, 200],
                }),
            ],
        })
    );

		workbox.routing.registerRoute(
		  new RegExp('/todos/'),
		  workbox.strategies.networkFirst({
		    cacheName: 'todos',
		    plugins: [
		      new workbox.expiration.Plugin({
		        maxEntries: 50
		      })
		    ]
		}));

workbox.precaching.precacheAndRoute([]);

const networkFirstHandler = new workbox.strategies.NetworkFirst({
	cacheName: 'dynamic',
	plugins: [
		new workbox.expiration.Plugin({
			maxEntries: 10
		}),
		new workbox.cacheableResponse.Plugin({
			statuses: [200]
		})
	]
});

const FALLBACK_URL = workbox.precaching.getCacheKeyForURL('/offline.html');
const matcher = ({ event }) => event.request.mode === 'navigate';
const handler = args =>
	networkFirstHandler
		.handle(args)
		.then(response => response || caches.match(FALLBACK_URL))
		.catch(() => caches.match(FALLBACK_URL));

workbox.routing.registerRoute(matcher, handler);
