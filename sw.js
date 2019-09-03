// Asignar nombre y versión de caché
const CACHE_NAME = 'v1_cache_ava';
var VERSION = '20';

//Ficheros de caché para ver la app offline, dejar todo en raiz, sino hay que especificas donde está la css, las imagenes, etc.
var urlsToCache = ['./',];

// Evento Install, instalacion del service worker, almacena en caché archivos indicados arribaa
self.addEventListener('install', e => {
	e.waitUntil(
		caches.open(CACHE_NAME)
		.then(async cache => {
			await cache.addAll(urlsToCache);
			self.skipWaiting();
		})
		.catch(err => console.log('No se ha registrado la cache', err))
	);
});

// Evento activar para que la app funcione sin conexion
self.addEventListener('activate', e => {
	const cacheWhitelist = [CACHE_NAME];
	e.waitUntil(
		caches.keys()
			.then(cacheNames => {
				return Promise.all(
					cacheNames.map(cacheName => {		
						if(cacheWhitelist.indexOf(cacheName) === -1){
							//Borra los elementos que no necesitamos
							return caches.delete(cacheName);
							}
						})
					);
				})
				.then(() => {
					self.clients.claim();
				})
		);
});

// Evento fetch , para actualizar la app
// self.addEventListener('fetch', e => {
// 	e.respondWith(
// 		caches.match(e.request)
// 			.then(res => {
// 				if(res){
// 					//devuelve los datos de caché
// 					return res; 
// 				}
// 				return fetch(e.request);
// 			})
// 	)
// });

this.addEventListener('fetch', function(e) {
	var tryInCachesFirst = caches.open(VERSION).then(cache => {
	  return cache.match(e.request).then(response => {
		if (!response) {
		  return handleNoCacheMatch(e);
		}
		// Update cache record in the background
		fetchFromNetworkAndCache(e);
		// Reply with stale data
		return response
	  });
	});
	e.respondWith(tryInCachesFirst);
  });

  function handleNoCacheMatch(e) {
	return fetchFromNetworkAndCache(e);
  }

  async function fetchFromNetworkAndCache(e) {
	try {
		  const res = await fetch(e.request);
		  // foreign requests may be res.type === 'opaque' and missing a url
		  if (!res.url)
			  return res;
		  // regardless, we don't want to cache other origin's assets
		  if (new URL(res.url).origin !== location.origin)
			  return res;
		  const cache = await caches.open(VERSION);
		  // TODO: figure out if the content is new and therefore the page needs a reload.
		  cache.put(e.request, res.clone());
		  return res;
	  }
	  catch (err) {
		  return console.error(e.request.url, err);
	  }
  }

