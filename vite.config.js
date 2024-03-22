import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
// import react from '@vitejs/plugin-react';
// import vue from '@vitejs/plugin-vue';c

export default defineConfig({
	plugins: [
		laravel({
			input: [
				'resources/css/app.css',
				'resources/js/app.js'
			], refresh: true
		}),
		// react(),
		// vue({
		//     template: {
		//         transformAssetUrls: {
		//             base: null,
		//             includeAbsolute: false,
		//         },
		//     },
		// }),
	],
});
