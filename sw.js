// Asignar nombre y versión de caché
const CACHE_NAME = 'v1_cache_ava';

//Ficheros de caché para ver la app offline, dejar todo en raiz, sino hay que especificas donde está la css, las imagenes, etc.
var urlsToCache = ['./',];

// Evento Install, instalacion del service worker, almacena en caché archivos indicados arribaa
self.addEventListener('install', e => {
	e.waitUntil(
		caches.open(CACHE_NAME)
		.then(cache => {
			return cache.addAll(urlsToCache)
				.then (() => {
					self.skipWaiting();
				});
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
self.addEventListener('fetch', e => {
	e.respondWith(
		caches.match(e.request)
			.then(res => {
				if(res){
					//devuelve los datos de caché
					return res; 
				}
				return fetch(e.request);
			})
	)
});



